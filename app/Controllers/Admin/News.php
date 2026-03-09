<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\News\NewsModel;
use App\Models\News\FileModel;
use App\Models\News\NewsFileModel;
use CodeIgniter\HTTP\ResponseInterface;

class News extends BaseController
{
    public function index()
    {
    $db = \Config\Database::connect();

    $perPage = 5;
    $page = $this->request->getGet('page') ?? 1;
    $offset = ($page - 1) * $perPage;

    // Count total news
    $totalNews = $db->table('news')->countAllResults();

    // Create subquery SQL manually
    $subQuery = "
        SELECT news_id 
        FROM news 
        ORDER BY publish_date DESC 
        LIMIT $offset, $perPage
    ";

    //  Main query
    $builder = $db->table('news n');

    $builder->select('
        n.news_id, n.title, n.slug, n.content, n.status,
        n.publish_date, n.author_id, n.created_at, n.updated_at,
        f.file_id, f.title AS file_title,
        f.original_name, f.stored_path, f.mime_type, f.size
    ');

    // JOIN the derived table instead of WHERE IN
    $builder->join("($subQuery) paginated_news", "paginated_news.news_id = n.news_id");

    $builder->join('news_files nf', 'nf.news_id = n.news_id', 'left');
    $builder->join('files f', 'f.file_id = nf.file_id', 'left');

    $builder->orderBy('n.publish_date', 'DESC');

    $rows = $builder->get()->getResultArray();

        // Group files under each news
        $newsWithFiles = [];
        foreach ($rows as $row) {
            $newsId = $row['news_id'];
            if (!isset($newsWithFiles[$newsId])) {
                $newsWithFiles[$newsId] = [
                    'news_id'      => $row['news_id'],
                    'title'        => $row['title'],
                    'slug'         => $row['slug'],
                    'content'      => $row['content'],
                    'status'       => $row['status'],
                    'publish_date' => $row['publish_date'],
                    'author_id'    => $row['author_id'],
                    'created_at'   => $row['created_at'],
                    'updated_at'   => $row['updated_at'],
                    'files'        => []
                ];
            }

            $size = $row['size'] ?? 0;
            $formated_size = formatFileSize($size);

            if (!empty($row['file_id'])) {
                $newsWithFiles[$newsId]['files'][] = [
                    'file_id'       => $row['file_id'],
                    'title'         => $row['file_title'],
                    'original_name' => $row['original_name'],
                    'stored_path'   => $row['stored_path'],
                    'mime_type'     => $row['mime_type'],
                    'size'          => $formated_size
                ];
            }
        }

        // Pass pagination info to view
        return view('admin/news/view_news', [
            'newsWithFiles' => $newsWithFiles,
            'currentPage' => $page,
            'perPage'     => $perPage,
            'totalNews'   => $totalNews
        ]);
    }

    public function create()
    { 
        return view('admin/news/add_news');
    }

    public function store()
    {
        $news_model = new NewsModel();
        $file_model = new FileModel();
        $news_file_model = new NewsFileModel();

        $db = \Config\Database::connect();

        // Start transaction
        $db->transBegin();

        try {
            // Validation
            $validation_rules = [
                'title' => [
                    'label' => 'Title',
                    'rules' => 'required|string|min_length[5]|max_length[255]',
                ],
                'content' => [
                    'label' => 'Content',
                    'rules' => 'string|max_length[500]',
                ],
                'status' => [
                    'label' => 'Status',
                    'rules' => 'required|in_list[draft,published,archived]',
                ],
                'publish_date' => [
                    'label' => 'Publish Date',
                    'rules' => 'required|valid_date[Y-m-d\TH:i]',
                ],
                'file_titles.*' => [
                    'label' => 'File Title',
                    'rules' => 'required|min_length[3]|max_length[255]',
                ],
                'files' => [
                    'label' => 'Files',
                    'rules' => 'uploaded[files]', // Ensures at least 1 file uploaded
                ],
                'files.*' => [
                    'label' => 'File',
                    'rules' => 'max_size[files,51200]|mime_in[files,image/jpeg,image/png,image/webp,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document]',
                ],

            ];

            $validation_messages = [
                'title' => [
                    'required' => 'The news title is required.',
                    'min_length' => 'The title must be at least 5 characters.',
                    'max_length' => 'The title must not exceed 255 characters.',
                ],
                'content' => [
                    'max_length' => 'The content must not exceed 500 characters.',
                ],
                'status' => [
                    'required' => 'The status is required.',
                    'in_list' => 'Invalid status selected.',
                ],
                'publish_date' => [
                    'required' => 'The publish date is required.',
                    'valid_date' => 'Please enter a valid publish date and time.',
                ],
                'file_titles.*' => [
                    'required' => 'Each file must have a title.',
                    'min_length' => 'File title must be at least 3 characters.',
                    'max_length' => 'File title must not exceed 255 characters.',
                ],
                'files' => [
                    'uploaded' => 'Please upload at least one file.',
                ],
                'files.*' => [
                    'max_size' => 'Each file must be less than 50 MB.',
                    'mime_in'  => 'Only JPG, PNG, WebP, PDF, DOC, or DOCX files are allowed.',
                ],
            ];

            if (!$this->validate($validation_rules, $validation_messages)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Slug Generation
            $title = $this->request->getPost('title');

            $publish_date = $this->request->getPost('publish_date');
            $date_part = date('Y-m-d', strtotime($publish_date));
            $base_slug = url_title($title, '-', true) . '-' . $date_part;
            $slug = $base_slug;
            $count = 0;

            while ($news_model->where('slug', $slug)->countAllResults() > 0) {
                $count++;
                $slug = $base_slug . '-' . $count;
            }

            // Save News Data
            $news_data = [
                'title'        => $title,
                'slug'         => $slug,
                'content'      => $this->request->getPost('content'),
                'status'       => $this->request->getPost('status'),
                'publish_date' => $publish_date,
                'author_id'    => session()->get('user_id'),
            ];
            $news_model->insert($news_data);
            $news_id = $news_model->getInsertID();

            // Create upload directory based on created date
            $folder_date = date('Y'); // created year
            $upload_subpath = 'uploads/news/' . $folder_date . '/' . $news_id;
            
            // $upload_path = WRITEPATH . $upload_subpath;
            $upload_path = FCPATH . $upload_subpath; // Use FCPATH for public access

            // Process files
            $files = $this->request->getFiles();
            $file_titles = $this->request->getPost('file_titles');

            $file_names = []; // track uploaded file names to check for duplicates
            $uploaded_paths = []; // for rollback if needed

            if (count($file_titles) !== count(array_unique($file_titles))) {
                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Each file title must be unique.');
            }

            // Create upload directory if it doesn't exist
            if (!is_dir($upload_path) && !mkdir($upload_path, 0775, true)) {
                throw new \RuntimeException("Failed to create upload folder.");
            }


            // Restrict to a maximum of 5 files
            // Also change in JavaScript validation of addFileInput() in the add_news.php view
            if (count($files['files']) > 5) {
                throw new \RuntimeException('You can only upload up to 5 files.');
            }

            if (isset($files['files']) && is_array($files['files'])) {
                foreach ($files['files'] as $index => $file) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        $new_name       = $file->getRandomName();
                        $original_name  = $file->getClientName();
                        $mime_type      = $file->getMimeType();
                        $file_size      = $file->getSize();

                        // Check if this file name is already uploaded in this request
                        if (in_array($original_name, $file_names)) {
                            // Duplicate found in current request — skip this file
                            continue;
                        }

                        // Add filename to the list to track duplicates
                        $file_names[] = $original_name;


                        // Compress files and images if needed
                        // Uncomment and adjust the logic below if you want to compress images or other files
                        // Comment the Move file logic if you implement compression

                        // $ext = strtolower($file->getExtension());

                        // if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
                        //     // 🖼️ Compress Image
                        //     $image = \Config\Services::image()
                        //         ->withFile($file)
                        //         ->resize(1280, 1280, true)
                        //         ->save($upload_path . $new_name, 75); // 75% quality

                        //     $stored_path = $upload_subpath . '/' . $new_name;
                        // } else {
                        //     // 📄 Compress other files as ZIP
                        //     $zip = new \ZipArchive();
                        //     $zip_name = pathinfo($new_name, PATHINFO_FILENAME) . '.zip';
                        //     $zip_path = $upload_path . $zip_name;

                        //     if ($zip->open($zip_path, \ZipArchive::CREATE) === TRUE) {
                        //         $zip->addFile($file->getTempName(), $original_name);
                        //         $zip->close();
                        //     } else {
                        //         throw new \RuntimeException("Failed to create zip for: {$original_name}");
                        //     }

                        //     // Replace original file info with ZIP
                        //     $new_name    = $zip_name;
                        //     $file_size   = filesize($zip_path);
                        //     $mime_type   = 'application/zip';
                        //     $stored_path = $upload_subpath . '/' . $new_name;
                        // }


                        // Move file
                        if (!$file->move($upload_path, $new_name)) {
                            throw new \RuntimeException("File upload failed: {$original_name}");
                        }
                        // Move file logic ended .. Comment if compression required


                        // For rollback purposes
                        $stored_path = $upload_subpath . '/' . $new_name;
                        $uploaded_paths[] = FCPATH . $stored_path; // for rollback

                        // Insert file record
                        $file_data = [
                            'title'         => $file_titles[$index] ?? '',
                            'original_name' => $original_name,
                            'stored_path'   => $stored_path,
                            'mime_type'     => $mime_type,
                            'size'          => $file_size,
                            'uploaded_by'   => session()->get('user_id'),
                        ];
                        $file_model->insert($file_data);
                        $file_id = $file_model->getInsertID();

                        // Insert junction table record
                        $db->table('news_files')->insert([
                            'news_id' => $news_id,
                            'file_id' => $file_id,
                        ]);
                    }
                }
            }


            // Commit DB transaction if successful
            $db->transCommit();

            return redirect()->route('add_news')->with('success', 'News and Files uploaded successfully.');
        } catch (\Throwable $e) {

            // Rollback DB transaction on error
            $db->transRollback();

            // Delete any uploaded files
            foreach ($uploaded_paths ?? [] as $path) {
                if (file_exists($path)) {
                    @unlink($path);
                }
            }

            // Delete upload directory if it exists
            if (isset($upload_path) && is_dir($upload_path)) {
                @rmdir($upload_path); // only works if empty
            }

            // Redirect back with error message
            return redirect()->back()
                ->withInput()
                ->with('error', 'Failed to upload news. Reason: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $newsModel      = new NewsModel();
        $newsFileModel  = new NewsFileModel();
        $fileModel      = new FileModel();

        // Get news
        $news = $newsModel->find($id);

        if (!$news) {
            return redirect()->route('admin_news')
                ->with('error', 'News not found.');
        }

        // Get file IDs linked with this news
        $newsFiles = $newsFileModel
                        ->where('news_id', $id)
                        ->findAll();

        $fileIds = array_column($newsFiles, 'file_id');

        // Get actual file records
        $files = [];
        if (!empty($fileIds)) {
            $files = $fileModel
                        ->whereIn('file_id', $fileIds)
                        ->findAll();
        }

        return view('admin/news/edit_news', [
            'news'  => $news,
            'files' => $files
        ]);
    }


    public function update($id)
    {
        $newsModel = new NewsModel();
        $fileModel = new FileModel();
        $newsFileModel = new NewsFileModel();

        $db = \Config\Database::connect();
        $db->transBegin();

        try {

            $news = $newsModel->find($id);

            if (!$news) {
                throw new \Exception('News not found');
            }

            /*
            |--------------------------------------------------------------------------
            | Validation
            |--------------------------------------------------------------------------
            */

            // Validation
            $validation_rules = [
                'title' => [
                    'label' => 'Title',
                    'rules' => 'required|string|min_length[5]|max_length[255]',
                ],
                'content' => [
                    'label' => 'Content',
                    'rules' => 'string|max_length[500]',
                ],
                'status' => [
                    'label' => 'Status',
                    'rules' => 'required|in_list[draft,published,archived]',
                ],
                'publish_date' => [
                    'label' => 'Publish Date',
                    'rules' => 'required|valid_date[Y-m-d\TH:i]',
                ],

            ];

            $validation_messages = [
                'title' => [
                    'required' => 'The news title is required.',
                    'min_length' => 'The title must be at least 5 characters.',
                    'max_length' => 'The title must not exceed 255 characters.',
                ],
                'content' => [
                    'max_length' => 'The content must not exceed 500 characters.',
                ],
                'status' => [
                    'required' => 'The status is required.',
                    'in_list' => 'Invalid status selected.',
                ],
                'publish_date' => [
                    'required' => 'The publish date is required.',
                    'valid_date' => 'Please enter a valid publish date and time.',
                ],
            ];

            $validation = \Config\Services::validation();

            if (!$this->validate($validation_rules, $validation_messages)) {
                throw new \Exception(implode(', ', $validation->getErrors()));
            }

            $files = $this->request->getFiles();

            if (!empty($files['files']) && $files['files'][0]->isValid()) {

                $file_validation_rules = [
                    'file_titles.*' => [
                        'label' => 'File Title',
                        'rules' => 'required|min_length[3]|max_length[255]',
                    ],
                    'files.*' => [
                        'label' => 'File',
                        'rules' => 'max_size[files,51200]|mime_in[files,image/jpeg,image/png,image/webp,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document]',
                    ],
                ];

                if (!$this->validate($file_validation_rules, $validation_messages)) {
                    throw new \Exception(implode(', ', $this->validator->getErrors()));
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Update News
            |--------------------------------------------------------------------------
            */

            // Slug Update Generation
            $title = $this->request->getPost('title');
            $publish_date = $this->request->getPost('publish_date');

            $date_part = date('Y-m-d', strtotime($publish_date));
            $base_slug = url_title($title, '-', true) . '-' . $date_part;

            $slug = $base_slug;
            $count = 0;

            while (
                $newsModel
                    ->where('slug', $slug)
                    ->where('news_id !=', $id) // exclude current record
                    ->countAllResults() > 0
            ) {
                $count++;
                $slug = $base_slug . '-' . $count;
            }


            // Update news record
            $newsModel->update($id, [
                'title'        => $this->request->getPost('title'),
                'content'      => $this->request->getPost('content'),
                'status'       => $this->request->getPost('status'),
                'publish_date' => $this->request->getPost('publish_date'),
                'slug'         => $slug
            ]);

            /*
            |--------------------------------------------------------------------------
            | File Upload Processing
            |--------------------------------------------------------------------------
            */

            $fileTitles = $this->request->getPost('file_titles') ?? [];
            $files = $this->request->getFiles()['files'] ?? [];

            $folderDate = date('Y');
            $uploadPath = 'uploads/news/' . $folderDate . '/' . $id;

            if (!empty($files)) {

                if (!is_dir(FCPATH . $uploadPath)) {
                    mkdir(FCPATH . $uploadPath, 0777, true);
                }

                foreach ($files as $index => $file) {

                    if (!$file || !$file->isValid()) {
                        continue;
                    }

                    $newName = $file->getRandomName();
                    $file->move(FCPATH . $uploadPath, $newName);

                    $title = $fileTitles[$index] ?? $file->getClientName();

                    /*
                    |--------------------------------------------------------------------------
                    | File Record Insert
                    |--------------------------------------------------------------------------
                    */

                    $fileModel->insert([
                        'title'         => (string) $title,
                        'original_name' => (string) $file->getClientName(),
                        'stored_path'   => (string) ($uploadPath . '/' . $newName),
                        'mime_type'     => (string) $file->getClientMimeType(),
                        'size'          => (int) $file->getSize(),
                        'uploaded_by'   => (int) (session()->get('user_id') ?? 0)
                    ]);

                    $fileId = $fileModel->getInsertID();

                    if (!$fileId) {
                        throw new \Exception('File insert failed');
                    }

                    /*
                    |--------------------------------------------------------------------------
                    | Relation Mapping Insert
                    |--------------------------------------------------------------------------
                    */

                    $exists = $newsFileModel->where([
                        'news_id' => $id,
                        'file_id' => $fileId
                    ])->countAllResults();

                    if (!$exists) {
                        $newsFileModel->insert([
                            'news_id' => $id,
                            'file_id' => $fileId
                        ]);
                    }
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Transaction Commit
            |--------------------------------------------------------------------------
            */

            if ($db->transStatus() === false) {
                throw new \Exception('Transaction failed');
            }

            $db->transCommit();

            return redirect()->route('view_news')
                ->with('success', 'News updated successfully');

        } catch (\Exception $e) {

            $db->transRollback();

            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $db = \Config\Database::connect();
        $db->transStart();

        $newsModel = new NewsModel();
        $newsFileModel = new NewsFileModel();
        $fileModel = new FileModel();

        // Check if news exists
        $news = $newsModel->find($id);

        // Extract year from created_date
        $year = date('Y', strtotime($news['created_at']));

        if (!$news) {
            return redirect()->route('view_news')
                ->with('error', 'News not found.');
        }

        // Get related file IDs
        $newsFiles = $newsFileModel->where('news_id', $id)->findAll(); 
        
        $fileIds = array_column($newsFiles, 'file_id');
 
        $files = [];
        if (!empty($fileIds)) {
            $files = $fileModel->whereIn('file_id', $fileIds)->findAll();
        }

        // Delete relation records (important to prevent orphan rows)
        $newsFileModel->where('news_id', $id)->delete();

        // Delete file records
        if (!empty($fileIds)) {
            $fileModel->whereIn('file_id', $fileIds)->delete();
        }
        
        // Delete news record
        $newsModel->delete($id);

        $db->transComplete(); 

        // If transaction failed
        if ($db->transStatus() === false) {
            return redirect()->route('view_news')
                ->with('error', 'Something went wrong while deleting.');
        }

        // Delete physical files AFTER successful transaction
        foreach ($files as $file) {
            $filePath = FCPATH . $file['stored_path'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Delete the news folder (e.g., uploads/news/43)
        $folderPath = FCPATH . 'uploads/news/' . $year . '/' . $id;

        if (is_dir($folderPath)) {
            rmdir($folderPath); // will delete only if folder is empty
        }

        return redirect()->route('view_news')
            ->with('success', 'News and associated files deleted successfully.');
    }

    // Already replaced with helper_function formatFileSize() in app/Helpers/app_helper.php
    // This function is no longer needed in the controller since we are using a global helper function for formatting file sizes.
    // private function formatFileSize($bytes)
    // {
    //     if ($bytes >= 1073741824) {
    //         $size = number_format($bytes / 1073741824, 2) . ' GB';
    //     } elseif ($bytes >= 1048576) {
    //         $size = number_format($bytes / 1048576, 2) . ' MB';
    //     } elseif ($bytes >= 1024) {
    //         $size = number_format($bytes / 1024, 2) . ' KB';
    //     } else {
    //         $size = $bytes . ' B';
    //     }
    //     return $size;
    // }

    


}
