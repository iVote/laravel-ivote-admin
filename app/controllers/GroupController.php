<?php

class GroupController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$groups = Group::searchGroup()
						->orderBy('name')
						->get();

		return View::make( 'group.index', compact( 'groups' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$positions = Position::all();
		return View::make( 'group._form', compact( 'positions' ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$group    = new Group;

		if (! $group->commit() ) {

			return Redirect::back()->withErrors($group->errors())->withInput();

		}

		Notification::success("Successfully added to records.");

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
		$group = Group::withTrashed()->find($id);

		return View::make( 'group.show', compact( 'group' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit( $id )
	{
		$group = Group::withTrashed()->find( $id );
		$positions = Position::all();

		return View::make( 'group._form-edit', compact( 'group', 'positions' ) );

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update( $id )
	{
		$group = Group::withTrashed()->find( $id );

		if ( ! $group->commit( TRUE ) ) {
			return Redirect::back()->withErrors($group->errors())->withInput();
		}

		Notification::success('This position has been updated');

		return Redirect::route('groups.show', array( $group->id ));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Group::find( $id )->positions()->detach();
		Group::destroy($id);

		return Redirect::route('groups.index');
	}

	// Confirm first before deactivating account
	public function confirmDestroy($id)
	{
		$group = Group::find( $id );
		return View::make( 'group.confirm-destroy', compact( 'group' ) );
	}

}
