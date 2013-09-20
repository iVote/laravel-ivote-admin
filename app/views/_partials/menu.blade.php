<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ url('/') }}">iVote</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="{{ url('/') }}"><span class="glyphicon glyphicon-dashboard"></span> Dashboard</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-check"></span> Election</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Maintenance <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Members</a></li>
          <li><a href="#">Member Groups</a></li>
          <li><a href="#">Positions</a></li>
          <li><a href="#">Candidates</a></li>
        </ul>
      </li>
      <li><a href="#"><span class="glyphicon glyphicon-file"></span> Reports</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Accounts <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="{{ route('users.index') }}">User Accounts</a></li>
          <li><a href="{{ route('roles.index') }}">User Roles</a></li>
        </ul>
      </li>
      <li><a href="#"><span class="glyphicon glyphicon-wrench"></span> Settings</a></li>
    </ul>

  </div><!-- /.navbar-collapse -->

</nav>