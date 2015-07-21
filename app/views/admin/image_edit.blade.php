@extends('layouts.admin.header')

@section('content')
<?php 
	$type_selected="";
	$status_selected = "";
	if($image->type ==1){
		$type_selected = 'Header';
	}
	if($image->type ==2){
		$type_selected = 'Footer';
	}
	if($image->type ==3){
		$type_selected='Logo';
	}
	if($image->status == 2){
		$status_selected = "None";
	}
?>
<div class="form-comment" style="margin-right:10%">
	{{Form::open(array("route"=>array('image.post.edit', $image->id),"class"=>"form-horizontal",'files'=>true))}}
	    <div class="form-group">
	        {{Form::label('lblName',"Type", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        <select class="form-control" name ="type">
	        <option value="{{$image->type}}" selected="selected">
	        	{{$type_selected}}
	        </option>
	        @foreach($option as $key=>$value)
	        	@if($key != $image->type)
	        		<option value="{{$key}}">{{$value}}</option>
	        	@endif
	        @endforeach
	        </select>
	        </div>
	    </div>
	     <div class="form-group">
	        	{{Form::label('lblDescript',"Description", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::textarea('description',$image->description, array('class'=>'form-control',"rows"=>6, "id"=>'editor'))}}
	        </div>
	    </div>
	    <div class="form-group">
        	{{Form::label('lblAddress',"status", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
		        {{ Form::select('status', [
				   '1' => 'Use',
				   '2' => 'None'],
				   $status_selected,
			   [	"class"=>"form-control"]) }}
	        </div>
	    </div>
	    <div class="form-group">
	    <?php 
	        	$image_url = $image->image_url;
	        	if($image->image_url == null){
	        		$image_url = 'nothumnail.jpg';
	        	}
	        ?>
	        {{Form::label('lbImage',"Image", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::file('image',"", array('class'=>'form-control','id'=>'imgInp'))}}
	        	<img src="{{asset('public/img/headers').'/'.$image_url}}" class="img-rounded" alt="Cinque Terre" width="304" height="236" id="blah">
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
		initSample();
	</script>
@stop