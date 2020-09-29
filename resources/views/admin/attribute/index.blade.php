@extends('layouts.admin_layout')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <!-- Dành cho mảng thì dùng count() -->
    <h1>Quản lý thuộc tính<small>(Tổng <?php echo(count($attributes)); ?> thuộc tính)</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang thống kê</a></li>
      <li class="active">Liệt kê thuộc tính</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><a href="{{route('admin.attribute.create')}}" class="btn btn-success btn-sm">Thêm mới <i class="fa fa-plus"></i></a></h3>
            <div class="box-tools">
              <div class="input-group" style="width: 150px;">
                <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                <div class="input-group-btn">
                  <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>STT</th>
                <th>Thuộc tính</th>
                <th>Đường dẫn</th>
                <th>Nhóm thuộc tính</th>
                <th>Danh mục</th>
                <th>Ngày tạo</th>
                <th>Ngày sửa</th>
                <th>Tác vụ</th>
              </tr>
              @if($attributes)
                <?php $i = 1; ?>
                @foreach($attributes as $attribute)
                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $attribute->name }}</td>
                    <td>{{ $attribute->slug }}</td>
                    <td>
                      <span class="{{$attribute->getType($attribute->type)['class']}}">
                        {{ $attribute->getType($attribute->type)['name'] }}
                      </span>
                    </td>
                    <td>
                      <span class="label label-primary">{{ $attribute->category->name ?? "[N\A]" }}</span>
                    </td>
                    <td>
                      @if($attribute->created_at)
                        Vào lúc {{ $attribute->created_at->format("H:i:s") }}<br />
                        Ngày {{ $attribute->created_at->format("d/m/Y") }}
                      @endif
                    </td>
                    <td>
                      @if($attribute->updated_at)
                        Vào lúc {{ $attribute->updated_at->format("H:i:s") }}<br />
                        Ngày {{ $attribute->updated_at->format("d/m/Y") }}
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('admin.attribute.update', $attribute->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                      <a href="{{ route('admin.attribute.delete', $attribute->id) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                @endforeach
              @endif
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>
  </section><!-- /.content -->
@stop