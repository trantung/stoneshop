@extends('layouts.frontend.header')

@section('content')
<div class="container">
	

	<center><h3>Welcome to my blog!</h3></center>

<div class="row">
	<div class="col-xs-8">
		@foreach($blogs as $blog)
			<div class="row">
				<div class="col-xs-4 col-sm-3">
					<div class="post-meta">
						<a href="http://demo2.woothemes.com/mystile/author/wooadmin/">
						<img class="img-circle" height="128" width="128" srcset="{{asset('public/img/nothumnail.jpg')}}" alt="">
						</a>
						<span class="month">{{date('M', strtotime($blog->created_at))}}</span>
						<span class="day">{{date('d', strtotime($blog->created_at))}}</span>
						<span class="year">{{date('Y', strtotime($blog->created_at))}}</span>
					</div>
				</div>
				<div class="col-xs-8 col-sm-9">
				<img src="{{asset('public/img/blogs/'), '/', $blog->image_url}}" alt="Image in a post"  title="Image in a post" class="thumbnail">
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
</div>
</div>
@stop