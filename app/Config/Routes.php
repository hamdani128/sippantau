<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/auth/login', 'AuthController::index');
$routes->get('/registrasi_perusahaan', 'Landing::index');
$routes->post('/auth/check_login', 'AuthController::check_login');
$routes->get('/users/logout', 'AuthController::logout');
$routes->post('/registrasilab/insert_detail_registrasilab', 'Landing::insert_detail_registrasilab');
$routes->post('/registrasilab/insert_registrasilab', 'Landing::insert_registrasilab');
$routes->get('/registrasilab/print_dokumen_registrasilab/(:any)', 'Master1::cetak_dokumen/$1');
// print
$routes->get('/pages/limbah_b3/print/(:any)', 'Master1::limbah_b3_print/$1');
$routes->get('/pages/limbah_air_domestik/print/(:any)', 'Master1::limbah_air_domestik_print/$1');
$routes->group('', ['filter' => 'AuthCheck'], function ($routes){
    $routes->get('/', 'Home::index');
    $routes->get('/pages/master_register', 'Master1::index');
    $routes->get('/pages/informasi_user', 'Master1::master_users');
    $routes->get('/pages/informasi_paramater', 'Master1::parameter');
    $routes->get('/pages/informasi_metoda', 'Master1::metoda');
    $routes->get('/pages/limbah_air_domestik', 'Master1::limbah_air_domestik');
    $routes->get('/pages/limbah_air_kegiatan', 'Master1::limbah_air_kegiatan');
    $routes->get('/pages/limbah_emisi_udara', 'Master1::limbah_emisi_udara');
    $routes->get('/pages/limbah_b3', 'Master1::limbah_b3');
    $routes->get('/pages/limbah_air_kegiatan_admin', 'Master1::limbah_air_kegiatan_admin');
    $routes->get('/pages/limbah_air_domestik_admin', 'Master1::limbah_air_domestik_admin');
    $routes->get('/pages/limbah_emisi_udara_admin', 'Master1::limbah_emisi_udara_admin');
    $routes->get('/pages/limbah_b3_admin', 'Master1::limbah_b3_admin');
    // Crud Register Lab
    // $routes->get('/registrasilab/print_dokumen_registrasilab/(:any)', 'Master1::cetak_dokumen/$1');
    $routes->post('/registrasilab/validasi_perusahaan', 'Landing::validasi_perusahaan');
    $routes->post('/registrasilab/detail_dokumen_registrasilab', 'Landing::detail_dokumen_registrasilab');
    $routes->post('/registrasilab/delete_data', 'Landing::delete_register');
    // Parameter
    $routes->post('/parameter/insert_parameter', 'Parameter::insert_parameter');
    $routes->post('/parameter/edit_show_parameter', 'Parameter::edit_show_parameter');
    $routes->post('/parameter/update_parameter', 'Parameter::update_parameter');
    $routes->post('/parameter/delete_parameter', 'Parameter::delete_parameter');
    // Metoda
    $routes->post('/metoda/insert_metoda', 'Metoda::insert_metoda');
    $routes->post('/metoda/edit_show_metoda', 'Metoda::edit_show_metoda');
    $routes->post('/metoda/update_metoda', 'Metoda::update_metoda');
    $routes->post('/metoda/delete_metoda', 'Metoda::delete_metoda');    
    // Limbah Air Kegiatan
    $routes->post('/limbah1/insert_limbah_air_kegiatan', 'Limbah::insert_limbah_air_kegiatan');
    $routes->post('/limbah1/insert_data_detail_air_kegiatan', 'Limbah::insert_data_detail_air_kegiatan');
    // Limbah Udara
    $routes->post('/limbah1/insert_limbah_udara', 'Limbah::insert_limbah_udara');
    $routes->post('/limbah1/insert_detail_emisi_udara', 'Limbah::insert_detail_emisi_udara');
    // Limbah B3
    $routes->post('/limbah1/insert_limbah_b3', 'Limbah::insert_limbah_b3');
    $routes->post('/limbah1/insert_detail_limbah_b3', 'Limbah::insert_detail_limbah_b3');
    // Domestik
    $routes->post('/limbah/insert_data_detail_air_domestik', 'Limbah::insert_detail_limbah_domestik');
    $routes->post('/limbah/insert_limbah_air_domestik', 'Limbah::insert_limbah_air_domestik');

    // Filter Routes
    $routes->post('/admin_limbah/filter_limbah_air_kegiatan', 'Adminlimbah::filter_limbah_air_kegiatan');
    $routes->post('/admin_limbah/filter_limbah_emisi_udara', 'Adminlimbah::filter_limbah_emisi_udara');
    
});

/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}