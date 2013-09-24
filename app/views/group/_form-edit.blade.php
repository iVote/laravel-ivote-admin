@extends( 'layouts.master' )

@section( 'contents' )

	{{ link_to_route( 'groups.index', '&lsaquo; Back' ) }}
	
	<h3> Update group </h3>
	
	{{ Form::open( array( 'route' =>  array( 'groups.update', $group->id ),'class' => 'form-horizontal' ) ) }}
	
		{{ Form::hidden('_method', 'PUT') }}

		<div class="form-group">
		
			{{ Form::label( 'name', 'Name', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5 {{ $errors->has( 'name' ) ? 'has-error' : '' }}">
				{{ Form::text( 'name', $group->name , array( 'class' => 'form-control' )) }}

				@if ($errors->has( 'name' ))
					<span class="help-block">{{ $errors->first( 'name' ) }}</span>
				@endif

			</div>

		</div>

		<div class="form-group">
			{{ Form::label( 'short_description', 'Short Description', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5">
				{{ Form::textarea( 'short_description', $group->short_description , array( 'class' => 'form-control' )) }}
			</div>

		</div>

		<div class="form-group">
			{{ Form::label( 'position', 'Position', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5">
				@foreach ($positions as $position)
					<dl class="dl-horizontal">
						<dt> {{ Form::checkbox( 'positions[]', $position->id, in_array( $position->id, $group->positions->lists( 'id' ) ) ) }} </dt> <dd> {{ $position->title }} </dd>
					</dl>
				@endforeach
			</div>

		</div>

		<div class="form-group">

			<div class="col-md-offset-2 col-md-5">

				{{ link_to_route( 'groups.show', 'Cancel', $group->id, array( 'class' => 'btn btn-danger' ) ) }}
				{{ Form::submit( 'Save changes', array( 'class' => 'btn btn-primary' )) }}

			</div>

		</div>
		
	{{ Form::close() }}

@stop