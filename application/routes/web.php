<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $categories = \App\Category::all();
    $products = \App\Product::all();
    return view('home',compact('categories','products'));
});

Route::get('category/{slug}/{id}', function ($slug,$id) {
    $category = \App\Category::find($id);
    $categories = \App\Category::all();
    $products = \App\Category::find($id)->products;
    return view('category',compact('categories','category','products'));
});


Route::get('product/{slug}/{id}', function ($slug,$id) {
    $categories = \App\Category::all();
    $product = \App\Product::with('images')->find($id);
    return view('single',compact('categories','product'));
});

Route::get('/checkout', function () {
    $categories = \App\Category::all();

    return view('checkout',compact('categories'));
});




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');



Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {


    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('store/get','StoreController@get');
    Route::resource('store','StoreController');


    Route::get('product/get','ProductController@get');
    Route::post('product/image','ProductController@image');
    Route::post('product/category','ProductController@category');
    Route::resource('product','ProductController');

    Route::post('category/status','CategoryController@status');
    Route::get('category/get','CategoryController@get');
    Route::post('category/image','CategoryController@image');
    Route::resource('category','CategoryController');



});

Route::group(['as' => 'manager.', 'prefix' => 'manager', 'namespace' => 'Manager', 'middleware' => ['auth', 'manager']], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

});

Route::group(['as' => 'user.', 'prefix' => 'user', 'namespace' => 'User', 'middleware' => ['auth', 'user']], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

});

