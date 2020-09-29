<div class="col-md-12">
  <!-- general form elements disabled -->
  <div class="box box-info">
    <div class="box-body">
      <form role="form" method="post" action="">
        @csrf
        <div class="row form-group">
          <!-- Họ tên -->
          <div class="col-xs-3 form-group {{ $errors->first('full_name') ? 'has-error':'' }}">
            <label for="full_name">Họ tên <span class="text-danger">(*)</span></label>
            <input type="text" name="full_name" class="form-control"  placeholder="Nguyễn Văn A" />
            @if($errors->first('full_name'))
              <span class="text-danger">{{ $errors->first('full_name') }}</span>
            @endif
          </div>
          <!-- Số điện thoại -->
          <div class="col-xs-3 form-group {{ $errors->first('phone') ? 'has-error':'' }}">
            <label for="phone">Số điện thoại <span class="text-danger">(*)</span></label>
            <input type="number" name="phone" class="form-control" placeholder="0909091010">
            @if($errors->first('phone'))
              <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
          </div>
          <!-- Địa chỉ Email -->
          <div class="col-xs-3 form-group {{ $errors->first('email') ? 'has-error':'' }}">
            <label for="email">Địa chỉ Email <span class="text-danger">(*)</span></label>
            <input type="email" name="email" class="form-control" placeholder="nguyen.a@gmail.com" />
            @if($errors->first('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
          </div>
          <!-- Mật khẩu -->
          <div class="col-xs-3 form-group {{ $errors->first('password') ? 'has-error':'' }}">
            <label for="password">Mật khẩu <span class="text-danger">(*)</span></label>
            <input type="password" name="password" class="form-control" />
            @if($errors->first('password'))
              <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
          </div>
        </div>

        <!-- Địa chỉ nhà -->
        <div class="row form-group">
          <!-- Họ tên -->
          <div class="col-xs-3 form-group {{ $errors->first('full_name') ? 'has-error':'' }}">
            <label for="full_name">Số nhà <span class="text-danger">(*)</span></label>
            <input type="text" name="full_name" class="form-control"  placeholder="Nguyễn Văn A" />
            @if($errors->first('full_name'))
              <span class="text-danger">{{ $errors->first('full_name') }}</span>
            @endif
          </div>
          <!-- Số điện thoại -->
          <div class="col-xs-3 form-group {{ $errors->first('phone') ? 'has-error':'' }}">
            <label for="phone">Tỉnh/Thành phố <span class="text-danger">(*)</span></label>
            <input type="number" name="phone" class="form-control" placeholder="0909091010">
            @if($errors->first('phone'))
              <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
          </div>
          <!-- Địa chỉ Email -->
          <div class="col-xs-3 form-group {{ $errors->first('email') ? 'has-error':'' }}">
            <label for="email">Quận/Huyện <span class="text-danger">(*)</span></label>
            <input type="email" name="email" class="form-control" placeholder="nguyen.a@gmail.com" />
            @if($errors->first('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
          </div>
          <!-- Mật khẩu -->
          <div class="col-xs-3 form-group {{ $errors->first('password') ? 'has-error':'' }}">
            <label for="password">Xã/Phường <span class="text-danger">(*)</span></label>
            <input type="password" name="password" class="form-control" />
            @if($errors->first('password'))
              <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
          </div>
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-success">Lưu lại</button>
          <button type="" class="btn btn-default">Hủy</button>
        </div><!-- /.box-footer -->
      </form>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!--/.col-md-12 -->