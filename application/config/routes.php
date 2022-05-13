<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'C_login/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/dashboard'] = 'admin/C_home';

$route['admin/login/aksi'] = 'C_login/aksi';
$route['admin/login'] = 'C_login/login';
$route['admin'] = 'C_login/login';
$route['admin/logout'] = 'C_login/logout';


// Ganti Password
$route['admin/profil'] = 'admin/C_home/profil';
$route['admin/password/aksi'] = 'admin/C_home/updatePass';



//Data satuan
$route['admin/satuan'] = 'admin/C_satuan/list';
$route['admin/satuan/data'] = 'admin/C_satuan/data';
$route['admin/satuan/get/(:any)'] = 'admin/C_satuan/get/$1';
$route['admin/satuan/set/(:any)/(:any)'] = 'admin/C_satuan/set/$1/$2';
$route['admin/satuan/insert'] = 'admin/C_satuan/insert';
$route['admin/satuan/update'] = 'admin/C_satuan/update';
$route['admin/satuan/delete/(:any)'] = 'admin/C_satuan/delete/$1';
$route['admin/satuan/tambah'] = 'admin/C_satuan/tambahData';
$route['admin/satuan/edit/(:any)'] = 'admin/C_satuan/editData/$1';
$route['admin/satuan/detail/(:any)'] = 'admin/C_satuan/detail/$1';

$route['admin/transaksi/masuk'] = 'admin/C_transaksi/masuk';
$route['admin/transaksi/insert'] = 'admin/C_transaksi/insertMasuk';
$route['admin/transaksi/delete/(:any)'] = "admin/C_transaksi/deleteMasuk/$1";

$route['admin/transaksi/keluar'] = 'admin/C_transaksi/keluar';
$route['admin/transaksi/keluar/insert'] = 'admin/C_transaksi/insertKeluar';
$route['admin/transaksi/keluar/delete/(:any)'] = "admin/C_transaksi/deleteKeluar/$1";