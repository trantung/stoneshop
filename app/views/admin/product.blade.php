@extends('layouts.admin.header')

@section('content')
<div class="manage-menu">

	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-7.5">
			{{ link_to_route('category.get.create', $title = 'Create New Category',null, array("class"=>"btn btn-info", "role"=>"button")) }}
		</div>
		<div class="col-xs-12 col-sm-6 col-md-1.5">
			<span>Slect category: </span>
		</div>
	  	<div class="col-xs-6 col-md-4">
	  			<select class="form-control">
				<option selected="true">....</option>
				<option>Tung</option>
				<option>Thai</option>
				<option>Thai</option>
				<option>Tung</option>
			</select>
	  	</div>
	</div>
	<table class="table table-hover" style="margin-top: 10px;">
	    <tr>
	        <th>NAME</th>
	        <th>PRICE</th>
	        <th>CATEGORY</th>
	        <th>IMAGE</th>
	        <th>DESCRIPTION</th>
	        <th>RATE</th>
	        <th>ACTION</th>

	    </tr>
	    <tr>
	        <td>demo</td>
	        <td>1500000</td>
	        <td>Cate name</td>
	        <td>
	        	<img src="{{asset('img/images1.jpg')}}" class="img-rounded compress" alt="Rounded Image" />&nbsp;
	        	<img src="{{asset('img/images1.jpg')}}" class="img-roundedd image" alt="Rounded Image" />
	        </td>
	        <td>Day la cai san pham</td>
	        <td>3/5</td>
	        <td>
	            <div style=" display: table" >
	            <div style = "display: table-cell;  vertical-align: top;">
	                {{ link_to_route('category.get.edit', $title = 'Edit',1, array("class"=>"btn btn-warning", "role"=>"button")) }}
	            </div>
	                {{Form::open(array("route"=>array('category.delete',1),"class"=>"form-horizontal","style"=>"display: table-cell"))}}
	                    <div class="form-group">
	                        <div class="col-sm-10 col-sm-offset-2">
	                            {{Form::submit('Xoá',array('class'=>'btn btn-danger'))}}
	                        </div>
	                    </div>
	                {{Form::close()}}

	            </div>
	        </td>
	      </tr>
	</table>
	<nav>
	  <ul class="pagination">
	    <li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
	    <li class="active"><a href="#">1</a></li>
	    <li><a href="#">2</a></li>
	    <li><a href="#">3</a></li>
	    <li><a href="#">4</a></li>
	    <li><a href="#">5</a></li>
	    <li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
	  </ul>
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
