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
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="box-title">
              <form class="form-inline">
                <select name="star" class="form-control">
                  <option value="">--- Số sao ---</option>
                  <option value="5" {{ Request::get('star') == 5 ? "selected='selected'" : ""}}>5 sao</option>
                  <option value="4" {{ Request::get('star') == 4 ? "selected='selected'" : ""}}>4 sao</option>
                  <option value="3" {{ Request::get('star') == 3 ? "selected='selected'" : ""}}>3 sao</option>
                  <option value="2" {{ Request::get('star') == 2 ? "selected='selected'" : ""}}>2 sao</option>
                  <option value="1" {{ Request::get('star') == 1 ? "selected='selected'" : ""}}>1 sao</option>
                </select>
                <select name="status" class="form-control">
                  <option value="">--- Trạng thái ---</option>
                  <option value="1" {{ Request::get('status') == 1 ? "selected='selected'" : ""}}>Hiện</option>
                  <option value="2" {{ Request::get('status') == 2 ? "selected='selected'" : ""}}>Ẩn</option>
                </select>
                <button type="submit" class="btn btn-info">
                  <i class="fa fa-search"></i> Tìm kiếm
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
                      @for($i = 0; $i < $review->star; $i++)
                        <span class="active"><i class="fa fa-star"></i></span>
                      @endfor

                      <!-- Trường hợp sản phẩm được đánh giá < 5 sao thì thêm sao rỗng cho đủ 5 sao -->
                      @if($review->star < 5)
                        @for($i = 0; $i < (5 - $review->star); $i++)
                          <span><i class="fa fa-star"></i></span>
                        @endfor 
                      @endif
                    </td>
                    <td>
                      <style type="text/css">
                        a.disabled {
                          pointer-events: none;
                        }
                      </style>
                      @if($review->status)
                        <a href="{{ route('admin.review.active', $review->id) }}" class="label label-success {{(Session::get('adminRole') != 1) ? 'disabled':''}}">Hiện</a>
                      @else
                        <a href="{{ route('admin.review.active', $review->id) }}" class="label label-danger {{(Session::get('adminRole') != 1) ? 'disabled':''}}">Ẩn</a>
                      @endif
                    </td>
                    <td>
                      @if($review->created_at)
                        {{ $review->created_at->format("d/m/Y") }}
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('admin.review.delete', $review->id) }}" class="delete-confirm btn btn-xs btn-danger {{(Session::get('adminRole') != 1) ? 'disabled':''}}"><i class="fa fa-trash"></i> Xóa</a>
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