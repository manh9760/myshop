@extends('layouts.admin_layout')

@section('css')

@stop

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
            <h3 class="box-title"><a href="{{route('admin.product.create')}}" class="btn btn-success btn-sm">Thêm mới <i class="fa fa-plus"></i></a></h3>
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
                <th>Thông tin khách hàng</th>
                <th>Địa chỉ nhận hàng</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
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
                      <a href="{{route('admin.transaction.detail', $transaction->id)}}" class="js-view-transaction btn btn-xs btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i> Xem</a>
                      <a href="{{ route('admin.transaction.delete', $transaction->id) }}" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a> <br /> 
                      <div class="btn-group">
                        <button type="button" class="btn btn-warning btn-xs">Cập nhật</button>
                        <button type="button" class="btn btn-warning btn-xs dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Đang giao</a></li>
                          <li><a href="#">Đã giao</a></li>
                          <li><a href="#">Hủy đơn</a></li>
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
              {!! $transactions->links() !!}
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