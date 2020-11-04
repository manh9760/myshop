@extends('layouts.admin_layout')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Quản lý sản phẩm<small>(Tổng {{$products->total()}} sản phẩm)</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang thống kê</a></li>
      <li class="active">Liệt kê danh mục</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="box-title">
              <form class="form-inline">
                <input type="text" name="name" value="{{Request::get('name')}}" class="form-control" placeholder="Tên sản phẩm..." />
                <select name="category" class="form-control">
                  <option value="0">--- Danh mục sản phẩm ---</option>
                  @foreach($categories as $item)
                  <option value="{{$item->id}}" {{ Request::get('category') == $item->id ? "selected='selected'" : ""}}>{{$item->name}}</option>
                  @endforeach
                </select>
                <button type="submit" class="btn btn-info">
                  <i class="fa fa-search"></i> Tìm kiếm
                </button>
                <button type="submit" name="export_excel" value="true" class="btn btn-success">
                  <i class="fa fa-save"></i> Xuất File Excel
                </button>
                <a href="{{route('admin.product.create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Thêm mới</a>
              </form>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Danh mục</th>
                <th>Giá sản phẩm</th>
                <th>Tồn kho</th>
                <th>Hình ảnh</th>
                <th>Tình trạng</th>
                <th>Ngày tạo</th>
                <th>Ngày sửa</th>
                <th>Tác vụ</th>
              </tr>
              @if($products)
                <?php $i = 1; ?>
                @foreach($products as $product)
                  <tr>
                    <td>{{ $i }}</td>
                    <td style="max-width:180px">{{ $product->name }}</td>
                    <td>
                      <span class="label label-info">{{ $product->category->name ?? "[N\A]" }}</span>
                    </td>
                    <td>
                      @if($product->sale)
                        Giá cũ: {{ number_format($product->price_old,0,',','.') }} đ<br/>
                        Giảm: {{$product->sale}}%<br/>
                      @endif
                        Giá bán: {{ number_format($product->price,0,',','.') }} đ
                    </td>
                    <td>{{ $product->number }}</td>
                    <td>
                      <img src="{{ asset(parse_url_file($product->avatar)) }}" width="80" />
                    </td>
                    <td>
                      @if($product->active)
                        <a href="{{ route('admin.product.active', $product->id) }}" class="label label-success">Hiện</a>
                      @else
                        <a href="{{ route('admin.product.active', $product->id) }}" class="label label-danger">Ẩn</a>
                      @endif
                    </td>
                    <td>
                      @if($product->created_at)
                        Vào lúc {{ $product->created_at->format("H:i:s") }}<br />
                        Ngày {{ $product->created_at->format("d/m/Y") }}
                      @endif
                    </td>
                    <td>
                      @if($product->updated_at)
                        Vào lúc {{ $product->updated_at->format("H:i:s") }}<br />
                        Ngày {{ $product->updated_at->format("d/m/Y") }}
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('admin.product.update', $product->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                      <a href="{{ route('admin.product.delete', $product->id) }}" class="delete-confirm btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                @endforeach
              @endif
            </table>
          </div><!-- /.box-body -->
          <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
              {!! $products->appends($query)->links() !!}
            </ul>
          </div>
        </div><!-- /.box -->
      </div>
    </div>
  </section><!-- /.content -->
@stop