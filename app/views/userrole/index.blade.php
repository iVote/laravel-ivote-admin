@extends('layouts.master')

@section('contents')

<h1>User Roles</h1>

<div class="pull-right">
	<!-- Standard gray button with gradient -->
	<a href="" class="btn btn-default"><span class="glyphicon glyphicon-cog"></span> Options</a>
	<a href="{{ route('roles.create') }}" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> New</a>

</div>

<div class="table-responsive">
	<table id="roleTable" class="table table-striped table-condensed">
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th colspan="{{ $permissions->count() }}" style="text-align: center;">Permission to fully access:</th>
			</tr>
			<tr>
				<th>Title</th>
				@foreach($permissions as $permission)
					<th> <p class="with-tooltip" title="{{{ $permission->description }}}">{{{ $permission->display_name }}} </p></th>
				@endforeach
			</tr>
		</thead>
		<tbody>
			@foreach($roles as $role)
			
			<tr class="{{ $role->isAdmin ? 'warning' : '' }}" >
				<td><p class="with-tooltip" title="{{{ $role->description }}}"> {{ link_to_route('roles.show',$role->name, $role->id) }} </p></td>
				
				@foreach($permissions as $permission)

				<td>

					@if( $role->isAdmin )
						<span class="glyphicon glyphicon-ok"></span>
					
					@else
						<a href="{{ route( $permission->roles->contains( $role->id ) ? 'roles.removePerm' : 'roles.assignPerm', array( 'roleId' => $role->id, 'permId' => $permission->id ) ) }}" class="btn btn-sm {{ $permission->roles->contains( $role->id ) ? 'btn-success' : 'btn-default' }}" ><span class="glyphicon glyphicon-ok"></span></a>
				
					@endif
					
				</td>
				@endforeach
			
			</tr>

			@endforeach
		</tbody>
	</table>
</div>
@stop