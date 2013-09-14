<?php

class UserRoleController extends \BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$roles       = Role::orderBy('name')->get();
		$permissions = Permission::with('roles')->get(); // The other way around wont work (Role::with('permissions'))
		
		return View::make('userrole.index', compact('roles', 'permissions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('userrole._form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$role = new Role;
		
		if (! $role->save() ) {
			return Redirect::back()->withErrors($role->errors())->withInput();
		}

		Notification::success('Successfully added to records.');

		return Redirect::back();

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$role = Role::find($id);

		if ( is_null($role) ) {
			App::abort( '404', 'Page not found' );
		}

		return View::make( 'userrole._form' )->with( compact( 'role' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$role   = Role::find($id);
		$inputs = Input::all();

		if (! $role->update($inputs) ) {
			return Redirect::back()->withErrors($role->errors())->withInput();
		}

		Notification::success('Record updated');

		return Redirect::back()->withInput();

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Role::destroy($id);

		return Redirect::route('roles.index');
	}


	public function confirmDestroy($id)
	{
		$role = Role::find( $id );
		return View::make( 'userrole.confirm-destroy', compact( 'role' ) );
	}


	public function assignPermission($roleId, $permId)
	{
		$role = Role::find( $roleId );

		$role->permissions()->attach($permId);

		return Redirect::back();
	}

	public function removePermission($roleId, $permId)
	{
		$role = Role::find( $roleId );

		$role->permissions()->detach($permId);

		return Redirect::back();
	}

}