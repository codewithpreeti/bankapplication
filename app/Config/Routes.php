<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->post('/signin', 'Home::signin');
$routes->match(['get', 'post'], '/signin', 'Home::signin');
$routes->post('/refresh', 'Home::refresh_captcha');
$routes->match(['get', 'post'], '/registration', 'Home::registration');
$routes->get('/next', 'Home::next');
