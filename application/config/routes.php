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
|	https://codeigniter.com/userguide3/general/routing.html
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

$route['productdetail/(:any)/(:any)'] = 'ProductDetail/index/$1/$2';
$route['productdetaildata'] = 'ProductDetail/productdetaildata';
$route['add_review'] = 'ProductDetail/add_review';

$route['logout'] = 'Home/logout_data';
$route['policy'] = 'Home/policy';
$route['refund'] = 'Home/refund';
$route['about_us'] = 'Home/about_us';
$route['frame'] = 'Home/frame';
$route['thankyou/(:any)'] = 'Home/thankyou/$1';


$route['admin_user'] = 'AdminUser/index';
$route['admin_user/edit/(:any)'] = 'AdminUser/edit/$1';
$route['admin_user/delete/(:any)'] = 'AdminUser/delete/$1';
$route['plan/(:any)'] = 'Plan/register_plan/$1';
$route['sub_login'] = 'Plan/login_plan';

$route['contact'] = 'Contact/index';
$route['search/(:any)'] = 'Home/search_data/$1';

// cart
$route['cart'] = 'Cart/index';
$route['custom_image'] = 'Cart/custom_image';
$route['add_to_cart'] = 'Cart/add_to_cart';
$route['editcartitem'] = 'Cart/editcartitem';
$route['deletecartitem'] = 'Cart/deletecartitem';
$route['getusercartdetails'] = 'Cart/getusercartdetails';
$route['deleteProductCart'] = 'Cart/deleteProductCart';
$route['addProductCart'] = 'Cart/addProductCart';
$route['cart_count'] = 'Home/cart_count';
$route['wishlist_count'] = 'Home/wishlist_count';

//login

$route['login'] = 'Login/index';
$route['login_data'] = 'Login/login_data';
$route['logout'] = 'Login/logout';
$route['register'] = 'Register/index';
$route['register_data'] = 'Register/register_data';

// checkout
$route['checkout'] = 'Checkout/view';
$route['add_address'] = 'Checkout/add_address';
$route['getUserAddress'] = 'Checkout/getuseraddress';
$route['get_shopi_data'] = 'Checkout/get_shopi_data';
$route['getordersummery'] = 'Checkout/getordersummery';
$route['address_list'] = 'Checkout/address_view';
$route['update_defaultaddress'] = 'Checkout/update_defaultaddress';
$route['delete_address'] = 'Checkout/delete_address';
$route['placeorder'] = 'Checkout/placeorder';

$route['order'] = 'Order/index';
$route['getorderhistory'] = 'Order/getorderhistory';
$route['getorderhistorydetails'] = 'Order/getorderhistorydetails';
$route['order_details/(:any)'] = 'Order/order_details/$1';

$route['category/(:any)/(:any)'] = 'Category/index/$1/$2';
$route['getcategory_product'] = 'Category/getcategory_product'; 
$route['all_category'] = 'Category/all_category';
$route['sub_category/(:any)'] = 'Category/sub_category/$1';



$route['wishlist'] = 'Wishlist/index';
$route['getuserwishlist'] = 'Wishlist/getuserwishlist';
$route['add_prod_into_wishlist'] = 'Wishlist/add_prod_into_wishlist';
$route['deletewishlistitem'] = 'Wishlist/deletewishlistitem';
$route['getcategory'] = 'Wishlist/getcategory';


// User Profile
$route['dashboard'] = 'User/getUserDetails';
$route['account-details'] = 'User/getAccountDetail';
$route['update_user_detail'] = 'User/updateUserDetails';



$route['address'] = 'Address/index';
$route['address/edit/(:any)'] = 'Address/edit/$1';
$route['address/delete/(:any)'] = 'Address/delete/$1';



$route['plans'] = 'Plans/index';
$route['plans/edit/(:any)'] = 'plans/edit/$1';
$route['plans/delete/(:any)'] = 'plans/delete/$1';

$route['default_controller'] = 'Home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
