<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['upload_multiple/index'] = 'upload_multiple/index';
$route['upload_multiple/upload/$1'] = 'upload_multiple/upload/$1';
$route['upload_multiple/upload'] = 'upload_multiple/upload';
$route['upload_multiple/(:any)'] = 'upload_multiple/index';
$route['upload/do_upload'] = 'upload/do_upload';
$route['pages/do_upload'] = 'pages/do_upload';
$route['pages/edit/$1'] = 'pages/edit/$1';
$route['admin/index'] = 'admin/index';
$route['admin/login'] = 'admin/login';
$route['rooms/show/$1'] = 'rooms/show/$1';
$route['admin'] = 'admin/login';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
