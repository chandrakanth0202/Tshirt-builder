<?php

namespace Config;

use CodeIgniter\Routing\RouteCollection;
use CodeIgniter\Routing\Router;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// --------------------------------------------------------------------
// Router Setup
// --------------------------------------------------------------------
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

// --------------------------------------------------------------------
// Route Definitions
// --------------------------------------------------------------------

// Default route
$routes->get('/', 'Products::builder');

// Custom routes for T-shirt Builder
$routes->get('builder', 'Products::builder');
$routes->post('add-to-cart', 'Products::addToCart');
$routes->get('cart', 'Products::cart');

// --------------------------------------------------------------------
// Additional Routing
// --------------------------------------------------------------------
// Environment based routes (local/dev/prod)
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
