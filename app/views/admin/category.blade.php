@extends('layouts.header')

@section('content')
<div class="manage-menu">
<button>Create New Category</button>
{{-- {{ link_to_route('manageMenusAdd', $title = 'add parent menu',[PARENT_ID,$data['id']], ['class'=>'btn btn-primary font-link']) }} --}}
<br />
<table class="table table-striped" style="margin-top: 10px;">
    <tr>
    <th>Name</th>
    <th>Description</th>
    <th>view Submenu</th>
    <th>edit</th>
    <th>delete</th>
    </tr>
    <tr>
    <th>demo</th>
    <th>des demo</th>
    <th>view Submenu</th>
    <th><button>edit</button></th>
    <th><button>delete</button></th>
    </tr>
    
</table>
</div>
@stop