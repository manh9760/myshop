<form role="form" action="" enctype="multipart/form-data" method="post">
  @csrf
  <!-- left column -->
  <div class="col-md-8">
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Thông tin sản phẩm</h3>
      </div>

      <div class="box-body">
        <!-- Tên sản phẩm -->
        <div class="form-group {{ $errors->first('title') ? 'has-error':'' }}">
          <label for="title">Tiêu đề bài viết</label>
          <input type="text" name="title" value="{{$post->title ?? old('title')}}" class="form-control" placeholder="Nhập tiêu đề bài viết..." />
          @if($errors->first('title'))
            <span class="text-danger">{{ $errors->first('title') }}</span>
          @endif
        </div>

        <!-- Danh mục sản phẩm -->
        <div class="form-group {{ $errors->first('menu_id') ? 'has-error':'' }}">
          <label for="menu_id">Danh mục bài viết</label>
          <select class="form-control select2" name="menu_id" style="width: 100%;">
            <option value="">__Chọn danh mục bài viết__</option>
            @foreach($menus as $menu)
              <option value="{{$menu->id}}" {{ ($post->menu_id ?? 0 == $menu->id) ? "selected='selected'" : "" }}>
                {{$menu->name}}
              </option>
            @endforeach
          </select>
          @if($errors->first('menu_id'))
            <span class="text-danger">{{ $errors->first('menu_id') }}</span>
          @endif
        </div>

        <!-- Thông số kỹ thuật -->
        <div class="form-group {{ $errors->first('description') ? 'has-error':'' }}">
          <label>Mô tả</label>
          <textarea class="form-control" name="description" rows="5" placeholder="Nhập mô tả...">
            {{$post->description ?? old('description')}}
          </textarea>
          @if($errors->first('description'))
            <span class="text-danger">{{ $errors->first('description') }}</span>
          @endif
        </div>

        <!-- Mô tả sản phẩm -->
        <div class="form-group {{ $errors->first('content') ? 'has-error':'' }}">
          <label>Nội dung bài viết</label>
          <textarea class="form-control" name="content" id="content" rows="6" placeholder="Nhập nội dung bài viết...">
            {{$post->content ?? old('content')}}
          </textarea>
          @if($errors->first('content'))
            <span class="text-danger">{{ $errors->first('content') }}</span>
          @endif
        </div>

      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-success">{{isset($post)?'Cập nhật':'Thêm mới'}}</button>
        <button type="" class="btn btn-default">Hủy</button>
      </div>
    </div>
  </div><!--/.col (left) -->

  <!-- right column -->
  <div class="col-md-4">
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Ảnh đại diện</h3>
      </div>

      <div class="box-body block-images">
        <div class="form-group">
          <img src="{{ isset($post) ? asset(parse_url_file($post->avatar)) : asset('public/admin/images/no-image.png') }}" onerror="this.onerror=null; this.src='/images/no-image.png';" alt="" class="img-thumbnail" style="width: 220px; height: 220px;">
        </div>
        <div style="position:relative;"> 
          <a class="btn btn-primary" href="javascript:;"> 
            Chọn ảnh 
            <input type="file" style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;" name="avatar" size="40" class="js-upload"> 
          </a> &nbsp; 
          <span class="label label-info" id="upload-file-info"></span> 
        </div>
      </div><!-- /.box-body -->

    </div><!-- /.box box-warning-->
  </div><!--/.col (right) -->
</form>

<script type="text/javascript" src="{{ asset('public/admin/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
  var options = {
    filebrowserImageBrowseUrl: '{{ asset("/laravel-filemanager?type=Images") }}',
    filebrowserImageUploadUrl: '{{ asset("/laravel-filemanager/upload?type=Images&_token=") }}',
    filebrowserBrowseUrl: '{{ asset("/laravel-filemanager?type=Files") }}',
    filebrowserUploadUrl: '{{ asset("/laravel-filemanager/upload?type=Files&_token=") }}',
  };
  CKEDITOR.replace('content', options);
</script>