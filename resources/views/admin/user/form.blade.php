<div class="col-md-12">
  <!-- general form elements disabled -->
  <div class="box box-info">
    <div class="box-body">
      <form role="form" method="post" action="">
        @csrf
        <input type="hidden" name="user_id" value="{{$user->id ?? 0}}" />
        <div class="row form-group">
          <!-- Họ tên -->
          <div class="col-xs-3 form-group {{ $errors->first('full_name') ? 'has-error':'' }}">
            <label for="full_name">Họ tên <span class="text-danger">(*)</span></label>
            <input type="text" name="full_name" class="form-control"  value="{{$user->full_name ?? old('full_name')}}" />
            @if($errors->first('full_name'))
              <span class="text-danger">{{ $errors->first('full_name') }}</span>
            @endif
          </div>
          <!-- Số điện thoại -->
          <div class="col-xs-3 form-group {{ $errors->first('phone') ? 'has-error':'' }}">
            <label for="phone">Số điện thoại <span class="text-danger">(*)</span></label>
            <input type="text" name="phone" class="form-control" value="{{$user->phone ?? old('phone')}}">
            @if($errors->first('phone'))
              <span class="text-danger">{{ $errors->first('phone') }}</span>
            @endif
          </div>
          <!-- Địa chỉ Email -->
          <div class="col-xs-3 form-group {{ $errors->first('email') ? 'has-error':'' }}">
            <label for="email">Địa chỉ Email <span class="text-danger">(*)</span></label>
            <input type="email" name="email" class="form-control" value="{{$user->email ?? old('email')}}" {{$isUpdateUser ? 'disabled' : ''}} />
            @if($errors->first('email'))
              <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
          </div>
          <!-- loại tài khoản -->
          <div class="col-xs-3 form-group">
            <label for="role">Loại tài khoản <span class="text-danger">(*)</span></label>
              @if(Session::get('adminId') == $user->id)
                <input type="hidden" name="role" value="{{$user->role}}" />
                <select class="form-control select2" name="role" disabled='disabled'>
                  <option value="3" {{ (($user->role ?? 0) == 3) ? "selected='selected'" : "" }}>Khách hàng</option>
                  <option value="2" {{ (($user->role ?? 0) == 2) ? "selected='selected'" : ""}}>Nhân viên</option>
                  <option value="1" {{ (($user->role ?? 0) == 1) ? "selected='selected'" : ""}}>Quản trị</option>
                </select>
              @else
                <select class="form-control select2" name="role">
                  <option value="3" {{ (($user->role ?? 0) == 3) ? "selected='selected'" : "" }}>Khách hàng</option>
                  @if(Session::get('adminRole') == 1)
                    <option value="2" {{ (($user->role ?? 0) == 2) ? "selected='selected'" : ""}}>Nhân viên</option>
                    <option value="1" {{ (($user->role ?? 0) == 1) ? "selected='selected'" : ""}}>Quản trị</option>
                  @endif
                </select>
              @endif
            </select>
          </div>
        </div>

        <!-- Địa chỉ nhà -->
        @if(!$isUpdateUser)
        <div class="row form-group">
          <!-- Họ tên -->
          <div class="col-xs-6 form-group {{ $errors->first('password') ? 'has-error':'' }}">
            <label for="password">Mật khẩu <span class="text-danger">(*)</span></label>
            <input type="password" name="password" class="form-control" />
            @if($errors->first('password'))
              <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
          </div>
          <!-- Số điện thoại -->
          <div class="col-xs-6 form-group {{\Session::get('failedRegister') ? 'has-error':'' }}">
            <label for="phone">Nhập lại mật khẩu <span class="text-danger">(*)</span></label>
            <input type="password" name="confirm_password" class="form-control" />
            @if(\Session::get('failedRegister'))
              <span class="text-danger">{{\Session::get('failedRegister')}}</span>
              <?php \Session::put('failedRegister', null); ?>
            @endif
          </div>
        </div>
        @endif

        <div class="box-footer">
          <button type="submit" class="btn btn-success">Lưu lại</button>
          <button type="" class="btn btn-default">Hủy</button>
        </div><!-- /.box-footer -->
      </form>
    </div><!-- /.box-body -->
  </div><!-- /.box -->
</div><!--/.col-md-12 -->