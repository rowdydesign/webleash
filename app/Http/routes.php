<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Account Routes
|--------------------------------------------------------------------------
|
*/

Route::get('signup', ['as' => 'signup', 'uses' => 'Account\AccountController@signup']);
Route::get('account/unique', ['as' => 'account.unique', 'uses' => 'Account\AccountController@unique']);
Route::get('account/verify/{email}/{code}', ['as' => 'account.verify', 'uses' => 'Account\AccountController@verify']);
Route::get('account/resend-verification', ['as' => 'account.resend-verification', 'uses' => 'Account\AccountController@resendVerification']);
Route::get('account/success', ['as' => 'account.create.success', 'uses' => 'Account\AccountController@success']);
Route::resource('account', 'Account\AccountController');


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
*/

Route::get('login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);


/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'auth'], function() {

    // Dashboard
    Route::get('/', [
        'as' => 'console.dashboard',
        'uses' => 'Console\DashboardController@index',
    ]);

    // Widgets
    Route::post('resources/widgets', ['as' => 'resources.widgets.store', 'uses' => 'Resources\WidgetController@store']);
    Route::put('resources/widgets', ['as' => 'resources.widgets.update', 'uses' => 'Resources\WidgetController@update']);
    Route::delete('resources/widgets/{uuid}', ['as' => 'resources.widgets.destroy', 'uses' => 'Resources\WidgetController@destroy']);

});
