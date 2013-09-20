@extends( 'layouts.master' )

@section( 'contents' )

	{{ link_to_route( 'users.index', '&lsaquo; Back' ) }}
	
	<h3> Update account </h3>
	
	{{ Form::open( array( 'route' =>  array( 'users.update', $user->id ),'class' => 'form-horizontal' ) ) }}
	
		{{ Form::hidden('_method', 'PUT') }}

		<h4>Account Settings:</h4>	

		<dl class="dl-horizontal">
				<dt> Username: </dt> <dd> {{{ $user->username }}} </dd>
		</dl>

		<div class="form-group">

			{{ Form::label( 'role', 'User Role:', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5 {{ $errors->has( 'role' ) ? 'has-error' : '' }}">

				{{ Form::select( 'role', $roles->lists( 'name', 'id' ), $user->roles()->first()->id, array( 'class' => 'form-control' ) ) }}

				@if ($errors->has( 'role' ))
					<span class="help-block">{{ $errors->first( 'role' ) }}</span>
				@endif

			</div>

		</div>

		<h4>Personal Info :</h4>

		<div class="form-group">
			{{ Form::label( 'firstname', 'First name:', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5 {{ $errors->has( 'firstname' ) ? 'has-error' : '' }}">
				{{ Form::text( 'firstname', $user->firstname , array( 'class' => 'form-control' )) }}

				@if ($errors->has( 'firstname' ))
					<span class="help-block">{{ $errors->first( 'firstname' ) }}</span>
				@endif

			</div>

		</div>

		<div class="form-group">
			{{ Form::label( 'lastname', 'Last name:', array( 'class' => 'col-md-2 control-label' )) }}

			<div class="col-md-5 {{ $errors->has( 'lastname' ) ? 'has-error' : '' }}">
				{{ Form::text( 'lastname', $user->lastname , array( 'class' => 'form-control' )) }}

				@if ($errors->has( 'lastname' ))
					<span class="help-block">{{ $errors->first( 'lastname' ) }}</span>
				@endif

			</div>

		</div>


		@if ( ! $adminMetas->isEmpty() ) 
		
		<h4> Additional Fields :</h4>

		@endif

		@foreach( $adminMetas as $field )
		
		<div class="form-group">
			
			{{ Form::label( $field->controlName, $field->viewText . ':', array( 'class' => ! $field->is_nullable ? 'required col-md-2 control-label' : 'col-md-2 control-label' ) ) }}

			<div class="col-md-5">
							
				{{ Form::text( $field->controlName, $user->getMetaValue( $field->id ), array( 'class' => 'form-control' ) ) }}

			</div>

		</div>

		@endforeach

		<div class="form-group">

			<div class="col-md-offset-2 col-md-5">

				{{ link_to_route( 'users.show', 'Cancel', $user->id, array( 'class' => 'btn btn-danger' ) ) }}
				{{ Form::submit( 'Save changes', array( 'class' => 'btn btn-primary' )) }}

			</div>

		</div>
		
	{{ Form::close() }}

@stop