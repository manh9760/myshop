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
  <div class="w3-content w3-margin-top" style="max-width:1400px;margin-left:6%">
    <!-- The Grid -->
    <div class="w3-row-padding">
      <!-- Right Column -->
      <div class="w3-twothird">
        <div class="w3-container w3-card w3-white w3-margin-bottom">
          <h2 class="w3-text-grey w3-padding-16">
            <img src="{{ $message->embed(asset('public/guest/images/logos/logo-vm.png')) }}">
          </h2>
          <div class="w3-container">
            <p>Để lấy lại mật khẩu, vui lòng truy cập vào <a href="{{route('admin.createPassword', $userId)}}">đường link này</a></p>
            <hr>
            <p>
              Điện thoại: 0977 160 823 <br /> 
              Email: parabol123654@gmail.com <br />
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