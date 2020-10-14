@extends('layouts.admin_layout')

@section('css')
  <style type="text/css">
    .highcharts-figure, .highcharts-data-table table {
      min-width: 310px; 
      max-width: 800px;
      margin: 1em auto;
    }

    .highcharts-data-table table {
      font-family: Verdana, sans-serif;
      border-collapse: collapse;
      border: 1px solid #EBEBEB;
      margin: 10px auto;
      text-align: center;
      width: 100%;
      max-width: 500px;
    }
    .highcharts-data-table caption {
      padding: 1em 0;
      font-size: 1.2em;
      color: #555;
    }
    .highcharts-data-table th {
      font-weight: 600;
      padding: 0.5em;
    }
    .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
      padding: 0.5em;
    }
    .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
      background: #f8f8f8;
    }
    .highcharts-data-table tr:hover {
      background: #f1f7ff;
    }
  </style>
@stop

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Trang thống kê</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">CPU Traffic</span>
            <span class="info-box-number">90<small>%</small></span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Likes</span>
            <span class="info-box-number">41,410</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Đơn hàng</span>
            <span class="info-box-number">
              {{$totalTransaction}} <br />
              <h5><a href="{{route('admin.transaction.index')}}">Chi tiết...</a></h5>
            </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Tài khoản</span>
            <span class="info-box-number">
              {{$totalUser}} <br />
              <h5><a href="{{route('admin.user.index')}}">Chi tiết...</a></h5>
            </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Thống kê bán hàng</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <div class="btn-group">
                <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-10">
                <div class="chart">
                  <figure class="highcharts-figure">
                    <div id="container" data-list-day="{{$listDay}}" data-list-revenue="{{$arrRevenueInMonth}}" data-list-cost="{{$arrCostInMonth}}" data-list-profit="{{$arrProfitInMonth}}" data-month="{{$month}}" data-year="{{$year}}">
                    </div>
                  </figure>
                </div><!-- /.chart-responsive -->
              </div><!-- /.col -->
              <div class="col-md-2">
                <p>
                  <strong>Chọn Tháng/Năm</strong>
                </p>
                <form class="form-inline">
                  <div class="progress-group">
                    <select name="month" class="form-control">
                      <option value="">--Tháng--</option>
                      @for($month = 1; $month < 13; $month++)
                      <option value="{{$month}}" {{ (Request::get('month') ?? date('m')) == $month ? "selected='selected'" : ""}}>
                        {{$month}}
                      </option>
                      @endfor
                    </select>
                  </div><br>
                  <div class="progress-group">
                    <select name="year" class="form-control">
                      <option value="">--Năm--</option>
                      @for($year = 2015; $year < (date('Y') + 1); $year++)
                      <option value="{{$year}}" {{ (Request::get('year') ?? date('Y')) == $year ? "selected='selected'" : ""}}>
                        {{$year}}
                      </option>
                      @endfor
                    </select>
                  </div><br>
                  <div class="progress-group">
                    <button type="submit" class="btn btn-info">
                      <i class="fa fa-pie-chart"></i> Thống kê
                    </button>
                  </div>
                </form>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- ./box-body -->
          <div class="box-footer">
            <div class="row">
              <div class="col-sm-4 col-xs-8">
                <div class="description-block border-right">
                  <h5 class="description-header text-light-blue">
                    {{number_format(array_sum(json_decode($arrRevenueInMonth)),0,',','.')}}
                  </h5>
                  <span class="description-text">Tổng doanh thu (VNĐ)</span>
                </div><!-- /.description-block -->
              </div><!-- /.col -->
              <div class="col-sm-4 col-xs-8">
                <div class="description-block border-right">
                  <h5 class="description-header text-green">
                    {{number_format(array_sum(json_decode($arrProfitInMonth)),0,',','.')}}
                  </h5>
                  <span class="description-text">Tổng lợi nhuận (VNĐ)</span>
                </div><!-- /.description-block -->
              </div><!-- /.col -->
              <div class="col-sm-4 col-xs-8">
                <div class="description-block">
                  <h5 class="description-header">
                    {{number_format(array_sum(json_decode($arrCostInMonth)),0,',','.')}}
                  </h5>
                  <span class="description-text">Tổng chi phí (VNĐ)</span>
                </div><!-- /.description-block -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.box-footer -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->

    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <div class="col-md-8">
        <!-- MAP & BOX PANE -->
        <!-- TABLE: LATEST ORDERS -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Đơn hàng mới</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table class="table no-margin">
                <thead>
                  <tr>
                    <th>Mã đơn</th>
                    <th>Khách hàng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($latestTransactions as $transaction)
                  <tr>
                    <td>
                      <a href="{{route('admin.transaction.detail', $transaction->id)}}">{{$transaction->id}} (Xem)</a>
                    </td>
                    <td>
                      {{ $transaction->full_name }}<br />
                      @if($transaction->user_id)
                        <span class="label label-info">Thành viên</span>
                      @else
                        <span class="label label-default">Chưa đăng ký</span>
                      @endif
                    </td>
                    <td>{{ number_format($transaction->total_money,0,',','.') }}  đ</td>
                    <td>
                      <span class="{{$transaction->getStatus($transaction->status)['class']}}">
                        {{ $transaction->getStatus($transaction->status)['name'] }}
                      </span>
                    </td>
                    <td>
                      @if($transaction->created_at)
                        Vào lúc {{ $transaction->created_at->format("H:i:s") }}<br />
                        Ngày {{ $transaction->created_at->format("d/m/Y") }}
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div><!-- /.table-responsive -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->

      <div class="col-md-4">
        <!-- PRODUCT LIST -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">TOP sản phẩm xem nhiều</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <ul class="products-list product-list-in-box">
              @foreach($topViewedProducts as $product)
              <li class="item">
                <div class="product-img">
                  <img src="{{ asset(parse_url_file($product->avatar)) }}" alt="Product Image" width="80" />
                </div>
                <div class="product-info">
                  <a href="javascript::;" class="product-title">{{$product->name}} <span class="label label-warning pull-right"><i class="fa fa-eye"></i> {{$product->view}}</span></a>
                  <span class="product-description">
                    {{ number_format($product->price,0,',','.') }} đ
                  </span>
                </div>
              </li><!-- /.item -->
              @endforeach
            </ul>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->

    <div class="row">
      <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
      <div class="col-md-4">
        <!-- DIRECT CHAT -->
        <div class="box box-warning direct-chat direct-chat-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Direct Chat</h3>
            <div class="box-tools pull-right">
              <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages">
              <!-- Message. Default to the left -->
              <div class="direct-chat-msg">
                <div class="direct-chat-info clearfix">
                  <span class="direct-chat-name pull-left">Alexander Pierce</span>
                  <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                </div><!-- /.direct-chat-info -->
                <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  Is this template really for free? That's unbelievable!
                </div><!-- /.direct-chat-text -->
              </div><!-- /.direct-chat-msg -->

              <!-- Message to the right -->
              <div class="direct-chat-msg right">
                <div class="direct-chat-info clearfix">
                  <span class="direct-chat-name pull-right">Sarah Bullock</span>
                  <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                </div><!-- /.direct-chat-info -->
                <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  You better believe it!
                </div><!-- /.direct-chat-text -->
              </div><!-- /.direct-chat-msg -->

              <!-- Message. Default to the left -->
              <div class="direct-chat-msg">
                <div class="direct-chat-info clearfix">
                  <span class="direct-chat-name pull-left">Alexander Pierce</span>
                  <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>
                </div><!-- /.direct-chat-info -->
                <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  Working with AdminLTE on a great new app! Wanna join?
                </div><!-- /.direct-chat-text -->
              </div><!-- /.direct-chat-msg -->

              <!-- Message to the right -->
              <div class="direct-chat-msg right">
                <div class="direct-chat-info clearfix">
                  <span class="direct-chat-name pull-right">Sarah Bullock</span>
                  <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
                </div><!-- /.direct-chat-info -->
                <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  I would love to.
                </div><!-- /.direct-chat-text -->
              </div><!-- /.direct-chat-msg -->

            </div><!--/.direct-chat-messages-->

            <!-- Contacts are loaded here -->
            <div class="direct-chat-contacts">
              <ul class="contacts-list">
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user1-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Count Dracula
                        <small class="contacts-list-date pull-right">2/28/2015</small>
                      </span>
                      <span class="contacts-list-msg">How have you been? I was...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user7-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Sarah Doe
                        <small class="contacts-list-date pull-right">2/23/2015</small>
                      </span>
                      <span class="contacts-list-msg">I will be waiting for...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user3-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Nadia Jolie
                        <small class="contacts-list-date pull-right">2/20/2015</small>
                      </span>
                      <span class="contacts-list-msg">I'll call you back at...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user5-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Nora S. Vans
                        <small class="contacts-list-date pull-right">2/10/2015</small>
                      </span>
                      <span class="contacts-list-msg">Where is your new...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user6-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        John K.
                        <small class="contacts-list-date pull-right">1/27/2015</small>
                      </span>
                      <span class="contacts-list-msg">Can I take a look at...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user8-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Kenneth M.
                        <small class="contacts-list-date pull-right">1/4/2015</small>
                      </span>
                      <span class="contacts-list-msg">Never mind I found...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
              </ul><!-- /.contatcts-list -->
            </div><!-- /.direct-chat-pane -->
          </div><!-- /.box-body -->
          <div class="box-footer">
            <form action="#" method="post">
              <div class="input-group">
                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-warning btn-flat">Send</button>
                </span>
              </div>
            </form>
          </div><!-- /.box-footer-->
        </div><!--/.direct-chat -->
      </div><!-- /.col -->
      <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
      <div class="col-md-4">
        <!-- DIRECT CHAT -->
        <div class="box box-warning direct-chat direct-chat-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Direct Chat</h3>
            <div class="box-tools pull-right">
              <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages">
              <!-- Message. Default to the left -->
              <div class="direct-chat-msg">
                <div class="direct-chat-info clearfix">
                  <span class="direct-chat-name pull-left">Alexander Pierce</span>
                  <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                </div><!-- /.direct-chat-info -->
                <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  Is this template really for free? That's unbelievable!
                </div><!-- /.direct-chat-text -->
              </div><!-- /.direct-chat-msg -->

              <!-- Message to the right -->
              <div class="direct-chat-msg right">
                <div class="direct-chat-info clearfix">
                  <span class="direct-chat-name pull-right">Sarah Bullock</span>
                  <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                </div><!-- /.direct-chat-info -->
                <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  You better believe it!
                </div><!-- /.direct-chat-text -->
              </div><!-- /.direct-chat-msg -->

              <!-- Message. Default to the left -->
              <div class="direct-chat-msg">
                <div class="direct-chat-info clearfix">
                  <span class="direct-chat-name pull-left">Alexander Pierce</span>
                  <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>
                </div><!-- /.direct-chat-info -->
                <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  Working with AdminLTE on a great new app! Wanna join?
                </div><!-- /.direct-chat-text -->
              </div><!-- /.direct-chat-msg -->

              <!-- Message to the right -->
              <div class="direct-chat-msg right">
                <div class="direct-chat-info clearfix">
                  <span class="direct-chat-name pull-right">Sarah Bullock</span>
                  <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
                </div><!-- /.direct-chat-info -->
                <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  I would love to.
                </div><!-- /.direct-chat-text -->
              </div><!-- /.direct-chat-msg -->

            </div><!--/.direct-chat-messages-->

            <!-- Contacts are loaded here -->
            <div class="direct-chat-contacts">
              <ul class="contacts-list">
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user1-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Count Dracula
                        <small class="contacts-list-date pull-right">2/28/2015</small>
                      </span>
                      <span class="contacts-list-msg">How have you been? I was...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user7-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Sarah Doe
                        <small class="contacts-list-date pull-right">2/23/2015</small>
                      </span>
                      <span class="contacts-list-msg">I will be waiting for...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user3-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Nadia Jolie
                        <small class="contacts-list-date pull-right">2/20/2015</small>
                      </span>
                      <span class="contacts-list-msg">I'll call you back at...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user5-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Nora S. Vans
                        <small class="contacts-list-date pull-right">2/10/2015</small>
                      </span>
                      <span class="contacts-list-msg">Where is your new...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user6-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        John K.
                        <small class="contacts-list-date pull-right">1/27/2015</small>
                      </span>
                      <span class="contacts-list-msg">Can I take a look at...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user8-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Kenneth M.
                        <small class="contacts-list-date pull-right">1/4/2015</small>
                      </span>
                      <span class="contacts-list-msg">Never mind I found...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
              </ul><!-- /.contatcts-list -->
            </div><!-- /.direct-chat-pane -->
          </div><!-- /.box-body -->
          <div class="box-footer">
            <form action="#" method="post">
              <div class="input-group">
                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-warning btn-flat">Send</button>
                </span>
              </div>
            </form>
          </div><!-- /.box-footer-->
        </div><!--/.direct-chat -->
      </div><!-- /.col -->
      <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
      <div class="col-md-4">
        <!-- DIRECT CHAT -->
        <div class="box box-warning direct-chat direct-chat-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Direct Chat</h3>
            <div class="box-tools pull-right">
              <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <!-- Conversations are loaded here -->
            <div class="direct-chat-messages">
              <!-- Message. Default to the left -->
              <div class="direct-chat-msg">
                <div class="direct-chat-info clearfix">
                  <span class="direct-chat-name pull-left">Alexander Pierce</span>
                  <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                </div><!-- /.direct-chat-info -->
                <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  Is this template really for free? That's unbelievable!
                </div><!-- /.direct-chat-text -->
              </div><!-- /.direct-chat-msg -->

              <!-- Message to the right -->
              <div class="direct-chat-msg right">
                <div class="direct-chat-info clearfix">
                  <span class="direct-chat-name pull-right">Sarah Bullock</span>
                  <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                </div><!-- /.direct-chat-info -->
                <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  You better believe it!
                </div><!-- /.direct-chat-text -->
              </div><!-- /.direct-chat-msg -->

              <!-- Message. Default to the left -->
              <div class="direct-chat-msg">
                <div class="direct-chat-info clearfix">
                  <span class="direct-chat-name pull-left">Alexander Pierce</span>
                  <span class="direct-chat-timestamp pull-right">23 Jan 5:37 pm</span>
                </div><!-- /.direct-chat-info -->
                <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  Working with AdminLTE on a great new app! Wanna join?
                </div><!-- /.direct-chat-text -->
              </div><!-- /.direct-chat-msg -->

              <!-- Message to the right -->
              <div class="direct-chat-msg right">
                <div class="direct-chat-info clearfix">
                  <span class="direct-chat-name pull-right">Sarah Bullock</span>
                  <span class="direct-chat-timestamp pull-left">23 Jan 6:10 pm</span>
                </div><!-- /.direct-chat-info -->
                <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image"><!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                  I would love to.
                </div><!-- /.direct-chat-text -->
              </div><!-- /.direct-chat-msg -->

            </div><!--/.direct-chat-messages-->

            <!-- Contacts are loaded here -->
            <div class="direct-chat-contacts">
              <ul class="contacts-list">
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user1-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Count Dracula
                        <small class="contacts-list-date pull-right">2/28/2015</small>
                      </span>
                      <span class="contacts-list-msg">How have you been? I was...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user7-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Sarah Doe
                        <small class="contacts-list-date pull-right">2/23/2015</small>
                      </span>
                      <span class="contacts-list-msg">I will be waiting for...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user3-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Nadia Jolie
                        <small class="contacts-list-date pull-right">2/20/2015</small>
                      </span>
                      <span class="contacts-list-msg">I'll call you back at...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user5-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Nora S. Vans
                        <small class="contacts-list-date pull-right">2/10/2015</small>
                      </span>
                      <span class="contacts-list-msg">Where is your new...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user6-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        John K.
                        <small class="contacts-list-date pull-right">1/27/2015</small>
                      </span>
                      <span class="contacts-list-msg">Can I take a look at...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
                <li>
                  <a href="#">
                    <img class="contacts-list-img" src="dist/img/user8-128x128.jpg">
                    <div class="contacts-list-info">
                      <span class="contacts-list-name">
                        Kenneth M.
                        <small class="contacts-list-date pull-right">1/4/2015</small>
                      </span>
                      <span class="contacts-list-msg">Never mind I found...</span>
                    </div><!-- /.contacts-list-info -->
                  </a>
                </li><!-- End Contact Item -->
              </ul><!-- /.contatcts-list -->
            </div><!-- /.direct-chat-pane -->
          </div><!-- /.box-body -->
          <div class="box-footer">
            <form action="#" method="post">
              <div class="input-group">
                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-warning btn-flat">Send</button>
                </span>
              </div>
            </form>
          </div><!-- /.box-footer-->
        </div><!--/.direct-chat -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
