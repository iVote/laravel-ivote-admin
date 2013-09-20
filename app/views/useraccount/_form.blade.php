@extends( 'layouts.master' )

@section( 'contents' )

	{{ link_to_route( 'users.index', '&lsaquo; Back' ) }}
	
	<h3> Register new account </h3>
	
	{{ Notification::showSuccess() }}

	{{ Form::open( array( 'route' => 'users.index' ,'class' => 'form-horizontal' ) ) }}
	
		<h4>Account Settings :</h4>	

		<div class="form-group">
		
			{{ Form::label( 'username', 'Username', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5 {{ $errors->has( 'username' ) ? 'has-error' : '' }}">
				{{ Form::text( 'username', '' , array( 'class' => 'form-control' )) }}

				@if ($errors->has( 'username' ))
					<span class="help-block">{{ $errors->first( 'username' ) }}</span>
				@endif

			</div>

		</div>

		<div class="form-group">
			{{ Form::label( 'role', 'User Role', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5 {{ $errors->has( 'role' ) ? 'has-error' : '' }}">

				{{ Form::select( 'role', $roles->lists( 'name', 'id' ), 1, array( 'class' => 'form-control' ) ) }}

				@if ($errors->has( 'role' ))
					<span class="help-block">{{ $errors->first( 'role' ) }}</span>
				@endif


			</div>

		</div>

		<h4>Personal Info :</h4>

		<div class="form-group">
			{{ Form::label( 'firstname', 'First name', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5 {{ $errors->has( 'firstname' ) ? 'has-error' : '' }}">
				{{ Form::text( 'firstname', '' , array( 'class' => 'form-control' )) }}

				@if ($errors->has( 'firstname' ))
					<span class="help-block">{{ $errors->first( 'firstname' ) }}</span>
				@endif

			</div>

		</div>

		<div class="form-group">
			{{ Form::label( 'lastname', 'Last name', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5 {{ $errors->has( 'lastname' ) ? 'has-error' : '' }}">
				{{ Form::text( 'lastname', '' , array( 'class' => 'form-control' )) }}

				@if ($errors->has( 'lastname' ))
					<span class="help-block">{{ $errors->first( 'lastname' ) }}</span>
				@endif

			</div>

		</div>


		@if ( ! $metas->isEmpty() ) 
		
		<h4> Additional Fields :</h4>

		@endif

		@foreach( $metas as $meta )
		
		<div class="form-group">
			
			{{ Form::label( $meta->controlName, $meta->viewText, array( 'class' => ! $meta->is_nullable ? 'required col-md-2 control-label' : 'col-md-2 control-label' ) ) }}

			<div class="col-md-5 {{ $errors->has( $meta->controlName ) ? 'has-error' : '' }} ">
				
				{{ Form::text( $meta->controlName, '', array( 'class' => 'form-control' ) ) }}

				@if ($errors->has( $meta->controlName ))
					<span class="help-block">{{ $errors->first( $meta->controlName ) }}</span>
				@endif

			</div>

		</div>

		@endforeach

		<div class="form-group">

			<div class="col-md-offset-2 col-md-5">

				{{ Form::submit( isset( $role ) ? 'Save changes' : 'Save New Account', array( 'class' => 'btn btn-primary' )) }}

			</div>

		</div>
		
	{{ Form::close() }}

@stop