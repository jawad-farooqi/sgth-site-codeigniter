<?php

namespace App\Models\News;
 
use CodeIgniter\Model;

class NewsFileModel extends Model
{
    protected $table = 'news_files';
    protected $primaryKey = "id";

    protected $allowedFields = [
        'news_id',
        'file_id',
    ];

    protected $useAutoIncrement = true;
    public $timestamps = false;
}
