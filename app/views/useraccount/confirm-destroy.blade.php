@extends( 'layouts.master' )

@section( 'contents' )

	{{ Form::open( array( 'route' => array( 'users.destroy', $user->id ) ) ) }}
		{{ Form::hidden( '_method', 'DELETE' ) }}
			<div class="alert alert-warning"> 
				<div class="pull-left"><b> Be Careful!</b> Are you sure you want to deactivate <b>{{{ $user->username }}} </b> ?</div>
				<div class="pull-right">	
					{{ Form::submit( 'I am sure!', array( 'class' => 'btn btn-danger' ) ) }}
					{{ link_to( URL::previous(), 'Nope . . .', array( 'class' => 'btn btn-primary' ) ) }}
				</div>
				<div class="clearfix"></div>
			</div>
	{{ Form::close() }}

@stop