<?= $this->extend('layouts/admin') ?>
<?= $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <main class="flex items-start justify-center min-h-screen pt-24 px-4">
        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Change Password</h2>

            <!-- Global Flash Messages -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= route_to('update_password') ?>" method="POST" class="space-y-4">
                <?= csrf_field() ?>

                <!-- Current Password -->
                <div>
                    <label class="block font-medium">Current Password</label>
                    <input type="password" name="current_password" value="<?= old('current_password') ?>" class="w-full p-2 border border-gray-300 rounded" required>
                    <?php if (session('errors.current_password')): ?>
                        <p class="text-red-600 text-sm mt-1 ml-1"><?= esc(session('errors.current_password')) ?></p>
                    <?php endif; ?>
                </div>

                <!-- New Password -->
                <div>
                    <label class="block font-medium">New Password</label>
                    <input type="password" name="new_password" value="<?= old('new_password') ?>" class="w-full p-2 border border-gray-300 rounded" required>
                    <?php if (session('errors.new_password')): ?>
                        <p class="text-red-600 text-sm mt-1 ml-1"><?= esc(session('errors.new_password')) ?></p>
                    <?php endif; ?>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label class="block font-medium">Confirm New Password</label>
                    <input type="password" name="confirm_password" value="<?= old('confirm_password') ?>" class="w-full p-2 border border-gray-300 rounded" required>
                    <?php if (session('errors.confirm_password')): ?>
                        <p class="text-red-600 text-sm mt-1 ml-1"><?= esc(session('errors.confirm_password')) ?></p>
                    <?php endif; ?>
                </div>

                <div>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded w-full">
                        Update Password
                    </button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>

<?= $this->endSection() ?>