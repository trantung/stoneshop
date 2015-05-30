@extends('layouts.admin.header')

@section('content')
<div class="manage-menu">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-7.5">
			{{ link_to_route('shop.get.create', $title = 'Create New Shop',null, array("class"=>"btn btn-info", "role"=>"button")) }}
		</div>
	</div>
	<table class="table table-hover" style="margin-top: 10px;">
	    <tr>
	    	<th>USER NAME</th>
	        <th>SHOP NAME</th>
	        <th>DESCRIPION</th>
	        <th>TEL</th>
	        <th>MOBILE</th>
	        <th>ADDRESS</th>
	        <th>LAT</th>
	        <th>LONG</th>
	        <th>IMAGE</th>
	        <th>ACTION</th>
	    </tr>
	    @foreach($shops as $shop)
	    	<?php 
	    		$image = 'nothumnail.jpg';
	    		if($shop->image_url != null){
	    			$image = $shop->image_url;
	    		}
	    	?>
	    	<tr>
	        <td>{{$shop->user->first_name,'&nbsp;', $shop->user->last_name}}</td>
	        <td>{{$shop->name}}</td>
	        <td>{{$shop->description}}</td>
	        
	        <td>{{$shop->tel}}</td>
	        <td>{{$shop->mobile}}</td>
	        <td>{{$shop->address}}</td>
	        <td>{{$shop->lat}}</td>
	        <td>{{$shop->long}}</td>
	        <td>
	        	<div>
	        		<img src="{{asset('img').'/'.$image}}" class="img-rounded compress" alt="Rounded Image" />
	        		{{-- <img src="{{asset('img/images1.jpg')}}" class="img-roundedd image" alt="Rounded Image" /> --}}
	        	</div>
	        </td>
	        <td>
	            <div style=" display: table" >
	            <div style = "display: table-cell;  vertical-align: top;">
	                {{ link_to_route('shop.get.edit','Edit',$shop->id, array("class"=>"btn btn-warning", "role"=>"button")) }}
	            </div>
	                {{Form::open(array("route"=>array('shop.delete',$shop->id),"class"=>"form-horizontal","style"=>"display: table-cell"))}}
	                    <div class="form-group">
	                        <div class="col-sm-10 col-sm-offset-2">
	                            {{Form::submit('Xoá',array('class'=>'btn btn-danger'))}}
	                        </div>
	                    </div>
	                {{Form::close()}}

	            </div>
	        </td>
	      </tr>
		@endforeach
	</table>
</div>
<script type="text/javascript">
	$(".compress").hover(function(){
  	$(".image").show();

},
function(){
   $(".image").hide()
}
);
</script>
@stop
