@extends('layouts.admin_layout')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Cập nhật sản phẩm</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      @include('admin.product.form')
    </div>   <!-- /.row -->
  </section><!-- /.content -->
@stop