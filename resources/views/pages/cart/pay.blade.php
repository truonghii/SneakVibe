<!-- T0239-->
<!DOCTYPE html>
<html lang="vi-VN" data-nhanh.vn-template="T0239">

<head>
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' /><![endif]-->

    <meta name="robots" content="noindex" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
    <meta charset="utf-8">
    <title>Thanh toán</title>
    <meta name="DC.language" content="scheme&#x3D;utf-8&#x20;content&#x3D;vi">
    <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">
    <meta name="google-site-verification" content="">
    <link
        href="https&#x3A;&#x2F;&#x2F;pos.nvncdn.com&#x2F;eb9ddb-116318&#x2F;store&#x2F;20220301_yuwQBfxunQqfEwmcJ024zvuy.png"
        rel="icon" type="image&#x2F;vnd.microsoft.icon">
    <link rel="stylesheet" href="https://web.nvnstatic.net/css/bootstrap/bootstrap-3.3.5.min.css?v=2" type="text/css">
    <link rel="stylesheet" href="https://web.nvnstatic.net/css/font-awesome.min.css?v=2" type="text/css">
    <link rel="stylesheet" href="https://web.nvnstatic.net/js/jquery/fancybox-2.1.5/source/jquery.fancybox.css?v=2"
        type="text/css">
    <link rel="stylesheet" href="https://web.nvnstatic.net/tp/T0239/css/font.css?v=4" type="text/css">
    <link rel="stylesheet" href="https://web.nvnstatic.net/tp/T0239/css/checkout.css?v=4" type="text/css">
    <script defer type="text/javascript" src="https://web.nvnstatic.net/js/jquery/jquery.min.js?v=22"></script>
    <script defer type="text/javascript" src="https://web.nvnstatic.net/js/lib.js?v=22"></script>
    <script defer type="text/javascript" src="https://web.nvnstatic.net/js/jquery/jquery.cookie.js?v=22"></script>
    <script defer type="text/javascript" src="https://web.nvnstatic.net/js/jquery/jquery-ui.min.js?v=22"></script>
    <script defer type="text/javascript" src="https://web.nvnstatic.net/js/jquery/jquery.number.min.js?v=22"></script>
    <script defer type="text/javascript"
        src="https://web.nvnstatic.net/js/jquery/fancybox-2.1.5/source/jquery.fancybox.js?v=22"></script>
    <style type="text/css"></style>
    <style type="text/css">
        img {
            max-width: 100%;
        }

        img.lazyload {
            opacity: 0.001;
            object-fit: scale-down !important;
        }

        .fb-customerchat>span>iframe.fb_customer_chat_bounce_out_v2 {
            max-height: 0 !important;
        }

        .fb-customerchat>span>iframe.fb_customer_chat_bounce_in_v2 {
            max-height: calc(100% - 80px) !important;
        }
    </style>
    <script src="https://pos.nvnstatic.net/cache/location.vn.js?v=240329_155124" defer></script>
    <script src="https://web.nvnstatic.net/js/lazyLoad/lazysizes.min.js" async></script>
    <style>
        figure.image {
            clear: both;
            display: table;
            margin: .9em auto;
            min-width: 50px;
            text-align: center;
            width: auto !important;
        }

        figure.image img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            min-width: 100%;
        }

        figure.image>figcaption {
            background-color: #f7f7f7;
            caption-side: bottom;
            color: #333;
            display: block;
            font-size: .75em;
            outline-offset: -1px;
            padding: .6em;
            word-break: break-word;
        }

        figure.image img,
        img.image_resized {
            height: auto !important;
            aspect-ratio: auto !important;
        }
    </style>
    <script src="https://web.nvnstatic.net/js/translate/vi-vn.js" defer></script>
</head>

