<?php

class UserAccountController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::withTrashed()->with('Roles')->get();
		return View::make( 'useraccount.index', compact( 'users' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$metas = Lookup::getAdminMetas();
		$roles = Role::all();
		return View::make( 'useraccount._form', compact( 'metas', 'roles' ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user    = new User;

		if (! $user->register() ) {

			return Redirect::back()->withErrors($user->errors())->withInput();

		}

		Notification::success("Successfully added to records. Your temporary password is: <b> {$user->password} </b> ");

		return Redirect::back();

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show( $id )
	{
		$user       = User::withTrashed()->find($id);
		$adminMetas = Lookup::getAdminMetas();

		return View::make( 'useraccount.show', compact( 'user', 'adminMetas' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit( $id )
	{
		$user       = User::withTrashed()->find( $id );
		$adminMetas = Lookup::getAdminMetas();
		$roles      = Role::all();

		return View::make( 'useraccount._form-edit', compact( 'user', 'adminMetas', 'roles' ) );

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update( $id )
	{
		$user = User::withTrashed()->find( $id );

		if ( ! $user->addUpdateAccount( TRUE ) ) {
			return Redirect::back()->withErrors($user->errors())->withInput();
		}

		Notification::success('This account has been updated');

		return Redirect::route('users.show', array( $user->id ));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('users.index');
	}

	// Confirm first before deactivating account
	public function confirmDestroy($id)
	{
		$user = User::find( $id );
		return View::make( 'useraccount.confirm-destroy', compact( 'user' ) );
	}

	public function reactivate( $id )
	{
		$user = User::withTrashed()->where('id', $id)->restore();

		Notification::success( '<b>Welcome back!</b>. User successfully restored ' );

		return Redirect::back();
	}

}
