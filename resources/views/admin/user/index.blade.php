@extends('layouts.admin_layout')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Quản lý người dùng<small>(Tổng AAA người dùng)</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang thống kê</a></li>
      <li class="active">Danh sách người dùng</li>
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
                <input type="text" name="name" value="{{Request::get('name')}}" class="form-control" placeholder="Họ tên..." />
                <input type="text" name="phone" value="{{Request::get('phone')}}" class="form-control" placeholder="Số điện thoại..." />
                <input type="text" name="email" value="{{Request::get('email')}}" class="form-control" placeholder="Email..." />
                <button type="submit" class="btn btn-info">
                  <i class="fa fa-search"></i> Tìm kiếm
                </button>
                <a href="{{route('admin.user.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
              </form>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Hình ảnh</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ Email</th>
                <th>Ngày tạo</th>
                <th>Ngày sửa</th>
                <th>Tác vụ</th>
              </tr>
              @if($users)
                <?php $i = 1; ?>
                @foreach($users as $user)
                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $user->full_name }}</td>
                    <td>
                      <img src="{{ asset(parse_url_file($user->avatar)) }}" width="40" />
                    </td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      @if($user->created_at)
                        Vào lúc {{ $user->created_at->format("H:i:s") }}<br />
                        Ngày {{ $user->created_at->format("d/m/Y") }}
                      @endif
                    </td>
                    <td>
                      @if($user->updated_at)
                        Vào lúc {{ $user->updated_at->format("H:i:s") }}<br />
                        Ngày {{ $user->updated_at->format("d/m/Y") }}
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('admin.user.update', $user->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                      <a href="{{ route('admin.user.delete', $user->id) }}" class="delete-confirm btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                @endforeach
              @endif
            </table>
          </div><!-- /.box-body -->
          <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
              
            </ul>
          </div>
        </div><!-- /.box -->
      </div>
    </div>
  </section><!-- /.content -->
@stop