@extends('layouts.admin_layout')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Thêm mới người dùng</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      @include('admin.user.form')
    </div>   <!-- /.row -->
  </section><!-- /.content -->
@stop