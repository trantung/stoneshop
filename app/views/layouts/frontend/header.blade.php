<!DOCTYPE html>
<html>
<head>
	<title>{{$title}}</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{asset('bootstrap-3.3.4-dist/css/bootstrap.min.css')}}">

<!-- Optional theme -->
<link rel="stylesheet" href="{{asset('bootstrap-3.3.4-dist/css/bootstrap-theme.min.css')}}">
<link rel="stylesheet" href="{{asset('css/custom.css')}}">

<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript" src="{{asset('bootstrap-3.3.4-dist/js/jquery.js')}}"></script>
<script src="{{asset('bootstrap-3.3.4-dist/js/bootstrap.min.js')}}"></script>
 <script src="{{asset('js/jquery-latest.js')}}"></script>
		<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.3";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
</head>
<body>
<div id="fb-root"></div>
	<div class="container">
		<!-- Header -->
		<div> 
		  	<div class="row line-space">
		      <div class="col-xs-12 col-md-3">
			      <hgroup>
					<h1 class="site-title">
						<a href="{{route('frontend.index')}}">LOGO</a>
					</h1>
					</hgroup>
				</div>
		  		<div class="col-xs-6 col-md-5">
		  			<nav class="navbar row right-menu">
						<ul class="nav navbar-nav">
							<li><a href="{{route('frontend.index')}}">Home</a></li>
							<li><a href="http://demo2.woothemes.com/mystile/shop/" class="glyphicon glyphicon-menu-down">Shop</a>
								<ul class="dropdown-menu">
									<li><a href="{{route('frontend.index')}}">T-Shirts</a></li>
									<li><a href="{{route('frontend.index')}}">Outerwear</a></li>
									<li><a href="{{route('frontend.index')}}">Shoes</a></li>
									<li><a href="{{route('frontend.index')}}">Hats</a></li>
									<li><a href="{{route('frontend.index')}}">Accessories</a></li>
									<li><a href="h{{route('frontend.index')}}">Bags</a></li>
								</ul>
							</li>
							<li><a href="{{route('frontend.blog')}}">Blog</a></li>
						</ul>
					</nav>
		  		</div>
		  		<div class="col-xs-12 col-md-4">
			      	<form role="search" method="get" class="searchform" action="http://demo2.woothemes.com/mystile/">
							 <div class="input-group">
						      <input type="text" class="form-control" placeholder="Search for..." size="20">
						      <span class="input-group-btn">
						        <button class="btn btn-default" type="button">Go!</button>
						      </span>
						    </div><!-- /input-group -->
					</form>
				</div>
			</div>
			 <div class="row hidden-sm banner ">
			  	<img src="{{asset('img/banner.jpg')}}" alt="">
				
				<div class="description">
					<h1>
						<span>Welcome to our store</span>
					</h1>
					<p>
						Stone shop!
					</p>
				</div>
			</div><!--Banner-->
		</div><!-- end Header -->
		<div class="line-space">&nbsp;</div>
		@yield('content')
@include('layouts.frontend.footer')