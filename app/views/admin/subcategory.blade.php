@extends('layouts.header')

@section('content')
<div class="manage-menu">
<button>Create New Sub Category</button>
<br />
<table class="table table-striped" style="margin-top: 10px;">
    <tr>
    <th>Name</th>
    <th>Description</th>
    <th>edit</th>
    <th>delete</th>
    </tr>
    <tr>
    <th>Sub name</th>
    <th>Sub Description</th>
    <th><button>edit</button></th>
    <th><button>delete</button></th>
    </tr>
</table>
</div>
@stop