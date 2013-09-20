<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    
    <title> @section('title')
  Welcome to iVote | Please Sign in @show</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @section('stylesheets')
    {{ basset_stylesheets('main') }}
    @show

    <style>
    body {
		  padding-top: 40px;
		  padding-bottom: 40px;
		  background-color: #eee;
		}

		.form-signin {
		  max-width: 330px;
		  padding: 15px;
		  margin: 0 auto;
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
		  margin-bottom: 10px;
		}
		.form-signin .checkbox {
		  font-weight: normal;
		}
		.form-signin .form-control {
		  position: relative;
		  font-size: 16px;
		  height: auto;
		  padding: 10px;
		  -webkit-box-sizing: border-box;
		     -moz-box-sizing: border-box;
		          box-sizing: border-box;
		}
		.form-signin .form-control:focus {
		  z-index: 2;
		}
		.form-signin input[type="text"] {
		  margin-bottom: -1px;
		  border-bottom-left-radius: 0;
		  border-bottom-right-radius: 0;
		}
		.form-signin input[type="password"] {
		  margin-bottom: 10px;
		  border-top-left-radius: 0;
		  border-top-right-radius: 0;
		}
		</style>
    
    @section('headScripts')
    {{-- HTML5 shim IE8 support of HTML5 elements and media queries --}}
    <!--[if lt IE 9]>
      {{ basset_javascripts('ltie9') }}  
    <![endif]-->
    @show
  
  </head>

  <body class="{{ str_replace('/', ' ', Request::path()) }}">

    <div class="container">

      {{-- Main Page Content --}}
      <div class="row">

        <div class="col-md-12">

        	{{ Form::open( array( 'url' => 'login', 'method' => 'POST', 'class' => 'form-signin' ) ) }}
						{{ Notification::showSuccess() }}
						{{ Notification::showWarning() }}
						
		        <h2 class="form-signin-heading">Please sign in</h2>

		        {{ Form::text('username', '', array( 'class' => 'form-control', 'placeholder' => 'Your username', 'autofocus' ) ) }}
		        {{ Form::password('password', array( 'class' => 'form-control', 'placeholder' => 'Password') ) }}

		      	{{ Form::submit('Sign in', array( 'class' => 'btn btn-lg btn-primary btn-block' ) ) }}

		      {{ Form::close() }}

        </div>
      </div>

    </div>

    {{-- Footer Part --}}
    @include('layouts.footer')

    @section('scripts')
    {{-- Javascript assets here. --}}
    {{ basset_javascripts('main') }}
    
    @show

  </body>
</html>