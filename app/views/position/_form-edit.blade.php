@extends( 'layouts.master' )

@section( 'contents' )

	{{ link_to_route( 'positions.index', '&lsaquo; Back' ) }}
	
	<h3> Update position </h3>
	
	{{ Form::open( array( 'route' =>  array( 'positions.update', $position->id ),'class' => 'form-horizontal' ) ) }}
	
		{{ Form::hidden('_method', 'PUT') }}

		<div class="form-group">
			{{ Form::label( 'title', 'Title:', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5 {{ $errors->has( 'title' ) ? 'has-error' : '' }}">
				{{ Form::text( 'title', $position->title , array( 'class' => 'form-control' )) }}

				@if ($errors->has( 'title' ))
					<span class="help-block">{{ $errors->first( 'title' ) }}</span>
				@endif

			</div>

		</div>

		<div class="form-group">
			{{ Form::label( 'short_description', 'Short Description', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5">
				{{ Form::textarea( 'short_description', $position->short_description , array( 'class' => 'form-control' )) }}
			</div>
		</div>

		<div class="form-group">
			{{ Form::label( 'limit', 'Limit', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5 {{ $errors->has( 'limit' ) ? 'has-error' : '' }}">
				{{ Form::text( 'limit', $position->limit , array( 'class' => 'form-control' )) }}

				@if ($errors->has( 'limit' ))
					<span class="help-block">{{ $errors->first( 'limit' ) }}</span>
				@endif

			</div>

		</div>

		<div class="form-group">

			<div class="col-md-offset-2 col-md-5">

				{{ link_to_route( 'positions.show', 'Cancel', $position->id, array( 'class' => 'btn btn-danger' ) ) }}
				{{ Form::submit( 'Save changes', array( 'class' => 'btn btn-primary' )) }}

			</div>

		</div>
		
	{{ Form::close() }}

@stop