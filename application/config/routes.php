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

$route['default_controller'] = 'cms';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['shop'] = 'cms/shop';
$route['about'] = 'cms/about';
$route['wishlist'] = 'cms/wishlist';
$route['cart'] = 'cms/cart';
$route['contact'] = 'cms/contact';
$route['product/(:any)'] = 'cms/productSingle/$1';
$route['product-price'] = 'cms/productPrice';
$route['add-cart'] = 'cms/addCart';
$route['load-cart-count'] = 'cms/loadCartCount';
$route['cart-delete-item'] = 'cms/cartItemDelete';
$route['quantity-update'] = 'cms/quantityUpdate';
$route['searchbox-array'] = 'cms/searchboxArray';
$route['user-login'] = 'cms/userlogin';
$route['user-register'] = 'cms/register';
$route['log-out'] = 'cms/logout';
$route['checkout'] = 'cms/checkout';
$route['checkout-address'] = 'cms/checkAddress';
$route['successfully'] = 'cms/thankyou';
$route['order-success'] = 'cms/orderSuccess';
$route['my-order'] = 'cms/myorder';








