<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['delete/my_post/(:any)'] = 'Profile_controller/delete_mypost/$1';
$route['delete_post/(:any)'] = 'Home/delete_post/$1';
$route['posts/by_category/(:any)'] = 'Home/select_bycategory/$1';
$route['admin'] = 'Admin_controller';
$route['profile/user/(:any)'] = 'Profile_controller/user_profile/$1';
$route['delete_comment/(:num)'] = 'Home/delete_comments/$1';
$route['update/(:any)'] =  'Home/update_post/$1';
$route['login'] = 'Login_controller/index';
$route['profile'] = 'Profile_controller';
$route['admin/users'] = 'Admin_controller/show_users';
$route['register'] = 'Login_controller/index_registro';
$route['contact'] = 'Mailgun_controller/contactUs';
$route['new'] = 'Home/new_post';
$route['logout'] = 'Login_controller/logout';
$route['profileadmin'] = 'Home/admin_profile';
$route['default_controller'] = 'home';
$route['404_override'] = 'Not_Found';
$route['translate_uri_dashes'] = FALSE;
$route['post/(:any)'] = 'Home/posts_details/$1';
$route['(:num)'] = '/home/index/$1';
