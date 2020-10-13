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
            <h3 class="box-title">Doanh số bán hàng</h3>
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
                      <div id="container"></div>
                  </figure>
                </div><!-- /.chart-responsive -->
              </div><!-- /.col -->
              <div class="col-md-2">
                <p class="text-center">
                  <strong>Goal Completion</strong>
                </p>
                <div class="progress-group">
                  <span class="progress-text">Add Products to Cart</span>
                  <span class="progress-number"><b>160</b>/200</span>
                  <div class="progress sm">
                    <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
                  </div>
                </div><!-- /.progress-group -->
                <div class="progress-group">
                  <span class="progress-text">Complete Purchase</span>
                  <span class="progress-number"><b>310</b>/400</span>
                  <div class="progress sm">
                    <div class="progress-bar progress-bar-red" style="width: 80%"></div>
                  </div>
                </div><!-- /.progress-group -->
                <div class="progress-group">
                  <span class="progress-text">Visit Premium Page</span>
                  <span class="progress-number"><b>480</b>/800</span>
                  <div class="progress sm">
                    <div class="progress-bar progress-bar-green" style="width: 80%"></div>
                  </div>
                </div><!-- /.progress-group -->
                <div class="progress-group">
                  <span class="progress-text">Send Inquiries</span>
                  <span class="progress-number"><b>250</b>/500</span>
                  <div class="progress sm">
                    <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
                  </div>
                </div><!-- /.progress-group -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- ./box-body -->
          <div class="box-footer">
            <div class="row">
              <div class="col-sm-4 col-xs-8">
                <div class="description-block border-right">
                  <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
                  <h5 class="description-header">1.000000.000 đ</h5>
                  <span class="description-text">Tổng doanh thu</span>
                </div><!-- /.description-block -->
              </div><!-- /.col -->
              <div class="col-sm-4 col-xs-8">
                <div class="description-block border-right">
                  <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
                  <h5 class="description-header">1.000000.000 đ</h5>
                  <span class="description-text">Tổng chi phí</span>
                </div><!-- /.description-block -->
              </div><!-- /.col -->
              <div class="col-sm-4 col-xs-8">
                <div class="description-block">
                  <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 20%</span>
                  <h5 class="description-header">1.000000.000 đ</h5>
                  <span class="description-text">Tổng lợi nhuận</span>
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
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Visitors Report</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body no-padding">
            <div class="row">
              <div class="col-md-9 col-sm-8">
                <div class="pad">
                  <!-- Map will be created here -->
                  <div id="world-map-markers" style="height: 325px;"></div>
                </div>
              </div><!-- /.col -->
              <div class="col-md-3 col-sm-4">
                <div class="pad box-pane-right bg-green" style="min-height: 280px">
                  <div class="description-block margin-bottom">
                    <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                    <h5 class="description-header">8390</h5>
                    <span class="description-text">Visits</span>
                  </div><!-- /.description-block -->
                  <div class="description-block margin-bottom">
                    <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                    <h5 class="description-header">30%</h5>
                    <span class="description-text">Referrals</span>
                  </div><!-- /.description-block -->
                  <div class="description-block">
                    <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                    <h5 class="description-header">70%</h5>
                    <span class="description-text">Organic</span>
                  </div><!-- /.description-block -->
                </div>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->
        <div class="row">
          <div class="col-md-6">
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

          <div class="col-md-6">
            <!-- USERS LIST -->
            <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Latest Members</h3>
                <div class="box-tools pull-right">
                  <span class="label label-danger">8 New Members</span>
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body no-padding">
                <ul class="users-list clearfix">
                  <li>
                    <img src="dist/img/user1-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Alexander Pierce</a>
                    <span class="users-list-date">Today</span>
                  </li>
                  <li>
                    <img src="dist/img/user8-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Norman</a>
                    <span class="users-list-date">Yesterday</span>
                  </li>
                  <li>
                    <img src="dist/img/user7-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Jane</a>
                    <span class="users-list-date">12 Jan</span>
                  </li>
                  <li>
                    <img src="dist/img/user6-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">John</a>
                    <span class="users-list-date">12 Jan</span>
                  </li>
                  <li>
                    <img src="dist/img/user2-160x160.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Alexander</a>
                    <span class="users-list-date">13 Jan</span>
                  </li>
                  <li>
                    <img src="dist/img/user5-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Sarah</a>
                    <span class="users-list-date">14 Jan</span>
                  </li>
                  <li>
                    <img src="dist/img/user4-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Nora</a>
                    <span class="users-list-date">15 Jan</span>
                  </li>
                  <li>
                    <img src="dist/img/user3-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Nadia</a>
                    <span class="users-list-date">15 Jan</span>
                  </li>
                </ul><!-- /.users-list -->
              </div><!-- /.box-body -->
              <div class="box-footer text-center">
                <a href="javascript::" class="uppercase">View All Users</a>
              </div><!-- /.box-footer -->
            </div><!--/.box -->
          </div><!-- /.col -->
        </div><!-- /.row -->

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
        <!-- Info Boxes Style 2 -->
        <div class="info-box bg-yellow">
          <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Inventory</span>
            <span class="info-box-number">5,200</span>
            <div class="progress">
              <div class="progress-bar" style="width: 50%"></div>
            </div>
            <span class="progress-description">
              50% Increase in 30 Days
            </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
        <div class="info-box bg-green">
          <span class="info-box-icon"><i class="ion ion-ios-heart-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Mentions</span>
            <span class="info-box-number">92,050</span>
            <div class="progress">
              <div class="progress-bar" style="width: 20%"></div>
            </div>
            <span class="progress-description">
              20% Increase in 30 Days
            </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
        <div class="info-box bg-red">
          <span class="info-box-icon"><i class="ion ion-ios-cloud-download-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Downloads</span>
            <span class="info-box-number">114,381</span>
            <div class="progress">
              <div class="progress-bar" style="width: 70%"></div>
            </div>
            <span class="progress-description">
              70% Increase in 30 Days
            </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
        <div class="info-box bg-aqua">
          <span class="info-box-icon"><i class="ion-ios-chatbubble-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Direct Messages</span>
            <span class="info-box-number">163,921</span>
            <div class="progress">
              <div class="progress-bar" style="width: 40%"></div>
            </div>
            <span class="progress-description">
              40% Increase in 30 Days
            </span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Browser Usage</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-8">
                <div class="chart-responsive">
                  <canvas id="pieChart" height="150"></canvas>
                </div><!-- ./chart-responsive -->
              </div><!-- /.col -->
              <div class="col-md-4">
                <ul class="chart-legend clearfix">
                  <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                  <li><i class="fa fa-circle-o text-green"></i> IE</li>
                  <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                  <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                  <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                  <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                </ul>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.box-body -->
          <div class="box-footer no-padding">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="#">United States of America <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
              <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a></li>
              <li><a href="#">China <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
            </ul>
          </div><!-- /.footer -->
        </div><!-- /.box -->

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
  </section><!-- /.content -->
