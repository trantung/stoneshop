@extends('layouts.admin.header')

@section('content')
<div class="manage-menu">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-7.5">
			{{ link_to_route('image.get.create', $title = 'Create New Image',null, array("class"=>"btn btn-info", "role"=>"button")) }}
		</div>
	</div>
	<table class="table table-hover" style="margin-top: 10px;">
	    <tr>
	        <th>TYPE</th>
	        <th>DESCRIPTION</th>
	        <th>STATUS</th>
	        <th>IMAGE</th>
	        <th>ACTION</th>
	    </tr>

	    @foreach($images as $image)
	    	<?php 
	    		$image_url = 'nothumnail.jpg';
	    		if($image->image_url != null){
	    			$image_url = $image->image_url;
	    		}
	    	?>
	    	<tr>

	        <td>{{$image->type}}</td>
	        <td>{{$image->description}}</td>
	        <td>{{$image->status}}</td>

	        <td>
	        	<img src="{{asset('img/headers').'/'.$image_url}}" class="img-rounded compress" alt="Rounded Image" />
	        	{{-- <img src="{{asset('img/images1.jpg')}}" class="img-roundedd image" alt="Rounded Image" /> --}}
	        </td>
	        <td>
	            <div style=" display: table" >
	            <div style = "display: table-cell;  vertical-align: top;">
	                {{ link_to_route('image.get.edit','Edit',$image->id, array("class"=>"btn btn-warning", "role"=>"button")) }}
	            </div>
	                {{Form::open(array("route"=>array('image.delete',$image->id),
                                        "class"=>"form-horizontal","style"=>"display: table-cell",
                                         'id'  => 'formfield',))}} 
	                    <div class="form-group">
	                        <div class="col-sm-10 col-sm-offset-2">
	                            {{Form::button('Xoá',
                                        array('class'=>'btn btn-danger',
                                                'id'=>$image->id,
                                                'data-toggle'=>'modal',
                                                'data-target'=>'#confirm-submit'
                                        ))}}
	                        </div>
	                    </div>
	                {{Form::close()}}
	            </div>
	        </td>
	      </tr>

		@endforeach
	</table>
	<nav>
	  {{-- {{$images->links()}} --}}
	</nav>
</div>
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Xác Nhận
            </div>
            <div class="modal-body">
                Bạn muốn xoá ảnh này không:&nbsp;<strong id="conf_name"></strong>&nbsp;?
            </div>

  <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Huỷ bỏ</button>
            <a href="#" id="submit" class="btn btn-success success">Đồng ý</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('button').click(function() {
        var id = '#cat_name_'+this.id;
     $('#conf_name').html($(id).html());
    });

    $('#submit').click(function(){
        $('#formfield').submit();
    });
</script>
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
