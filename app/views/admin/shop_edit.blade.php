@extends('layouts.admin.header')

@section('content')

<div class="form-comment" style="margin-right:10%">
	{{Form::open(array("route"=>array('shop.post.edit', $shop->id),"class"=>"form-horizontal",'files'=>true))}}
	    <div class="form-group">
	        {{Form::label('lblName',"Name", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::text('name',$shop->name, array('class'=>'form-control'))}}
	        </div>
	    </div>
	    <div class="form-group">
    		{{Form::label('lbluName',"User Name", array("class"=>"col-sm-2 control-label"))}}
    		<div class="col-sm-10">
	  			<select class="form-control selectpicker" name="user_id">
					<option selected="true">....</option>
					@foreach($users as $user)
						<option value="{{$user->id}}"
						<?php
							if($shop->user_id == $user->id){
								echo"&nbsp;selected='true'";
							}
						?>
						>{{$user->first_name,'&nbsp', $user->last_name}}</option>
					@endforeach
				</select>
			</div>
	    </div>
	     <div class="form-group">
	        	{{Form::label('lblDescript',"Description", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::textarea('description',$shop->description, array('class'=>'form-control',"rows"=>6))}}
	        </div>
	    </div>
	    <div class="form-group">
	        	{{Form::label('lblAddress',"Address", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::text('address',$shop->address, array('class'=>'form-control'))}}
	        </div>
	    </div>
	    <div class="form-group">
	        	{{Form::label('lblTel',"Tel", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::text('tel',$shop->tel, array('class'=>'form-control'))}}
	        </div>
	    </div>
	    <div class="form-group">
	        	{{Form::label('lblMobile',"Mobile", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::text('mobile',$shop->mobile, array('class'=>'form-control'))}}
	        </div>
	    </div>
	    
	    <div class="form-group">
	        {{Form::label('lbImage',"Image", array("class"=>"col-sm-2 control-label"))}}
	        <?php 
	        	$image = $shop->image_url;
	        	if($shop->image_url == null){
	        		$image = 'nothumnail.jpg';
	        	}
	        ?>
	        <div class="col-sm-10">
	        	{{Form::file('image',"", array('class'=>'form-control','id'=>'imgInp'))}}
	        	<img src="{{asset('img'), '/', $image}}" class="img-rounded" alt="Cinque Terre" width="304" height="236" id="blah">
	        </div>
	    </div>
	    <div class="form-group">
			{{ Form::label('lblLast', 'Lat', array('class'=>'col-md-2 control-label')) }}
			<div class="col-sm-3">
			    {{ Form::text('lat',$shop->lat, array('class'=>'form-control','id'=>'latitude')) }}
			</div>
		    {{ Form::label('lblLong', 'Long', array('class'=>'col-md-2 control-label')) }}
		    <div class="col-sm-3">
		        {{ Form::text('long',$shop->long, array('class'=>'form-control','id'=>'longitude')) }}
		    </div>
		</div>
		<div class = "form-group">
				<div class="col-md-3 col-md-offset-3" id="mapview" style="width:500px;height:500px"></div>
		</div>
	    <div class="form-group">
	        <div class="col-sm-10 col-sm-offset-2">
	        	{{Form::submit('Lưu',array('class'=>'btn btn-primary'))}}
	        </div>
	    </div>
	{{Form::close()}}
</div>

 <script type="text/javascript">
 		var defaultLat = (document.getElementById('latitude').value!=0) ? document.getElementById('latitude').value : 21.00296184;
var defaultLng = (document.getElementById('longitude').value!=0) ? document.getElementById('longitude').value : 105.85202157;
 </script>
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