@stop

@section('script')
  <!-- Sparkline -->
  <script src="{{ asset('public/admin/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
  <!-- jvectormap -->
  <script src="{{ asset('public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
  <script src="{{ asset('public/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
  <!-- SlimScroll 1.3.0 -->
  <script src="{{ asset('public/admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
  <!-- ChartJS 1.0.1 -->
  <script src="{{ asset('public/admin/plugins/chartjs/Chart.min.js') }}"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('public/admin/dist/js/pages/dashboard2.js') }}"></script>

  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/series-label.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            type: 'spline'
        },
        title: {
            text: 'Doanh số bán hàng - 2020'
        },
        xAxis: {
            title: {
                text: 'Tháng'
            },
            categories: ['01', '02', '03', '04', '05', '06',
                '07', '08', '09', '10', '11', '12']
        },
        yAxis: {
            title: {
                text: 'Đơn vị tiền: VNĐ'
            },
            labels: {
                formatter: function () {
                  var nf = Intl.NumberFormat();
                  var x = this.value * 1000000;
                  return String(x).replace(/(.)(?=(\d{3})+$)/g,'$1.');
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
            name: 'Tokyo',
            marker: {
                symbol: 'square'
            },
            data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 23.3, 18.3, 13.9, 9.6, 14.3]

        }, {
            name: 'London',
            marker: {
                symbol: 'diamond'
            },
            data: [3.9,4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
        }]
    });
  </script>
@stop