<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "users";
$route['register'] = "users/register";
$route['login'] = "users/login";
//log out in books controller
$route['logout'] = "books/logout";
$route['addReview2/(:any)'] = "books/addReview2/$1";
//delete
$route['delete/(:any)'] = "reviews/delete/$1";

$route['404_override'] = '';



/* End of file routes.php */
/* Location: ./application/config/routes.php */