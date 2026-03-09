<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// Public routes - No Authentication Required
$routes->get('/', 'Public\Home::index'); // entry point
$routes->get('test', 'Home_Test::index'); // testing of landing pages
// $routes->get('news', 'Public\News::index');
// $routes->get('news/(:segment)', 'Public\News::detail/$1');


// ______________________________________________________________________________________


// Public routes for Authentication
$routes->group('auth', function ($routes) {
    $routes->get('', 'Auth\Login::index', ['as' => 'auth']); // auth
    $routes->get('login', 'Auth\Login::index', ['as' => 'login']); // auth/login (GET)
    $routes->post('login', 'Auth\Login::authenticate', ['as' => 'authenticate']); // auth/login (POST)
    $routes->get('logout', 'Auth\Logout::index', ['as' => 'logout']); // auth/logout
});

// To access login page without auth prefix in the URL
$routes->get('login', 'Auth\Login::index', ['as' => 'login_page']); // login
$routes->get('admin', 'Auth\Login::index', ['as' => 'admin_login']); // admin


// ______________________________________________________________________________________



// Admin Routes - Require Authentication (Protected with AuthGuard)
$routes->group('admin', ['filter' => 'AuthGuard'], function ($routes) {

    // Dashboard
    $routes->get('dashboard', 'Admin\Dashboard::index', ['as' => 'dashboard']);

    // List Users
    $routes->get('users', 'Admin\User::index', ['as' => 'view_users']); // view users

    // Static route for adding users
    $routes->get('users/add', 'Admin\User::create', ['as' => 'add_user']); // display form to add user
    $routes->post('users/save', 'Admin\User::store', ['as' => 'save_user']); // save user into database

    // Dynamic routes (must be placed after static ones)
    // $routes->get('users/edit/(:num)', 'Admin\User::edit/$1');
    $routes->post('users/update/(:num)', 'Admin\User::update/$1', ['as' => 'update_user']); // update user
    // $routes->post('users/update/{user_id}', 'Admin\User::update/$user_id', ['as' => 'update_user']); // update user
    // $routes->get('users/delete/(:num)', 'Admin\User::delete/$1');

    // Change Password
    $routes->get('settings/change_password', 'Admin\User::change_password', ['as' => 'change_password']); // display change password form
    $routes->post('settings/update_password', 'Admin\User::update_password', ['as' => 'update_password']); // update password

    // _________________________________________________________________________________________________________________________

    // News Management

    // List news
    $routes->get('news', 'Admin\News::index', ['as' => 'view_news']); // view news

    // Static route for adding news 
    $routes->get('news/add', 'Admin\News::create', ['as' => 'add_news']); // display form to add news
    $routes->post('news/save', 'Admin\News::store', ['as' => 'store_news']); // save news into database

    // Dynamic routes (must be placed after static ones)
    $routes->get('news/edit/(:num)', 'Admin\News::edit/$1', ['as' => 'edit_news']);
    $routes->post('news/update/(:num)', 'Admin\News::update/$1', ['as' => 'update_news']);
    $routes->post('news/delete/(:num)', 'Admin\News::delete/$1', ['as' => 'delete_news']);
    // $routes->get(
    // 'admin/news/(:num)/file/(:num)',
    // 'Admin\News::viewFile/$1/$2'
    // );

    // _________________________________________________________________________________________________________________________

    // Event Management
    $routes->get('event/create', 'Admin\Event::create', ['as' => 'create_event']);
    $routes->post('event/store', 'Admin\Event::store', ['as' => 'store_event']);

    // _________________________________________________________________________________________________________________________
    

});



// Seperate group of routes if required

// // Admin Routes - Require Authentication (Protected with AuthGuard)
// $routes->group('admin', ['filter' => 'AuthGuard'], function ($routes) {
//     $routes->get('dashboard', 'Admin\Dashboard::index', ['as' => 'dashboard']);
// });

// // User Routes (Under /users)
// $routes->group('users', ['filter' => 'AuthGuard'], function ($routes) {
//     $routes->get('/', 'Admin\User::index');
//     $routes->get('add', 'Admin\User::create', ['as' => 'add_user']);
//     $routes->post('save', 'Admin\User::store', ['as' => 'save_user']);
//     $routes->get('edit/(:num)', 'Admin\User::edit/$1');
//     $routes->post('update/(:num)', 'Admin\User::update/$1');
//     $routes->get('delete/(:num)', 'Admin\User::delete/$1');
// });

// // News Routes (Under /news)
// $routes->group('news', ['filter' => 'AuthGuard'], function ($routes) {
//     $routes->get('/', 'Admin\News::index');
//     $routes->get('add', 'Admin\News::create');
//     $routes->post('save', 'Admin\News::store');
//     $routes->get('edit/(:num)', 'Admin\News::edit/$1');
//     $routes->post('update/(:num)', 'Admin\News::update/$1');
//     $routes->get('delete/(:num)', 'Admin\News::delete/$1');
// });