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
							<li><a href="{{route('frontend.index')}}">Trang Chủ</a></li>
							<li><a href="http://demo2.woothemes.com/mystile/shop/">Categories</a>
								<ul class="dropdown-menu">
									@foreach($categories as $category)
										<li><a href="{{route('frontend.category.detail',$category->id)}}">{{$category->name}}</a></li>
									@endforeach
								</ul>
							</li>
							<li><a href="{{route('frontend.blog')}}">Bài viết</a></li>
							<li><a href="{{route('frontend.aboutUs')}}">Liên hệ</a></li>
						</ul>
					</nav>
		  		</div>
		  		<div class="col-xs-12 col-md-4">
			      	<form role="search" method="get" class="searchform" action="http://demo2.woothemes.com/mystile/">
							 <div class="input-group">
						      <input type="text" class="form-control" placeholder="Tìm kiếm" size="20">
						      <span class="input-group-btn">
						        <button class="btn btn-default" type="button">Tìm kiếm</button>
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