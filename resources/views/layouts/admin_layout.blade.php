<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Linh kiện máy tính | Quản trị</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/skins/_all-skins.min.css') }}">

    <!-- Select2 để thêm từ khóa cho sản phẩm -->
    <link rel="stylesheet" href="{{ asset('public/admin/plugins/select2/select2.min.css') }}">

    <!-- Các file css thêm -->
    @yield('css')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="{{route('admin.index')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>TQT</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Trang quản trị</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  @if(Session::get('adminId'))
                    <span class="hidden-xs">{{Session::get('adminFullName')}}</span>
                  @endif
                </a>
                <ul class="dropdown-menu">
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Thông tin tài khoản</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{route('admin.logout')}}" class="btn btn-default btn-flat">Đăng xuất</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">BÁN HÀNG</li>
            <li>
              <a href="{{route('admin.index')}}">
                <i class="fa fa-pie-chart"></i> 
                <span>Trang thống kê</span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.product.index')}}">
                <i class="fa fa-cubes"></i>
                <span>Quản lý sản phẩm</span>
                <span class="label label-primary pull-right">
                  {{\DB::table('products')->count()}}
                </span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.transaction.index')}}">
                <i class="fa fa-files-o"></i>
                <span>Quản lý đơn hàng</span>
                <span class="label label-primary pull-right">
                  {{\DB::table('transactions')->count()}}
                </span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.user.index')}}">
                <i class="fa fa-users"></i>
                <span>Quản lý người dùng</span>
                <span class="label label-primary pull-right">
                  {{\DB::table('users')->count()}}
                </span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.review.index')}}">
                <i class="fa fa-star-half-o"></i>
                <span>Quản lý đánh giá</span>
                <span class="label label-primary pull-right">
                  {{\DB::table('reviews')->count()}}
                </span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.post.index')}}">
                <i class="fa fa-file-text"></i>
                <span>Quản lý bài viết</span>
                <span class="label label-primary pull-right">
                  {{\DB::table('posts')->count()}}
                </span>
              </a>
            </li>
            <li class="header">DANH MỤC - NÂNG CAO</li>
            <li>
              <a href="{{route('admin.category.index')}}">
                <i class="fa fa-database"></i>
                <span>Danh mục sản phẩm</span>
                <span class="label label-primary pull-right">
                  {{\DB::table('categories')->count()}}
                </span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.menu.index')}}">
                <i class="fa fa-folder-open"></i>
                <span>Danh mục bài viết</span>
                <span class="label label-primary pull-right">
                  {{\DB::table('menus')->count()}}
                </span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.keyword.index')}}">
                <i class="fa fa-key"></i>
                <span>Quản lý từ khóa</span>
                <span class="label label-primary pull-right">
                  {{\DB::table('keywords')->count()}}
                </span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.attribute.index')}}">
                <i class="fa fa-link"></i>
                <span>Quản lý thuộc tính</span>
                <span class="label label-primary pull-right">
                  {{\DB::table('attributes')->count()}}
                </span>
              </a>
            </li>
            <li>
              <a href="{{route('admin.shipping_fee.index')}}">
                <i class="fa fa-bus"></i>
                <span>Quản lý phí vận chuyển</span>
                <span class="label label-primary pull-right">
                  {{\DB::table('locations')->where('type', 1)->count()}}
                </span>
              </a>
            </li>
            <li class="header">HỆ THỐNG</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Tài khoản nhân viên</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        @yield('content')
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <strong>
          © 2020 Cửa hàng linh kiện máy tính Văn Mạnh | Số 236B, Lê Văn Sỹ, Phường 1, Quận Tân Bình, Hồ Chí Minh
        </strong>
      </footer>

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ asset('public/admin/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{ asset('public/admin/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('public/admin/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('public/admin/plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('public/admin/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('public/admin/dist/js/demo.js') }}"></script>
    <!-- Select2 cho thêm từ khóa -->
    <script src="{{ asset('public/admin/plugins/select2/select2.min.js') }}"></script>

    <!-- Thông báo (SweetAlert) -->
    <script src="{{ asset('public/admin/sweetalert/sweetalert2@9.js') }}"></script>
    <script src="{{ asset('public/admin/sweetalert/sweetalert.min.js') }}"></script>
    @include('sweetalert::alert')

    <script type="text/javascript">
      $(function() {
        // Run select2
        if ($(".js-select2-keyword").length > 0) {
          $(".js-select2-keyword").select2({
            placeholder: "__Chọn từ khóa__",
            maximumSelectionLength: 3,
          });
        }

        // View hình ảnh
        $(".js-upload").change(function(){
          let $this = $(this);
          if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
              $this.parents('.block-images').find('img').attr('src', e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
          }
        });

        // Xử lý phần Đơn hàng 
        $(".js-view-transaction").click(function (event) {
          event.preventDefault();
          let $this = $(this);
          let URL = $this.attr('href');

          $.ajax({
            url: URL,
          }).done(function(results){
            $("#modal-view-transaction .content").html(results.html);
            $("#modal-view-transaction").modal({
              show: true,
            });
          });
          console.log("111");
        });

        $('body').on("click", ".js-delete-order", function(event){
          event.preventDefault();
          let URL = $(this).attr('href');
          let $this = $(this);
          $.ajax({
            url: URL,
          }).done(function(results){
            if (results.code == 200) {
              $this.parents("tr").remove();
            }
          }); 
        });

        // Xác nhận xóa dữ liệu
        $('.delete-confirm').on('click', function (event) {
          event.preventDefault();
          const url = $(this).attr('href');
          swal({
            title: 'Đồng ý xóa?',
            text: 'Dữ liệu sẽ bị xóa và không thể khôi phục!',
            icon: 'warning',
            buttons: ["Hủy", "Đồng ý"],
          }).then(function(value) {
            if (value) {
              window.location.href = url;
            }
          });
        });

      });

    </script>

    <!-- Các file js thêm -->
    @yield('script')
  </body>
</html>
