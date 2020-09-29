<table class="table table-hover">
  <tr>
    <th>STT</th>
    <th>Tên sản phẩm</th>
    <th>Hình ảnh</th>
    <th>Số lượng</th>
    <th>Đơn giá</th>
    <th>Thành tiền</th>  
  </tr>
  <?php $i = 1; ?>
  @foreach($orders as $item)
    <tr>
      <td>{{ $i }}</td>
      <td>
        <a href="">
          {{ $item->product->name ?? "[N\A]" }}
        </a>
      </td>
      <td><img src="{{ asset(parse_url_file($item->product->avatar ?? '')) }}" width="80" /></td>
      <td>{{ $item->quantity }}</td>
      <td>{{ number_format($item->product_price,0,',','.') }}  đ</td>
      <td>{{ number_format($item->total_price,0,',','.') }}  đ</td>
    </tr>
    <?php $i++; ?>
  @endforeach
</table>