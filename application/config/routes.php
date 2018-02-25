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

// Campeonatos - Routes
$route['campeonatos'] = 'campeonatos/index';

// Transferencias - Routes
$route['transferencia'] = 'transferencia/index';

//admin routs
$route['admin'] = 'admin/index';
$route['admin/forget-password'] = 'admin/forget_password';

$route['admin/dashboard'] = 'admin/dashboard';

$route['admin/change-password'] = 'admin/get_admin_data';
$route['admin/update-profile'] = 'admin/update_admin_profile';

$route['admin/users/add-user'] = 'admin/add_user';
$route['admin/users'] = 'admin/users';
$route['admin/users/update-user/(:any)'] = 'admin/update_user/$1';

/*$route['admin/testimonials/add'] = 'administrator/add_testimonial';
$route['admin/testimonials/list'] = 'administrator/list_testimonial';
$route['admin/testimonials/update/(:any)'] = 'administrator/update_testimonial/(:any)';
*/

$route['default_controller'] = 'home';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;