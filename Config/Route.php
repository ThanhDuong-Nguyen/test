<?php
#ROUTE MVC

#Login
$routes['admin/login']              = 'App\Controllers\Admin\LoginController@index';
$routes['admin/user/login/store']   = 'App\Controllers\Admin\LoginController@store';

#Main Admin
$routes['admin']        = 'App\Controllers\Admin\MainController@index';
$routes['admin/main']   = 'App\Controllers\Admin\MainController@index';

#Menu
$routes['admin/menus/add']          = 'App\Controllers\Admin\MenuController@create';
$routes['admin/menus/store']        = 'App\Controllers\Admin\MenuController@store';
$routes['admin/menus/list']         = 'App\Controllers\Admin\MenuController@index';
$routes['admin/menus/edit/{id}']    = 'App\Controllers\Admin\MenuController@edit';
$routes['admin/menus/update/{id}']  = 'App\Controllers\Admin\MenuController@update';
$routes['admin/menus/delete']       = 'App\Controllers\Admin\MenuController@destroy';
$routes['danh-muc/{slug}']          = 'App\Controllers\MenuController@index';

#Upload File
$routes['admin/upload/add'] = 'App\Controllers\Admin\UploadController@store';
$routes['admin/upload/upload'] = 'App\Controllers\Admin\UploadController@UploadMul';

#Product
$routes['admin/products/add']               = 'App\Controllers\Admin\ProductController@create';
$routes['admin/products/store']             = 'App\Controllers\Admin\ProductController@store';
$routes['admin/products/list']              = 'App\Controllers\Admin\ProductController@index';
$routes['admin/products/edit/{id}']         = 'App\Controllers\Admin\ProductController@show';
$routes['admin/products/update/{id}']       = 'App\Controllers\Admin\ProductController@update';
$routes['admin/products/delete']            = 'App\Controllers\Admin\ProductController@destroy';
$routes['admin/products/album/{id}']        = 'App\Controllers\Admin\ProductController@add';
$routes['admin/products/updateAlbum/{id}']  = 'App\Controllers\Admin\ProductController@updateAlbum';
$routes['san-pham/{slug}']                  = 'App\Controllers\ProductController@index';


#Slider
$routes['admin/sliders/add']            = 'App\Controllers\Admin\SliderController@create';
$routes['admin/sliders/store']          = 'App\Controllers\Admin\SliderController@store';
$routes['admin/sliders/list']           = 'App\Controllers\Admin\SliderController@index';
$routes['admin/sliders/edit/{id}']      = 'App\Controllers\Admin\SliderController@edit';
$routes['admin/sliders/update/{id}']    = 'App\Controllers\Admin\SliderController@update';
$routes['admin/sliders/delete']         = 'App\Controllers\Admin\SliderController@destroy';

#News
$routes['admin/news/add']           = 'App\Controllers\Admin\NewController@create';
$routes['admin/news/store']         = 'App\Controllers\Admin\NewController@store';
$routes['admin/news/list']          = 'App\Controllers\Admin\NewController@index';
$routes['admin/news/edit/{id}']     = 'App\Controllers\Admin\NewController@edit';
$routes['admin/news/update/{id}']   = 'App\Controllers\Admin\NewController@update';
$routes['admin/news/delete']        = 'App\Controllers\Admin\NewController@destroy';
$routes['bai-viet']                 = 'App\Controllers\NewController@index';
$routes['bai-viet/{slug}']          = 'App\Controllers\NewController@detail';

#Introduce
$routes['gioi-thieu'] = 'App\Controllers\MainController@introduce';

#Contact
$routes['lien-he']                      = 'App\Controllers\MainController@contact';
$routes['admin/contact/list']           = 'App\Controllers\Admin\ContactController@index';
$routes['admin/contact/add']            = 'App\Controllers\Admin\ContactController@add';
$routes['admin/contact/confirm/{id}']   = 'App\Controllers\Admin\ContactController@confirm';
$routes['admin/contact/delete']         = 'App\Controllers\Admin\ContactController@destroy';

#Cart
$routes['carts/add']                = 'App\Controllers\CartController@add';
$routes['gio-hang']                 = 'App\Controllers\CartController@index';
$routes['carts/update']             = 'App\Controllers\CartController@update';
$routes['carts/delete/{id}']        = 'App\Controllers\CartController@remove';
$routes['carts/store']              = 'App\Controllers\CartController@store';
$routes['admin/cart/detail/{id}']   = 'App\Controllers\Admin\CartController@show';


#Customer
$routes['admin/customer/list']              = 'App\Controllers\Admin\CustomerController@index';
$routes['admin/customer/edit/{id}']         = 'App\Controllers\Admin\CustomerController@show';
$routes['admin/customer/isview/{id}']       = 'App\Controllers\Admin\CustomerController@isView';
$routes['admin/customer/update/{id}']       = 'App\Controllers\Admin\CustomerController@update';
$routes['admin/customer/delete']            = 'App\Controllers\Admin\CustomerController@destroy';