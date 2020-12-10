@extends('layouts.admin_layout')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Thêm mới bài viết</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      @include('admin.post.form')
    </div>   <!-- /.row -->
  </section><!-- /.content -->
@stop