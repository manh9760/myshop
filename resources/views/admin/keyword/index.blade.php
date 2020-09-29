@extends('layouts.admin_layout')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Quản lý từ khóa<small>(Tổng {{$keywords->total()}} từ khóa)</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang thống kê</a></li>
      <li class="active">Liệt kê từ khóa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><a href="{{route('admin.keyword.create')}}" class="btn btn-success btn-sm">Thêm mới <i class="fa fa-plus"></i></a></h3>
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
                <th>Từ khóa</th>
                <th>Đường dẫn</th>
                <th>Trạng thái</th>
                <th>Mô tả</th>
                <th>Ngày tạo</th>
                <th>Ngày sửa</th>
                <th>Tác vụ</th>
              </tr>
              @if($keywords)
                <?php $i = 1; ?>
                @foreach($keywords as $keyword)
                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $keyword->name }}</td>
                    <td>{{ $keyword->slug }}</td>
                    <td>
                      @if($keyword->hot)
                        <a href="{{ route('admin.keyword.hot', $keyword->id) }}" class="label label-success">Nổi bật</a>
                      @else
                        <a href="{{ route('admin.keyword.hot', $keyword->id) }}" class="label label-danger">Ẩn</a>
                      @endif
                    </td>
                    <td>{{ $keyword->description }}</td>
                    <td>
                      @if($keyword->created_at)
                        Vào lúc {{ $keyword->created_at->format("H:i:s") }}<br />
                        Ngày {{ $keyword->created_at->format("d/m/Y") }}
                      @endif
                    </td>
                    <td>
                      @if($keyword->updated_at)
                        Vào lúc {{ $keyword->updated_at->format("H:i:s") }}<br />
                        Ngày {{ $keyword->updated_at->format("d/m/Y") }}
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('admin.keyword.update', $keyword->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                      <a href="{{ route('admin.keyword.delete', $keyword->id) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                @endforeach
              @endif
            </table>
          </div><!-- /.box-body -->
          <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
              {!! $keywords->links() !!}
            </ul>
          </div>
        </div><!-- /.box -->
      </div>
    </div>
  </section><!-- /.content -->
@stop