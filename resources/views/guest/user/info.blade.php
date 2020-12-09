@extends('layouts.guest_layout')

@section('content')
<div id="content" class="wrapper">
	<div class="grid">
		
		<section class="unit three-quarters">
			
			<header class="post-header">
				<h1 class="post-title">
					@if(Session::get('userId'))
						{{Session::get('userFullName')}}
					@endif
				</h1>
				<div class="breadcrumbs">
					<a href="{{route('get.home')}}">Trang chủ</a> <i class="delimeter"></i> 
					Thông tin tài khoản
				</div>
			</header>
			
			<form role="form" action="{{ route('post.info') }}" enctype="multipart/form-data" method="post">
				@csrf
				<input type="hidden" name="user_id" value="{{$user->id ?? 0}}" />
				<table class="shipping">
					<tr>
						<th>Họ tên <abbr class="required" title="required">*</abbr></th>
						<td>
							@if($errors->first('full_name'))
				            	<span style="color:red;">{{ $errors->first('full_name') }}</span><br />
				          	@endif
							<input type="text" name="full_name" value="{{$user ? $user->full_name : ''}}" />
						</td>
					</tr>
					<tr>
						<th>Số điện thoại <abbr class="required" title="required">*</abbr></th>
						<td>
							@if($errors->first('phone'))
				            	<span style="color:red;">{{ $errors->first('phone') }}</span><br />
				          	@endif
							<input type="text" name="phone" value="{{$user ? $user->phone : ''}}" />
						</td>
					</tr>
					<tr>
						<th>Địa chỉ email <abbr class="required" title="required">*</abbr></th>
						<td>
							<input type="email" value="{{$user ? $user->email : ''}}" disabled />
						</td>
					</tr>
					<tr>
						<td class="submit" colspan="2">
							<button type="submit" class="button">Cập nhật thông tin</button>
						</td>
					</tr>
				</table>
			</form>
			
		</section>
		
		@include('guest.user._aside')
	</div>
</div>
@stop