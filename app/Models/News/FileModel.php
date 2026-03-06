<?php

namespace App\Models\News;

use CodeIgniter\Model;

class FileModel extends Model
{ 
    protected $table = 'files'; 
    protected $primaryKey = 'file_id';

    protected $returnType = 'array';

    protected $useAutoIncrement = true;

    protected $useTimestamps = false;

    protected $allowedFields = [
        'title',
        'original_name',
        'stored_path',
        'mime_type',
        'size',
        'uploaded_by',
        'uploaded_at'
    ];
}