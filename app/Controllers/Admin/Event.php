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

    // Display all events with edit forms
    public function index()
    {
        $events = $this->eventModel->orderBy('event_date', 'DESC')->findAll();
        return view('admin/gallery/view_events', ['events' => $events]);
    }

    // Get all images for a given event
    public function getEventImages($event_id)
    {
        return $this->eventImageModel->where('event_id', $event_id)->findAll();
    }

    // Show the create event form
    public function create()
    {
        return view('admin/gallery/create_event');
    }

    public function store()
    {
        $db = \Config\Database::connect();
        $request = service('request');

        // ----------------------------
        // 1. Validate Inputs & Files
        // ----------------------------
        $validation = \Config\Services::validation();

        $validation->setRules([
            'event_name' => 'required|min_length[3]|max_length[255]',
            'event_date' => 'required|valid_date[Y-m-d]',
            'thumbnail' => 'uploaded[thumbnail]|is_image[thumbnail]|max_size[thumbnail,2048]',
            'images.*' => 'is_image[images]|max_size[images,2048]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $event_name  = $request->getPost('event_name');
        $description = $request->getPost('description');
        $event_date  = $request->getPost('event_date');

        // ----------------------------
        // 2. Start Transaction
        // ----------------------------
        $db->transStart();

        try {
            // ----------------------------
            // 3. Insert Event (without thumbnail)
            // ----------------------------
            $eventData = [
                'event_name' => $event_name,
                'description' => $description,
                'event_date' => $event_date,
                'active_status' => 1,
                'timestamp' => date('Y-m-d H:i:s')
            ];

            $this->eventModel->insert($eventData);
            $event_id = $this->eventModel->insertID();

            // ----------------------------
            // 4. Create Upload Folder
            // ----------------------------
            $current_year = date('Y');
            $upload_path = FCPATH . "uploads/images/events/{$current_year}/{$event_id}";

            if (!is_dir($upload_path)) {
                mkdir($upload_path, 0755, true);
            }

            // ----------------------------
            // 5. Upload Thumbnail
            // ----------------------------
            $thumbnailFile = $request->getFile('thumbnail');
            $thumbnailName = $thumbnailFile->getRandomName();
            $thumbnailFile->move($upload_path, $thumbnailName);

            $thumbnail_db_path = "/uploads/images/events/{$current_year}/{$event_id}/{$thumbnailName}";

            // Update event with thumbnail path
            $this->eventModel->update($event_id, [
                'thumbnail' => $thumbnail_db_path
            ]);

            // ----------------------------
            // 6. Upload Gallery Images
            // ----------------------------
            $images = $request->getFiles();

            if (!empty($images['images'])) {
                foreach ($images['images'] as $img) {
                    if (!$img->isValid()) {
                        throw new \Exception('One of the gallery images failed to upload.');
                    }

                    $imgName = $img->getRandomName();
                    $img->move($upload_path, $imgName);

                    $img_db_path = "/uploads/images/events/{$current_year}/{$event_id}/{$imgName}";

                    $this->eventImageModel->insert([
                        'image_name' => $event_name,
                        'image_url' => $img_db_path,
                        'event_id' => $event_id,
                        'active_status' => 1,
                        'timestamp' => date('Y-m-d H:i:s')
                    ]);
                }
            }

            // ----------------------------
            // 7. Commit Transaction
            // ----------------------------
            $db->transComplete();

            if ($db->transStatus() === false) {
                throw new \Exception('Transaction failed. Event not created.');
            }

            return redirect()->route('create_event')->with('success', 'Event created and images uploaded successfully!');

        } catch (\Exception $e) {
            // Rollback transaction
            $db->transRollback();

            // Delete uploaded files if folder exists
            if (isset($upload_path) && is_dir($upload_path)) {
                array_map('unlink', glob("$upload_path/*"));
                rmdir($upload_path);
            }

            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }


    public function edit($event_id)
    {
        $event = $this->eventModel->find($event_id);

        return view('admin/gallery/edit_event', $event);
    }


    public function update($event_id)
    {
        $request = service('request');

        $data = [

            'event_name' => $request->getPost('event_name'),
            'event_date' => $request->getPost('event_date'),
            'active_status' => $request->getPost('active_status'),
            'timestamp' => date('Y-m-d H:i:s')

        ];

        $this->eventModel->update($event_id, $data);

        return redirect()->to('/events/view')->with('success','Event Updated');
    }

    public function delete($event_id)
    {
        $db = \Config\Database::connect();

        $db->transStart();

        try{

            $event = $this->eventModel->find($event_id);

            if(!$event){
                throw new \Exception("Event not found");
            }

            // -----------------------
            // Delete Gallery Images
            // -----------------------

            $images = $this->eventImageModel
            ->where('event_id',$event_id)
            ->findAll();

            foreach($images as $img){

                $file = FCPATH . $img['image_url'];

                if(file_exists($file)){
                    unlink($file);
                }

            }

            // -----------------------
            // Delete Thumbnail
            // -----------------------

            $thumbnail = FCPATH . $event['thumbnail'];

            if(file_exists($thumbnail)){
                unlink($thumbnail);
            }

            // -----------------------
            // Delete Folder
            // -----------------------

            $folder = dirname($thumbnail);

            if(is_dir($folder)){
                array_map('unlink', glob("$folder/*"));
                rmdir($folder);
            }

            // -----------------------
            // Delete DB Records
            // -----------------------

            $this->eventImageModel
            ->where('event_id',$event_id)
            ->delete();

            $this->eventModel->delete($event_id);

            $db->transComplete();

            return redirect()->back()->with('success','Event deleted');

        }
        catch(\Exception $e){

            $db->transRollback();

            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}