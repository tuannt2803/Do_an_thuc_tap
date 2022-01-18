<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->options('(:any)', 'Checkout::options'); //one options method for all routes.
$routes->get('/', 'Home::index');
$routes->get('admin', 'admin/dashboard::index');
$routes->get('loai-hang/(:any)', 'category::index/$1');
$routes->get('product/(:num)', 'product::index/$1');
$routes->get('san-pham-hot', 'product::hotProduct');
$routes->get('san-pham-moi', 'product::newProduct');
$routes->get('about', 'about::index');
$routes->get('contact', 'contact::index');
$routes->post('contact', 'contact::index');
$routes->get('login', 'login::index');
$routes->post('login', 'login::index');
$routes->get('login/logout', 'login::logout');
$routes->get('signup', 'signup::index');
$routes->post('signup/register', 'signup::register');
$routes->get('signup', 'signup::index');
$routes->post('Checkout', 'Checkout::index');
$routes->get('bill', 'bill::index');
$routes->add('bill/detail/(:any)','bill::detail/$1');
$routes->add('bill/delete/(:any)','bill::delete/$1');
$routes->add('bill/edit/(:any)','bill::edit/$1');
$routes->add('bill/edit','bill::edit');
$routes->add('bill/index','bill::index');
$routes->add('guide','guide::index');


$routes->get('admin/login','admin/login::index');
$routes->post('admin/login','admin/login::index');
$routes->get('admin/admin/index','admin/dashboard::index');
$routes->get('admin/admin','admin/admin::index');

$routes->get('admin/profile/(:any)', 'admin\profile::index/$1');
$routes->add('admin/admin/edit/(:any)', 'admin\admin::edit/$1');
$routes->add('admin/admin/delete/(:any)', 'admin\admin::delete/$1');
$routes->add('admin/admin/add', 'admin\admin::add');
$routes->post('admin/admin/add', 'admin\admin::add');
$routes->add('admin/logout', 'admin\logout::index');

$routes->get('admin/product','admin/product::index');
$routes->add('admin/product/detai/(:any)','admin\product::detail/$1');
$routes->add('admin/product/edit/(:any)', 'admin\product::edit/$1');
$routes->add('admin/product/edit', 'admin\product::edit');
$routes->post('admin/product/edit', 'admin\product::edit');
$routes->add('admin/product/add','admin\product::add');
$routes->post('admin/product/add', 'admin\product::add');
$routes->add('admin/product/delete/(:any)','admin\product::delete/$1');

$routes->get('admin/category','admin/category::index');
$routes->get('admin/category/add','admin/category::add');
$routes->post('admin/category/add','admin/category::add');
$routes->add('admin/category/delete/(:any)','admin\category::delete/$1');
$routes->add('admin/category/edit/(:any)','admin\category::edit/$1');
$routes->post('admin/category/edit','admin\category::edit');

$routes->get('admin/invoice','admin/invoice::index');
$routes->add('admin/invoice/detail/(:any)','admin\invoice::detail/$1');
$routes->add('admin/invoice/edit/(:any)','admin\invoice::edit/$1');
$routes->get('admin/invoice/add','admin/invoice::add');
$routes->post('admin/invoice/add','admin/invoice::add');
$routes->add('admin/invoice/delete/(:any)','admin\invoice::delete/$1');

$routes->get('admin/supplier','admin/supplier::index');
$routes->add('admin/supplier/detail/(:any)','admin\supplier::detail/$1');
$routes->get('admin/supplier/add','admin/supplier::add');
$routes->post('admin/supplier/add','admin/supplier::add');
$routes->add('admin/supplier/edit/(:any)','admin\supplier::edit/$1');
$routes->add('admin/supplier/delete/(:any)','admin\supplier::delete/$1');

$routes->get('admin/comment','admin/comment::index');
$routes->get('admin/comment/add','admin/comment::add');
$routes->post('admin/comment/add','admin/comment::add');
$routes->add('admin/comment/detail/(:any)','admin\comment::detail/$1');
$routes->add('admin/comment/edit/(:any)','admin\comment::edit/$1');
$routes->add('admin/comment/delete/(:any)','admin\comment::delete/$1');

$routes->get('admin/report','admin/report::index');
$routes->get('admin/report/selling','admin/report::selling');
$routes->get('admin/report/inventory','admin/report::inventory');

$routes->get('admin/mailbox','admin/mailbox::index');
$routes->post('admin/mailbox','admin/mailbox::index');
$routes->add('admin/mailbox/detail/(:any)','admin\mailbox::detail/$1');

$routes->get('product/getById/(:any)','product::getById/$1');

$routes->add('search', 'search::index');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
