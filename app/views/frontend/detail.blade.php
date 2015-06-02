@extends('layouts.frontend.header')

@section('content')
	
<!--Content-->
	<div class="row">
		<div class="it-detail">
			<div class="col-xs-6">
				<img src="{{asset('img/products'),'/',$product->image_url}}" alt="{{$product->name}}" />
					<div>
		<ul class="nav nav-tabs">
	    	<li class="active "><a data-toggle="tab" href="#description"><span class="glyphicon glyphicon-list-alt"></span>Chi Tiết</a></li>
	  	</ul>
	  	<div class="tab-content tab-content-cus">
		    <div id="description" class="tab-pane fade in active">
					<p>{{$product->description}}</p>
		    </div>
  		</div>
	</div>
			 </div>
			 <div class="col-xs-6">
				<h3>{{$product->name}}</h3>
				<span class="price"><span class="amount">{{$product->price}}</span></span>
				<div id="{{$product->id}}" class="rate_widget" rated="{{$product->average_rate}}">
                        <?php 
                            for($i = 1; $i<=5; $i++){
                                $divHtml="<div class='star_".$i." ratings_stars"; 
                                if($i<=round($product->average_rate)){
                                    $divHtml.=" ratings_vote'";
                                }
                                else{
                                    $divHtml.="'";
                                }
                                $divHtml.="></div>";
                                echo $divHtml;
                            }
                        ?>
				    </div>
			  	<hr />
			  	<span class="posted_in">
			  		Danh Mục:&nbsp;<a rel="tag" href="#">{{$product->category->name}}</a>
			  	</span>
			  	<br/>
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
	  e.preventDefault();
	  $(this).tab('show');
	})
</script>
<script type="text/javascript">
    // This is the first thing we add ------------------------------------------
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.ratings_stars').hover(
            // Handles the mouseover
            // var widget = $(this).parent();
            function() {
                $(this).prevAll().andSelf().addClass('ratings_over');
                $(this).nextAll().removeClass('ratings_vote'); 
            },
            // Handles the mouseout
            function() {
                $(this).prevAll().andSelf().removeClass('ratings_over');
                var rated = $(this).parent().attr('rated');
                set_votes($(this).parent().data('round', rated));
            }
        );

         $('.ratings_stars').bind('click', function() {
            var star = this;
            var widget = $(this).parent();
            var clicked_data = {
                clicked_on : $(star).attr('class'),
                widget_id : $(star).parent().attr('id')
            };
            $.ajax({
                url: "{{route('frontend.post.rating')}}",
                type: "POST",
                data: clicked_data
            }).done(function(data){
                widget.data( 'round', data );
                set_votes(widget);
            });
        });

    });

    function set_votes(widget) {
        var avg = $(widget).data('round');
        $(widget).find('.star_' + avg).prevAll().andSelf().addClass('ratings_vote');
        $(widget).find('.star_' + avg).nextAll().removeClass('ratings_vote'); 
    }
    // END FIRST THING
 </script>
@stop

