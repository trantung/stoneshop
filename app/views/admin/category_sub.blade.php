@extends('layouts.admin.header')

@section('content')
<div class="manage-menu">
{{ link_to_route('category.get.create', $title = 'Create New Category',null, array("class"=>"btn btn-info", "role"=>"button")) }}
{{-- {{ link_to_route('manageMenusAdd', $title = 'add parent menu',[PARENT_ID,$data['id']], ['class'=>'btn btn-primary font-link']) }} --}}
<br />
<table class="table table-hover" style="margin-top: 10px;">
    <tr>
        <th>NAME</th>
        <th>Parrent</th>
        <th>DESCRIPTION</th>
        <th>Action</th>
    </tr>
    <tr>
        <td>demo</td>
        <td>parrent name</td>
        <td>des demo</td>
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
        <tr>
        <td>demo1</td>
        <td>parrent name</td>
        <td>des demo1</td>
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
</div>
@stop