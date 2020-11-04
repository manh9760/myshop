@extends('layouts.admin_layout')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Danh mục sản phẩm<small>(Tổng {{$categories->total()}} danh mục)</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang thống kê</a></li>
      <li class="active">Liệt kê danh mục</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><a href="{{route('admin.category.create')}}" class="btn btn-success btn-sm">Thêm mới <i class="fa fa-plus"></i></a></h3>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>STT</th>
                <th>Danh mục</th>
                <th>Đường dẫn</th>
                <th>Tình trạng</th>
                <th>Mô tả</th>
                <th>Ngày tạo</th>
                <th>Ngày sửa</th>
                <th>Tác vụ</th>
              </tr>
              @if($categories)
                <?php $i = 1; ?>
                @foreach($categories as $category)
                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                      @if($category->status)
                        <a href="{{ route('admin.category.active', $category->id) }}" class="label label-success">Hiện</a>
                      @else
                        <a href="{{ route('admin.category.active', $category->id) }}" class="label label-danger">Ẩn</a>
                      @endif
                    </td>
                    <td>{{ $category->description }}</td>
                    <td>
                      @if($category->created_at)
                        Vào lúc {{ $category->created_at->format("H:i:s") }}<br />
                        Ngày {{ $category->created_at->format("d/m/Y") }}
                      @endif
                    </td>
                    <td>
                      @if($category->updated_at)
                        Vào lúc {{ $category->updated_at->format("H:i:s") }}<br />
                        Ngày {{ $category->updated_at->format("d/m/Y") }}
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('admin.category.update', $category->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                      <a href="{{ route('admin.category.delete', $category->id) }}" class="delete-confirm btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                @endforeach
              @endif
            </table>
          </div><!-- /.box-body -->
          <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
              {!! $categories->links() !!}
            </ul>
          </div>
        </div><!-- /.box -->
      </div>
    </div>
  </section><!-- /.content -->
@stop