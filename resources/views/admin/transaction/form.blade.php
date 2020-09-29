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
        <div class="form-group {{ $errors->first('name') ? 'has-error':'' }}">
          <label for="name">Tên sản phẩm</label>
          <input type="text" name="name" value="{{$product->name ?? old('name')}}" class="form-control" placeholder="Nhập tên sản phẩm..." />
          @if($errors->first('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
          @endif
        </div>

        <div class="row form-group">
          <!-- Giá bán ra -->
          <div class="col-xs-4 form-group {{ $errors->first('price_old') ? 'has-error':'' }}">
            <label for="price_old">Giá bán ra (Chưa tính % giảm)</label>
            <input type="text" name="price_old" value="{{$product->price_old ?? old('price_old')}}" class="form-control" placeholder="Nhập giá bán (vd: 8,500,000)" />
            @if($errors->first('price_old'))
              <span class="text-danger">{{ $errors->first('price_old') }}</span>
            @endif
          </div>

          <!-- Giảm giá -->
          <div class="col-xs-3 form-group {{ $errors->first('sale') ? 'has-error':'' }}">
            <label for="sale">Giảm giá (%)</label>
            <input type="number" name="sale" value="{{$product->sale ?? 0}}" class="form-control" placeholder="Nhập % giảm" min="0" />
            @if($errors->first('sale'))
              <span class="text-danger">{{ $errors->first('sale') }}</span>
            @endif
          </div>
          
          <!-- Danh mục sản phẩm -->
          <div class="col-xs-5 form-group {{ $errors->first('category_id') ? 'has-error':'' }}">
            <label for="category_id">Danh mục sản phẩm</label>
            <select class="form-control select2" name="category_id" style="width: 100%;">
              <option value="">__Chọn danh mục__</option>
              @foreach($categories as $category)
                <option value="{{$category->id}}" {{ ($product->category_id ?? 0 == $category->id) ? "selected='selected'" : "" }}>
                  {{$category->name}}
                </option>
              @endforeach
            </select>
            @if($errors->first('category_id'))
              <span class="text-danger">{{ $errors->first('category_id') }}</span>
            @endif
          </div>
        </div><!-- /.row form-group -->
        
        <!-- checkbox -->
        <div class="form-group">
          <label for="category_id">Thuộc tính sản phẩm</label>
          <div class="checkbox">
            @foreach($attributes as $key => $attribute)
              <div class="col-xs-3 form-group">
                <h6>{{$key}}</h6>
                @foreach($attribute as $item)
                <div>
                  <label>
                    <input type="checkbox" name="attribute[]" value="{{$item['id']}}" 
                      {{in_array($item['id'], $oldAttribute) ? "checked" : ""}}/>
                    {{$item['name']}}
                  </label>
                </div>
                @endforeach
              </div>
            @endforeach
          </div>
        </div>

        <div class="row form-group">
          <!-- Tốc độ cơ bản -->
          <div class="col-xs-3 form-group">
            <label for="price_old">Tốc độ cơ bản</label>
            <input type="text" name="" class="form-control" placeholder="3 GHz" />
          </div>
          <!-- Tốc độ cơ bản -->
          <div class="col-xs-3 form-group">
            <label for="price_old">Luồng CPU</label>
            <input type="text" name="" class="form-control" placeholder="4 luồng" />
          </div>
          <!-- Tốc độ cơ bản -->
          <div class="col-xs-3 form-group">
            <label for="price_old">Cache</label>
            <input type="text" name="" class="form-control" placeholder="6MB" />
          </div>
          <!-- Tốc độ cơ bản -->
          <div class="col-xs-3 form-group">
            <label for="price_old">Vi xử lý đồ họa</label>
            <input type="text" name="" class="form-control" placeholder="Intel@UHD Graphics 630" />
          </div>
        </div>

        <!-- Thông số kỹ thuật -->
        <div class="form-group {{ $errors->first('description') ? 'has-error':'' }}">
          <label>Thông số kỹ thuật</label>
          <textarea class="form-control" name="description" rows="5" placeholder="Nhập thông số kỹ thuật...">
            {{$product->description ?? old('description')}}
          </textarea>
          @if($errors->first('description'))
            <span class="text-danger">{{ $errors->first('description') }}</span>
          @endif
        </div>

        <!-- Mô tả sản phẩm -->
        <div class="form-group {{ $errors->first('content') ? 'has-error':'' }}">
          <label>Mô tả sản phẩm</label>
          <textarea class="form-control" name="content" rows="6" placeholder="Nhập mô tả...">
            {{$product->content ?? old('content')}}
          </textarea>
          @if($errors->first('content'))
            <span class="text-danger">{{ $errors->first('content') }}</span>
          @endif
        </div>

      </div>

      <div class="box-footer">
        <button type="submit" class="btn btn-success">{{isset($product)?'Cập nhật':'Thêm mới'}}</button>
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
          <img src="{{ asset('public/admin/images/no-image.png') }}" onerror="this.onerror=null; this.src='/images/no-image.png';" alt="" class="img-thumbnail" style="width: 200px; height: 200px;">
        </div>
        <div class="form-group">
          <a class="btn btn-default" href="javascript:;">
            <i class="fa fa-cloud-upload"></i> Chọn ảnh
            <!-- <input type="file" style="position:absolute;z-index:2;top:0;left:0;filter:alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;" name="avatar" class="js-upload" /> -->
            <input type="file" name="avatar" class="js-upload" />
          </a> &nbsp; <span class="label label-info" id="upload-file-info"></span>
        </div>
      </div><!-- /.box-body -->

      <div class="box-body block-images">
        <div class="form-group">
          <img src="{{ asset('public/admin/images/no-image.png') }}" onerror="this.onerror=null; this.src='/images/no-image.png';" alt="" class="img-thumbnail" style="width: 200px; height: 200px;">
        </div>
        <div class="form-group">
          <a class="btn btn-default" href="javascript:;">
            <i class="fa fa-cloud-upload"></i> Chọn ảnh
            <!-- <input type="file" style="position:absolute;z-index:2;top:0;left:0;filter:alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;" name="avatar" class="js-upload" /> -->
            <input type="file" name="img1" class="js-upload" />
          </a> &nbsp; <span class="label label-info" id="upload-file-info"></span>
        </div>
      </div><!-- /.box-body -->

      <div class="box-body block-images">
        <div class="form-group">
          <img src="{{ asset('public/admin/images/no-image.png') }}" onerror="this.onerror=null; this.src='/images/no-image.png';" alt="" class="img-thumbnail" style="width: 200px; height: 200px;">
        </div>
        <div class="form-group">
          <a class="btn btn-default" href="javascript:;">
            <i class="fa fa-cloud-upload"></i> Chọn ảnh
            <!-- <input type="file" style="position:absolute;z-index:2;top:0;left:0;filter:alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;" name="avatar" class="js-upload" /> -->
            <input type="file" name="img2" class="js-upload" />
          </a> &nbsp; <span class="label label-info" id="upload-file-info"></span>
        </div>
      </div><!-- /.box-body -->

    </div><!-- /.box box-warning-->
  </div><!--/.col (right) -->
</form>