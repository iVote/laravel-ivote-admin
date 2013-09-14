@extends( 'layouts.master' )

@section( 'contents' )
	{{ link_to_route( 'roles.index', '&lsaquo; Back' ) }}
	<h3> {{ isset($role) ? 'Update' : 'Add new' }} role </h3>
	
	{{ Notification::showSuccess() }}
	{{ Form::open(array( 'route' => isset($role) ? array( 'roles.update', $role->id) : 'roles.index' ,'class' => 'form-horizontal' )) }}
		
		@if (isset($role))
			{{ Form::hidden( '_method', 'PUT' ) }}
		@endif
		<div class="form-group">
			{{ Form::label( 'name', 'Role Name', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5 {{ $errors->has( 'name' ) ? 'has-error' : '' }}">
				{{ Form::text( 'name', isset($role->name) ? $role->name : '' , array( 'class' => 'form-control' )) }}

				@if ($errors->has( 'name' ))
					<span class="help-block">{{ $errors->first( 'name' ) }}</span>
				@endif

			</div>
		</div>

		<div class="form-group">

			{{ Form::label( 'description', 'Role Description', array( 'class' => 'col-md-2 control-label' )) }}
			
			<div class="col-md-5">

				{{ Form::textarea( 'description', isset($role->description) ? $role->description : '', array( 'class' => 'form-control', 'rows' => 3)) }}

			</div>

		</div>

		<div class="form-group">

			<div class="col-md-offset-2 col-md-5">

				@if ( isset( $role ) && $role->id != 1 )

					{{ link_to_route( 'roles.delete', 'Delete', $role->id, array( 'class' => 'btn btn-danger' )) }}

				@endif

				{{ Form::submit( isset( $role ) ? 'Save changes' : 'Save New Role', array( 'class' => 'btn btn-primary' )) }}

			</div>

		</div>
		
	{{ Form::close() }}

@stop