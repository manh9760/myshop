<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cửa hàng linh kiện máy tính Văn Mạnh | Hóa đơn</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('public/admin/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/admin/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('public/admin/ionicons-2.0.1/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/AdminLTE.min.css') }}">
  </head>
  <body onload="window.print();">
    <div class="wrapper">
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
              <strong>Cửa hàng linh kiện máy tính Văn Mạnh</strong><br>
              Số 236B Lê Văn Sỹ <br />
              Phường 1 <br/> 
              Quận Tân Bình<br/>
              Hồ Chí Minh<br/>
              Điện thoại: 0565 902 617<br>
              Địa chỉ email: vanmanh.linhkien@gmail.com
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
              Địa chỉ email: {{ $transaction->email }}
            </address>
          </div><!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th style="width:50%">Thành tiền:</th>
                  <td>{{ number_format($transaction->total_money,0,',','.') }}  đ</td>
                </tr>
                <tr>
                  <th>Phí vận chuyển:</th>
                  <td>$5.80</td>
                </tr>
                <tr>
                  <th>Tổng tiền thanh toán:</th>
                  <td>{{ number_format($transaction->total_money,0,',','.') }}  đ</td>
                </tr>
              </table>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->

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
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- AdminLTE App -->
    <script src="{{ asset('public/admin/dist/js/app.min.js') }}"></script>
  </body>
</html>