<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Logout extends BaseController
{
    public function index()
    {
        // Logout user
        session()->destroy();
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
