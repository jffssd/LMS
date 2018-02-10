<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// Main routes
$route['login'] = 'users/login';
$route['entrar'] = 'users/login';
$route['registrar'] = 'users/register';
$route['logout'] = 'users/logout';
$route['sair'] = 'users/logout';
$route['inicio'] = 'users/dashboard';
$route['perfil'] = 'users/profile';


// País - Routes
$route['pais'] = 'pais/index';

// Equipe - Routes
$route['equipe'] = 'equipe/index';

// Jogador - Routes
$route['jogador'] = 'jogador/index';

// Transferencias - Routes
$route['transferencia'] = 'transferencia/index';

//admin routs
$route['administrator'] = 'administrator/view';
$route['administrator/home'] = 'administrator/home';
$route['administrator/index'] = 'administrator/view';
$route['administrator/forget-password'] = 'administrator/forget_password';

$route['administrator/dashboard'] = 'administrator/dashboard';

$route['administrator/change-password'] = 'administrator/get_admin_data';
$route['administrator/update-profile'] = 'administrator/update_admin_profile';

$route['administrator/users/add-user'] = 'administrator/add_user';
$route['administrator/users'] = 'administrator/users';
$route['administrator/users/update-user/(:any)'] = 'administrator/update_user/$1';

$route['administrator/testimonials/add'] = 'administrator/add_testimonial';
$route['administrator/testimonials/list'] = 'administrator/list_testimonial';
$route['administrator/testimonials/update/(:any)'] = 'administrator/update_testimonial/(:any)';


$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;










