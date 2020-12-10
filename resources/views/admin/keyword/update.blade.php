@extends('layouts.admin_layout')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Cập nhật từ khóa</h1>
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
              <div class="form-group {{ $errors->first('name') ? 'has-error':'' }}">
                <label>Tên danh mục <span class="text-danger">(*)</span></label>
                <input type="text" name="name" class="form-control" value="{{ $keyword->name }}" placeholder="Nhập danh mục...">
                <!-- Hiển thị lỗi nhập dữ liệu -->
                @if($errors->first('name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
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