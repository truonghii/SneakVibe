@extends('pages.layout')

@section('title')
    Gio Hang
@endsection

@section('content')
<script defer type="text/javascript" src="https://web.nvnstatic.net/tp/T0239/js/cart.js?v=2"></script>
        <link rel="stylesheet" href="https://web.nvnstatic.net/tp/T0239/css/cart.css?v=2" type="text/css">
@if(isset($cart))
        <div id="cart">
            <div class="container-pre">
                <div class="row">
                    <div id="layout-page" class="col-12 py-4">
                        <div class="main-title mt-2 mb-5">
                            <h1 class="text-center">Giỏ hàng</h1>
                        </div>
                        <div id="cartformpage" class="pb30">
                            <table class="cart cart-hidden">
                                <thead>
                                    <tr>
                                        <th class="image">Hình ảnh</th>
                                        <th class="item">Tên sản phẩm</th>
                                        <th class="size" style="padding: 20px">Size</th>
                                        <th class="qty">Số lượng</th>
                                        <th class="price">Giá tiền</th>
                                        <th class="remove">Xoá</th>
                                    </tr>
                                </thead>
@php $qty = 0 @endphp
@php $totala = 0 @endphp
@php $total = 0 @endphp
@php $dc = 85/100 @endphp
@if(session('voucher'))
@foreach(session('voucher') as $kk)
    @php $total = $kk['giam'] @endphp
