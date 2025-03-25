<?php

use CodeIgniter\Commands\Utilities\Routes;
use CodeIgniter\Router\RouteCollection;
use Config\Services;

$routes = Services::routes(true);


if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
    require SYSTEMPATH . 'Config/Routes.php';
}



$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Users');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * @var RouteCollection $routes
 */

// $routes->match(['get', 'post'], '/', 'Users::index');
$routes->match(['get', 'post'], 'register', 'Users::register', ['filter' =>'noauth']);
$routes->match(['get', 'post'], 'login', 'Users::login', ['filter' =>'noauth']);
$routes->match(['get', 'post'], 'dashboard', 'Users::Dashboard', ['filter' =>'auth']);
$routes->match(['get', 'post'], 'profile', 'Users::profile', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'logout', 'Users::logout');
$routes->match(['get', 'post'], 'cart', 'Users::cart', ['filter' => 'auth']);



