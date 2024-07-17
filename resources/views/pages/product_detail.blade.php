@extends('pages.layout')

@section('title')
    {{$product_detail->product_name}}
@endsection

@section('content')
<link rel="canonical" href="giay-nu-puma-j.-cole-x-rsdreamer-jr-ebony-and-ivory-p37958153.html" />
<link rel="stylesheet" href="{{asset('/front_end/css/fancybox-4.0.31/fancybox_4.0.315e1f.css?v=2')}}"
    type="text/css">
<script defer type="text/javascript"
    src="{{asset('/front_end/js/jquery/fancybox-4.0.31/fancybox_4.0.31bcfe.js?v=22')}}"></script>
<script defer type="text/javascript" src="{{asset('/front_end/tp/T0239/js/pviewce31.js?v=19')}}"></script>
<div class="container-pre product-page">
    <div class="bread-product">
        <ul class="nav&#x20;justify-content-center&#x20;justify-content-lg-start">
            <li>
                <a href="index.html">Trang chủ</a>
            </li>
            {{-- <li>
                <a class="570537" href="giay-pc570537.html">Giày</a>
            </li>
            <li>
                <a class="570895" href="giay-puma-pc570895.html">Giày Puma </a>
            </li>
            <li>
                <a class="570899" href="puma-rs-pc570899.html">Puma RS </a>
            </li> --}}
        </ul>
    </div>
    <div class="row detail-product">

        <div class="col-lg-6 detail-product__left position-relative">
            <div class="sale position-absolute text-center">
                <p class="mb-0">
                    <?php
                    $discountPercentage = (($product_detail->product_price - $product_detail->product_promotion) / $product_detail->product_price) * 100;
                    ?>
                    <span class="number-percent font-weight-bold d-inline-block">{{round($discountPercentage)}}</span>
                    <span class="percent">%</span>
                </p>
                <p class="m-0 text-uppercase sale-text">Giá sốc</p>

            </div>
            <div class="detail-product_big-Slide">
                <div class="">
                    <div class="">
                        <a href="{{asset('/uploads/product/'.$product_detail->product_image)}}"
                            data-fancybox="gallery" class="d-block position-relative">
                            <img src="{{asset('/uploads/product/'.$product_detail->product_image)}}"
                                data-src="{{asset('/uploads/product/'.$product_detail->product_image)}}"
                                alt="{{$product_detail->product_name}}">
                            <button class="openZoom position-absolute p-0 rounded-circle text-center">
                                <i class="fas fa-expand-alt"></i>
                            </button>
                        </a>
                    </div>
                    <?php
                        $gallery = \App\Models\tbl_detailproduct::where('tbl_detailproduct.product_id',$product_detail->id)->get();
                       
                    ?>
                    @foreach ($gallery as $list)
                    <div class="">
                        <a href="{{asset('/uploads/gallery/'.$list->product_detail_image)}}"
                            data-fancybox="gallery" class="d-block position-relative">
                            <img src="{{asset('/uploads/gallery/'.$list->product_detail_image)}}"
                                data-src="{{asset('/uploads/gallery/'.$list->product_detail_image)}}"
                                alt="{{$list->product_image_title}}">
                            <button class="openZoom position-absolute p-0 rounded-circle text-center">
                                <i class="fas fa-expand-alt"></i>
                            </button>
                        </a>
                    </div>
                    @endforeach
                    
                   

                </div>
            </div>
            <div class="detail-product_small-Slide">
                <div class="item-thumb">
                    <a href="javascript:" class="d-block position-relative">
                        <img class="position-absolute"
                            src="{{asset('/uploads/product/'.$product_detail->product_image)}}"
                            alt="{{$product_detail->product_name}}">
                    </a>
                </div>
                @foreach ($gallery as $list)
                <div class="item-thumb">
                    <a href="javascript:" class="d-block position-relative">
                        <img class="position-absolute"
                            src="{{asset('/uploads/gallery/'.$list->product_detail_image)}}"
                            alt="{{$list->product_image_title}}">
                    </a>
                </div>
                @endforeach
               
              
            </div>
        </div>
        <div class="col-lg-6 detail-product__right">
            <div class="right-content">
            <form action="{{route('add.cart')}}" method="post">
                @csrf

                <div class="product-infomation">
                    <h1 class="font-weight-bold" >{{$product_detail->product_name}}</h1>
                    <input type="hidden" name="id" value="{{$product_detail->id}}">

                    <div class="price-box">
                        <del class="mr-2 price-old"><span class="number">{{number_format($product_detail->product_price,0,',')}}&#8363</span><span
                                class="curent"></span></del>
                        <p class="pro-price font-weight-bold d-inline-block mb-0 price-sale"><span
                                class="number">{{number_format($product_detail->product_promotion,0,',')}}&#8363</span><span class="curent"></span></p>
                    </div>


                </div>
                <div class="product-selection mb-4">
                    <div class="size req" column="i2">
                        <label class="m-0 font-weight-bold">Size</label>
                        <div class="list-size d-flex flex-wrap align-items-center">
                            <?php
                            $attributes = \App\Models\tbl_product_attribute::where('id_product', $product_detail->id)->get();
                            $sizes = [];
                            foreach ($attributes as $attribute) {
                                $attr = \App\Models\tbl_attribute::find($attribute->id_attribute);
                               
                                
                                    $sizes[] = $attr->value;
                                
                            }
                            ?>
                             @foreach ($sizes as $size)
                            <!-- <a rel="nofollow" value="1903932" href="javascript:void(0)" class="text-center d-inline-block "> -->
                            <input required type="radio" name="size" value="{{$size}}" class="text-center d-inline-block " >
                             {{$size}}
                              
                            </a>
                            @endforeach
                        </div>
                    </div>

                </div>



                <div class="status-product py-3">
                    <span class="font-weight-bold">
                        @if ($product_detail->product_status == 1)
                            Còn Hàng ({{$product_detail->product_quantity}})
                        @else
                            Hết Hàng
                        @endif
                    </span> 
                </div>


                <div class="d-flex align-items-center py-2 mb-3 group-buy">

                    <div class="product-quantity d-flex">
                        <span
                            class="number-minus text-center font-weight-bold d-flex align-items-center">-</span>
                        <input type="number" id="quantity"
                            class="text-center float-left border-right-0 border-left-0 " name="quantity"
                            value="1" min="1" max="5000" />
                        <span
                            class="number-plus text-center font-weight-bold d-flex align-items-center text">+</span>
                    </div>
                    <div class="purchase-product">
                        <button
                            class="add-to-cart btn-outline btn-buyNow unsel addnow btn font-weight-bold text-uppercase"
                            selId="37958153" psid="37958153" title="Vui lòng chọn màu sắc hoặc kích cỡ!" ck="0">
                            Thêm vào giỏ hàng
                        </button>
                        <button
                            class="quick-to-cart btn-outline btn-buyNow unsel addnow btn font-weight-bold text-uppercase"
                            selId="37958153" psid="37958153" title="Vui lòng chọn màu sắc hoặc kích cỡ!" ck="0">
                            Mua ngay
                        </button>
                            
                    </div>
                </div>

                <div class="noteStatus">
                    <a href="javascript:" class="btn d-block rounded font-weight-bold" data-toggle="modal"
                        data-target="#modalSub">Liên hệ chúng tôi</a> </div>



                <div class="product_meta">
                    <p class="m-0">Mã: <span class="pro-code">{{$product_detail->id}}</span></p>
                    <p class="m-0">Thương Hiệu: <span>{{$product_detail->brand_name}}</span></p>
                    <p class="m-0">Loại: <span>{{$product_detail->category_name}} </span></p>
                </div>


                <div class="share-group d-flex align-items-center">
                    <a target="_blank"
                        href="http://www.facebook.com/sharer.php?u=http://t0239.store.nhanh.vn/giay-nu-puma-j.-cole-x-rsdreamer-jr-ebony-and-ivory-p37958153.html"
                        class="share-face d-inline-block rounded-circle text-center"
                        onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a target="_blank"
                        href="http://twitter.com/share?url=http://t0239.store.nhanh.vn/giay-nu-puma-j.-cole-x-rsdreamer-jr-ebony-and-ivory-p37958153.html"
                        class="share-twitter d-inline-block rounded-circle text-center"
                        onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a target="_blank"
                        href="mailto:enteryour@addresshere.com?subject=Giày nữ Puma J. Cole x RS-Dreamer Jr ‘Ebony and Ivory’&body=Check%20this%20out:%20http://t0239.store.nhanh.vn/giay-nu-puma-j.-cole-x-rsdreamer-jr-ebony-and-ivory-p37958153.html"
                        class="share-mail d-inline-block rounded-circle text-center">
                        <i class="far fa-envelope"></i>
                    </a>
                    <a target="_blank"
                        href="http://pinterest.com/pin/create/button/?url=http://t0239.store.nhanh.vn/giay-nu-puma-j.-cole-x-rsdreamer-jr-ebony-and-ivory-p37958153.html&amp;media=https://pos.nvncdn.com/eb9ddb-116318/ps/20220323_qgY0nJMQeyNShMvEeHR9NZsi.jpg&amp;description=Gi%c3%a0y%20n%e1%bb%af%20Puma%20J.%20Cole%20x%20RS-Dreamer%20Jr%20%e2%80%98Ebony%20and%20Ivory%e2%80%99"
                        class="share-pinter d-inline-block rounded-circle text-center"
                        onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;">
                        <i class="fab fa-pinterest"></i>
                    </a>
                    <a target="_blank"
                        href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://t0239.store.nhanh.vn/giay-nu-puma-j.-cole-x-rsdreamer-jr-ebony-and-ivory-p37958153.html&amp;title=Gi%c3%a0y%20n%e1%bb%af%20Puma%20J.%20Cole%20x%20RS-Dreamer%20Jr%20%e2%80%98Ebony%20and%20Ivory%e2%80%99"
                        class="share-linked d-inline-block rounded-circle text-center"
                        onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </form>
            </div>
        </div>

    </div>

    <div class="product-tabs">
        <div class="tab-item ">
            <a href="javascript:" class="d-flex align-items-center open-tabs">
                <i class="far fa-chevron-down d-inline-block text-center"></i>
                <span class="d-inline-block">Thông tin bổ sung</span>
            </a>
            <div class="content-tab">
               {!!$product_detail->product_description!!}
            </div>
        </div>
    </div>
    <div class="product-tabs">
        <div class="tab-item ">
            <a href="javascript:" class="d-flex align-items-center open-tabs">
                <i class="far fa-chevron-down d-inline-block text-center"></i>
                <span class="d-inline-block">Điều Khoản</span>
            </a>
            <div class="content-tab">
                <p>. Giày chuẩn hàng Trung bản chuẩn nhất, cao cấp nhất thị trường.</p>

                <p>. Kiểm tra hàng mới thanh toán, đổi trả size nhanh chóng.</p>

                <p>. Mẫu giày Trends, đẹp, đủ mẫu, đủ size.</p>

                <p>. Ship COD toàn quốc nhanh chóng.</p>

                <p>. Bảo hành lên đến 6 tháng.</p>

                <p>. Freeship cho đơn 2 đôi hoặc đơn thứ 2; Mua 5 đôi tặng 1 đôi.</p>
            </div>
        </div>
    </div>
    <div class="product-tabs">
        <div class="tab-item ">
            <a href="javascript:" class="d-flex align-items-center open-tabs">
                <i class="far fa-chevron-down d-inline-block text-center"></i>
                <span class="d-inline-block">Bình Luận</span>
            </a>
            <div class="content-tab">
              
            </div>
        </div>
    </div>


    <div class="product-related">
        <h2 class="font-weight-bold title text-uppercase">sản phẩm tương tự</h2>
        <div class="content">
            @foreach ($related_products as $list)
            <div class="product-item product-item-owl  position-relative" data-id="37958153"
            data-img="{{asset('/uploads/product/'.$list->product_image)}}">
            <div class="product-item__image position-relative">
                <a href="giay-nu-puma-j.-cole-x-rsdreamer-jr-ebony-and-ivory-p37958153.html"
                    class="d-block image-ab position-absolute">
                    <img class="lazyload productHover productHover37958153" data-sizes="auto"
                        src="{{asset('/uploads/product/'.$list->product_image)}}"
                        data-src="{{asset('/uploads/product/'.$list->product_image)}}"
                        alt="{{$list->product_name}}">
                </a>
                <a href="/chi-tiet-giay/{{$list->product_slug}}"
                    class="cart-icon position-absolute d-inline-block text-center">
                    +
                </a>

                <a href="javascript:" class="wishlist  position-absolute">
                    <i class="fal fa-heart-circle"></i>
                </a>

            </div>
            <div class="product-item__infor text-center">
                <span class="d-block text-uppercase product-item_cate mt-2">
                    <?php
                    $category = \App\Models\tbl_category::where('tbl_category.id',$list->category_id)->get();
                ?>
                    @foreach ($category as $item)
                        {{$item->category_name}}
                    @endforeach
                </span>
                <a href="/chi-tiet-giay/{{$list->product_slug}}"
                    class="d-inline-block product-item__name tp_product_name">
                    {{$list->product_name}} </a>
                    <p class="m-0">
                        <span class="d-inline-block oldPrice">{{number_format($list->product_price,0,',')}}&#8363</span><span
                            class="d-inline-block price font-weight-bold tp_product_detail_priceprice-sale">{{number_format($list->product_promotion,0,',')}}&#8363</span>
                    </p>
            </div>
        </div>
            @endforeach
            
        </div>
    </div>

