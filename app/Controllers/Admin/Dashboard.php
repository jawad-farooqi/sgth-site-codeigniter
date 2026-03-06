<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        // Check if the user is admin or editor
        if (!in_array(session()->get('user_role'), ['admin', 'editor'])) {
            session()->destroy();
            return redirect()->route('login');
        }

        // Dashboard view
        return view('admin/dashboard');
    }
}
