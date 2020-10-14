<!DOCTYPE html>
<html>
<title>Linh kiện máy tính</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('public/emails/w3.css') }}">
<link rel="stylesheet" href="{{ asset('public/emails/style.css') }}">
<link rel="stylesheet" href="{{ asset('public/emails/font-awesome.min.css') }}">
<style>
  html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">
  <!-- Page Container -->
  <div class="w3-content w3-margin-top" style="max-width:1400px;margin-left:20%">
    <!-- The Grid -->
    <div class="w3-row-padding">
      <!-- Right Column -->
      <div class="w3-twothird">
        <div class="w3-container w3-card w3-white w3-margin-bottom">
          <h2 class="w3-text-grey w3-padding-16">
            <img src="{{ $message->embed(asset('public/guest/images/logos/logo-vm.png')) }}">
          </h2>
          <div class="w3-container">
            <b>Xin chào {{$full_name}},</b>
            <p>Chúng tôi xin chân thành cảm ơn bạn đã đăng ký tài khoản tại Cửa hàng linh kiện máy tính Văn Mạnh.</p>
            <p>Mời bạn <a href="{{route('get.user.info')}}">Click vào đây</a> để cập nhật thông tin cá nhân.</p>
            <hr>
            <p>
              Điện thoại: 0565 902 617 <br /> 
              Email: vanmanh.linhkien@gmail.com <br />
              Địa chỉ: Số 236B, Lê Văn Sỹ, Phường 1, Quận Tân Bình, Hồ Chí Minh
            </p>
          </div>
        </div>
      <!-- End Right Column -->
      </div>
    <!-- End Grid -->
    </div>
    <!-- End Page Container -->
  </div>
</body>
</html>