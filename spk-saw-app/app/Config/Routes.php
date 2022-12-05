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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('/karyawan', 'Karyawan::index');
$routes->get('/karyawan/add', 'Karyawan::add');
$routes->post('/karyawan/simpan', 'Karyawan::simpan');
$routes->post('/karyawan/update/(:num)', 'Karyawan::update/$1');
$routes->get('/karyawan/ubah/(:num)', 'Karyawan::ubah/$1');
$routes->delete('/karyawan/(:num)', 'Karyawan::hapus/$1');

$routes->get('/kriteria', 'Kriteria::index');
$routes->get('/kriteria/add', 'Kriteria::add');
$routes->post('/kriteria/simpan', 'Kriteria::simpan');
$routes->post('/kriteria/update/(:num)', 'Kriteria::update/$1');
$routes->get('/kriteria/ubah/(:num)', 'Kriteria::ubah/$1');
$routes->delete('/kriteria/(:num)', 'Kriteria::hapus/$1');

$routes->get('/periode', 'Periode::index');
$routes->get('/periode/add', 'Periode::add');
$routes->post('/periode/simpan', 'Periode::simpan');
$routes->post('/periode/update/(:num)', 'Periode::update/$1');
$routes->get('/periode/ubah/(:num)', 'Periode::ubah/$1');
$routes->delete('/periode/(:num)', 'Periode::hapus/$1');

$routes->get('/kriteriaperiode', 'KriteriaPeriode::index');
$routes->get('/penilaian', 'Penilaian::index');
$routes->get('/laporan', 'Laporan::index');

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
