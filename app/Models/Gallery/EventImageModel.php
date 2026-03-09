<?php

namespace App\Models\Gallery;

use CodeIgniter\Model;

class EventImageModel extends Model
{
    protected $table = 'event_images';
    protected $primaryKey = 'image_id';
    protected $allowedFields = [
        'image_name',
        'image_url',
        'event_id',
        'active_status',
        'slider_flag',
        'slider_display_order',
        'timestamp'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'timestamp';
    protected $updatedField  = 'timestamp';
    protected $dateFormat    = 'datetime';

    // Get images for a specific event
    public function getImagesByEvent($event_id)
    {
        return $this->where('event_id', $event_id)->findAll();
    }
}