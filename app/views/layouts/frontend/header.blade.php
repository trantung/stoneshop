<!DOCTYPE html>
<html>
<head>
	<title>{{$title}}</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{asset('public/bootstrap-3.3.4-dist/css/bootstrap.min.css')}}">

<!-- Optional theme -->
<link rel="stylesheet" href="{{asset('public/bootstrap-3.3.4-dist/css/bootstrap-theme.min.css')}}">
<link rel="stylesheet" href="{{asset('public/css/custom.css')}}">

<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript" src="{{asset('public/bootstrap-3.3.4-dist/js/jquery.js')}}"></script>
<script src="{{asset('public/bootstrap-3.3.4-dist/js/bootstrap.min.js')}}"></script>
 <script src="{{asset('public/js/jquery-latest.js')}}"></script>
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
		  	<div class="row">
		      <div class="col-xs-12 col-md-3">
					<a href="{{route('frontend.index')}}">
						@if(!is_null($logo))
						<img src="{{asset('public/img/headers').'/'.$logo}}" alt="Logo" style="width: 200px;height: 60px;margin-top: 10px; margin-bottom: 10px">
						@endif
					</a>
				</div>
		  		<div class="col-xs-6 col-md-5">
		  			<nav class="navbar row right-menu">
						<ul class="nav navbar-nav">
						  <li><a href="{{route('frontend.index')}}">Trang Chủ</a></li>
						  <li class="dropdown" id="menu1">
						    <a class="dropdown-toggle" data-toggle="dropdown" href="{{route('frontend.index')}}">
						      Categories
						      <b class="caret"></b>
						    </a>
						    <ul class="dropdown-menu">

						 	@foreach($categories as $category)
								<li>
									<a href="{{route('frontend.category.detail',$category->id)}}">{{$category->name}}
									@if(!$category->getSubCategory()->isEmpty())
									<b class="caret-right"></b>
							      <!-- In sub Category-->
								        <ul class="dropdown-menu">
									        @foreach($category->getSubCategory() as $sub_category)
									          <li>
												<a href="{{route('frontend.category.detail',$sub_category->id)}}">
												{{$sub_category->name}}
												</a>
											</li>
									        @endforeach
								        </ul>
							       <!-- end Category -->
							       @else
							       	{{''}}
									@endif
									</a>
								</li>
							@endforeach
							</ul>
						<li><a href="{{route('frontend.blog')}}">Bài viết</a></li>
						<li><a href="{{route('frontend.aboutUs')}}">Liên hệ</a></li>
						</ul>
					</nav>
		  		</div>
		  		<div class="col-xs-12 col-md-4">
			      	<form role="search" method="get" class="searchform" action="{{route('frontend.search')}}">
							 <div class="input-group">
						      <input name ="product" type="text" class="form-control" placeholder="Tìm kiếm" size="20">
						      <span class="input-group-btn">
						        <button class="btn btn-default" type="submit">Tìm kiếm</button>
						      </span>
						    </div><!-- /input-group -->
					</form>
				</div>
			</div>
			<div class="line-space">&nbsp;</div>
			 <div class="row hidden-sm banner " >
				@if(!is_null($header))
			  	<img src="{{asset('public/img/headers'),'/'.$header}}" alt="" style="height: 250px;margin-top: 15px;margin-bottom: 0px">
				<div class="description">
					<h1>
						<span>Welcome to our store</span>
					</h1>
					<p>
						Stone shop!
					</p>
				@endif
			</div><!--Banner-->
			</div>
		</div><!-- end Header -->
		<div class="line-space">&nbsp;</div>
		@yield('content')
@include('layouts.frontend.footer')