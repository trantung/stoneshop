@extends('layouts.admin.header')

@section('content')
	
<div class="form-comment" style="margin-right:10%">
	{{Form::open(array("route"=>array('category.post.edit', $category->id),"class"=>"form-horizontal"))}}
	    <div class="form-group">
	        {{Form::label('lblName',"Name", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        {{Form::text('name',$category->name, array('class'=>'form-control'))}}
	        </div>
	    </div>
	     <div class="form-group">
	        {{Form::label('lblName',"Description", array("class"=>"col-sm-2 control-label"))}}
	        <div class="col-sm-10">
	        {{Form::textarea('description',$category->description, array('class'=>'form-control',"rows"=>6))}}
	        </div>
	    </div>
	    <div class="form-group">
	    	{{Form::label('lblParent',"Select Parent: ", array("class"=>"col-sm-2 control-label"))}}
	    	<div class="col-sm-10">
	    		<select class="form-control">
	        		<option value = {{$category->parent_id}} selected="true">
	        			@if($category->parent_id !=0)
	        				{{$category->name}}
	        			@else
	        				...
	        			@endif
	        		</option>
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