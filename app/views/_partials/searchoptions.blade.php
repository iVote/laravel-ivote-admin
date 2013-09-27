<div class="row show-grid">

	<div class="col-md-7">

		{{ Form::open( array( 'method' => 'get', 'class' => 'form-inline' ) ) }}

			<div class="input-group">

				{{ Form::text( 'search', Input::get('search' , '') , array( 'class' => 'form-control', 'placeholder' => ViewHelper::getSearchPlaceHolderValue(), 'autofocus' )) }}

				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span></button>
				</span>

		    </div>

		{{ Form::close() }}

	</div>

	<div class="col-md-5">

		<div class="pull-right">
			<!-- Standard gray button with gradient -->
			<a href="" class="btn btn-default"><span class="glyphicon glyphicon-cog"></span> Options</a>
			<a href="#" class="btn btn-default"><span class="glyphicon glyphicon-upload"></span> Upload From File</a>
			<a href="{{ route( ViewHelper::getRoute() . '.create' ) }}" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> New</a>

		</div>

	</div>

</div>