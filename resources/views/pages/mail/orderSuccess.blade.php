<div style="boder:3px solid rgb(212, 208, 208);">

    <h3>Hi! {{$nameinfo}}</h3>
    <p>Xác nhận đơn hàng SneakVibe</p>
    <h4> Đơn hàng của bạn</h4>
@foreach (session('cart') as $item )
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        <tr>
            <th>{{$loop->index + 1}}</th>
            <th>{{$item['name']}}</th>
            <th>{{number_format($item['price'])}}₫</th>
            <th>{{$item['quantity']}}</th>
            <th>{{number_format($item['price'] * $item['quantity'])}}</th>
        </tr>
        @endforeach
    </table>
    <p style="border: 2px solid red;
            background-color: red;
            color: white;
            height: 30px;
            width: 200px;  
            text-align: center;">
        Đặt hàng thành công
    </p>
    <p>

    </p>
</div>
