@extends('layouts.admin.header')

@section('content')
<div class="manage-menu">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-7.5">
			{{ link_to_route('shop.get.create', $title = 'Create New Shop',null, array("class"=>"btn btn-info", "role"=>"button")) }}
		</div>
	</div>
	<table class="table table-hover" style="margin-top: 10px;">
	    <tr>
	    	<th>USER NAME</th>
	        <th>SHOP NAME</th>
	        <th>DESCRIPION</th>
	        <th>TEL</th>
	        <th>MOBILE</th>
	        <th>ADDRESS</th>
	        <th>CONTACT</th>
	        <th>LAT</th>
	        <th>LONG</th>
	        <th>IMAGE</th>
	        <th>ACTION</th>
	    </tr>
	    @foreach($shops as $shop)
	    	<?php 
	    		$image = 'nothumnail.jpg';
	    		if($shop->image_url != null){
	    			$image = $shop->image_url;
	    		}
	    	?>
	    	<tr>
	        <td>{{$shop->user->first_name,'&nbsp;', $shop->user->last_name}}</td>
	        <td>{{$shop->name}}</td>
	        <td>{{$shop->description}}</td>
	        
	        <td>{{$shop->tel}}</td>
	        <td>{{$shop->mobile}}</td>
	        <td>{{$shop->address}}</td>
	        <td>{{$shop->contact}}</td>
	        <td>{{$shop->lat}}</td>
	        <td>{{$shop->long}}</td>
	        <td>
	        	<div>
	        		<img src="{{asset('img/shops').'/'.$image}}" class="img-rounded compress" alt="Rounded Image" />
	        		{{-- <img src="{{asset('img/images1.jpg')}}" class="img-roundedd image" alt="Rounded Image" /> --}}
	        	</div>
	        </td>
	        <td>
	            <div style=" display: table" >
	            <div style = "display: table-cell;  vertical-align: top;">
	                {{ link_to_route('shop.get.edit','Edit',$shop->id, array("class"=>"btn btn-warning", "role"=>"button")) }}
	            </div>
	                {{Form::open(array("route"=>array('shop.delete',$shop->id),
                                        "class"=>"form-horizontal","style"=>"display: table-cell",
                                         'id'  => 'formfield',))}} 
	                    <div class="form-group">
	                        <div class="col-sm-10 col-sm-offset-2">
	                            {{Form::button('Xoá',
                                        array('class'=>'btn btn-danger',
                                                'id'=>$shop->id,
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
</div>
<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Xác Nhận
            </div>
            <div class="modal-body">
                Bạn có muốn xoá shop này không(cẩn thận)&nbsp;<strong id="conf_name"></strong>&nbsp;?
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
