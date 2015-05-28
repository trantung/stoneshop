@extends('layouts.admin.header')

@section('content')
<div class="form-comment" style="margin-right:10%">
	{{Form::open(array("route"=>array('category.post.create'),"class"=>"form-horizontal"))}}
	    <div class="form-group">
	        {{Form::label('lblName',"Name", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        {{Form::text('name',"", array('class'=>'form-control'))}}
	        </div>
	    </div>
	     <div class="form-group">
	        {{Form::label('lblName',"Description", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        {{Form::textarea('description',"", array('class'=>'form-control',"rows"=>6))}}
	        </div>
	    </div>
	    <div class="form-group">
	    	{{Form::label('lblParent',"Select Parent: ", array("class"=>"col-sm-2 control-label"))}}
	    	<div class="col-sm-10">
	    		<select name="parent_id" class="form-control">
	    			<option value="0" selected="true">....</option>
	        		<option value="1">Tung</option>
	        		<option value="2">Thai</option>
	        		<option value="3">Thai</option>
	        		<option value="4">Tung</option>
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

@stop