<body class="ins_home">
@if(session('cart'))
<div id="wrapper" class="clearfix">
        <div class="ins-page">
            <script defer type="text/javascript"
                src="https://web.nvnstatic.net/js/jquery/jquery.validationEngine.js?v=22"></script>
            <script defer type="text/javascript"
                src="https://web.nvnstatic.net/js/jquery/jquery.validationEngine-vi.js?v=22"></script>
            <link rel="stylesheet" href="https://web.nvnstatic.net/css/validationEngine.jquery.css?v=2" type="text/css">
            <script defer type="text/javascript" src="https://web.nvnstatic.net/tp/T0239/js/order.js?v=6"></script>
            <style>
                #paymentMethod input[type="radio"] {
                    -webkit-appearance: radio;
                }

                #paymentMethod .b {
                    padding: 5px 0;
                }

                .listBank {
                    display: none;
                }

                .listBank>span {
                    padding: 0 1px;
                }

                .listBank>span:hover,
                .listBank>span.active {
                    background: #999;
                    /*border: 1px solid #999;*/
                    transition: all 200ms ease;
                    display: inline-block;
                    cursor: pointer;
                }

                .main,
                .sidebar {
                    padding-top: 0;
                }

                @media screen and (max-width: 1000px) {
                    form#formCheckOut {
                        display: flex;
                        flex-direction: column;
                    }

                    .main {
                        order: 1;
                    }

                    .sidebar {
                        order: 2;
                    }
                }
            </style>

            <div class="content">
                <div class="wrap" style="max-width: none;">
                    <div class="container text-center">
                        <a href="/">
                            <img src="https://pos.nvncdn.com/eb9ddb-116318/store/20220301_M6gPcIeoQ8cwvJrojaQ7a688.png"
                                alt="Logo" style="max-height: 120px; margin: 20px 0;">
                        </a>
                    </div>

                    <div class="row" style="margin: 0;">
                            <div class="sidebar">
                                <div class="sidebar-content">
                                    <div class="order-summary order-summary-is-collapsed" style="height: auto;">
                                        <div class="order-summary-sections">
                                            <div class="order-summary-section order-summary-section-product-list">
@php $qty = 0 @endphp
@php $totala = 0 @endphp
@php $total = 0 @endphp
@php $dc = 85/100 @endphp
@if(session('voucher'))
@foreach(session('voucher') as $kk)
    @php $total = $kk['giam'] @endphp