@stop

@section('script')
  <script src="{{ asset('public/admin/plugins/chartjs/highcharts.js') }}"></script>
  <script src="{{ asset('public/admin/plugins/chartjs/series-label.js') }}"></script>
  <script src="{{ asset('public/admin/plugins/chartjs/exporting.js') }}"></script>
  <script src="{{ asset('public/admin/plugins/chartjs/export-data.js') }}"></script>
  <script type="text/javascript">
    let listDay = $("#container").attr("data-list-day");
    listDay = JSON.parse(listDay);
    
    let listRevenue = $("#container").attr("data-list-revenue");
    listRevenue = JSON.parse(listRevenue);

    let listCost = $("#container").attr("data-list-cost");
    listCost = JSON.parse(listCost);

    let listProfit = $("#container").attr("data-list-profit");
    listProfit = JSON.parse(listProfit);

    let month = $("#container").attr("data-month");
    let year = $("#container").attr("data-year");

    Highcharts.chart('container', {
      chart: {
        type: 'spline'
      },
      title: {
        text: 'Doanh số bán hàng tháng ' + month + ' - ' + year
      },
      xAxis: {
        categories: listDay
      },
      yAxis: {
        title: {
            text: 'Đơn vị tiền: VNĐ'
        },
        labels: {
          formatter: function () {
            return String(this.value).replace(/(.)(?=(\d{3})+$)/g,'$1.');
          }
        }
      },
      tooltip: {
        crosshairs: true,
        shared: true
      },
      plotOptions: {
        spline: {
          marker: {
            radius: 4,
            lineColor: '#666666',
            lineWidth: 1
          }
        }
      },
      series: [{
        name: 'Doanh thu',
        marker: {
          symbol: 'square'
        },
        data: listRevenue
      }, {
        name: 'Chi chí',
        marker: {
          symbol: 'diamond'
        },
        data: listCost
      }, {
        name: 'Lợi nhuận',
        marker: {
          symbol: 'circle'
        },
        data: listProfit
      }]
    });
  </script>
@stop