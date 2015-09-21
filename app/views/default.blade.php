<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>{{ $page_title }}</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">

		<link rel="stylesheet" href="/media/admin/css/bootstrap.min.css">
		<style>
			body {
				padding-top: 50px;
				padding-bottom: 20px;
			}
		</style>
  
		<link rel="stylesheet" href="/media/website/stylesheets/app.css" />
		<script src="/media/website/bower_components/modernizr/modernizr.js"></script>
		<link rel="stylesheet" href="/media/admin/css/redactor.css">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>
	  <div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/da_DK/all.js#xfbml=1&appId=277051915757951";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<!--[if lt IE 7]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->
	
		<nav class="top-bar" data-topbar>
			<ul class="title-area">
				<li class="name">
					<h1><a href="/">CodeMadeBy.Me();</a></h1>
				</li>
				<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
				<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
			</ul>
		

			<section class="top-bar-section">
				<!-- Right Nav Section -->
				<ul class="right">
				  	@if(Auth::check())
				  		<li class="has-dropdown">
				  			<a href="/user/my_profile">
				  				<img src="{{ Gravatar::get_gravatar(Auth::user()->email, 20) }}">
						  		{{ Auth::user()->username }}
					  		</a>
					  		<ul class="dropdown">
					  			<li>
		  				  			<a href="/user/my_profile">
		  				  				Control Panel
		  					  		</a>
					  			</li>
					  			<li><a href="/logout">Logout</a></li>
					  		</ul>
				  		</li>
				  	@else
		  		  		<li class="has-dropdown">
		  		  			<a href="/login">Login</a>
		  			  		<ul class="dropdown">
		  			  			<li><a href="/register">Register</a></li>
		  			  		</ul>
		  		  		</li>
				  	@endif

				</ul>

				<!-- Left Nav Section -->
				<ul class="left">
					{{ $menu }}
					@if(Auth::check())
						@if(Auth::user()->role > 1)
							<li><a href="/admin">Admin</a></li>
						@endif
					@endif
				</ul>
			</section>
		</nav>
	

  	@yield('content')

	

	<div class="row">
		<div class="large-12 columns">
			<hr>
			<p>&copy; Company 2013</p>
		</div>
  	</div> <!-- /container -->        

		<script>window.jQuery || document.write('<script src="/js/jquery-1.10.1.min.js"><\/script>')</script>

		
	  
		<script src="/media/website/bower_components/jquery/dist/jquery.min.js"></script>
		<script src="/media/website/bower_components/foundation/js/foundation.min.js"></script>
		<script src="/media/website/js/app.js"></script>
	   

		<script type="text/javascript">
		$(function()
		{
			$('.redactor_content').redactor();
		});
		</script>

		<script>
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src='//www.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
		</script>
	</body>
</html>