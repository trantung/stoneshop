@extends('layouts.frontend.header')
@section('content')
	<div class="container">
		<div class="row it_content">
        @if($sub_cates->first() !=null)
            <div class="col-md-2" id="leftCol" style="margin-left:-25px">
                <div class="well" style="margin-left:-5px"> 
                    <ul class="nav nav-stacked" id="sidebar">
                    @foreach($sub_cates->get() as $sub_cate)
                      <li><a href="{{route('frontend.category.detail', $sub_cate->id)}}">{{$sub_cate->name}}</a></li>
                      @endforeach
                    </ul>
                </div>
            </div>
        @endif  
            <div class="col-md-10">
                @foreach($products as $product)
                    <div class="col-xs-10 col-md-4 item">
                        <a href="{{route('frontend.detail', $product->id)}}">
                            <img src="{{asset('img/products'),'/', $product->image_url}}" alt="{{$product->name}}" />
                            <h3>{{$product->name}}</h3>
                            <span class="price"><span class="amount">{{'<b>', $product->price, ' VND</b>'}}</span></span>
                        </a>
                        <div id="r1" class="rate_widget">
                            <div class="star_1 ratings_stars"></div>
                            <div class="star_2 ratings_stars"></div>
                            <div class="star_3 ratings_stars"></div>
                            <div class="star_4 ratings_stars"></div>
                            <div class="star_5 ratings_stars"></div>
                        </div>
                    </div>
                @endforeach 
            </div>
		</div><!-- End it-content-->
		<nav>
		</nav>
	</div>
	<div class="line"></div>
<script type="text/javascript">
    // This is the first thing we add ------------------------------------------
    $(document).ready(function() {
        
        $('.rate_widget').each(function(i) {
            var widget = this;
            var out_data = {
                widget_id : $(widget).attr('id'),
                fetch: 1
            };
            $.post(
                'ratings.php',
                out_data,
                function(INFO) {
                    $(widget).data( 'fsr', INFO );
                    set_votes(widget);
                },
                'json'
            );
        });
    
        $('.ratings_stars').hover(
            // Handles the mouseover
            function() {
                $(this).prevAll().andSelf().addClass('ratings_over');
                $(this).nextAll().removeClass('ratings_vote'); 
            },
            // Handles the mouseout
            function() {
                $(this).prevAll().andSelf().removeClass('ratings_over');
                // can't use 'this' because it wont contain the updated data
                set_votes($(this).parent());
            }
        );
        // This actually records the vote
        $('.ratings_stars').bind('click', function() {
            var star = this;
            var widget = $(this).parent();
            
            var clicked_data = {
                clicked_on : $(star).attr('class'),
                widget_id : $(star).parent().attr('id')
            };
            $.post(
                'ratings.php',
                clicked_data,
                function(INFO) {
                    widget.data( 'fsr', INFO );
                    set_votes(widget);
                },
                'json'
            ); 
        });
    });

    function set_votes(widget) {

        var avg = $(widget).data('fsr').whole_avg;
        var votes = $(widget).data('fsr').number_votes;
        var exact = $(widget).data('fsr').dec_avg;
        
        $(widget).find('.star_' + avg).prevAll().andSelf().addClass('ratings_vote');
        $(widget).find('.star_' + avg).nextAll().removeClass('ratings_vote'); 
        $(widget).find('.total_votes').text( votes + ' votes recorded (' + exact + ' rating)' );
    }
 </script>
@stop