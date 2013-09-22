<?php

class PositionController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$positions = Position::all();
		return View::make( 'position.index', compact( 'positions' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		return View::make( 'position._form' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$position    = new Position;

		if (! $position->commit() ) {

			return Redirect::back()->withErrors($position->errors())->withInput();

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
		$position = Position::withTrashed()->find($id);

		return View::make( 'position.show', compact( 'position' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit( $id )
	{
		$position = Position::withTrashed()->find( $id );
		return View::make( 'position._form-edit', compact( 'position' ) );

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update( $id )
	{
		$position = Position::withTrashed()->find( $id );

		if ( ! $position->commit( TRUE ) ) {
			return Redirect::back()->withErrors($position->errors())->withInput();
		}

		Notification::success('This position has been updated');

		return Redirect::route('positions.show', array( $position->id ));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Position::destroy($id);

		return Redirect::route('positions.index');
	}

	// Confirm first before deactivating account
	public function confirmDestroy($id)
	{
		$position = Position::find( $id );
		return View::make( 'position.confirm-destroy', compact( 'position' ) );
	}

}
