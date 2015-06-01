@extends('layouts.frontend.header')

@section('content')
	
<!--Content-->
	<div class="row">
		<div class="it-detail">
			<div class="col-xs-6">
				<img src="{{asset('img/products'),'/',$product->image_url}}"" alt="{{$product->name}}" />
			 </div>
			 <div class="col-xs-6">
				<h3>{{$product->name}}</h3>
				<span class="price"><span class="amount">{{$product->price}}</span></span>
				<div class="rate_widget">
			        <div class="star_1 ratings_stars"></div>
			        <div class="star_2 ratings_stars"></div>
			        <div class="star_3 ratings_stars"></div>
			        <div class="star_4 ratings_stars"></div>
			        <div class="star_5 ratings_stars"></div>
			    </div>
			    <p class="it-info">
			    <?php 
			    	// $pos=strpos($product->description, ' ', 40);
					// $description = substr($product->description,0,$pos );
			    ?>
					{{$product->description}} 			    	
				</p>
			  	<hr />
			  	<span class="posted_in">
			  		Category:&nbsp;<a rel="tag" href="#">{{$product->category->name}}</a>
			  	</span>
			 </div>	
		</div>

	</div>
	<div>
		<ul class="nav nav-tabs">
	    	<li class="active "><a data-toggle="tab" href="#description"><span class="glyphicon glyphicon-list-alt"></span>Description</a></li>
	    	<li><a data-toggle="tab" href="#reviews">
	    		<span class="glyphicon glyphicon-thumbs-up">
	    			
	    		</span>Đánh giá(<span class="fb-comments-count" data-href="{{Request::url()}}"></span>)

	    		</a>
	    		</li>
	  	</ul>
	  	<div class="tab-content tab-content-cus">
		    <div id="description" class="tab-pane fade in active">
		      	<h2>Giới thiệu sản phẩm</h2>
				<p>
					{{$product->description}}
				</p>
		    </div>
		    <div id="reviews" class="tab-pane fade">

		    	<h2><span class="fb-comments-count" data-href="{{Request::url()}}"></span> reviews for Product</h2>
		      	
				<div class=" line-space"></div>
				<div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5" data-colorscheme="light"></div>
		    </div>
  		</div>
	</div>
	<h3>
		Sản phẩm liên quan
	</h3>
	<div class="row">

		@foreach($product_relates as $product_relate)
			<div class="col-xs-12 col-md-3 item">
			    <a href="{{route('frontend.detail', $product_relate->id)}}">
					<img src="{{asset('img/products'),'/', $product_relate->image_url}}" alt="{{$product_relate->name}}" />
			</div>
		@endforeach
	</div>
<script>
	$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})
</script>
@stop

