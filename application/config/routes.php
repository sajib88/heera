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


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
/// Profle Route Set
$route['profile/myprofile'] = 'profile/profile/viewProfile';
$route['profile/update'] = 'profile/profile/index';

///ces Route set
$route['pub/add'] = 'public_web/publicweb/index';
$route['pub/viewedit'] = 'public_web/publicweb/viewForEdit';
$route['pub/details'] = 'public_web/publicweb/view';


///ces Route set
$route['ces/add'] = 'ces/ces_controller/index';
$route['ces/create'] = 'ces/ces_controller/create';
$route['ces/allces'] = 'ces/ces_controller/allces';
$route['ces/edit/(:any)'] = 'ces/ces_controller/edit/$1';
$route['ces/updateCES'] = 'ces/ces_controller/updateCES';
$route['ces/grid'] = 'ces/ces_controller/grid';
$route['ces/search'] = 'ces/ces_controller/search/$1';
$route['ces/detail/(:any)'] = 'ces/ces_controller/detail/$1';



//Public Search
$route['publicsearch'] = 'doctor/docController/publicSearch';
