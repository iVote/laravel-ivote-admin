<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get( 'login',  function() {

	return Auth::check() ? Redirect::to( '/' ) : View::make( 'secure.login' );

});

Route::get( 'logout',  function() {

	Auth::logout();

	Notification::success( '<span class="glyphicon glyphicon-info-sign"></span> You have successfully logged out' );

	return Redirect::to( 'login' );

});


Route::post( 'login', function() {

	$login = array( 'username' => Input::get( 'username' ), 'password' => Input::get( 'password' ) );

	if ( Auth::attempt( $login  ) ) {
		return Redirect::intended( '/' );
	}

	Notification::warning( '<span class="glyphicon glyphicon-warning-sign"></span> Incorrect username or password!' );

	return Redirect::to( 'login' );

});


// Roles
Route::resource( 'roles', 'UserRoleController' );
Route::get( 'roles/{id}/delete', array( 'as' => 'roles.delete', 'uses' => 'UserRoleController@confirmDestroy' ) );
Route::get( 'roles/{roleId}/permission/{permId}/assign', array( 'as' => 'roles.assignPerm', 'uses' => 'UserRoleController@assignPermission' ) );
Route::get( 'roles/{roleId}/permission/{permId}/remove', array( 'as' => 'roles.removePerm', 'uses' => 'UserRoleController@removePermission' ) );


// Users
Route::resource( 'users', 'UserAccountController' );
Route::get( 'users/{id}/delete', array( 'as' => 'users.delete', 'uses' => 'UserAccountController@confirmDestroy' ) );
Route::get( 'users/{id}/reactivate', array( 'as' => 'users.reactivate', 'uses' => 'UserAccountController@reactivate' ) );


// Positions
Route::resource( 'positions', 'PositionController' );
Route::get( 'positions/{id}/delete', array( 'as' => 'positions.delete', 'uses' => 'PositionController@confirmDestroy' ) );

Route::get('/', function()
{
	return View::make('dashboard');
});
