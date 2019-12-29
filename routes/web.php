<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'manage', 'middleware' => ['auth', 'admin']], function () {

    Route::post('product-variants', 'Admin\ProductController@variants');



    Route::get('products', 'Admin\ProductController@index');

    Route::get('products/details/create', 'Admin\ProductController@createProductDetails');
    Route::post('products/details', 'Admin\ProductController@storeProductDetails');
    
    Route::get('products/{product_id}/images/create', 'Admin\ProductController@createProductImages');
    Route::post('products/{product_id}/images', 'Admin\ProductController@storeProductImages');
    
    Route::get('products/{product_id}/variants/create', 'Admin\ProductController@createProductVariants');
    Route::post('products/{product_id}/proceed-to-variants', 'Admin\ProductController@proceedToProductVariants');
    Route::post('products/{product_id}/variants', 'Admin\ProductController@storeProductVariants');
    
    Route::get('products/{product_id}/availability/create', 'Admin\ProductController@createProductAvailability');
    Route::post('products/{product_id}/availability', 'Admin\ProductController@storeProductAvailability');
    


    Route::resource('administrators', 'Admin\AdministratorController');
    //Route::resource('products', 'Admin\ProductController');
    Route::resource('customers', 'Admin\CustomerController');

    Route::get('/', 'Admin\DashboardController@index');





});

Route::middleware(['auth'])->group(function () {


  


    Route::get('/profile', function () {
        echo 'user';
    });


    Route::get('/', function () {
        return 'logged in';
    });




});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
