@extends('layouts.admin_layout')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Danh mục bài viết<small>(Tổng {{$menus->total()}} danh mục)</small></h1>
          <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang thống kê</a></li>
            <li class="active">Danh mục bài viết</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><a href="{{route('admin.menu.create')}}" class="btn btn-success btn-sm">Thêm mới <i class="fa fa-plus"></i></a></h3>
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
                      <th>Danh mục</th>
                      <th>Đường dẫn</th>
                      <th>Tình trạng</th>
                      <th>Mô tả</th>
                      <th>Ngày tạo</th>
                      <th>Ngày sửa</th>
                      <th>Tác vụ</th>
                    </tr>
                    @if($menus)
                      <?php $i = 1; ?>
                      @foreach($menus as $menu)
                        <tr>
                          <td>{{ $i }}</td>
                          <td>{{ $menu->name }}</td>
                          <td>{{ $menu->slug }}</td>
                          <td>
                            @if($menu->status)
                              <a href="{{ route('admin.category.active', $menu->id) }}" class="label label-success">Hiện</a>
                            @else
                              <a href="{{ route('admin.category.active', $menu->id) }}" class="label label-danger">Ẩn</a>
                            @endif
                          </td>
                          <td>{{ $menu->description }}</td>
                          <td>
                            @if($menu->created_at)
                              Vào lúc {{ $menu->created_at->format("H:i:s") }}<br />
                              Ngày {{ $menu->created_at->format("d/m/Y") }}
                            @endif
                          </td>
                          <td>
                            @if($menu->updated_at)
                              Vào lúc {{ $menu->updated_at->format("H:i:s") }}<br />
                              Ngày {{ $menu->updated_at->format("d/m/Y") }}
                            @endif
                          </td>
                          <td>
                            <a href="{{ route('admin.menu.update', $menu->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                            <a href="{{ route('admin.menu.delete', $menu->id) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                          </td>
                        </tr>
                        <?php $i++; ?>
                      @endforeach
                    @endif
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    {!! $menus->links() !!}
                  </ul>
                </div>
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
@stop