@extends('layouts.admin_layout')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Cập nhật danh mục</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">General Elements</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      @include('admin.post.form')
    </div>   <!-- /.row -->
  </section><!-- /.content -->
@stop