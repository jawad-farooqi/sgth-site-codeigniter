<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class User extends BaseController
{
    // Display all users
    public function index()
    {
        // Check if the user is logged in
        if (!session()->get('is_logged_in')) {
            return redirect()->route('login');
        }

        // Check if the user is admin
        if (session()->get('user_role') !== 'admin') {
            return redirect()->route('dashboard');
        }

        // display users
        $user_model = new UserModel();

        // Get users
        $users = $user_model->findAll();

        // Get all availabe roles in the roles table
        $roles = $user_model->get_all_roles();

        // Get roles
        foreach ($users as &$user) {
            $user_role = $user_model->get_role($user['username']);
            if (isset($user_role)) {
                $user['role_name'] = $user_role['role_name'];
                $user['role_id'] = $user_role['role_id'];
            } else {
                $user['role_name'] = '0';
                $user['role_id'] = '0';
            }
        }


        // foreach ($users as $user) {
        //     $user['role'] = $user_model->get_role($user['username']);
        // }

        // // Check if the user has admin role
        // if (session()->get('role') !== 'admin') {
        //     // return redirect()->to('/dashboard');
        //     return redirect()->route('dashboard');
        // }


        return view('admin/users/view_users', [
            'users' => $users,
            'roles' => $roles
        ]);

        // return view('admin/users/view_user', [
        //     'users' => $users
        //     // 'roles' => $roles
        // ]);
    }

    // Display user creation form
    public function create()
    {
        // Check if the user is admin
        if (session()->get('user_role') !== 'admin') {
            return redirect()->route('dashboard');
        }

        return view('admin/users/add_user');
    }
    // Store new user into database
    public function store()
    {
        // Check if the user is admin
        if (session()->get('user_role') !== 'admin') {
            return redirect()->route('dashboard');
        }
        // Validate input
        $validation_rules = [
            'username' => 'required|min_length[5]|max_length[50]|regex_match[/^[A-Za-z0-9_]+$/]|is_unique[users.username]',
            'name' => 'required|min_length[5]|max_length[100]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]|max_length[50]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9]).+$/]',
            'confirm_password' => 'required|matches[password]',
        ];

        $validation_messages = [
            'username' => [
                'required' => 'Username is required.',
                'min_length' => 'Username must be at least 5 characters.',
                'max_length' => 'Username cannot exceed 50 characters.',
                'regex_match' => 'Username may only contain letters, numbers, and underscores.',
                'is_unique' => 'This username is already taken.'
            ],
            'name' => [
                'required' => 'Name is required.',
                'min_length' => 'Name must be at least 5 characters.',
                'max_length' => 'Name cannot exceed 100 characters.'
            ],
            'email' => [
                'required' => 'Email is required.',
                'valid_email' => 'Enter a valid email address.',
                'is_unique' => 'This email is already registered.'
            ],
            'password' => [
                'required' => 'Password is required.',
                'min_length' => 'Password must be at least 8 characters.',
                'max_length' => 'Password cannot exceed 50 characters.',
                'regex_match' => 'Password must contain at least one uppercase letter, one lowercase letter, and one special character.'
            ],
            'confirm_password' => [
                'required' => 'Confirm Password is required.',
                'matches' => 'Confirm Password must match the Password.'
            ]
        ];

        if (!$this->validate($validation_rules, $validation_messages)) {
            return redirect()->route('add_user')
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $user_model = new \App\Models\UserModel();

        // Start transaction
        $db = \Config\Database::connect();
        $db->transStart();

        // 1. Prepare user data
        $data = [
            'username' => $this->request->getPost('username'),
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        // 2. Save to users table
        $user_model->save($data);

        // 3. Get inserted user_id
        $user_id = $user_model->insertID();

        // 4. Insert into user_roles with default role_id = 5
        $builder = $db->table('user_roles');
        $builder->insert([
            'user_id' => $user_id,
            'role_id' => 5
        ]);

        $db->transComplete(); // Commit or rollback

        // 5. Check transaction status
        if ($db->transStatus()) {
            return redirect()->route('add_user')->with('success', 'User added successfully!');
        } else {
            return redirect()->route('add_user')->with('error', 'Failed to add user.');
        }
    }

    // public function edit($user_id)
    // {
    //     // No need for now
    //     $user_model = new UserModel();
    //     $user = $user_model->find($user_id);

    //     return view('admin/users/edit', ['user' => $user]);
    // }

    // update user data
    public function update($user_id)
    {
        // Only allow admins
        if (session()->get('user_role') !== 'admin') {
            return redirect()->route('dashboard');
        }

        // Validation Rules
        $validation_rules = [
            'name'   => 'required|min_length[3]|max_length[100]',
            'email'  => "required|valid_email|is_unique[users.email,user_id,{$user_id}]",
            'role'   => 'required|integer',
            'active' => 'required|in_list[0,1]',
        ];

        // Validation Messages
        $validation_messages = [
            'name' => [
                'required'    => 'Name is required.',
                'min_length'  => 'Name must be at least 3 characters.',
                'max_length'  => 'Name cannot exceed 100 characters.',
            ],
            'email' => [
                'required'    => 'Email is required.',
                'valid_email' => 'Enter a valid email address.',
                'is_unique'   => 'This email is already registered.',
            ],
            'role' => [
                'required' => 'Role selection is required.',
                'integer'  => 'Invalid role selected.',
            ],
            'active' => [
                'required' => 'Please select active status.',
                'in_list'  => 'Active must be 1 (active) or 0 (inactive).',
            ]
        ];

        // Validate using built-in validator
        if (!$this->validate($validation_rules, $validation_messages)) {
            return redirect()->route('update_user', [$user_id])
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        // Update user data
        $user_model = new \App\Models\UserModel();
        $user_data = [
            'name'      => $this->request->getPost('name'),
            'email'     => $this->request->getPost('email'),
            'is_active' => $this->request->getPost('active') === '1' ? 1 : 0,
        ];

        $role_id = $this->request->getPost('role');

        // Update user data and role
        if ($user_model->update_user($user_id, $user_data, $role_id)) {
            return redirect()->route('view_users')->with('success', 'User updated successfully!');
        } else { 
            return redirect()->route('view_users')->with('error', 'Failed to update user.');
        }
    }
    // Display change password form
    public function change_password()
    {
        // Check if the user is logged in
        if (!session()->get('is_logged_in')) {
            return redirect()->route('login');
        }

        return view('admin/settings/change_password');
    }

    // Update user password
    public function update_password()
    {
        $session = session();
        $user_id = $session->get('user_id'); // or however you're storing logged-in user
        $user_model = new UserModel();

        $current_password = $this->request->getPost('current_password');
        $new_password     = $this->request->getPost('new_password');
        $confirm_password = $this->request->getPost('confirm_password');

        // Fetch user
        $user = $user_model->find($user_id);

        // Check if user exists and verify current password
        if (!$user || !password_verify($current_password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Current password is incorrect.');
        }

        // Set validation rules
        $validation_rules = [
            'current_password' => 'required',
            'new_password'     => 'required|min_length[8]|max_length[50]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9]).+$/]',
            'confirm_password' => 'required|matches[new_password]',
        ];

        // Set validation messages
        $validation_messages = [
            'current_password' => [
                'required'    => 'Please enter your current password.'
            ],
            'new_password' => [
                'required'    => 'New password is required.',
                'min_length'  => 'Password must be at least 8 characters.',
                'max_length'  => 'Password must not exceed 50 characters.',
                'regex_match' => 'Password must include at least one uppercase letter, one lowercase letter, and one special character.'
            ],
            'confirm_password' => [
                'matches'     => 'Confirm password does not match the new password.',
                'required'    => 'Please confirm your new password.'
            ]
        ];

        // Validate input
        if (!$this->validate($validation_rules, $validation_messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        if ($current_password === $new_password) {
            return redirect()->back()->withInput()->with('error', 'New password must be different from current password.');
        }

        if ($new_password !== $confirm_password) {
            return redirect()->back()->withInput()->with('error', 'New passwords do not match.');
        }

        // Hash new password and update
        $user_model->update($user_id, [
            'password' => password_hash($new_password, PASSWORD_DEFAULT),
        ]);

        return redirect()->route('change_password')->with('success', 'Password updated successfully.');
    }

    public function delete($user_id)
    {
        // Check if the user is admin
        // if (session()->get('user_role') !== 'admin') {
        //     return redirect()->route('dashboard');
        // }

        // $user_model = new UserModel();
        // $user_model->delete($user_id);
        // return redirect()->to('/admin/users')->with('success', 'User deleted successfully!');
    }
}
