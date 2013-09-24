@extends('layouts.master')

@section('contents')

	{{ link_to_route( 'groups.index', '&lsaquo; Back' ) }}

	{{ Notification::showSuccess() }}

	<div class="row">
		<div class="col-md-9">
			<h3>Group information</h3>

			<dl class="dl-horizontal">
				<dt> Name: </dt> <dd> {{{ $group->name }}} </dd>
			</dl>

			<dl class="dl-horizontal">
				<dt> Short Description: </dt> <dd> {{{ $group->short_description }}} </dd>
			</dl>

			<dl class="dl-horizontal">
				<dt> Position/s: </dt> 
				@foreach ($group->positions as $position)
					<dd> {{{ $position->title }}} </dd> 
				@endforeach
			</dl>

		</div>

		<div class="col-md-3">
				<h4>Operations:</h4>
				<p>{{ link_to_route( 'groups.edit', 'Edit Group', $group->id, array( 'class' => 'btn btn-link' )) }}</p>
				<p>{{ link_to_route( 'groups.delete', 'Remove Group', $group->id, array( 'class' => 'btn btn-danger' )) }}</p>
		</div>
	</div>
@stop