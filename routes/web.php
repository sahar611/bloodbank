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
Route::group(['namespace' =>'Front','middleware' => 'auth:client_web'], function () {

    Route::get('/', 'MainController@home');
    Route::get('about', 'MainController@about');
    Route::get('articles', 'MainController@articles');
    Route::get('article/{id}', 'MainController@article');
    Route::get('donations', 'MainController@donations');
    Route::get('donation/{id}', 'MainController@donation');
    Route::get('page/{id}', 'MainController@pages');
    Route::get('contacts', 'MainController@contacts');
    Route::post('store-contact', 'MainController@storeContact');
    Route::get('search-donation', 'MainController@searchDonation');
    Route::get('client-register', 'AuthController@register');
    Route::post('store-client', 'AuthController@storeClient');
    Route::get('donation-request', 'AuthController@askDonation');

    Route::post('ask-donation', 'AuthController@storeDonation');

    Route::post('toggle-favourite', 'MainController@toggleFavourite')->name('toggle-favourite');


});
Auth::routes(['register' => false]);

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth', 'auto-check-permission'], 'prefix' => 'admin'], function () {

Route::resource('governorates', 'GovernorateController');
Route::resource('cities', 'CityController');
Route::resource('categories', 'CategoryController');
Route::resource('posts', 'PostController');
Route::resource('clients', 'ClientController');
Route::get('clients-activate/{id}', 'ClientController@activate')->name('clients.activate');
Route::get('clients-deactivate/{id}', 'ClientController@deactivate')->name('clients.deactivate');
Route::resource('contacts', 'ContactController');
Route::resource('donations', 'DonationController');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('settings', 'SettingsController');
Route::resource('pages', 'PageController');

});



