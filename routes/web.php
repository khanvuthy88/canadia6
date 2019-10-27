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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{locale?}', function ($locale){
    Session::put('locale', $locale);
    $session=Session::get('locale');
    return redirect()->back();
})->middleware('Localization')->name('set-local-lang');

Route::prefix('frontend')->group(function(){
	Route::post('/account/{any}/create','FrontendAccountController@create')->name('frontend-account-create');
	Route::post('/account/type/{account}/create','FrontendAccountController@store')->name('frontend-account-type-create');
	Route::get('/account/created-success/{account}','FrontendAccountController@accountCreatedSuccess')->name('frontend-account-created-success');

	Route::post('/account/account-information/','FrontendAccountController@printAccountInfoTest')->name('account.frontend.print.info');
	// Route::post('/account/account-information/{account}/','FrontendAccountController@printAccountInfo')->name('account.frontend.print.info.param');

	Route::post('/account/type/dob-validate/{dob}','FrontendAccountController@dobValidtor');
	Route::post('/account/type/id_card-validate/{id_number}','FrontendAccountController@idNumberValidator');
	Route::post('/account/type/phone-validate/{phone}','FrontendAccountController@phoneNumberValidator');
	Route::post('/account/type/email-validate/{email}','FrontendAccountController@emailValidator');

	// Ajax request 
	Route::post('/ajax-request/district/{province}','FrontendAccountController@getDistrictByProvinceid');
	Route::post('/ajax-request/commune/{district}','FrontendAccountController@getCommuneByDistrictid');
	Route::post('/ajax-request/village/{commune}','FrontendAccountController@getVillageByCommuneid');
	Route::post('/ajax-request/employment/{employment}','FrontendAccountController@getSubEmployment');
	
});

Route::prefix('admin')->group(function(){
	Route::get('/','DashbaordController@index')->name('dashbaord-index');
	Route::get('/accounts','DashbaordController@allAccounts')->name('dashbaord-accounts');
	Route::get('/account/create','DashbaordController@create')->name('dashbaord-account-create');
	Route::post('/account/type/create','FrontendAccountController@store')->name('admin-account-type-create');
	Route::get('/account/{account}/edit','DashbaordController@edit')->name('admin-account-edit');
	Route::post('/account/{account}/update','DashbaordController@update')->name('admin-account-update');


	// Get account info in admin
	Route::get('/account/ajax-admin/account-info/{account}','DashbaordController@accountInfo')->name('admin-ajax-account-info');
	Route::post('/account/ajax-admin/account-delete/{account}','DashbaordController@destroy')->name('admin-ajax-account-destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
