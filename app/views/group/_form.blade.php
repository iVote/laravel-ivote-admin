@extends( 'layouts.master' )

@section( 'contents' )

	{{ link_to_route( 'groups.index', '&lsaquo; Back' ) }}
	
	<h3> Create new group </h3>
	
	{{ Notification::showSuccess() }}

	{{ Form::open( array( 'route' => 'groups.index' ,'class' => 'form-horizontal' ) ) }}
	
		<div class="form-group">
		
			{{ Form::label( 'name', 'Name', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5 {{ $errors->has( 'name' ) ? 'has-error' : '' }}">
				{{ Form::text( 'name', '' , array( 'class' => 'form-control' )) }}

				@if ($errors->has( 'name' ))
					<span class="help-block">{{ $errors->first( 'name' ) }}</span>
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
			{{ Form::label( 'position', 'Position', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5">
				@foreach ($positions as $position)
					<dl class="dl-horizontal">
						<dt> {{ Form::checkbox( 'positions[]', $position->id, 0 ) }} </dt> <dd> {{ $position->title }} </dd>
					</dl>
				@endforeach
			</div>

		</div>

		<div class="form-group">

			<div class="col-md-offset-2 col-md-5">

				{{ Form::submit( 'Save New Account', array( 'class' => 'btn btn-primary' )) }}

			</div>

		</div>
		
	{{ Form::close() }}

@stop