@extends('layouts.admin.header')

@section('content')
<div class="form-comment" style="margin-right:10%">
	{{Form::open(array("route"=>array('product.post.create'),"class"=>"form-horizontal",'files'=>true))}}
	    <div class="form-group">
	        {{Form::label('lblName',"Name", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::text('name',"", array('class'=>'form-control'))}}
	        </div>
	    </div>
	    <div class="form-group">
	        {{Form::label('lbImage',"Image", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::file('image',"", array('class'=>'form-control','id'=>'imgInp'))}}
	        	<img src="{{asset('img/nothumnail.jpg')}}" class="img-rounded" alt="Cinque Terre" width="304" height="236" id="blah">
	        </div>
	    </div>
	     <div class="form-group">
	        	{{Form::label('lblDescript',"Description", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::textarea('description',"", array('class'=>'form-control',"rows"=>6))}}
	        </div>
	    </div>
	    <div class="form-group">
	        {{Form::label('lblPrice',"Price", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::number('price',"", array('class'=>'form-control',"rows"=>6))}}
	        </div>
	    </div>
	    <div class="form-group">
	    	{{Form::label('lblParent',"Select Category: ", array("class"=>"col-sm-2 control-label"))}}
	    	<div class="col-sm-10">
	    		<select name="category" class="form-control">
	    			@foreach($categories as $category)
	    				<option value = {{$category->id}}>{{$category->name}}</option>
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


<div class="form-group">
{{ Form::label('latitude', 'Latitude:', array('class'=>'col-md-2 control-label')) }}
<div class="col-sm-3">
    {{ Form::text('latitude',null, array('class'=>'form-control','id'=>'latitude')) }}
</div>
</div>
<div class="form-group">
    {{ Form::label('longitude', 'Longitude:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-3">
        {{ Form::text('longitude',null, array('class'=>'form-control','id'=>'longitude')) }}
    </div>
</div>
 <div class="col-sm-8">
<div id="mapview" style="width:500px;height:500px"></div>
                    </div>
<script type="text/javascript" src="{{ url('js/gmap.js') }}"></script>




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