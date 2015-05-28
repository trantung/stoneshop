@extends('layouts.frontend.header')

@section('content')
	
<!--Content-->
		<div class="row">
			<div class="it-detail">
				<div class="col-xs-6">
				    <a href="http://demo2.woothemes.com/mystile/shop/castillo-cap/">
						<img src="{{asset('img/images.jpg" alt="castillo')}}" />
					</a>
				 </div>
				 <div class="col-xs-6">
					<a href="http://demo2.woothemes.com/mystile/shop/castillo-cap/">
						<h3>Stone 1</h3>
						<span class="price"><span class="amount">$55.00</span></span>
					</a>

					<div class="rate_widget">
				        <div class="star_1 ratings_stars"></div>
				        <div class="star_2 ratings_stars"></div>
				        <div class="star_3 ratings_stars"></div>
				        <div class="star_4 ratings_stars"></div>
				        <div class="star_5 ratings_stars"></div>
				    </div>
				    <p class="it-info">
						

	Etiam lobortis dolor eros. Sed sodales imperdiet dapibus. Maecenas faucibus urna sed turpis lacinia consectetur. Mauris at bibendum nibh. Maecenas non lorem nec neque imperdiet mattis ac eu purus. Quisque id tellus ut.

	Ante faucibus interdum eget eu erat. Proin nisl purus, feugiat sit amet luctus in, malesuada sodales risus.

					</p>
				  	<hr />
				  	<span class="posted_in">
				  		Category:&nbsp;<a rel="tag" href="#">Hats</a>
				  	</span>
				  	<span class="posted_in">
				  		Tag as:&nbsp;<a rel="tag" href="#">Demo</a>
				  	</span>
				 </div>	
			</div>

		</div>
	<div>
		<ul class="nav nav-tabs">
	    	<li class="active "><a data-toggle="tab" href="#description"><span class="glyphicon glyphicon-list-alt"></span>Description</a></li>
	    	<li><a data-toggle="tab" href="#reviews"><span class="glyphicon glyphicon-thumbs-up"></span>Reviews(2)</a></li>
	  	</ul>

  <div class="tab-content tab-content-cus">
    <div id="description" class="tab-pane fade in active">
      	<h2>Product Description</h2>
		<p>Etiam lobortis dolor eros. Sed sodales imperdiet dapibus. Maecenas faucibus urna sed turpis lacinia consectetur. Mauris at bibendum nibh. Maecenas non lorem nec neque imperdiet mattis ac eu purus. Quisque id tellus ut.</p>
		<p>Ante faucibus interdum eget eu erat. Proin nisl purus, feugiat sit amet luctus in, malesuada sodales risus.</p>
    </div>
    <div id="reviews" class="tab-pane fade">
    	<h2>2 reviews for Product</h2>
      	<div class="row comment">
		  <div class="col-xs-6 col-md-1">
		  <img  class="avatar" src="http://0.gravatar.com/avatar/474c221beb60d1d21b65269ce527cd86?s=60&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D60&amp;r=G" alt="supercooltest@aol.com">
		  </div>
		  <div class="col-xs-6 col-md-9">
		  	<strong class="glyphicon glyphicon-user">Super</strong>
		  	 <time datetime="2012-08-31T00:18:27+00:00" itemprop="datePublished">August 31, 2012</time>:
		  	 <p>this is a cool, no, super cool test review</p> 
		  </div>
		  <div class="col-xs-6 col-md-2">
		  	<div id="r1" class="rate_widget">
		        <div class="star_1 ratings_stars ratings_over"></div>
		        <div class="star_2 ratings_stars ratings_over"></div>
		        <div class="star_3 ratings_stars ratings_over"></div>
		        <div class="star_4 ratings_stars"></div>
		        <div class="star_5 ratings_stars"></div>
		    </div>
		  </div>
		</div>

		<div class="row comment">
		  <div class="col-xs-6 col-md-1">
		  <img  class="avatar" src="http://0.gravatar.com/avatar/474c221beb60d1d21b65269ce527cd86?s=60&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D60&amp;r=G" alt="supercooltest@aol.com">
		  </div>
		  <div class="col-xs-6 col-md-9">
		  	<strong class="glyphicon glyphicon-user">Super</strong>
		  	 <time datetime="2012-08-31T00:18:27+00:00" itemprop="datePublished">August 31, 2012</time>:
		  	 <p>this is a cool, no, super cool test review</p> 
		  </div>
		  <div class="col-xs-6 col-md-2">
		  	<div id="r1" class="rate_widget">
		        <div class="star_1 ratings_stars ratings_over"></div>
		        <div class="star_2 ratings_stars ratings_over"></div>
		        <div class="star_3 ratings_stars ratings_over"></div>
		        <div class="star_4 ratings_stars"></div>
		        <div class="star_5 ratings_stars"></div>
		    </div>
		  </div>
		</div>
		<div class=" line-space"></div>
		<div class="form-comment">
			<form class="form-horizontal" role="form" method="post" action="index.php">
			    <div class="form-group">
			        <label for="name" class="col-sm-2 control-label">Name</label>
			        <span class="required">*</span>
			        <div class="col-sm-10">
			            <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
			        </div>
			    </div>
			    <div class="form-group">
			        <label for="email" class="col-sm-2 control-label">Email</label>
			        <span class="required">*</span>
			        <div class="col-sm-10">
			            <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
			        </div>
			    </div>
			    <div class="form-group">
			        <label for="message" class="col-sm-2 control-label">Message</label>
			        <div class="col-sm-10">
			            <textarea class="form-control" rows="4" name="message"></textarea>
			        </div>
			    </div>
			    <div class="form-group">
			        <label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
			        <div class="col-sm-10">
			            <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
			        </div>
			    </div>
			    <div class="form-group">
			        <div class="col-sm-10 col-sm-offset-2">
			            <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
			        </div>
			    </div>
			    <div class="form-group">
			        <div class="col-sm-10 col-sm-offset-2">
			            <! Will be used to display an alert to the user>
			        </div>
			    </div>
			</form>
		</div>
    </div>

  </div>

	</div>
	</div>


	<script>
	$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})
</script>
@stop

