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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// All Test Routes (Api)
Route::get('test_token_expireIn', 'TestController@TokenExpireIn');
Route::get('test_routes', 'TestController@TestRoutes');
Route::post('test_login','Auth\LoginController@loginApi');
Route::post('test_register','Auth\RegisterController@registerApi');
Route::post('test_logout','Auth\LoginController@logoutApi');
Route::get('getuserdata', 'Api\ApiUserController@localGetUserData');

// Project Admin Roues
	Route::redirect('/','/admin');
	Route::redirect('/home','/admin');



Route::group([
	'middleware' => 'roles',
	'roles' => ['super_admin', 'admin'],
	'namespace' => 'Admin',
	], function () {

	// Dashborad Routes
	Route::get('/admin', [
		'uses' => 'SystemController@showDashborad',
	]);

	// assign roles to user Route
	Route::get('check-role',[
		'uses' => 'RoleController@CheckRole',
		'middleware' => 'roles',
		'roles' => ['super_admin']
	]);
	Route::post('/assignrole',[
		'uses' => 'RoleController@assignRole',
		'as' => 'assign.roles',
		'middleware' => 'roles',
		'roles' => ['super_admin']
	]);

	// User Related Routes
	Route::get('admin/users/admins', 'UserController@AdminUsers');
	Route::get('admin/users/banned', 'UserController@BannedUsers');
	Route::get('admin/users/{id}/ban', 'UserController@BanUser');
	Route::get('admin/users/{id}/unban', 'UserController@UnBanUser');
	Route::resource('admin/users', 'UserController');
	
});

