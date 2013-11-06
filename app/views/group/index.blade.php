@extends('layouts.master')

@section('contents')

<h1>Groups</h1>

@include('_partials.searchoptions')

<div class="table-responsive">
	<table class="table table-striped table-condensed">
		<thead>
			<tr>
				<th>Name</th>
				<th>Short Description</th>
				<th>Position/s</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $groups as $group )
			
			<tr>
				<td> {{ link_to_route( 'groups.show', $group->name, $group->id ) }} </td>
				<td> {{{ $group->short_description }}} </td>
				<td> {{{ $group->positionslist }}} </td>
			</tr>

			@endforeach
		</tbody>
	</table>
</div>
@stop