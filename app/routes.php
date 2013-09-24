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

Route::controller( 'security', 'SecurityController' );

Route::group(array('before' => 'auth'), function() {

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

	// Groups
	Route::resource( 'groups', 'GroupController' );
	Route::get( 'groups/{id}/delete', array( 'as' => 'groups.delete', 'uses' => 'GroupController@confirmDestroy' ) );

	// Dashboard
	Route::get('/', function()
	{
		return View::make('dashboard');
	});

});
