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
      <div class="col-md-12">
        <!-- general form elements disabled -->
        <div class="box box-info">
          <div class="box-body">
            <form role="form" method="post" action="">
              @csrf
              <div class="form-group {{ $errors->first('shipping_fee') ? 'has-error':'' }}">
                <label>{{ $shipping_fee->name }}</label>
                <input type="number" name="shipping_fee" class="form-control" value="{{ $shipping_fee->shipping_fee }}" />
                <!-- Hiển thị lỗi nhập dữ liệu -->
                @if($errors->first('shipping_fee'))
                  <span class="text-danger">{{ $errors->first('shipping_fee') }}</span>
                @endif
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-success">Lưu lại</button>
                <button type="" class="btn btn-default">Hủy</button>
              </div><!-- /.box-footer -->
            </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!--/.col-md-12 -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
@stop