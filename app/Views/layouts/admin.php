<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Dashboard' ?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
</head>

<body class="bg-gray-100">
    <!-- Mobile menu button -->
    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
        <span class="sr-only">Open sidebar</span>
        <i class="fas fa-bars w-6 h-6"></i>
    </button>

    <!-- Sidebar -->
    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-800">
            <!-- Logo -->
            <a href="<?= route_to('dashboard') ?>" class="flex items-center ps-2.5 mb-5">
                <span class="self-center text-xl font-semibold whitespace-nowrap text-white">Your Logo</span>
            </a>

            <!-- Navigation Menu -->
            <ul class="space-y-2 font-medium">
                <!-- Dashboard -->
                <li>
                    <a href="<?= route_to('dashboard') ?>" class="flex items-center p-2 text-white rounded-lg hover:bg-gray-700 group">
                        <i class="fas fa-home w-5 h-5 text-gray-400 transition duration-75 group-hover:text-white"></i>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>

                <!-- News Dropdown -->
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-700" aria-controls="dropdown-news" data-collapse-toggle="dropdown-news">
                        <i class="fas fa-newspaper w-5 h-5 text-gray-400 transition duration-75 group-hover:text-white"></i>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">News</span>
                        <i class="fas fa-chevron-down w-3 h-3"></i>
                    </button>
                    <ul id="dropdown-news" class="hidden py-2 space-y-2">
                        <li>
                            <a href="<?= route_to('view_news') ?>" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">View News</a>
                        </li>
                        <li>
                            <a href="<?= route_to('add_news') ?>" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Add News</a>
                        </li>
                    </ul>
                </li>

                <!-- Event Dropdown -->
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-700" aria-controls="dropdown-event" data-collapse-toggle="dropdown-event">
                        <i class="fa-solid fa-image"></i>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Event</span>
                        <i class="fas fa-chevron-down w-3 h-3"></i>
                    </button>
                    <ul id="dropdown-event" class="hidden py-2 space-y-2">
                        <li>
                            <a href="<?= route_to('view_events') ?>" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">View Events</a>
                        </li>
                        <li>
                            <a href="<?= route_to('create_event') ?>" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Create Event</a>
                        </li>
                    </ul>
                </li>


                <!-- Users Dropdown -->
                <?php if (session('user_role') === 'admin') { ?>
                    <li>
                        <button type="button" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-700" aria-controls="dropdown-users" data-collapse-toggle="dropdown-users">
                            <i class="fas fa-users w-5 h-5 text-gray-400 transition duration-75 group-hover:text-white"></i>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Users</span>
                            <i class="fas fa-chevron-down w-3 h-3"></i>
                        </button>
                        <ul id="dropdown-users" class="hidden py-2 space-y-2">
                            <li>
                                <a href="<?= route_to('view_users') ?>" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">View Users</a>
                            </li>
                            <li>
                                <a href="<?= route_to('add_user') ?>" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Add User</a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <!-- Settings -->
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg group hover:bg-gray-700" aria-controls="dropdown-settings" data-collapse-toggle="dropdown-settings">
                        <i class="fas fa-cog w-5 h-5 text-gray-400 transition duration-75 group-hover:text-white"></i>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Settings</span>
                        <i class="fas fa-chevron-down w-3 h-3"></i>
                    </button>
                    <ul id="dropdown-settings" class="hidden py-2 space-y-2">
                        <li>
                            <a href="<?= route_to('change_password') ?>" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Change Password</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center w-full p-2 text-white transition duration-75 rounded-lg pl-11 group hover:bg-gray-700">Profile</a>
                        </li>
                    </ul>
                </li>

                <!-- Logout -->
                <li>
                    <a href="<?= route_to('logout') ?>" class="flex items-center p-2 text-white rounded-lg hover:bg-gray-700 group">
                        <i class="fas fa-sign-out-alt w-5 h-5 text-gray-400 transition duration-75 group-hover:text-white"></i>
                        <span class="ms-3">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg">
            <!-- Breadcrumb -->
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <i class="fas fa-home w-4 h-4 me-2.5"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right w-3 h-3 text-gray-400 mx-1"></i>
                            <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">Dashboard</a>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Content Section -->
            <div class="content">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>
</body>

</html>