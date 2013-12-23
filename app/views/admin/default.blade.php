<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="/media/admin/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="/media/admin/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/media/admin/css/main.css">
        <link rel="stylesheet" href="/media/admin/css/redactor.css">

        <script src="/media/admin/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="/media/admin/js/redactor.js"></script>
        <script type="text/javascript">
        $(document).ready(
          function()
          {
            $('.redactor_content').redactor();
          }
        );
        </script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AnkerCMS</a>
        </div>
        @if(Auth::check() && Auth::user()->role >= 2)
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li @if(Request::is('admin')) class="active" @endif ><a href="/admin">Dashboard</a></li>
            <li @if(Request::is('admin/pages')) class="active" @endif ><a href="/admin/pages">Pages</a></li>
            <li @if(Request::is('admin/blogs')) class="active" @endif ><a href="/admin/blogs">Blog</a></li>
            <li @if(Request::is('admin/users')) class="active" @endif ><a href="/admin/users">Users</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          @endif
          @if(Auth::check())
          <img class="navbar-text navbar-right" src="{{ Gravatar::get_gravatar(Auth::user()->email, 20) }}">
          <p class="navbar-text navbar-right">Logged in as: {{ Auth::user()->username }}</p>
         <!--  <button type="submit" class="btn btn-danger navbar-btn btn-sm navbar-right">Logout</button> -->
          <a href="/logout" class="btn btn-danger navbar-btn btn-sm navbar-right">Logout</a>
          @else
          <p class="navbar-text navbar-right">Not Logged in</p>
          @endif
          
          
        </div><!--/.navbar-collapse -->
      </div>
    </div>

  	@yield('content')

	<div class="container">
      <hr>
      <footer>
        <p>&copy; Company 2013</p>
      </footer>
    </div> <!-- /container -->        

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="/media/admin/js/bootstrap.min.js"></script>

        <script src="/media/admin/js/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