@endforeach
@endif
                                                <table class="product-table">
                                                    <tbody>
                                                
                                                    @foreach (session('cart') as $item )
                                                    @php $totala += $item['price'] * $item['quantity'] @endphp
                                                    @php $qty += $item['quantity'] @endphp
                                                        <tr class="product">
                                                            <td class="product-image">
                                                                <div class="product-thumbnail">
                                                                    <div class="product-thumbnail-wrapper">
                                                                        <img class="product-thumbnail-image"
                                                                            alt="{{$item['name']}}"
                                                                            src="{{asset('/uploads/product/'.$item['image'])}}" />
                                                                    </div>
                                                                    <span class="product-thumbnail-quantity"
                                                                        aria-hidden="true">{{ $item['quantity'] }}</span>
                                                                </div>
                                                            </td>
                                                            <td class="product-description">
                                                                <span
                                                                    class="product-description-name order-summary-emphasis">{{$item['name']}} - {{$item['size']}}</span>
                                                            </td>
                                                            <td class="product-quantity visually-hidden">{{ $item['quantity'] }}</td>
                                                            <td class="product-price">
                                                                <span class="order-summary-emphasis">
                                                                {{number_format($item['price'])}}₫
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="order-summary-section order-summary-section-discount">
                                                <div class="fieldset">
                                                    <p id="txtCode"></p>
                                                    <div class="field" >
                                                    <form action="/giamgia" mothod="post">
                                                                    @csrf
                                                        <div class="field-input-btn-wrapper" >
                                                            
                                                                <div class="field-input-wrapper">
                                                                    <input type="hidden" name="total" value="{{$totala}}">
                                                                        <label class="field-label" for="discount.code">Mã giảm
                                                                            giá</label>
                                                                        <input id="coupon" type="text" class="field-input"
                                                                        name="code" placeholder="Mã giảm giá" />
                                                                </div>
                                                                <input type="submit" class="field-input-btn btn btn-default" Value="Kiểm Tra">
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="order-summary-section order-summary-section-total-lines">
                                                <table class="total-line-table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"><span class="visually-hidden">Mô tả</span>
                                                            </th>
                                                            <th scope="col"><span class="visually-hidden">Giá</span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="total-line total-line-subtotal">
                                                            <td class="total-line-name">Tạm tính</td>
                                                            <td class="total-line-price">
                                                                <span class="order-summary-emphasis">
                                                                {{number_format($totala)}}₫
                                                                </span>
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr class="total-line total-line-shipping">
                                                            <td class="total-line-name">Voucher</td>
                                                            <td class="total-line-price">
                                                                @if(session('voucher'))
                                                                @foreach(session('voucher') as $vc)
                                                                    <span class="order-summary-emphasis" id="ship_fee">
                                                                    {{number_format($vc['giam'])}}₫
                                                                    </span>
                                                                    <a href="/delete-voucher">Xóa</a>
                                                                @endforeach
                                                                @else
                                                                    <span class="order-summary-emphasis" id="ship_fee">
                                                                    0₫
                                                                    </span>
                                                                @endif 
                                                                
                                                            </td>
                                                        </tr>
                                                        <tr class="total-line total-line-shipping">
                                                            <td class="total-line-name">Discount</td>
                                                            <td class="total-line-price">
                                                            @if($qty >=3)
                                                                <span class="order-summary-emphasis" id="ship_fee">
                                                                    15%
                                                                </span>
                                                            @else
                                                                <span class="order-summary-emphasis" id="ship_fee">
                                                                    0₫
                                                                </span>
                                                            @endif
                                                            </td>
                                                        </tr> 
                                                        <tr class="total-line total-line-shipping">
                                                            <td class="total-line-name">Phí vận chuyển</td>
                                                            <td class="total-line-price">
                                                                <span class="order-summary-emphasis" id="ship_fee">
                                                                    0₫
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                    <tfoot class="total-line-table-footer">
                                                        <input type="hidden" id="total_money" value="4000000">
                                                        <input type="hidden" id="getMn" value="4000000" />
                                                        <input type="hidden" id="getShipFee" value="" />
                                                        <tr class="total-line">
                                                            <td class="total-line-name payment-due-label">
                                                                <span class="payment-due-label-total">Tổng cộng</span>
                                                            </td>
                                                            <td class="total-line-name payment-due">
                                                                @if(session('voucher'))
                                                                    @if($qty >= 3)
                                                                        <span class="payment-due-price" id="showTotalMoney"
                                                                        value="4000000">{{number_format(($totala - $total)* $dc )}}</span>
                                                                    @else
                                                                        <span class="payment-due-price" id="showTotalMoney"
                                                                        value="4000000">{{number_format($totala - $total)}}</span>
                                                                    @endif
                                                                @else
                                                                    <span class="payment-due-price" id="showTotalMoney"
                                                                    value="4000000">{{number_format($totala)}}</span>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="main">
                                <div class="main-content">
                                    <div class="step">
                                        <div class="step-sections" step="1">
                                            <form action="/pay/send" method="post">
                                                @csrf
                                                <div class="section">
                                                    <div class="section-header">
                                                        <h2 class="section-title">Thông tin giao hàng</h2>
                                                    </div>
                                                    <div class="section-content section-customer-information no-mb">
                                                        <div class="fieldset">
                                                            <div class="field   ">
                                                                <div class="field-input-wrapper">
                                                                    <label class="field-label"
                                                                        for="billing_address_full_name">Họ và tên</label>
                                                                    <input placeholder="Họ và tên"
                                                                        class="field-input validate[required]" size="30"
                                                                        type="text" name="name" value="{{old('name')}}"/>
                                                                </div>
                                                                @error('name')
                                                                    <small><i class="text-danger">{{ $message }}</i></small>
                                                                @enderror
                                                            </div>

                                                            <div class="field  field-two-thirds  ">
                                                                <div class="field-input-wrapper">
                                                                    <label class="field-label" for="checkout_user_email">Email</label>
                                                                    <input placeholder="Email" class="field-input" type="email" name="email" value=""/>
                                                                </div>
                                                                @error('email')
                                                                    <small><i class="text-danger">{{ $message }}</i></small>
                                                                @enderror
                                                            </div>

                                                            <div class="field field-required">
                                                                <div class="field-input-wrapper">
                                                                    <label class="field-label"
                                                                        for="billing_address_phone">Số điện thoại</label>
                                                                    <input placeholder="Số điện thoại"
                                                                        class="field-input validate[required]"
                                                                        maxlength="11" type="tel" name="phone"
                                                                        placeholder="Nhập số điện thoại"/>
                                                                </div>
                                                                @error('phone')
                                                                    <small><i class="text-danger">{{ $message }}</i></small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="section-content"> 
                                                        <div class="fieldset">
                                                            <div class="field field-half  ">
                                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                                    <div class="field   ">
                                                                        <div class="field-input-wrapper">
                                                                            <label class="field-label"
                                                                                for="billing_address_address1">Tỉnh thành</label>
                                                                            <input placeholder="Nhập tỉnh thành"
                                                                                class="field-input validate[required]" size="15"
                                                                                type="text" name="city"/>
                                                                        </div>
                                                                        @error('city')
                                                                            <small><i class="text-danger">{{ $message }}</i></small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="field field-half  ">
                                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                                    <div class="field   ">
                                                                        <div class="field-input-wrapper">
                                                                            <label class="field-label"
                                                                                for="billing_address_address1">Quận huyện</label>
                                                                            <input placeholder="Nhập quận huyện"
                                                                                class="field-input validate[required]" size="15"
                                                                                type="text" name="district"/>
                                                                        </div>
                                                                        @error('district')
                                                                            <small><i class="text-danger">{{ $message }}</i></small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="field field-half  ">
                                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                                    <div class="field   ">
                                                                        <div class="field-input-wrapper">
                                                                            <label class="field-label"
                                                                                for="billing_address_address1">Phường xã</label>
                                                                            <input placeholder="Nhập phường xã"
                                                                                class="field-input validate[required]" size="15"
                                                                                type="text" name="ward"/>
                                                                        </div>
                                                                        @error('ward')
                                                                            <small><i class="text-danger">{{ $message }}</i></small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="field field-half  ">
                                                                <div class="field-input-wrapper field-input-wrapper-select">
                                                                    <div class="field   ">
                                                                        <div class="field-input-wrapper">
                                                                            <label class="field-label"
                                                                                for="billing_address_address1">Địa chỉ</label>
                                                                            <input placeholder="Nhập địa chỉ"
                                                                                class="field-input validate[required]" size="30"
                                                                                type="text" name="address"/>
                                                                        </div>
                                                                        @error('address')
                                                                            <small><i class="text-danger">{{ $message }}</i></small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="field   ">
                                                                <div class="field-input-wrapper">
                                                                    <label class="field-label"
                                                                        for="billing_address_address1">Ghi chú</label>
                                                                    <textarea name="note" class="input"
                                                                        placeholder="Ghi chú ..." rows="4"
                                                                        style="width: 100%;padding: 5px;box-shadow: 0 0 0 1px #d9d9d9;border-radius: 4px;transition: all .2s ease-out;"></textarea>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="id_sp" value="{{$item['id']}}" />
                                                            <input type="hidden" name="quantity" value="{{$item['quantity']}}" />
                                                            @if(session('voucher'))
                                                                @if($qty >= 3)
                                                                    <input type="hidden" name="total_amount" id="showTotalMoney" value="{{(($totala - $total)* $dc )}}" />
                                                                @else
                                                                    <input type="hidden" name="total_amount" id="showTotalMoney" value="{{($totala - $total)}}"/>
                                                                @endif
                                                            @else
                                                            <input type="hidden" name="total_amount" id="showTotalMoney" value="{{($totala)}}"/>
                                                            @endif
                                                            @if(session('voucher'))
                                                                @if($qty >= 3)
                                                                <input type="hidden" name="total" value="{{(($totala - $total)* $dc )}}"/>
                                                                @else
                                                                <input type="hidden" name="total" value="{{($totala - $total)}}"/>
                                                                @endif
                                                            @else
                                                            <input type="hidden" name="total" value="{{($totala)}}"/>
                                                            @endif
                                                            <input type="hidden" name="name_sp" value="{{$item['name']}}" />
                                                            <input type="hidden" name="price" value="{{($item['price'])}}" />
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div id="change_pick_location_or_shipping">
                                                        <div class="section-header">
                                                            <h2 class="section-title"></h2>
                                                        </div>
                                                        <div id="paymentMethod">
                                                            <div class="b">
                                                                <label>
                                                                    <input type="radio" id="payment" checked
                                                                        name="paymentMethod" class="validate[required] cod"
                                                                        value="0" style="-webkit-appearance: radio;" />
                                                                    Thanh toán tại nhà </label>
                                                                    <input type="radio" id="payment"
                                                                        name="paymentMethod" class="validate[required] cod"
                                                                        value="1" style="-webkit-appearance: radio;" />
                                                                    Thanh toán ngân hàng </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="step-footer" >
                                                        <input style="background: green; width:100px; height:50px; color:white; font-size:20px" type="submit">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="step-footer">
                                            <a class="step-footer-previous-link" href="/cart">
                                                <i class="fa fa-chevron-left"></i> Giỏ hàng
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <div class="select-button">
                <form action="{{url('/vnpay_payment')}}" method="POST">
                    @csrf
                    <button type="submit" name="redirect" class="primary-btn checkout-btn" style="width:100%">VNPAY</button>
                </form>
            </div>

            <div style="display: none">
                <div id="progressbar" style="text-align: center;width: 100px;height: 80px;margin: 0 auto;">
                    <img src="https://web.nvnstatic.net/tp/T0239/img/loading.gif?v=3" />
                </div>
            </div>

            <style>
                .listBankWrp {
                    position: relative;
                    display: flex;
                    flex-direction: column;
                }

                .listBankWrp .form-group {
                    border: 1px solid #dedede;
                    border-radius: 5px;
                    cursor: pointer;
                }

                .listBankWrp.deactive_bank {
                    pointer-events: none !important;
                }

                .listBankWrp .form-group.active {
                    border: 1px solid #009cf6;
                    background: #f5f5f5;
                }

                .form-group.active .resultQr {
                    display: block !important;
                }

                @media screen and (max-width: 900px) {
                    .listBankWrp .col-12 {
                        padding: 0 15px !important;
                    }
                }

                @media screen and (max-width: 768px) {
                    .text-banks-title {
                        display: inline-block;
                        max-width: 45%;
                    }

                    .listBankWrp .form-group {
                        padding-top: 10px;
                        padding-bottom: 10px;
                    }
                }

                .deactive_bank .loaderWrp {
                    display: block;
                }

                .loaderWrp {
                    display: none;
                }

                .loaderWrp .loader {
                    margin-top: 7%;
                    width: 48px;
                    height: 48px;
                    border: 3px solid #FFF;
                    border-radius: 50%;
                    display: inline-block;
                    position: relative;
                    box-sizing: border-box;
                    animation: rotation 1s linear infinite;
                }

                .loaderWrp .loader::after {
                    content: '';
                    box-sizing: border-box;
                    position: absolute;
                    left: 50%;
                    top: 50%;
                    transform: translate(-50%, -50%);
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    border: 3px solid;
                    border-color: #FF3D00 transparent;
                }

                .loaderWrp {
                    position: absolute;
                    left: 0;
                    right: 0;
                    text-align: center;
                    bottom: 0;
                    background: #cbcbcbba;
                    top: 0;
                    z-index: 999;
                }

                .float-left {
                    float: left;
                }

                .float-left label strong {
                    display: block;
                }

                .pr-1 {
                    padding-right: 5px;
                }

                .float-left input {
                    margin-top: 2px;
                }

                .col-4 {
                    float: left;
                    width: 33.33%;
                }

                .col-8 {
                    float: left;
                    width: 66.67%;
                }

                .col-4,
                .col-8 {
                    position: relative;
                    min-height: 1px;
                    padding-right: 15px;
                    padding-left: 15px;
                }

                pb-2,
                .py-2 {
                    padding-bottom: 0.5rem !important;
                }

                .pt-2,
                .py-2 {
                    padding-top: 0.5rem !important;
                }

                @keyframes rotation {
                    0% {
                        transform: rotate(0deg);
                    }

                    100% {
                        transform: rotate(360deg);
                    }
                }

                @keyframes rotate {
                    0% {
                        transform: rotate(0deg)
                    }

                    100% {
                        transform: rotate(360deg)
                    }
                }

                @keyframes prixClipFix {
                    0% {
                        clip-path: polygon(50% 50%, 0 0, 0 0, 0 0, 0 0, 0 0)
                    }

                    50% {
                        clip-path: polygon(50% 50%, 0 0, 100% 0, 100% 0, 100% 0, 100% 0)
                    }

                    75%,
                    100% {
                        clip-path: polygon(50% 50%, 0 0, 100% 0, 100% 100%, 100% 100%, 100% 100%)
                    }
                }
            </style>
        </div>
    </div>
    <!-- Page Content -->

    <input type="hidden" class="fanpageId" value=""><input type="hidden" id="bussinessId" value="116318"><input
        type="hidden"
        value="PzQA4HsecelKfiiYre0DOxEjv0IjYfkrerupKAtyelciiyiDGtJnwe8nfyGxQVsOg77Cxso8wLd2NEHflJQq3MyTJkmTPEQFjq4lyOaCFQ0AnFmgUQmzAIY0DbXkqKOyhSj9a1NQhUqDXoY3MhnCKRCSXP0G9OG7dRHZMlSKgoaCG9bYJYdrpqvvjNJIMcc9nZY2EDgmEa43zsAxFZXvFl"
        id="uctk" name="uctk" /><input type="hidden" id="clienIp" value="27.64.83.240">
        @else
    <div class="alert alert-info h3 text-center text-danger">Bạn chưa chọn sản phẩm nào </div>
@endif
</body>

</html>