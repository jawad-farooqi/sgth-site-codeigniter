<?php

namespace App\Controllers\Admin;

use App\Models\Gallery\EventModel;
use App\Models\Gallery\EventImageModel;
use CodeIgniter\Controller;
use App\Controllers\BaseController;

class Event extends BaseController
{
    protected $eventModel;
    protected $eventImageModel;

    public function __construct()
    {
        $this->eventModel = new EventModel();
        $this->eventImageModel = new EventImageModel();
    }

    // Show the create event form
    public function create()
    {
        return view('admin/gallery/create_event');
    }

    // Handle form submission
    public function store()
    {
        helper(['form', 'url']);
        $db = \Config\Database::connect(); // Get DB connection for transaction
        $request = \Config\Services::request();

        $event_name = $request->getPost('event_name');
        $description = $request->getPost('description');
        $event_date = $request->getPost('event_date');
        $folder_name = preg_replace("/[^a-zA-Z0-9_-]/", "", $request->getPost('folder_name'));

        $upload_path = FCPATH . "images/events/" . $folder_name;
        if (!is_dir($upload_path)) mkdir($upload_path, 0755, true);

        $thumbnailFile = $this->request->getFile('thumbnail');
        if (!$thumbnailFile->isValid()) {
            return redirect()->back()->with('error', 'Thumbnail upload failed');
        }

        $thumbnailName = $thumbnailFile->getRandomName();
        $thumbnailFile->move($upload_path, $thumbnailName);
        $thumbnail_db_path = "/images/events/$folder_name/$thumbnailName";

        // Start transaction
        $db->transStart();

        try {
            // Insert event
            $eventData = [
                'event_name' => $event_name,
                'description' => $description,
                'thumbnail' => $thumbnail_db_path,
                'active_status' => 1,
                'timestamp' => $event_date
            ];
            $event_id = $this->eventModel->insert($eventData);

            // Upload event images
            $images = $this->request->getFiles();
            if (!empty($images['images'])) {
                foreach ($images['images'] as $img) {
                    if (!$img->isValid()) throw new \Exception('One of the images failed to upload.');

                    $imgName = $img->getRandomName();
                    $img->move($upload_path, $imgName);
                    $img_db_path = "/images/events/$folder_name/$imgName";

                    $this->eventImageModel->insert([
                        'image_name' => $event_name,
                        'image_url' => $img_db_path,
                        'event_id' => $event_id,
                        'active_status' => 1,
                        'timestamp' => date('Y-m-d H:i:s')
                    ]);
                }
            }

            // Complete transaction
            $db->transComplete();

            if ($db->transStatus() === false) {
                // Transaction failed
                return redirect()->back()->with('error', 'Event creation failed. Please try again.');
            }

            return redirect()->route('create_event')->with('success', 'Event created and images uploaded successfully!');

        } catch (\Exception $e) {
            // Rollback transaction and remove any uploaded files
            $db->transRollback();
            @unlink($upload_path . "/" . $thumbnailName);
            if (!empty($images['images'])) {
                foreach ($images['images'] as $img) {
                    @unlink($upload_path . "/" . $img->getName());
                }
            }
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}