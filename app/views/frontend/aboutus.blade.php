@extends('layouts.frontend.header')

@section('content')
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;libraries=places" style=""></script>

<div class="container">
	<div class="form-group">
    	{{Form::label('shop_address',"Địa chỉ liên hệ", array("class"=>"col-sm-2 control-label"))}}
    	{{$shop->address}}
	</div>
	<div class="form-group">
    	{{Form::label('shop_contact',"Thông tin liên hệ", array("class"=>"col-sm-2 control-label"))}}
    	{{$shop->contact}}
	</div>

	<div class="form-group">
    	{{Form::label('shop_tel',"Tel", array("class"=>"col-sm-2 control-label"))}}
    	{{$shop->tel}}
	</div>
	<div class="form-group">
    	{{Form::label('shop_image',"Sơ đồ đường đi", array("class"=>"col-sm-2 control-label"))}}
    	<img src="{{asset('img/shops'), '/', $shop->image_url}}" class="img-rounded" alt="Cinque Terre" width="650" height="236" id="blah">
	</div>
	<div class="form-group">
    	{{Form::label('shop_googlemap',"Google Map", array("class"=>"col-sm-2 control-label"))}}
		<div class="img-rounded" id="mapview" style= "width:650px;height:236px"></div>
	</div>
	<div class="line"></div>
	<div class="form-group" style="display:none">
		{{ Form::label('lblLast', 'Lat', array('class'=>'col-md-2 control-label')) }}
		<div class="col-sm-3">
		    {{ Form::text('lat',$shop->lat, array('class'=>'form-control','id'=>'latitude')) }}
		</div>
	    {{ Form::label('lblLong', 'Long', array('class'=>'col-md-2 control-label')) }}
	    <div class="col-sm-3">
	        {{ Form::text('long',$shop->long, array('class'=>'form-control','id'=>'longitude')) }}
	    </div>
	</div>
	 <script type="text/javascript">
 		var defaultLat = (document.getElementById('latitude').value!=0) ? document.getElementById('latitude').value : 21.00296184;
		var defaultLng = (document.getElementById('longitude').value!=0) ? document.getElementById('longitude').value : 105.85202157;
	 </script>
	 <script type="text/javascript" src="{{ url('js/gmap.js') }}"></script>

</div>
@stop