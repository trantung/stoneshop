@extends('layouts.admin.header')
@section('content')
<div class="form-comment" style="margin-right:10%">
	{{Form::open(array("route"=>array('post.changepassword'),"class"=>"form-horizontal"))}}
	    <div class="form-group">
    		{{Form::label('lbluName',"New Password", array("class"=>"col-sm-2 control-label"))}}
    		{{Form::password('password')}}
	    </div>
	    <div class="form-group">
	        <div class="col-sm-10 col-sm-offset-2">
	        	{{Form::submit('Lưu',array('class'=>'btn btn-primary'))}}
	        </div>
	    </div>
	{{Form::close()}}
</div>

@stop