@extends('layouts.admin_layout')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Đơn hàng
      <small>#{{$transaction->id}}</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang thống kê</a></li>
      <li><a href="{{route('admin.transaction.index')}}"><i class="fa fa-files-o"></i> Danh sách đơn hàng</a></li>
      <li class="active">Chi tiết đơn hàng</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          Hóa đơn mua hàng
          <small class="pull-right">Ngày tạo: {{ $transaction->created_at->format("d/m/Y") }}</small>
        </h2>
      </div><!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        Người gửi
        <address>
          <strong>Linh kiện máy tính Văn Mạnh</strong><br>
          Số 236B Lê Văn Sỹ <br />
          Phường 01 <br/> 
          Quận Tân Bình<br/>
          Hồ Chí Minh<br/>
          Điện thoại: 0565 902 617<br>
          Email: vanmanh.linhkien@gmail.com
        </address>
      </div><!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Người nhận
        <address>
          <strong>{{$transaction->full_name}}</strong><br>
          Số {{ $transaction->street_address }}<br />
          @if($transaction->ward)
            <?php 
              $ward = \DB::table('locations')
                ->where('id', $transaction->ward)
                ->first();
            ?>
            {{ $ward->name }}<br />
          @endif
          @if($transaction->district)
            <?php 
              $district = \DB::table('locations')
                ->where('id', $transaction->district)
                ->first();
            ?>
            {{ $district->name }}<br />
          @endif

          @if($transaction->city)
            <?php 
              $city = \DB::table('locations')
                ->where('id', $transaction->city)
                ->first();
            ?>
            {{ $city->name }}<br />
          @endif
          Điện thoại: {{ $transaction->phone }}<br>
          Email: {{ $transaction->email }}
        </address>
      </div><!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Thành tiền:</th>
              <td>
                <?php 
                  $total = $transaction->total_money - $city->shipping_fee;
                ?>
                {{ number_format($total,0,',','.') }}  đ</td>
            </tr>
            <tr>
              <th>Phí vận chuyển:</th>
              <td>{{ number_format($city->shipping_fee,0,',','.') }}  đ</td>
            </tr>
            <tr>
              <th>Tổng tiền thanh toán:</th>
              <td>{{ number_format($transaction->total_money,0,',','.') }}  đ</td>
            </tr>
          </table>
        </div>
      </div><!-- /.col -->
    </div><!-- /.row -->

    @if(count($orders))
    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Hình ảnh</th>
              <th>Sản phẩm</th>
              <th>Số lượng</th>
              <th>Đơn giá</th>
              <th>Thành tiền</th>
              <th>Xóa</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $item)
            <tr>
              <td><img src="{{ asset(parse_url_file($item->product->avatar ?? '')) }}" width="50" /></td>
              <td>{{ $item->product->name ?? "[N\A]" }}</td>
              <td>{{ $item->quantity }}</td>
              <td>{{ number_format($item->product_price,0,',','.') }}  đ</td>
              <td>{{ number_format($item->total_price,0,',','.') }}  đ</td>
              <td>
                @if(($transaction->status == 3) || ($transaction->status == 4))
                  <span class="{{$transaction->getStatus($transaction->status)['class']}}">
                    {{ $transaction->getStatus($transaction->status)['name'] }}
                  </span>
                @else
                  <a href="{{route('admin.transaction.deleteOrder', $item->id)}}" class="btn btn-xs btn-danger">Xóa</a>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-xs-12">
        <a href="{{route('admin.transaction.print', $transaction->id)}}" target="_blank" class="btn btn-primary pull-right">
          <i class="fa fa-print"></i> In hóa đơn
        </a>
      </div>
    </div>
    @else
    <div class="row no-print">
      <div class="col-xs-12">
        <a href="{{route('admin.transaction.index')}}" class="btn btn-default pull-right">
          <i class="fa fa-arrow-left"></i> Quay lại
        </a>
      </div>
    </div>
    @endif
  </section><!-- /.content -->
  <div class="clearfix"></div>
@stop