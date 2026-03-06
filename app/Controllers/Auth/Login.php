<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }
    public function authenticate()
    {
        // Load session library
        $session = session();

        // Load user model
        $user_model = new UserModel();

        // Validation rules for login
        $validation_rules = [
            // Username validation rules:
            // - 'required': Ensures that the username field is not left empty.
            // - 'min_length[5]': The username must be at least 5 characters long.
            // - 'max_length[50]': The username cannot exceed 50 characters.
            // - 'regex_match[/^[A-Za-z0-9_]+$/]': Only allows alphabets (both uppercase and lowercase), numbers, and underscores.
            'username' => 'required|min_length[5]|max_length[50]|regex_match[/^[A-Za-z0-9_]+$/]',

            // Password validation rules:
            // - 'required': Ensures that the password field is not left empty.
            // - 'min_length[8]': The password must be at least 8 characters long.
            // - 'max_length[50]': The password cannot exceed 50 characters.
            // - 'regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9]).+$/]': 
            //   Ensures the password contains at least one lowercase letter, one uppercase letter, and one special character.
            'password' => 'required|min_length[8]|max_length[50]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9]).+$/]'
        ];

        $validation_messages = [
            'username' => [
                'required'    => 'Username is required.',
                'min_length'  => 'Username must be at least 5 characters long.',
                'max_length'  => 'Username cannot exceed 50 characters.',
                'regex_match' => 'Username may only contain letters, numbers, and underscores.'
            ],
            'password' => [
                'required'    => 'Password is required.',
                'min_length'  => 'Password must be at least 8 characters long.',
                'max_length'  => 'Password cannot exceed 50 characters.',
                'regex_match' => 'Password must contain at least one uppercase letter, one lowercase letter, and one special character.'
            ]
        ];


        $validation = \Config\Services::validation();
        $validation->setRules($validation_rules, $validation_messages);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->route('login')
                ->withInput()
                ->with('username_error', $validation->getError('username')) // Store username error
                ->with('password_error', $validation->getError('password')); // Store password error
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $remember_me = $this->request->getPost('remember_me');

        // Fetch user by username
        $user = $user_model->where('username', $username)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Invalid username.');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->route('login')->with('error', 'Invalid password.');
        }

        if ($user['is_active'] == 0) {
            return redirect()->route('login')->with('error', 'Your account is inactive. Please contact support.');
        }

        $user_role = $user_model->get_role($user['username']);
 
        // Store user session
        $session->set([
            'user_id'     => $user['user_id'],
            'username'    => $user['username'],
            'name'        => $user['name'],
            'email'       => $user['email'],
            'user_role'   => $user_role['role_name'],
            'user_role_id'   => $user_role['role_id'],
            'is_logged_in' => true
        ]);

        // Redirect to dashboard
        return redirect()->route('dashboard')->with('success', 'Login successful!');
    }
}
