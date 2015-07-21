@extends('layouts.admin.header')

@section('content')
<div class="form-comment" style="margin-right:10%">
	{{Form::open(array("route"=>array('image.post.create'),"class"=>"form-horizontal",'files'=>true))}}
	    <div class="form-group">
	        {{Form::label('lblName',"Type", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
		        {{ Form::select('type', [
				   '1' => 'Header',
				   '2' => 'Footer',
				   '3' => 'Logo'],
				   'Header',
			   [	"class"=>"form-control"]) }}
	        </div>
	    </div>
	     <div class="form-group">
	        	{{Form::label('lblDescript',"Description", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::textarea('description',"", array('class'=>'form-control',"rows"=>6, "id"=>'editor'))}}
	        </div>
	    </div>
	    <div class="form-group">
        	{{Form::label('lblAddress',"status", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
		        {{ Form::select('status', [
				   '1' => 'use',
				   '3' => 'none'],
				   'none',
			   [	"class"=>"form-control"]) }}
	        </div>
	    </div>
	    <div class="form-group">
	        {{Form::label('lbImage',"Image", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        	{{Form::file('image',"", array('class'=>'form-control','id'=>'imgInp'))}}
	        	<img src="{{asset('public/img/nothumnail.jpg')}}" class="img-rounded" alt="Cinque Terre" width="304" height="236" id="blah">
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

