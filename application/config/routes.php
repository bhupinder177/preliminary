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
$route['default_controller'] = 'admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



/***************  admin route********************/
$route['admin']                 = 'admin/index';
$route['admin/logout']          = 'admin/logout';
$route['admin/dashboard']       = 'admin/dashboard';
$route['admin/password']        = 'admin/password';
$route['admin/passwordUpdate']  = 'admin/passwordUpdate';



// article
$route["admin/articlelist"]  = "admin/variation";
$route["admin/articlelist/(:any)"]  = "admin/variation/$1";
$route["admin/article/add"]  = "admin/variation_add/";
$route["admin/articleSave"]  = "admin/variationSave";
$route["admin/article/edit/(:any)"]  ="admin/variation_edit/$1";
$route["admin/articleUpdate/(:any)"]  ="admin/variationUpdate/$1";
$route["admin/articleDelete"]  ="admin/variationDelete";
$route["admin/articleStatus"]  ="admin/variationStatus";
$route["admin/getarticleperpage"]  ="admin/getvariationperpage";
$route["admin/getarticleperpage/(:any)"]  ="admin/getvariationperpage/$1";
// article

// customer
$route["admin/customerlist"]  = "admin/customer";
$route["admin/customerlist/(:any)"]  = "admin/customer/$1";
$route["admin/customer/add"]  = "admin/customer_add/";
$route["admin/customerSave"]  = "admin/customerSave";
$route["admin/customer/edit/(:any)"]  ="admin/customer_edit/$1";
$route["admin/customerUpdate/(:any)"]  ="admin/customerUpdate/$1";
$route["admin/customerDelete"]  ="admin/customerDelete";
$route["admin/customerStatus"]  ="admin/customerStatus";
$route["admin/getcustomerperpage"]  ="admin/getcustomerperpage";
$route["admin/getcustomerperpage/(:any)"]  ="admin/getcustomerperpage/$1";
// customer

// forgot password
$route['admin/forgot-password'] = "admin/forgotPassword";
$route['admin/forgotcheckemail'] = "admin/forgotcheckemail";
$route['admin/newpassword/(:any)'] = "admin/newpassword/$1";
$route['admin/newpasswordUpdate'] = "admin/newpasswordUpdate";
$route['admin/settingupdate'] = "admin/settingupdate";
$route['api/dataSave'] = "admin/dataSave";
