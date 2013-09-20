@extends('layouts.master')

@section('contents')

<h1>User Accounts</h1>

<div class="pull-right">
	<!-- Standard gray button with gradient -->
	<a href="" class="btn btn-default"><span class="glyphicon glyphicon-cog"></span> Options</a>
	<a href="#" class="btn btn-default"><span class="glyphicon glyphicon-upload"></span> Upload From File</a>
	<a href="{{ route( 'users.create' ) }}" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> New</a>

</div>

<div class="table-responsive">
	<table class="table table-striped table-condensed">
		<thead>
			<tr>
				<th>Name</th>
				<th>Username</th>
				<th>User Role</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $users as $user )
			
			<tr>
				<td> {{ link_to_route( 'users.show', $user->fullname, $user->id ) }} </td>
				<td> {{{ $user->username }}} </td>
				<td> {{{ $user->roles->first()->name }}} </td>
			</tr>

			@endforeach
		</tbody>
	</table>
</div>
@stop