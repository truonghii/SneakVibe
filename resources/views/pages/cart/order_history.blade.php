@extends('pages.layout')

@section('title')
    Lịch sử mua hàng
@endsection

@section('content')
<div id="cart">
    <div class="container-pre">
        <div class="row">
            <div id="layout-page" class="col-12 py-4">
                <div class="main-title mt-2 mb-5">
                    <h1 class="text-center">Chi tiết đơn hàng</h1>
                </div>
                <div class="contact-wrap">
                    <div class="container">
                        <h3>Thông tin khách hàng</h3>
                        <table class="table">
                            <thead>
                            @foreach ($list_order as $item )
                                <tr>
                                    <th>Họ Tên</th>
                                    <td>{{$item->name}}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{$item->phone}}</td>
                                </tr>
                                <tr>
                                    <th>Đỉa chỉ</th>
                                    <td>{{$item->address}} {{$item->ward}} {{$item->district}} {{$item->city}}</td>
                                </tr>
                            @endforeach
                            </thead>
                        </table> 
                        <h3>Thông tin sản phẩm</h3>
                            <table class="cart">
                                <thead>
                                    <tr>
                                        <th style="padding:10px">STT</th>
                                        <th style="padding:10px">Ảnh</th>
                                        <th style="padding:10px">Tên sản phẩm</th>
                                        <th style="padding:10px">Size</th>
                                        <th style="padding:10px">Số lượng</th>
                                        <th style="padding:10px">Giá</th>
                                        <th style="padding:10px">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_order_history as $item )
                                        <tr>
                                            <td scope="row" style="padding:10px">{{$loop->index+1}}</td>
                                            <td>
                                                <img src="{{asset('/uploads/product/'.$item->image)}}" style="height:70px;width:70px" alt="">
                                            </td>
                                            <td style="padding:10px">{{$item->name_sp}}</td>
                                            <td style="padding:10px">{{$item->size}}</td>
                                            <td style="padding:10px">{{$item->quantity}}</td>
                                            <td style="padding:10px">{{$item->price}}</td>
                                            <td style="padding:10px">{{$item->price * $item->quantity}} VND</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection