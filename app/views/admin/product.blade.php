@extends('layouts.admin.header')

@section('content')
<div class="manage-menu">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-7.5">
			{{ link_to_route('product.get.create', $title = 'Create New Product',null, array("class"=>"btn btn-info", "role"=>"button")) }}
		</div>
		<div class="col-xs-12 col-sm-6 col-md-1.5">
			<span>Select category: </span>
		</div>
	  	<div class="col-xs-6 col-md-4">
	  	{{Form::open(array("route"=>array('admin.product.get.search'),"class"=>"form-horizontal", 'method'=>"GET"))}}
	  	<div class="row">
	  			<div class="col-sm-10">
				<select class="form-control" name="category">
					<option selected="true">....</option>
					@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
					@endforeach
				</select>
				</div>
		        <div class="col-sm-2">
		        	{{Form::submit('Search',array('class'=>'btn btn-primary'))}}
		        </div>
	  	</div>
			
		{{Form::close()}}
	  	</div>
	</div>
	<table class="table table-hover" style="margin-top: 10px;">
	    <tr>
	        <th>NAME</th>
	        <th>PRICE</th>
	        <th>CATEGORY</th>
	        <th>DESCRIPTION</th>
	        <th>RATE</th>
	        <th>IMAGE</th>
	        <th>ACTION</th>
	    </tr>
	    @foreach($products as $product)
	    	<?php 
	    		$image = 'nothumnail.jpg';
	    		if($product->image_url != null){
	    			$image = $product->image_url;
	    		}
	    	?>
	    	<tr>
	        <td>{{$product->name}}</td>
	        <td>{{$product->price}}</td>
	        <td>{{$product->category->name}}</td>
	        <td>{{$product->description}}</td>
	        <td>{{$product->average_rate . '/5'}}</td>
	        <td>
	        	<img src="{{asset('img/products').'/'.$image}}" class="img-rounded compress" alt="Rounded Image" />
	        	{{-- <img src="{{asset('img/images1.jpg')}}" class="img-roundedd image" alt="Rounded Image" /> --}}
	        </td>
	        <td>
	            <div style=" display: table" >
	            <div style = "display: table-cell;  vertical-align: top;">
	                {{ link_to_route('product.get.edit','Edit',$product->id, array("class"=>"btn btn-warning", "role"=>"button")) }}
	            </div>
	                {{Form::open(array("route"=>array('product.delete',$product->id),"class"=>"form-horizontal","style"=>"display: table-cell"))}}
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
	<nav>
	  {{$products->appends(array('product' => $name))->links()}}
	</nav>
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
