<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Courses extends BaseController
{
    public function index()
    {
        return view('courses');
    }
}
