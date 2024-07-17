@extends('pages.layout')

@section('title')

     Trang cá nhân
    
@endsection

@section('content')

<script defer type="text/javascript" src="https://web.nvnstatic.net/tp/T0239/js/cart.js?v=2"></script>
<link rel="stylesheet" href="https://web.nvnstatic.net/tp/T0239/css/cart.css?v=2" type="text/css">
<div id="cart">
    <div class="container-pre">
        <div class="row">
            <div id="layout-page" class="">
                <div class="">
                    <h1 class="text-center">Lịch sử mua hàng</h1>
                </div>
                <div>
                    <table class="cart cart-hidden">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Địa chỉ</th>
                                <th>Trạng thái</th>
                                <th>Ngày đặt</th>
                                <th>Tổng tiền</th>
                                <th>Xem chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_order as $item )
                                <tr>
                                    <td scope="row">{{$loop->index+1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->address}} {{$item->ward}} {{$item->district}} {{$item->city}}</td>
                                    <td>
                                    
                                            @if($item->status == 0)
                                                <span>Chưa xác nhận</span>
                                            @else
                                                <span>Đã xác nhận</span>
                                            @endif
                                        
                                    </td>
                                    <td>{{$item->created_at->format('d/m/Y')}}</td>
                                    <td>{{$item->total_amount}}</td>
                                    <td>
                                        <a href="/lich-su-mua-hang/don-hang-chi-tiet/{{$item->id_order}}" class="btn btn-sm btn-primary">Chi tiết đơn hàng</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>

    </div>
</div>
    
@endsection