@extends('layouts.frontend.header')

@section('content')
	<center><h3>Welcome to my blog!</h3></center>

<div class="row">
	<div class="col-xs-8">
		@foreach($blogs as $blog)
			<div class="row">
				<div class="col-xs-4 col-sm-3">
					<div class="post-meta">
						<a href="http://demo2.woothemes.com/mystile/author/wooadmin/">
						<img class="img-circle" height="128" width="128" srcset="{{asset('img/nothumnail.jpg')}}" alt="">
						</a>
						<span class="month">{{date('M', strtotime($blog->created_at))}}</span>
						<span class="day">{{date('d', strtotime($blog->created_at))}}</span>
						<span class="year">{{date('Y', strtotime($blog->created_at))}}</span>
					</div>
				</div>
				<div class="col-xs-8 col-sm-9">
				<img src="{{asset('img/blogs/'), '/', $blog->image_url}}" alt="Image in a post"  title="Image in a post" class="thumbnail">
				<h1>
					<a href="#" rel="bookmark" title="Sed tincidunt augue et nibh">{{$blog->title}}</a>
				</h1>
					<p>
						{{$blog->description;}}
					</p>
					<div class="line-space">&nbsp;</div>
			</div>
		@endforeach
	</div>
	<nav class="paginate">
		  <nav>
		  {{$blogs->appends(array('blog' => $title))->links()}}
		</nav>
	</nav>
	</div>
	<div class="col-xs-4">
	<!--
		<ul class="nav nav-tabs">
		    <li class="active"><a href="#tab1" data-toggle="tab">Lastest</a></li>
		    <li><a href="#tab2" data-toggle="tab">Popular</a></li>
		     <li><a href="#tab3" data-toggle="tab">Comment</a></li>
  		</ul>
  		<div class="tab-content lastest-comment">
		    <div class="tab-pane active" id="tab1">
		      	<ul>
					<li>
						<div class="row">
							<div class="col-xs-2">
								<a href="http://demo2.woothemes.com/mystile/2010/01/11/testing-the-elements/" title="Testing The Elements" class="post-meta">
									<img src="http://farm3.static.flickr.com/2583/4131104704_31fb82ce85_b.jpg" alt="Testing The Elements" width="45" height="45" title="Testing The Elements">
								</a>
							</div>
							<div class="col-xs-10">
								<a title="Testing The Elements" href="http://demo2.woothemes.com/mystile/2010/01/11/testing-the-elements/">
									Lastest 1
								</a>
							<span class="meta">January 11, 2010</span>
						</div>
						</div>

					</li>

					<li>
						<div class="row">
							<div class="col-xs-2">
								<a href="http://demo2.woothemes.com/mystile/2010/01/11/testing-the-elements/" title="Testing The Elements" class="post-meta">
									<img src="http://farm3.static.flickr.com/2583/4131104704_31fb82ce85_b.jpg" alt="Testing The Elements" width="45" height="45" title="Testing The Elements">
								</a>
							</div>
							<div class="col-xs-10">
								<a title="Testing The Elements" href="http://demo2.woothemes.com/mystile/2010/01/11/testing-the-elements/">
									Lastest 2
								</a>
							<span class="meta">January 11, 2010</span>
						</div>
						</div>
					</li>
				</ul>
		    </div>
		    <div class="tab-pane" id="tab2">
		      <ul class="popular">
					<li>
						<div class="row">
							<div class="col-xs-2">
								<a href="http://demo2.woothemes.com/mystile/2010/01/11/testing-the-elements/" title="Testing The Elements" class="post-meta">
									<img src="http://farm3.static.flickr.com/2583/4131104704_31fb82ce85_b.jpg" alt="Testing The Elements" width="45" height="45" title="Testing The Elements">
								</a>
							</div>
							<div class="col-xs-10">
								<a title="Testing The Elements" href="http://demo2.woothemes.com/mystile/2010/01/11/testing-the-elements/">
									Popular 1
								</a>
							<span class="meta">January 11, 2010</span>
						</div>
						</div>
						
					</li>

					<li>
						<div class="row">
							<div class="col-xs-2">
								<a href="http://demo2.woothemes.com/mystile/2010/01/11/testing-the-elements/" title="Testing The Elements" class="post-meta">
									<img src="http://farm3.static.flickr.com/2583/4131104704_31fb82ce85_b.jpg" alt="Testing The Elements" width="45" height="45" title="Testing The Elements">
								</a>
							</div>
							<div class="col-xs-10">
								<a title="Testing The Elements" href="http://demo2.woothemes.com/mystile/2010/01/11/testing-the-elements/">
									Popular 2
								</a>
							<span class="meta">January 11, 2010</span>
						</div>
						</div>
					</li>
				</ul>
		    </div>
		    <div class="tab-pane" id="tab3">
		      <ul class="popular">
					<li>
						<div class="row">
							<div class="col-xs-2">
								<a href="http://demo2.woothemes.com/mystile/2010/01/11/testing-the-elements/" title="Testing The Elements" class="post-meta">
									<img src="http://farm3.static.flickr.com/2583/4131104704_31fb82ce85_b.jpg" alt="Testing The Elements" width="45" height="45" title="Testing The Elements">
								</a>
							</div>
							<div class="col-xs-10">
								<a title="Testing The Elements" href="http://demo2.woothemes.com/mystile/2010/01/11/testing-the-elements/">
									Comment 1
								</a>
							<span class="meta">January 11, 2010</span>
						</div>
						</div>
						
					</li>

					<li>
						<div class="row">
							<div class="col-xs-2">
								<a href="http://demo2.woothemes.com/mystile/2010/01/11/testing-the-elements/" title="Testing The Elements" class="post-meta">
									<img src="http://farm3.static.flickr.com/2583/4131104704_31fb82ce85_b.jpg" alt="Testing The Elements" width="45" height="45" title="Testing The Elements">
								</a>
							</div>
							<div class="col-xs-10">
								<a title="Testing The Elements" href="http://demo2.woothemes.com/mystile/2010/01/11/testing-the-elements/">
									Comment 2
								</a>
							<span class="meta">January 11, 2010</span>
						</div>
						</div>
					</li>
				</ul>
		    </div>
  		</div>
  	-->
	</div>

</div>
@stop