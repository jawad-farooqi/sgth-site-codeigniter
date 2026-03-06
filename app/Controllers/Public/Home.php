<?php

namespace App\Controllers\Public;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Home extends BaseController
{
    public function index()
    {
        return view('public/home.php'); // entry point 

    }
}

// ______________________________________________________________________________________

// Note: The Home controller in app/Controllers/Home_Test.php is a test or example controller and is not part of the main application structure.