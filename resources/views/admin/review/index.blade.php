@extends('layouts.admin_layout')
<style type="text/css">
  .ratings span i{
    color: #eff0f5;
  }
  .ratings span.active i{
    color: #faca51;
  }
</style>
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Quản lý đánh giá<small>(Tổng {{$reviews->total()}} đánh giá)</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang thống kê</a></li>
      <li class="active">Liệt kê đánh giá</li>
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
                <input type="text" name="full_name" value="{{Request::get('full_name')}}" class="form-control" placeholder="Họ tên..." />
                <input type="text" name="email" value="{{Request::get('email')}}" class="form-control" placeholder="Email..." />
                <select name="user_type" class="form-control">
                  <option value="">--- Khách hàng ---</option>
                  <option value="1" {{ Request::get('user_type') == 1 ? "selected='selected'" : ""}}>Thành viên</option>
                  <option value="2" {{ Request::get('user_type') == 2 ? "selected='selected'" : ""}}>Chưa đăng ký</option>
                </select>
                <select name="status" class="form-control">
                  <option value="">--- Trạng thái ---</option>
                  <option value="3" {{ Request::get('status') == 3 ? "selected='selected'" : ""}}>Đã giao</option>
                  <option value="2" {{ Request::get('status') == 2 ? "selected='selected'" : ""}}>Đang vận chuyển</option>
                  <option value="1" {{ Request::get('status') == 1 ? "selected='selected'" : ""}}>Tiếp nhận</option>
                  <option value="4" {{ Request::get('status') == 4 ? "selected='selected'" : ""}}>Đã hủy</option>
                </select>
                <button type="submit" class="btn btn-info">
                  <i class="fa fa-search"></i> Tìm kiếm
                </button>
                <button type="submit" name="export_excel" value="true" class="btn btn-success">
                  <i class="fa fa-save"></i> Xuất File Excel
                </button>
              </form>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Khách hàng</th>
                <th>Số sao</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Tác vụ</th>
              </tr>
              @if($reviews)
                <?php $k = 1; ?>
                @foreach($reviews as $review)
                  <tr>
                    <td>{{ $k }}</td>
                    <td>{{ $review->product->name }}</td>
                    <td>{{ $review->user->full_name }}</td>
                    <td class="ratings">
                      <!-- Hiển thị số sao review của sản phẩm -->
                      @for($i = 0; $i < $review->product->average_star; $i++)
                        <span class="active"><i class="fa fa-star"></i></span>
                      @endfor

                      <!-- Trường hợp sản phẩm được đánh giá < 5 sao thì thêm sao rỗng cho đủ 5 sao -->
                      @if($review->product->average_star < 5)
                        @for($i = 0; $i < (5 - $review->product->average_star); $i++)
                          <span><i class="fa fa-star"></i></span>
                        @endfor 
                      @endif
                    </td>
                    <td>
                      @if($review->status)
                        <a href="{{ route('admin.review.active', $review->id) }}" class="label label-success">Hiện</a>
                      @else
                        <a href="{{ route('admin.review.active', $review->id) }}" class="label label-danger">Ẩn</a>
                      @endif
                    </td>
                    <td>
                      @if($review->created_at)
                        {{ $review->created_at->format("d/m/Y") }}
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('admin.review.update', $review->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                      <a href="{{ route('admin.review.delete', $review->id) }}" class="delete-confirm btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                  </tr>
                  <?php $k++; ?>
                @endforeach
              @endif
            </table>
          </div><!-- /.box-body -->
          <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
              {!! $reviews->links() !!}
            </ul>
          </div>
        </div><!-- /.box -->
      </div>
    </div>
  </section>
@stop