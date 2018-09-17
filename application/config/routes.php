<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['howto'] = 'welcome/howto';
$route['status'] = 'welcome/status';
$route['contact'] = 'welcome/contact';
$route['admin'] = 'admin/dashboard';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
