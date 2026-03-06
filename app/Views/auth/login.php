<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CodeIgniter</title>
    <!-- tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-xl">
        <h2 class="text-2xl font-bold text-center text-gray-800">Login</h2>

        <?php if (session()->getFlashdata('error')) : ?>
            <p class="text-sm text-red-500 text-center"><?= session()->getFlashdata('error') ?></p>
        <?php endif; ?>
 
        <form action="<?= route_to('authenticate') ?>" method="post" autocomplete="on">
            <?= csrf_field(); ?> <!-- CSRF Token for form security -->

            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="username" required autocomplete="username"
                    class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <?php if (session()->getFlashdata('username_error')) : ?>
                <p class="text-sm text-red-500"><?= esc(session()->getFlashdata('username_error')) ?></p>
            <?php endif; ?>

            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" required autocomplete="current-password"
                    class="w-full px-4 py-2 mt-1 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>
            <?php if (session()->getFlashdata('password_error')) : ?>
                <p class="text-sm text-red-500"><?= esc(session()->getFlashdata('password_error')) ?></p>
            <?php endif; ?>
            
            <!-- 
            <input type="checkbox" id="remember_me" name="remember_me">
            <label for="remember_me">Remember Me</label> -->

            <button type="submit"
                class="w-full px-4 py-2 mt-6 font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                Login
            </button>
        </form>

        <!-- <p class="text-sm text-center text-gray-600">Don't have an account? <a href="#" class="text-blue-600 hover:underline">Sign up</a></p> -->
        <p class="text-sm text-center text-gray-600"> <a href="#" class="text-blue-600 hover:underline"></a></p>
    </div>
</body>

</html>