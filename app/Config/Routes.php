<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Login::index');
$routes->get('/login/admin', 'Login::admin');
$routes->post('/login/admin', 'Login::admin');
$routes->post('/login/auth', 'Login::auth');
$routes->get('/logout', 'Login::logout');

$routes->post('/save_superadmin', 'SuperAdmin::save');
