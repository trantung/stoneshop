	<footer class="container-fluid">
		<a href="#"><img src="{{asset('img').'/logo.jpg'}}" alt="SHOP STONE" title="SHOP STONE"/></a>
		<div class="fb-like" data-href="{{Request::url()}}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
		<ul>
			<li><a href="{{route('frontend.index')}}">Trang chủ</a></li>
			<li><a href="{{route('frontend.blog')}}">Bài viết</a></li>
			<li class="last"><a href="{{route('frontend.aboutUs')}}"> Liên hệ</a></li>
		</ul>
	</footer>
</body>
</html>