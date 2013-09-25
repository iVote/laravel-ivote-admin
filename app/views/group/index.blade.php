@extends('layouts.master')

@section('contents')

<h1>Groups</h1>

<div class="row show-grid">

	<div class="col-md-7">

		{{ Form::open( array( 'class' => 'form-inline', 'method' => 'get' ) ) }}

			<div class="input-group">

				{{ Form::text( 'search', Input::get('search' , '') , array( 'class' => 'form-control', 'placeholder' => 'Search Group', 'autofocus' )) }}

				<span class="input-group-btn">
					<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
				</span>

		    </div>

		{{ Form::close() }}

	</div>

	<div class="col-md-5">

		<div class="pull-right">
			<!-- Standard gray button with gradient -->
			<a href="" class="btn btn-default"><span class="glyphicon glyphicon-cog"></span> Options</a>
			<a href="#" class="btn btn-default"><span class="glyphicon glyphicon-upload"></span> Upload From File</a>
			<a href="{{ route( 'groups.create' ) }}" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> New</a>

		</div>

	</div>

</div>

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