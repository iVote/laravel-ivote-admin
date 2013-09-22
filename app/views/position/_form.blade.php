@extends( 'layouts.master' )

@section( 'contents' )

	{{ link_to_route( 'positions.index', '&lsaquo; Back' ) }}
	
	<h3> Add new position </h3>
	
	{{ Notification::showSuccess() }}

	{{ Form::open( array( 'route' => 'positions.index' ,'class' => 'form-horizontal' ) ) }}
	
		<div class="form-group">
		
			{{ Form::label( 'title', 'Title', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5 {{ $errors->has( 'title' ) ? 'has-error' : '' }}">
				{{ Form::text( 'title', '' , array( 'class' => 'form-control' )) }}

				@if ($errors->has( 'title' ))
					<span class="help-block">{{ $errors->first( 'title' ) }}</span>
				@endif

			</div>

		</div>

		<div class="form-group">
			{{ Form::label( 'short_description', 'Short Description', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5">
				{{ Form::textarea( 'short_description', '' , array( 'class' => 'form-control' )) }}
			</div>

		</div>

		<div class="form-group">
			{{ Form::label( 'limit', 'Limit', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5 {{ $errors->has( 'limit' ) ? 'has-error' : '' }}">
				{{ Form::text( 'limit', '' , array( 'class' => 'form-control' )) }}

				@if ($errors->has( 'limit' ))
					<span class="help-block">{{ $errors->first( 'limit' ) }}</span>
				@endif

			</div>

		</div>

		<div class="form-group">
			{{ Form::label( 'is_group_dependent', 'Is Group Dependent?', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5">
				{{ Form::checkbox( 'is_group_dependent', true , false, array( 'class' => 'form-control' )) }}
			</div>

		</div>

		<div class="form-group">

			<div class="col-md-offset-2 col-md-5">

				{{ Form::submit( 'Save New Position', array( 'class' => 'btn btn-primary' )) }}

			</div>

		</div>
		
	{{ Form::close() }}

@stop