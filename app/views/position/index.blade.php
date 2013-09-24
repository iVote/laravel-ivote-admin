@extends('layouts.master')

@section('contents')

<h1>Positions</h1>

<div class="pull-right">
	<!-- Standard gray button with gradient -->
	<a href="" class="btn btn-default"><span class="glyphicon glyphicon-cog"></span> Options</a>
	<a href="#" class="btn btn-default"><span class="glyphicon glyphicon-upload"></span> Upload From File</a>
	<a href="{{ route( 'positions.create' ) }}" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> New</a>

</div>

<div class="table-responsive">
	<table class="table table-striped table-condensed">
		<thead>
			<tr>
				<th>Title</th>
				<th>Short Description</th>
				<th>Limitation</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $positions as $position )
			
			<tr>
				<td> {{ link_to_route( 'positions.show', $position->title, $position->id ) }} </td>
				<td> {{{ $position->short_description }}} </td>
				<td> {{{ $position->limit }}} </td>
			</tr>

			@endforeach
		</tbody>
	</table>
</div>
@stop