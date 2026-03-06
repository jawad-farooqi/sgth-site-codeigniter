<?php

namespace App\Models\News;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'news_id';

    protected $allowedFields = [
        'title',
        'slug',
        'content',
        'author_id',
        'status',
        'publish_date',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
