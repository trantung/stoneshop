	<hr />
	<footer class="container-fluid">
	<div class="row">
	  <div class="col-md-6">
			<div>
			  	<a href="#">
			  		@if(!is_null($footer))
			  		<img src="{{asset('public/img/headers').'/'.$footer}}" alt="SHOP STONE" title="SHOP STONE"/>
			  		@endif
			  	</a>
			</div>
			<div class="fb-like fb-cus" data-href="{{Request::url()}}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true">
			</div>
	  	</div>
	  <div class="col-md-4">
		  <b>
		  	Thông tin liên hệ:
		  </b>
		  <span>Anh Hùng<br/>Điện thoại:094-999-8587</span>
	  </div>
	</div>
	</footer>
</body>
</html>