<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactUsFormController;


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
    return view('welcome');
});

Route::get('index',[
    'as'=>'page.trangchu',
    'uses'=>'PageController@getIndex'
]);

Route::get('about',[
    'as' => 'page.about',
    'uses' => 'PageController@getAbout'
]);


Route::get('product-type/{type}',[
    'as' => 'page.product-type',
    'uses' => 'PageController@getProductType'
]);
Route::get('Chitietsanpham/{id}',[
    'as'=>'page.chi-tiet-sp',
    'uses' => 'PageController@getChitiet'
]);
Route::get('product',[
    'as' => 'page.product',
    'uses' => 'PageController@getProduct'
]);
Route::get('add-to-cart/{id}',[
    'as' => 'themgiohang',
    'uses' =>'PageController@AddCart'
]);
Route::get('del-cart/{id}',[
    'as' => 'xoagiohang',
    'uses' => 'PageController@DelCart',
]);
Route::get('donhang',[
    'as' => 'page.checkout',
    'uses' => 'PageController@Checkout',
]);
Route::get('dangnhap',[
    'as'=>'page.login',
    'uses'=>'PageController@getLogin',
]);
Route::post('dangnhap',[
    'as'=>'page.login',
    'uses'=>'PageController@postLogIn',
]);
Route::get('dangki',[
    'as'=>'page.signin',
    'uses'=>'PageController@getSignIn',
]);
Route::post('dangki',[
    'as'=>'page.signin',
    'uses'=>'PageController@postSignIn',
]);
Route::get('dangxuat',[
    'as'=>'page.logout',
    'uses'=>'PageController@getLogOut'
]);
Route::get('search',[
    'as'=>'page.search',
    'uses'=>'PageController@getSearch'
]);

Route::get('/contact', [ContactUsFormController::class, 'createForm']);

Route::post('/contact', [ContactUsFormController::class, 'ContactUsForm'])->name('contact.store');

Route::get('admin',[
    'as'=>'page.admin',
    'uses'=>'AdminController@getAdmin'
]);