<meta name="csrf-token" content="{{ csrf_token() }}" />
@extends('layouts.frontend.header')
@section('content')


	<div class="container">
		<!-- Header -->
		<!--Content-->
		<div class="row it_content">

			@foreach($products as $product)
				<div class="col-xs-12 col-md-3 item">
				    <a href="{{route('frontend.detail', $product->id)}}">
						<img src="{{asset('img/products').'/'. $product->image_url}}" alt="{{$product->name}}" />
						<h3>{{$product->name}}</h3>
						<span class="price"><span class="amount">{{'<b>', $product->price, ' VND</b>'}}</span></span>
					</a>
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
				</div>
			@endforeach
		</div><!-- End it-content-->
		<nav>
		  {{$products->appends(array('product' => $name))->links()}}
		</nav>
	</div>
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