</div>


<div class="group-buy__fixed position-fixed d-flex justify-content-center align-items-center">
    <div class="product d-flex align-items-center">
        <img src="{{asset('/uploads/product/'.$product_detail->product_image)}}"
            alt="{{$product_detail->product_name}}">
        <p class="mb-0 font-weight-bold d-none d-sm-block">{{$product_detail->product_name}}</p>
    </div>
    <div class="product-quantity d-flex">
        <span class="number-minus text-center font-weight-bold d-flex align-items-center">-</span>
        <input type="number" id="quantity-fixed" class="text-center float-left border-right-0 border-left-0 "
            name="quantity" value="1" min="1" max="5000" />
        <span class="number-plus text-center font-weight-bold d-flex align-items-center text">+</span>
    </div>
    <div class="purchase-product">
        <button class="add-to-cart btn-outline btn-buyNow unsel addnow btn font-weight-bold text-uppercase"
            selId="37958153" psid="37958153" title="Vui lòng chọn màu sắc hoặc kích cỡ!" ck="0">
            Mua ngay
        </button>

    </div>
</div>



<div class="modal fade" id="modalSub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Gọi lại cho tôi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-0">
                <form accept-charset="UTF-8" action="#" id="contactIndex" method="post" class="wpcf7-form">
                    <div class="form-lien-he d-flex flex-wrap">

                        <div class="col-md-6 mb-3">
                            <input type="text" name="name" class="name_register validate[required]"
                                placeholder="Họ và tên" />
                        </div>

                        <div class="col-md-6 mb-3">
                            <input type="text" name="email" class="email_register validate[required]"
                                placeholder="Email" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="mobile" class="mobile_register validate[required]"
                                placeholder="Số điện thoại" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" name="address" class="address_register validate[required]"
                                placeholder="Địa chỉ" value="" />
                        </div>

                        <div class="col-12 mb-3">
                            <input type="text" name="product" class="validate[required]"
                                value="Giày nữ Puma J. Cole x RS-Dreamer Jr ‘Ebony and Ivory’" disabled />
                        </div>
                        <div class="col-12 mb-3">
                            <textarea name="content" class="content_register validate[required]" rows="2"
                                placeholder="Nội dung liên hệ"></textarea>
                        </div>

                        <div class="col-12 text-center">
                            <button type="button" class="btn text-uppercase rounded-0" id="send_contact">Gửi
                                liên hệ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<style>
    @media (min-width: 1300px) {
        .container {
            max-width: 1300px;
        }
    }

    .policy-section__ft {
        display: none;
    }
</style>
    
@endsection