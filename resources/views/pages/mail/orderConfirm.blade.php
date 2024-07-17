<div style="boder:3px solid rgb(212, 208, 208);">

    <h3>Hi! {{$nameinfo}} </h3>
    <p>Xác nhận đơn hàng SneakVibe</p>
    <h4> Đơn hàng của bạn</h4>
    
    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Size</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        <?php $total = 0; ?>
        @foreach (session('cart') as $item )
        <tr>
            <th>{{$loop->index + 1}}</th>
            <th>{{$item['name']}}</th>
            <th>{{$item['size']}}</th>
            <th>{{number_format($item['price'])}}₫</th>
            <th>{{$item['quantity']}}</th>
            <th>{{number_format($item['price'] * $item['quantity'])}}</th>
        </tr>
        <?php $total += $item['price'] * $item['quantity']; ?>
        @endforeach
@if(session('voucher'))
@foreach(session('voucher') as $kk)
@php $vc = $kk['giam'] @endphp
@endforeach
@endif
@if(session('voucher'))
        <tr>
            <th colspan="5">Tổng tiền</th>
            <th>{{number_format($total - $vc)}}</th>
        </tr>
@else
<tr>
            <th colspan="6">Tổng tiền</th>
            <th>{{number_format($total)}}</th>
        </tr>
@endif
    </table>
    <p>
        <a href="{{route('order.verify', $tokeninfo)}}" style="display: inline-block; padding: 7px 25px; color: #fff; background: red">Xác nhận đơn hàng</a>
    </p>
    <p>

    </p>
</div>
