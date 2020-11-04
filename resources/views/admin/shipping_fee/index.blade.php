@extends('layouts.admin_layout')

@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Danh mục sản phẩm<small>(Tổng {{$shipping_fees->total()}} danh mục)</small></h1>
    <ol class="breadcrumb">
      <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Trang thống kê</a></li>
      <li class="active">Liệt kê phí vận chuyển</li>
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
                <input type="text" name="city" value="{{Request::get('city')}}" class="form-control" placeholder="Tỉnh/Thành phố..." />
                <input type="text" name="fee" value="{{Request::get('fee')}}" class="form-control" placeholder="Phí vận chuyển..." />
                <button type="submit" class="btn btn-info">
                  <i class="fa fa-search"></i> Tìm kiếm
                </button>
              </form>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tr>
                <th>STT</th>
                <th>Tên Tỉnh/Thành phố</th>
                <th>Phí vận chuyển</th>
                <th>Cập nhật</th>
                <th>Tác vụ</th>
              </tr>
              @if($shipping_fees)
                <?php $i = 1; ?>
                @foreach($shipping_fees as $shipping_fee)
                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $shipping_fee->name }}</td>
                    <td>{{ number_format($shipping_fee->shipping_fee,0,',','.') }} đ</td>
                    <td>
                      @if($shipping_fee->updated_at)
                        Vào lúc {{ $shipping_fee->updated_at->format("H:i:s") }}<br />
                        Ngày {{ $shipping_fee->updated_at->format("d/m/Y") }}
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('admin.shipping_fee.update', $shipping_fee->id) }}" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Sửa</a>
                      <a href="{{ route('admin.shipping_fee.delete', $shipping_fee->id) }}" class="delete-confirm btn btn-xs btn-danger"><i class="fa fa-trash"></i> Xóa</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                @endforeach
              @endif
            </table>
          </div><!-- /.box-body -->
          <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
              {!! $shipping_fees->appends($query)->links() !!}
            </ul>
          </div>
        </div><!-- /.box -->
      </div>
    </div>
  </section><!-- /.content -->
@stop