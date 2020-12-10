@extends('layouts.admin_layout')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Thêm mới thuộc tính</h1>
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
                <label>Thuộc tính <span class="text-danger">(*)</span></label>
                <input type="text" name="name" class="form-control" placeholder="Nhập thuộc tính...">
                @if($errors->first('name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
              </div>

              <div class="row form-group">
                <!-- Nhóm thuộc tính -->
                <div class="col-xs-6 form-group {{ $errors->first('type') ? 'has-error':'' }}">
                  <label for="type">Nhóm thuộc tính <span class="text-danger">(*)</span></label>
                  <select class="form-control select2" name="type" style="width: 100%;">
                    <option value="">__Chọn nhóm thuộc tính__</option>
                      <option value="1">Thương hiệu</option>
                      <option value="2">Xuất xứ</option>
                  </select>
                  @if($errors->first('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                  @endif
                </div>
                <!-- Danh mục -->
                <div class="col-xs-6 form-group {{ $errors->first('category_id') ? 'has-error':'' }}">
                  <label for="category_id">Danh mục <span class="text-danger">(*)</span></label>
                  <select class="form-control select2" name="category_id" style="width: 100%;">
                    <option value="">__Chọn danh mục__</option>
                    @foreach($categories as $category)
                      <option value="{{$category->id}}" {{ ($attribute->category_id ?? 0 == $category->id) ? "selected='selected'" : "" }}>
                        {{$category->name}}
                      </option>
                    @endforeach
                  </select>
                  @if($errors->first('category_id'))
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                  @endif
                </div>
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