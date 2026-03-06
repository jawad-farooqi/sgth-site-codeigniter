<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'user_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        'username',
        'password',
        'name',
        'email',
        'is_active',
        'created_at',
        'updated_at'
    ];

    //  I already added validation in the controller, so no need to add it here
    //  Just for reference I can use the below code for validation as well

    // // Validation Rules
    // protected $validationRules = [
    //     'username'      => 'required|min_length[5]|max_length[50]|regex_match[/^[A-Za-z0-9_]+$/]|is_unique[users.username]',
    //     'name'          => 'required|min_length[3]|max_length[100]',
    //     'email'         => 'required|valid_email|is_unique[users.email]',
    //     'password' => 'required|min_length[8]|max_length[50]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9]).+$/]',
    //     'confirm_password' => 'required|matches[password]' // Confirm password rule
    // ];

    // // Validation Messages
    // protected $validationMessages = [
    //     'username' => [
    //         'required'   => 'Username is required.',
    //         'min_length' => 'Username must be at least 5 characters.',
    //         'max_length' => 'Username cannot exceed 50 characters.',
    //         'regex_match' => 'Username may only contain letters, numbers, and underscores.',
    //         'is_unique'  => 'This username is already taken.'
    //     ],
    //     'name' => [
    //         'required'   => 'Name is required.',
    //         'min_length' => 'Name must be at least 3 characters.',
    //         'max_length' => 'Name cannot exceed 100 characters.'
    //     ],
    //     'email' => [
    //         'required'    => 'Email is required.',
    //         'valid_email' => 'Enter a valid email address.',
    //         'is_unique'   => 'This email is already registered.'
    //     ],
    //     'password' => [
    //             'required'    => 'Password is required.',
    //             'min_length'  => 'Password must be at least 8 characters long.',
    //             'max_length'  => 'Password cannot exceed 50 characters.',
    //             'regex_match' => 'Password must contain at least one uppercase letter, one lowercase letter, and one special character.'
    //     ],
    //     'confirm_password' => [ // Confirm password validation messages
    //         'required' => 'Confirm Password is required.',
    //         'matches'  => 'Confirm Password must match the Password.'
    //     ]
    // ];

    protected $skipValidation = false;

    public function get_role($username)
    {
        return $this->select('users.*, roles.role_id, roles.role_name') // Select all columns from users and role_id, role_name from roles table
            ->join('user_roles', 'user_roles.user_id = users.user_id')  // Join user_roles table with users table
            ->join('roles', 'roles.role_id = user_roles.role_id')    // Join roles table with user_roles table
            ->where('users.username', $username)    // Where username is equal to the given username
            ->first();  // Return the first row

        /*  The above codeigniter code is equivalent to the following SQL query:
        SELECT 
            users.*, roles.role_id, roles.role_name 
        FROM
            users
                JOIN
            user_roles ON user_roles.user_id = users.user_id
                JOIN
            roles ON roles.role_id = user_roles.role_id
        WHERE
            users.username = 'your_username';
        */
    }
    public function get_all_roles()
    {
        return $this->db->table('roles')->orderBy('role_id')->get()->getResultArray();
    }
    // Update user data and role
    public function update_user($user_id, array $user_data, int $role_id): bool
    {
        $db = \Config\Database::connect();
        $db->transStart(); // Start transaction

        // Update users table
        $this->update($user_id, $user_data);

        // Update user_roles table
        $builder = $db->table('user_roles');
        $builder->where('user_id', $user_id)
            ->update(['role_id' => $role_id]);

        $db->transComplete(); // Commit or rollback

        return $db->transStatus(); // Returns true if success, false if rollback
    }
}
