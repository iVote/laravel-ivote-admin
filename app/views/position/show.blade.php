@extends('layouts.master')

@section('contents')

	{{ link_to_route( 'users.index', '&lsaquo; Back' ) }}

	{{ Notification::showSuccess() }}

	<div class="row">
		<div class="col-md-9">
			<h3>Position information</h3>

			<dl class="dl-horizontal">
				<dt> Title: </dt> <dd> {{{ $position->title }}} </dd>
			</dl>

			<dl class="dl-horizontal">
				<dt> Short Description: </dt> <dd> {{{ $position->short_description }}} </dd>
			</dl>

			<dl class="dl-horizontal">
				<dt> Limit: </dt> <dd> {{{ $position->limit }}} </dd>
			</dl>

			<dl class="dl-horizontal">
				<dt> Is Group Dependent?: </dt> <dd> {{ $position->is_group_dependent ? "YES" : "NO" }} </dd>
			</dl>
		</div>

		<div class="col-md-3">
				<h4>Operations:</h4>
				<p>{{ link_to_route( 'positions.edit', 'Edit Position', $position->id, array( 'class' => 'btn btn-link' )) }}</p>
				<p>{{ link_to_route( 'positions.delete', 'Remove Position', $position->id, array( 'class' => 'btn btn-danger' )) }}</p>
		</div>
	</div>
@stop