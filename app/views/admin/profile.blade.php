@extends('layouts.admin.header')
@section('content')
<div class="form-comment" style="margin-right:10%">
	{{Form::open(array("route"=>array('post.editprofile'),"class"=>"form-horizontal"))}}
	    <div class="form-group">
    		{{Form::label('lblFirstName',"First Name", array("class"=>"col-sm-2 control-label"))}}
    	<div class="col-sm-10">{{Form::text('firstname',$user->first_name, array('class'=>'form-control'))}}</div>
	    </div>
	    <div class="form-group">
    		{{Form::label('lblLastName',"Last Name", array("class"=>"col-sm-2 control-label"))}}
    		<div class="col-sm-10">
    		{{Form::text('lastname',$user->last_name, array('class'=>'form-control'))}}
    		</div>
	    </div>
	    <div class="form-group">
    		{{Form::label('lblUserName',"UserName", array("class"=>"col-sm-2 control-label"))}}
    		<div class="col-sm-10">
    		{{Form::text('username',$user->username, array('class'=>'form-control'))}}
    		</div>
	    </div>
	    <div class="form-group">
    		{{Form::label('lblEmail',"Email", array("class"=>"col-sm-2 control-label"))}}
    		<div class="col-sm-10">
    		{{Form::text('email',$user->email, array('class'=>'form-control'))}}
    		</div>
	    </div>
	    <div class="form-group">
	        <div class="col-sm-10 col-sm-offset-2">
	        	{{Form::submit('Lưu',array('class'=>'btn btn-primary'))}}
	        </div>
	    </div>
	{{Form::close()}}
</div>

@stop