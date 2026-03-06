<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="p-6 bg-white rounded-2xl shadow-md">
  <h2 class="text-2xl font-bold mb-6">User Management</h2>

  <!-- Flash messages -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            <?= session('success') ?>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
            <?= session('error') ?>
        </div>
    <?php endif; ?>

  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-100"> 
        <tr>
          <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Name</th>
          <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Username</th>
          <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Email</th>
          <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Role</th>
          <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Active</th>
          <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Created At</th>
          <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Updated At</th>
          <th class="px-4 py-2 text-sm font-semibold text-gray-700 text-center">Action</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-100">
        <?php
        // $users = [
        //   [
        //       'id' => 1,
        //       'name' => 'John Doe',
        //       'username' => 'johndoe',
        //       'email' => 'john@example.com',
        //       'role' => 'admin',
        //       'active' => 1,
        //       'created_at' => '2024-01-01 10:00:00',
        //       'updated_at' => '2024-04-01 12:00:00',
        //   ],
        //   [
        //       'id' => 2,
        //       'name' => 'Jane Smith',
        //       'username' => 'janesmith',
        //       'email' => 'jane@example.com',
        //       'role' => 'editor',
        //       'active' => 1,
        //       'created_at' => '2024-02-15 09:30:00',
        //       'updated_at' => '2024-03-28 15:45:00',
        //   ],
        //   [
        //       'id' => 3,
        //       'name' => 'Mark Johnson',
        //       'username' => 'markj',
        //       'email' => 'mark@example.com',
        //       'role' => 'viewer',
        //       'active' => 0,
        //       'created_at' => '2023-11-10 14:20:00',
        //       'updated_at' => '2024-02-20 10:15:00',
        //   ]
        // ];
        ?>

        <?php foreach ($users as $user): ?>
          <tr class="hover:bg-gray-50">
            <form action="<?= route_to('update_user', esc($user['user_id'])); ?>" method="POST">
              <?= csrf_field() ?>
              <input type="hidden" name="user_id" value="<?= esc($user['user_id']) ?>">

              <!-- Name -->
              <td class="px-4 py-3 text-sm text-gray-800">
                <input type="text" name="name" value="<?= esc($user['name']) ?>"
                  class="bg-transparent w-full focus:bg-white focus:border-gray-300 border border-transparent px-1 py-0.5 rounded focus:outline-none focus:ring-1 focus:ring-blue-300 text-gray-800" />
              </td>

              <!-- Username (readonly) -->
              <td class="px-4 py-3 text-sm text-gray-600">
                <?= esc($user['username']) ?>
              </td>

              <!-- Email -->
              <td class="px-4 py-3 text-sm text-gray-800">
                <input type="email" name="email" value="<?= esc($user['email']) ?>"
                  class="bg-transparent w-full focus:bg-white focus:border-gray-300 border border-transparent px-1 py-0.5 rounded focus:outline-none focus:ring-1 focus:ring-blue-300 text-gray-800" />
              </td>

              <!-- Role
              <td class="px-4 py-3">
                <select name="role" class="border border-gray-300 rounded-lg px-2 py-1 text-sm w-full">
                  <option value="admin" <?= $user['role_name'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                  <option value="editor" <?= $user['role_name'] === 'editor' ? 'selected' : '' ?>>Editor</option>
                  <option value="viewer" <?= $user['role_name'] === 'user' ? 'selected' : '' ?>>Viewer</option>
                </select>
              </td> -->

              <!-- Role -->
              <td class="px-4 py-3">
                <select name="role" class="border border-gray-300 rounded-lg px-2 py-1 text-sm w-full">
                  <?php foreach ($roles as $role): ?>
                    <option value="<?= esc($role['role_id']) ?>" <?= $user['role_name'] === $role['role_name'] ? 'selected' : '' ?>>
                      <?= esc($role['role_name']) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </td>

              <!-- Active -->
              <td class="px-4 py-3">
                <select name="active" class="border border-gray-300 rounded-lg px-2 py-1 text-sm w-full">
                  <option value="1" <?= $user['is_active'] ? 'selected' : '' ?>>Active</option>
                  <option value="0" <?= !$user['is_active'] ? 'selected' : '' ?>>Inactive</option>
                </select>
              </td>

              <!-- Created At -->
              <td class="px-4 py-3 text-sm text-gray-500">
                <?= esc($user['created_at']) ?>
              </td>

              <!-- Updated At -->
              <td class="px-4 py-3 text-sm text-gray-500">
                <?= esc($user['updated_at']) ?>
              </td>

              <!-- Action Button -->
              <td class="px-4 py-3 text-center">
                <button type="submit"
                  class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-blue-700">
                  Update
                </button>
              </td>
            </form>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?= $this->endSection() ?>