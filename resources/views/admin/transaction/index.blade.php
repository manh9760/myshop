@extends('layouts.admin_layout')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Quản lý đơn hàng<small>(Tổng {{$transactions->total()}} đơn hàng)</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang thống kê</a></li>
      <li class="active">Danh sách đơn hàng</li>
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
                <th>Thông tin khách hàng</th>
                <th>Địa chỉ nhận hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thanh toán</th>
                <th>Ghi chú</th>
                <th>Ngày tạo</th>
                <th>Ngày sửa</th>
                <th>Tác vụ</th>
              </tr>
              @if($transactions)
                <?php $i = 1; ?>
                @foreach($transactions as $transaction)
                  <tr>
                    <td>{{ $i }}</td>
                    <td>
                        Họ tên: {{ $transaction->full_name }}<br />
                        @if($transaction->phone)
                          Điện thoại: {{ $transaction->phone }}<br />
                        @endif
                        @if($transaction->email)
                          Email: {{ $transaction->email }}<br />
                        @endif
                        @if($transaction->user_id)
                          <span class="label label-info">Thành viên</span>
                        @else
                          <span class="label label-default">Chưa đăng ký</span>
                        @endif
                      </ul>
                    </td>
                    <td>
                      Số {{ $transaction->street_address }}<br />
                      
                      @if($transaction->ward)
                        <?php 
                          $ward = \DB::table('locations')
                            ->where('id', $transaction->ward)
                            ->first();
                        ?>
                        - {{ $ward->name }}<br />
                      @endif

                      @if($transaction->district)
                        <?php 
                          $district = \DB::table('locations')
                            ->where('id', $transaction->district)
                            ->first();
                        ?>
                        - {{ $district->name }}<br />
                      @endif

                      @if($transaction->city)
                        <?php 
                          $city = \DB::table('locations')
                            ->where('id', $transaction->city)
                            ->first();
                        ?>
                        - {{ $city->name }}<br />
                      @endif
                    </td>
                    <td>{{ number_format($transaction->total_money,0,',','.') }}  đ</td>
                    <td>
                      <span class="{{$transaction->getStatus($transaction->status)['class']}}">
                        {{ $transaction->getStatus($transaction->status)['name'] }}
                      </span>
                    </td>
                    <td>
                      @if($transaction->payment_method == 1)
                        <span class="label label-default">COD</span>
                      @elseif($transaction->payment_method == 2)
                        <span class="label label-default">Online</span>
                      @elseif($transaction->payment_method == 3)
                        <span class="label label-success">Đã thanh toán</span>
                      @endif
                    </td>
                    <td>{{ $transaction->note }}</td>
                    <td>
                      @if($transaction->created_at)
                        Vào lúc {{ $transaction->created_at->format("H:i:s") }}<br />
                        Ngày {{ $transaction->created_at->format("d/m/Y") }}
                      @endif
                    </td>
                    <td>
                      @if($transaction->updated_at)
                        Vào lúc {{ $transaction->updated_at->format("H:i:s") }}<br />
                        Ngày {{ $transaction->updated_at->format("d/m/Y") }}
                      @endif
                    </td>
                    <td>
                      <!-- <a href="{{route('admin.transaction.detail', $transaction->id)}}" class="js-view-transaction btn btn-xs btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i> Xem</a> -->
                      <a href="{{route('admin.transaction.detail', $transaction->id)}}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> Xem</a>
                      <a href="{{ route('admin.transaction.delete', $transaction->id) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a> <br /> 
                      <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-xs">Cập nhật</button>
                        <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{ route('admin.transaction.updateOrderStatus', ['processing', $transaction->id]) }}">Đang giao</a></li>
                          <li><a href="{{ route('admin.transaction.updateOrderStatus', ['complete', $transaction->id]) }}">Đã giao</a></li>
                          <li><a href="{{ route('admin.transaction.updateOrderStatus', ['canceled', $transaction->id]) }}">Hủy đơn</a></li>
                        </ul>
                      </div>
                    </td>
                  </tr>
                  <?php $i++; ?>
                @endforeach
              @endif
            </table>
          </div><!-- /.box-body -->
          <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
              {!! $transactions->appends($query)->links() !!}
            </ul>
          </div>
        </div><!-- /.box -->
      </div>
    </div>
  </section><!-- /.content -->

  <!-- Modal -->
  <div class="modal fade fade" id="modal-view-transaction">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Chi tiết đơn hàng</h4>
        </div>
        <div class="modal-body">
          <div class="content">
            
          </div>
        </div>
      </div>
    </div>
  </div>
@stop