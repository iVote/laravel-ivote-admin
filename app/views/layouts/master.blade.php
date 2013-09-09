<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    
    <title> @section('title')
  Administrator | iVote @show</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @section('stylesheets')
    {{ basset_stylesheets('main') }}
    @show
    
    @section('headScripts')
    {{-- HTML5 shim IE8 support of HTML5 elements and media queries --}}
    <!--[if lt IE 9]>
      {{ basset_javascripts('ltie9') }}  
    <![endif]-->
    @show
  
  </head>

  <body>

    <div class="container">
      {{-- Header Part --}}
      <div class="row">
        <div class="col-md-12">
          @include('layouts.top')      
        </div>
      </div>
    
      {{-- Main Page Content --}}
      <div class="row">
        <div class="col-md-12">
          @yield('contents')    
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