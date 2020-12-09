@extends('layouts.admin_layout')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Quản lý người dùng<small>(Tổng {{count($users)}} người dùng)</small></h1>
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
                <select name="user_active" class="form-control">
                  <option value="-1">--- Trạng thái ---</option>
                  <option value="1" {{ Request::get('user_active') == 1 ? "selected='selected'" : ""}}>Đã kích hoạt</option>
                  <option value="0" {{ Request::get('user_active') == 0 ? "selected='selected'" : ""}}>Chưa kích hoạt</option>
                </select>
                @if(\Session::get('adminRole') == 1)
                <select name="user_role" class="form-control">
                  <option value="">--- Tài khoản ---</option>
                  <option value="3" {{ Request::get('user_role') == 3 ? "selected='selected'" : ""}}>Khách hàng</option>
                  <option value="2" {{ Request::get('user_role') == 2 ? "selected='selected'" : ""}}>Nhân viên</option>
                  <option value="1" {{ Request::get('user_role') == 1 ? "selected='selected'" : ""}}>Quản trị</option>
                </select>
                @endif
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
                <th>Số điện thoại</th>
                <th>Địa chỉ Email</th>
                <th>Tài khoản</th>
                <th>Trạng thái</th>
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
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      @if($user->role == 1)
                        <span class="label label-warning">Quản trị</span>
                      @elseif($user->role == 2)
                        <span class="label label-success">Nhân viên</span>
                      @else
                        <span class="label label-info">Khách hàng</span>
                      @endif  
                    </td>
                    <td>
                      @if($user->active)
                        <span class="label label-primary">Đã kích hoạt</span>
                      @else
                        <span class="label label-default">Chưa kích hoạt</span>
                      @endif
                    </td>
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
              {!! $users->appends($query)->links() !!}
            </ul>
          </div>
        </div><!-- /.box -->
      </div>
    </div>
  </section><!-- /.content -->
@stop