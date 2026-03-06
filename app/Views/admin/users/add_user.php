<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>
<!-- Your page content here -->



<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-sm p-6 bg-white rounded-lg shadow-lg mt-[-50px] md:mt-[-80px]">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Add New User</h2>

        <!-- Display Success Message -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>

        <!-- Display Error Message -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-center">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?= route_to('save_user'); ?>" method="POST" class="space-y-4">
            <!-- Full Name -->
            <div class="relative mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Full Name</label>
                <input type="text" name="name" value="<?= old('name'); ?>"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 pl-10">
                <span class="absolute left-3 top-9 text-gray-500"><i class="fas fa-user"></i></span>
                <?php if (session('errors.name')): ?>
                    <p class="text-red-600 text-sm mt-1 ml-1"><?= esc(session('errors.name')) ?></p>
                <?php endif; ?>
            </div>

            <!-- Username -->
            <div class="relative mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Username</label>
                <input type="text" name="username" value="<?= old('username'); ?>"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 pl-10">
                <span class="absolute left-3 top-9 text-gray-500"><i class="fas fa-user-tag"></i></span>
                <?php if (session('errors.username')): ?>
                    <p class="text-red-600 text-sm mt-1 ml-1"><?= esc(session('errors.username')) ?></p>
                <?php endif; ?>
            </div>

            <!-- Email -->
            <div class="relative mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Email</label>
                <input type="email" name="email" value="<?= old('email'); ?>"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 pl-10">
                <span class="absolute left-3 top-9 text-gray-500"><i class="fas fa-envelope"></i></span>
                <?php if (session('errors.email')): ?>
                    <p class="text-red-600 text-sm mt-1 ml-1"><?= esc(session('errors.email')) ?></p>
                <?php endif; ?>
            </div>

            <!-- Password -->
            <div class="relative mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Password</label>
                <input type="password" name="password"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 pl-10">
                <span class="absolute left-3 top-9 text-gray-500"><i class="fas fa-lock"></i></span>
                <?php if (session('errors.password')): ?>
                    <p class="text-red-600 text-sm mt-1 ml-1"><?= esc(session('errors.password')) ?></p>
                <?php endif; ?>
            </div>

            <!-- Confirm Password -->
            <div class="relative mb-4">
                <label class="block text-gray-700 font-semibold mb-1">Confirm Password</label>
                <input type="password" name="confirm_password"
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 pl-10">
                <span class="absolute left-3 top-9 text-gray-500"><i class="fas fa-lock"></i></span>
                <?php if (session('errors.confirm_password')): ?>
                    <p class="text-red-600 text-sm mt-1 ml-1"><?= esc(session('errors.confirm_password')) ?></p>
                <?php endif; ?>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                Add User
            </button>
        </form>
    </div>
</div>


<!-- FontAwesome for Icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- Tailwindcss -->
<script src="https://cdn.tailwindcss.com"></script>















<?= $this->endSection() ?>