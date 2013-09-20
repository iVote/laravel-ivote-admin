@extends('layouts.master')

@section('contents')

	@if ( ! $user->is_verified )

		<div class="alert alert-danger"> <b>Notice:</b> This account is still not used. Use the password <b> {{ $user->password }} </b> for initial login. </div>

	@endif

	@if ( $user->trashed() )
		
		<div class="alert alert-danger"> <b>Notice:</b> This account is already deactivated. </div>		

	@endif

	{{ Notification::showSuccess() }}

	<div class="row">
		<div class="col-md-9">
			<h3>Profile information</h3>

			<dl class="dl-horizontal">
				<dt> Username: </dt> <dd> {{{ $user->username }}} </dd>
			</dl>

			<dl class="dl-horizontal">
				<dt> Fullname: </dt> <dd> {{{ $user->fullname }}} </dd>
			</dl>

			<dl class="dl-horizontal">
				<dt> Role: </dt> <dd> {{{ $user->roles()->first()->name }}} </dd>
			</dl>

			@if ( ! $adminMetas->isEmpty() )
				<h4>Additional Information</h4>
			@endif

			@foreach ( $adminMetas as $field )

				<dl class="dl-horizontal">
					
					<dt> {{ $field->viewText }} </dt> 
					<dd> {{ $user->getMetaValue( $field->id ) }} </dd>

				</dl>
			
			@endforeach

			<h4> Security information </h4>	

			<dl class="dl-horizontal">
				<dt>Security question: </dt>
				<dd> {{ $user->securityQuestion ?: 'Not Set' }} </dd>
			</dl>

			<dl class="dl-horizontal">
				<dt>Security Answer: </dt>
				<dd> {{ $user->securityAnswer ?: 'Not Set' }} </dd>
			</dl>

		</div>
		
		<div class="col-md-3">
				<h4>Operations:</h4>
				<p> <a href="" class="btn btn-link">Change Password </a> </p>
				<p>{{ link_to_route( 'users.edit', 'Edit Profile', $user->id, array( 'class' => 'btn btn-link' )) }}</p>
			
				@if ( ! $user->super && !$user->trashed() )
			
				<p>{{ link_to_route( 'users.delete', 'Deactivate Account', $user->id, array( 'class' => 'btn btn-danger' )) }}</p>
			
				@elseif ( $user->trashed() )
			
				<p>{{ link_to_route( 'users.reactivate', 'Reactivate Account', $user->id, array( 'class' => 'btn btn-success' )) }}</p>
			
				@endif
		</div>

	</div>
@stop