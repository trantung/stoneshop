@extends('layouts.admin.header')

@section('content')
<div class="manage-menu info-user-td"><br />

     <section class="content">
            <div class="row">
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{$sumVote}}</h3>
                  <center>User Vote</center>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$userOnline}}</sup></h3>
                  <center>User Online</center>
                </div>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$userVisited}}</h3>
                  <center>User Visited</center>
                </div>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
         </section>
    </div>
        
</div>
@stop