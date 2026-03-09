<?php

namespace App\Models\Gallery;

use CodeIgniter\Model;

class EventModel extends Model
{
    protected $table = 'event';
    protected $primaryKey = 'event_id';
    protected $allowedFields = [
        'event_name',
        'description',
        'thumbnail',
        'active_status',
        'timestamp'
    ];

    // Automatically handle timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'timestamp';
    protected $updatedField  = 'timestamp';
    protected $dateFormat    = 'datetime';

    // Example: Fetch event with its images
    public function getEventWithImages($event_id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('event.*, event_images.image_id, event_images.image_name, event_images.image_url');
        $builder->join('event_images', 'event.event_id = event_images.event_id', 'left');
        $builder->where('event.event_id', $event_id);
        return $builder->get()->getResultArray();
    }
}