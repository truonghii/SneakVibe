@extends('pages.layout')

@section('title')
    SneakVibe
@endsection

@section('content')
<script defer type="text/javascript" src="{{asset('/front_end/tp/T0239/js/index5e1f.js?v=2')}}"></script>
    <div class="banner-main col-pre">
        <div class="banner-main__content">
            <div class="item">
                <a href="javascript:void(0);" class="d-block">
                    <img src="{{asset('/front_end/img/bn/20220324_DNFD3A0iWqNMEVjg7A1ZSQA7.png')}}" alt="2">
                </a>
            </div>
            <div class="item">
                <a href="javascript:void(0);" class="d-block">
                    <img src="{{asset('/front_end/img/bn/20220324_Oh53NJJ4ig1sNzfa7mH5CDRp.jpg')}}" alt="1">
                </a>
            </div>
        </div>
    </div>

    <div class="container-pre">

        <div class="title-home__news">
            <h2 class="text-center position-relative m-0">
                <span class="d-inline-block text-uppercase font-weight-bold position-relative">Tin tức</span>
            </h2>
        </div>
        <div class="row bannerNews-home">
            <div class="col-3">
                <div class="bannerNews-home__mid-content position-relative">
                    <a href="javascript:void(0);" class="d-block position-absolute">
                        <img src="{{asset('/front_end/img/bn/20220324_VBDHBJlITvvfnLSDA82zbAfd.png')}}" alt="Sale">
                    </a>
                    <a href="javascript:void(0);"
                        class="text-center bannerNews-home__mid-name d-block position-absolute text-uppercase font-weight-bold d-inline-block">
                        Sale </a>
                </div>
            </div>
            <div class="col-6 bannerNews-home__mid">
                <div class="bannerNews-home__mid-content position-relative">
                    <a href="https://nhanh.vn/" class="d-block position-absolute">
                        <img src="{{asset('/front_end/img/bn/20220324_mcaT3cqwUAgK67DDOHbpAqox.png')}}"
                            alt="About us">
                    </a>
                    <a href="https://nhanh.vn/"
                        class="text-center bannerNews-home__mid-name d-block position-absolute text-uppercase font-weight-bold d-inline-block">
                        Về Chúng Tôi </a>
                </div>
            </div>
            <div class="col-3">
                <div class="bannerNews-home__mid-content position-relative">
                    <a href="accessories-pc570536.html" class="d-block position-absolute">
                        <img src="{{asset('/front_end/img/bn/20220324_VBDHBJlITvvfnLSDA82zbAfd.png')}}"
                            alt="Super Sale">
                    </a>
                    <a href="accessories-pc570536.html"
                        class="text-center bannerNews-home__mid-name d-block position-absolute text-uppercase font-weight-bold d-inline-block">
                        Super Sale </a>
                </div>
            </div>
        </div>

        <div class="title-home clearfix">
            <h2 class="text-center position-relative m-0">
                <span class="d-inline-block text-uppercase font-weight-bold position-relative">
                    SẢN PHẨM HOT</span>
            </h2>
        </div>
        <div class="row-pre new-product">
           @foreach ($product_hot as $list)
           <div class="col-6 col-sm-4 col-lg-3 product-item" data-id="37960630" data-storeId="116318"
           data-img="{{asset('/uploads/product/'.$list->product_image)}}">
           <div class="product-item__image position-relative">
               <a href="/chi-tiet-giay/{{$list->product_slug}}" class="d-block image-ab position-absolute">
                   <img class="lazyload productHover productHover37960630" data-sizes="auto"
                       src="{{asset('/uploads/product/'.$list->product_image)}}"
                       data-src="{{asset('/uploads/product/'.$list->product_image)}}"
                       alt="{{$list->product_name}}">
               </a>
               <a href="/chi-tiet-giay/{{$list->product_slug}}"
                   class="cart-icon position-absolute d-inline-block text-center">
                   +
               </a>
               <div class="sale position-absolute text-center">
                   <p class="mb-0">
                    <?php
                         $discountPercentage = (($list->product_price - $list->product_promotion) / $list->product_price) * 100;
                    ?>
                       <span class="number-percent font-weight-bold d-inline-block">{{round($discountPercentage)}}</span>
                       <span class="percent">%</span>
                   </p>
                   <p class="m-0 text-uppercase sale-text">Giá sốc</p>

               </div>
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
        <div class="text-center pt-4">
            <a href="productd470.html?show=new" class="d-inline-block font-weight-bold see-more">
                Xem tất cả <i class="fal fa-angle-right"></i>
            </a>
        </div>


        <div class="title-home">
            <h2 class="text-center position-relative m-0">
                <span class="d-inline-block text-uppercase font-weight-bold position-relative">SẢN PHẨM MỚI</span>
            </h2>
        </div>
        <div class="row-pre new-product">
           @foreach ($product_new as $list)
           <div class="col-6 col-sm-4 col-lg-3 product-item" data-id="37960765" data-storeId="116318"
           data-img="{{asset('/uploads/product/'.$list->product_image)}}">
           <div class="product-item__image position-relative">
               <a href="/chi-tiet-giay/{{$list->product_slug}}"
                   class="d-block image-ab position-absolute">
                   <img class="lazyload productHover productHover37960765" data-sizes="auto"
                       src="{{asset('/uploads/product/'.$list->product_image)}}"
                       data-src="{{asset('/uploads/product/'.$list->product_image)}}"
                       alt="{{$list->product_name}}">
               </a>
               <a href="/chi-tiet-giay/{{$list->product_slug}}"
                   class="cart-icon position-absolute d-inline-block text-center">
                   +
               </a>
               <div class="sale position-absolute text-center">
                   <p class="mb-0">
                    <?php
                    $discountPercentage = (($list->product_price - $list->product_promotion) / $list->product_price) * 100;
                    ?>
                       <span class="number-percent font-weight-bold d-inline-block">{{round($discountPercentage)}}</span>
                       <span class="percent">%</span>
                   </p>
                   <p class="m-0 text-uppercase sale-text">Giá sốc</p>

               </div>

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
        <div class="text-center pt-4">
            <a href="producte707.html?show=hot" class="d-inline-block font-weight-bold see-more">
                Xem tất cả <i class="fal fa-angle-right"></i>
            </a>
        </div>

    </div>
@endsection