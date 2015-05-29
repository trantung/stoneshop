@extends('layouts.admin.header')

@section('content')

<div class="form-comment" style="margin-right:10%">

	{{Form::open(array("route"=>array('product.post.edit', $product->id),"class"=>"form-horizontal",'files'=>true))}}
	    <div class="form-group">
	        {{Form::label('lblName',"Name", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::text('name',$product->name, array('class'=>'form-control'))}}
	        </div>
	    </div>

	    <div class="form-group">
	        {{Form::label('lbImage',"Image", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::file('image', array('id'=>'imgInp'))}}
	        	<img src="{{asset('img').'/'.$product->image_url}}" class="img-rounded" alt="Cinque Terre" width="304" height="236" id="blah">
	        </div>
	    </div>
	     <div class="form-group">
	        	{{Form::label('lblDescript',"Description", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::textarea('description',$product->description, array('class'=>'form-control',"rows"=>6))}}
	        </div>
	    </div>
	    <div class="form-group">
	        {{Form::label('lblPrice',"Price", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::number('price',$product->price, array('class'=>'form-control',"rows"=>6))}}
	        </div>
	    </div>
	    <div class="form-group">
	    	{{Form::label('lblParent',"Select Category: ", array("class"=>"col-sm-2 control-label"))}}
	    	<div class="col-sm-10">
	    		<select name="category" class="form-control">
	    			<option value="1" selected="true">....</option>
	        		@foreach($categories as $category)
						<option value="{{$category->id}}" 
						@if($category->id == $product->category_id)
							{{"selected='true'"}}
						@endif
						>{{$category->name}}</option>
					@endforeach
	      		</select>
	    	</div>
	    </div>
	    <div class="form-group">
	        <div class="col-sm-10 col-sm-offset-2">
	        	{{Form::submit('Lưu',array('class'=>'btn btn-primary'))}}
	        </div>
	    </div>
	{{Form::close()}}
</div>
	<script type="text/javascript">
		    function readURL(input) {
		        if (input.files && input.files[0]) {
		            var reader = new FileReader();
		            reader.onload = function (e) {
		                $('#blah').attr('src', e.target.result);
		            }
		            reader.readAsDataURL(input.files[0]);
		        }
		    }
		$('[name="image"]').change(function(){
        readURL(this);
    });
	</script>
@stop