@endforeach
@endif
                                <tbody>
                                    @foreach ($cart as $item )
                                    @php $totala += $item['price'] * $item['quantity'] @endphp
                                    @php $qty += $item['quantity'] @endphp
                                    <tr class="item">
                                        <td class="image">
                                            <div class="product_image">
                                                <a href="/quan-nike-as-m-nsw-club-jggr-ft-black-m-p37960142.html">
                                                    <img class="lazyload" data-sizes="auto" src="{{asset('/uploads/product/'.$item['image'])}}"/>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="item">
                                            <a href="/quan-nike-as-m-nsw-club-jggr-ft-black-m-p37960142.html">
                                                <strong>{{$item['name']}}</strong>
                                            </a>
                                        </td>
                                        <td class="size" >
                                            <a href="/quan-nike-as-m-nsw-club-jggr-ft-black-m-p37960142.html">
                                                <strong>{{$item['size']}}</strong>
                                            </a>
                                        </td>
                                        <td style="display: flex; margin-top:40px" data-th="Quantity">
                                                <form action="/update-cart" method="post">
                                                    <input type="hidden" name="id" value="{{$item['id']}}"class="form-control bt">
                                                    <input type="hidden" name="tt" value="1"class="form-control bt">
                                                    <input type="hidden" name="qty" value="{{ $item['quantity'] }}"class="form-control bt">
                                                    <button class="btn btn-default"> - </button>
                                                    @csrf
                                                </form>
                                                <span style=" margin:0px 10px"> {{ $item['quantity'] }}</span>
                                                <form action="/update-cart" method="post">
                                                    <input type="hidden" name="tt" value="2"class="form-control bt">
                                                    <input type="hidden" name="id" value="{{$item['id']}}"class="form-control bt">
                                                    <button class="btn btn-default"> + </button>
                                                    @csrf
                                                </form>
                                        </td>
                                        <td class="price">
                                            {{number_format($item['price'] * $item['quantity'])}}
                                        </td>
                                        <td class="remove">
                                            <a href="{{route('delete.product', $item['id'])}}" rel="nofollow" class="cart remove_cart"
                                                data-id="37960142"></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="cart-item cart-visible d-flex d-sm-none">
                                <div class="product_image">
                                    <a href="/quan-nike-as-m-nsw-club-jggr-ft-black-m-p37960142.html">
                                        <img class="lazyload" data-sizes="auto"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            data-src="https://pos.nvncdn.com/eb9ddb-116318/ps/20220323_DecqSbHo99j8CTCfyOlPZlfj.png" />
                                    </a>
                                </div>
                                <div class="product-info">
                                    <div class="title">
                                        <a href="/quan-nike-as-m-nsw-club-jggr-ft-black-m-p37960142.html">Quần Nike AS M
                                            NSW Club JGGR FT ‘Black’ - M</a>
                                    </div>
                                    <div class="price-text">
                                        <span class="price">
                                            2.100.000₫ </span>
                                    </div>
                                    <div class="remove-xs">
                                        <a data-id="37960142" class="cart remove_cart">Xóa</a>
                                    </div>
                                </div>
                                <div class="qty qty-mobile d-inline-flex justify-content-end product-quantity m-0">
                                    <span
                                        class="number-minus text-center font-weight-bold d-flex align-items-center">-</span>
                                    <input type="number" size="4" min="1" max="5000" value="1" data-id="37960142"
                                        class="tc item-quantity qty p-input quantity-number line-item-qty product_37960142">
                                    <span
                                        class="number-plus text-center font-weight-bold d-flex align-items-center text">+</span>
                                </div>
                            </div>
                            <div class="cart-item cart-visible d-flex d-sm-none">
                                <div class="product_image">
                                    <a
                                        href="/ao-sweater-fear-of-god-essentials-pullover-mockneck-dark-heather-oatmeal-m-p37960154.html">
                                        <img class="lazyload" data-sizes="auto"
                                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                                            data-src="https://pos.nvncdn.com/eb9ddb-116318/ps/20220323_bmMnmRQV4BqPGNHEqlEnJDAn.png" />
                                    </a>
                                </div>
                                <div class="product-info">
                                    <div class="title">
                                        <a
                                            href="/ao-sweater-fear-of-god-essentials-pullover-mockneck-dark-heather-oatmeal-m-p37960154.html">Áo
                                            Sweater Fear Of God Essentials Pullover Mockneck Dark Heather Oatmeal -
                                            M</a>
                                    </div>
                                    <div class="price-text">
                                        <span class="price">
                                            1.900.000₫ </span>
                                    </div>
                                    <div class="remove-xs">
                                        <a data-id="37960154" class="cart remove_cart">Xóa</a>
                                    </div>
                                </div>
                                <div class="qty qty-mobile d-inline-flex justify-content-end product-quantity m-0">
                                    <span
                                        class="number-minus text-center font-weight-bold d-flex align-items-center">-</span>
                                    <input type="number" size="4" min="1" max="5000" value="2" data-id="37960154"
                                        class="tc item-quantity qty p-input quantity-number line-item-qty product_37960154">
                                    <span
                                        class="number-plus text-center font-weight-bold d-flex align-items-center text">+</span>
                                </div>
                            </div>
                            <!--                        </div>-->

                            <!--                        <div class="cart-visible clearfix">-->
                            <!--                            <div class="col-6 total text-center text-uppercase" style="font-size: 15px">Tổng tiền : </div>-->
                            <!--                            <div class="col-6 price text-center">-->
                            <!--                                <span class="total" style="font-size: 20px;">-->
                            <!--                                    <strong>-->
                            <!--₫</strong>-->
                            <!--                                </span>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <!-- end cart mobile -->

                            <div class="box-totalMoney text-center text-sm-right my-4">
                                <span>Tổng tiền : </span>
                                <span class="font-weight-bold">{{number_format($totala)}}</span>
                            </div>
                            <!--                        <div class="cart-buttons inner-right inner-left">-->
                            <div
                                class=" cart-buttons buttons d-flex justify-content-between justify-content-sm-end text-center">
                                <button type="button" id="update-cart"
                                    class="button-default font-weight-bold text-uppercase" name="update"
                                    onclick="location.href = '/'"><i class="fal fa-long-arrow-left mr-1"></i>Tiếp tục
                                    mua sắm</button>
                                <button type="button" id="checkout"
                                    class="button-default font-weight-bold text-uppercase"
                                    onclick="location.href = '/pay'">
                                    Thanh toán
                                </button>
                            </div>
                            <!--                        </div>-->


                        </div>
                    </div>
                </div>

            </div>
        </div>
@else
    <div class="alert alert-info h3 text-center text-danger">Bạn chưa chọn sản phẩm nào </div>
@endif
@endsection