@extends('layouts.admin_layout')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Quản lý bài viết<small>(Tổng {{$posts->total()}} bài viết)</small></h1>
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
                  <div class="box-title">
                    <form class="form-inline">
                      <input type="text" name="title" value="{{Request::get('title')}}" class="form-control" placeholder="Tiêu đề..." />
                      <select name="menu" class="form-control">
                        <option value="0">--- Danh mục bài viết ---</option>
                        @foreach($menus as $item)
                        <option value="{{$item->id}}" {{ Request::get('menu') == $item->id ? "selected='selected'" : ""}}>{{$item->name}}</option>
                        @endforeach
                      </select>
                      <select name="status" class="form-control">
                        <option value="">--- Trạng thái ---</option>
                        <option value="1" {{ Request::get('status') == 1 ? "selected='selected'" : ""}}>Hiện</option>
                        <option value="2" {{ Request::get('status') == 2 ? "selected='selected'" : ""}}>Ẩn</option>
                      </select>
                      <button type="submit" class="btn btn-info">
                        <i class="fa fa-search"></i> Tìm kiếm
                      </button>
                      <a href="{{route('admin.post.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
                    </form>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>STT</th>
                      <th>Tiêu đề</th>
                      <th>Danh mục</th>
                      <th>Hình đại diện</th>
                      <th>Trạng thái</th>
                      <th>Ngày tạo</th>
                      <th>Ngày sửa</th>
                      <th>Tác vụ</th>
                    </tr>
                    @if($posts)
                      <?php $i = 1; ?>
                      @foreach($posts as $post)
                        <tr>
                          <td>{{ $i }}</td>
                          <td style="max-width:300px"><strong>{{ $post->title }}</strong></td>
                          <td>
                            <span class="label label-info">{{ $post->menu->name ?? "[N\A]" }}</span>
                          </td>
                          <td>
                            <img src="{{ asset(parse_url_file($post->avatar)) }}" width="80" />
                          </td>
                          <td>
                            @if($post->active)
                              <a href="{{ route('admin.post.active', $post->id) }}" class="label label-success">Hiện</a>
                            @else
                              <a href="{{ route('admin.post.active', $post->id) }}" class="label label-danger">Ẩn</a>
                            @endif
                          </td>
                          <td>
                            @if($post->created_at)
                              Vào lúc {{ $post->created_at->format("H:i:s") }}<br />
                              Ngày {{ $post->created_at->format("d/m/Y") }}
                            @endif
                          </td>
                          <td>
                            @if($post->updated_at)
                              Vào lúc {{ $post->updated_at->format("H:i:s") }}<br />
                              Ngày {{ $post->updated_at->format("d/m/Y") }}
                            @endif
                          </td>
                          <td>
                            <a href="{{ route('admin.post.update', $post->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                            <a href="{{ route('admin.post.delete', $post->id) }}" class="delete-confirm btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                          </td>
                        </tr>
                        <?php $i++; ?>
                      @endforeach
                    @endif
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    {!! $posts->links() !!}
                  </ul>
                </div>
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
@stop