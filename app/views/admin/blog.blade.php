@extends('layouts.admin.header')

@section('content')
<div class="manage-menu">
{{ link_to_route('blog.get.create', $title = 'Create New Blog',null, array("class"=>"btn btn-info", "role"=>"button")) }}
<br />
<table class="table table-hover" style="margin-top: 10px;">
    <tr>
        <th>NAME</th>
        <th>DESCRIPTION</th>
        <th>ACTION</th>
    </tr>
    @foreach($blogs as $blog)
        <tr>
            <td id="blog_name{{$blog->id}}"> {{$blog->title}}</td>
            <td>{{$blog->description}}</td>
            <td>
                <div style=" display: table" >
                <div style = "display: table-cell;  vertical-align: top;">
                    {{ link_to_route('blog.get.edit', $title = 'Edit',$blog->id, array("class"=>"btn btn-warning", "role"=>"button")) }}
                </div>
                    {{Form::open(array("route"=>array('blog.delete',$blog->id),
                                        "class"=>"form-horizontal","style"=>"display: table-cell",
                                         'id'  => 'formfield',))}}
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                {{Form::button('Xoá',
                                        array('class'=>'btn btn-danger',
                                                'id'=>$blog->id,
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
                Bạn Muốn Xóa blog:&nbsp;<strong id="conf_name"></strong>&nbsp;?
            </div>

  <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <a href="#" id="submit" class="btn btn-success success">Submit</a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('button').click(function() {
        var id = '#blog_name'+this.id;
     $('#conf_name').html($(id).html());
    });

    $('#submit').click(function(){
        $('#formfield').submit();
    });
</script>
@stop