@extends('pages.layout')
@section('titile')
    {{-- @foreach ($products as $list)
     {{$list->brand_name}}
    @break
    
    @endforeach --}}
@endsection


@section('content')
<div class="container-pre product-page tp_product_category">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between">
        <div class="bread-product">
            <ul class="nav&#x20;justify-content-center&#x20;justify-content-lg-start">
                <li>
                    <a href="index.html">Trang chủ</a>
                </li>
                <li>
                    <span>
                        @if (isset($category))
                            {{$category->category_name}}
                        @elseif(isset($brands))
                            {{$brands->brand_name}}
                        @endif
                    </span>
                </li>
            </ul>
            <div class="open-find text-center d-lg-none">
                <a href="javascript:" class="d-inline-block text-uppercase font-weight-bold">
                    <i class="far fa-bars mr-1"></i> lọc
                </a>
            </div>
        </div>
        <div class="find-basic d-flex align-items-center justify-content-center">
            <p class="d-none d-lg-block">Showing 1–4 of 4 results</p>
            <select class="sort-by custom-dropdown__select custom-dropdown__select--white px-2 d-inline-block"
                onchange="location = this.value">
                <option selected value="air-max-1-pc570902d41d.html?">
                    Thứ tự mặc định </option>

                <option value="air-max-1-pc570902a0d7.html?show=priceDesc">
                    Thứ tự theo giá: cao xuống thấp </option>

                <option value="air-max-1-pc570902412f.html?show=priceAsc">
                    Thứ tự theo giá: thấp đến cao </option>
            </select>
        </div>
    </div>
    <div class="row productPage-content">
        <div class="col-lg-3 left-page">
            <div class="left-page__content">
                <div class="tp_product_category_filter_category">
                    <h4 class="title-cate text-uppercase font-weight-bold position-relative beforPre">Thương Hiệu
                    </h4>
                    <ul class="cate-list p-0 m-0">
                        @foreach ($brand as $list)
                        <?php
                                $category = \App\Models\tbl_category::where('brand_id',$list->id)->orderBy('id','asc')->get();
                            ?>
                       @if ($category->isNotEmpty())
                       <li>
                        <a href="javascript:" class="d-flex align-items-center justify-content-between font-weight-bold">
                            {{$list->brand_name}} <i class="fas fa-plus"></i> 
                        </a>
                        <ul class="m-0 p-0" style="display: none">
                           @foreach ($category as $item)
                           <li>
                            <a href="/danh-muc-giay/{{$item->category_slug}}" class="d-block">{{$item->category_name}} </a>
                            </li>
                           @endforeach
                           
                        </ul>
                    </li>
                       @else
                       <a href="quan-ao-pc571353.html"
                       class="d-flex align-items-center justify-content-between font-weight-bold">
                       {{$list->brand_name}} </a>
                       @endif
                        
                        @endforeach
                       
                     
                        {{-- <li>
                            <a href="quan-ao-pc571353.html"
                                class="d-flex align-items-center justify-content-between font-weight-bold">
                                Quần áo </a>
                        </li> --}}
                    </ul>
                </div>




                <div class="filter mt-4 tp_product_category_filter_attribute">
                    <h4 class="title-cate text-uppercase font-weight-bold position-relative beforPre">Kích thước
                    </h4>
                    <a class="d-block" href="air-max-1-pc570902b175.html?i2=1903932"><i
                            class="fal fa-square mr-2"></i>43</a><a class="d-block"
                        href="air-max-1-pc5709023751.html?i2=1903931"><i class="fal fa-square mr-2"></i>42</a><a
                        class="d-block" href="air-max-1-pc5709029329.html?i2=1903930"><i
                            class="fal fa-square mr-2"></i>41</a><a class="d-block"
                        href="air-max-1-pc570902ebdd.html?i2=1903929"><i class="fal fa-square mr-2"></i>40</a>
                </div>



                <div class="filter filter-price mt-4 tp_product_category_filter_price">
                    <h4 class="title-cate text-uppercase font-weight-bold position-relative beforPre">Lọc theo
                        giá</h4>
                    <div class="price_slider_wrapper">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span>Từ:
                                <span id="price_form" data-size="0">
                                    0đ
                                </span>
                            </span>
                            <span>đến:
                                <span id="price_to" data-size="10000000" data-max="10000000">
                                    10,000,000đ
                                </span>
                            </span>
                        </div>
                        <div id="slider-range"></div>
                    </div>
                </div>

            </div>
            <i class="fal fa-times position-absolute d-lg-none"></i>
        </div>
        <div class="col-lg-9">
            <div class="row-pre">
                @if (isset($category_by_id))
                    @foreach ($category_by_id as $list)
                        <div class="product-item position-relative col-6 col-sm-4" data-id="37944975"
                        data-storeId="116318"
                        data-img="{{asset('/uploads/product/'.$list->product_image)}}">
                        <div class="product-item__image position-relative">
                            <a href="/chi-tiet-giay/{{$list->product_slug}}"
                                class="d-block image-ab position-absolute">
                                <img class="lazyload productHover productHover37944975"
                                    src="{{asset('/uploads/product/'.$list->product_image)}}" data-sizes="auto"
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
                            <span class="d-block text-uppercase product-item_cate mt-2"></span>
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
                @elseif(isset($brand_by_id))
                    @foreach ($brand_by_id as $list)
                        <div class="product-item position-relative col-6 col-sm-4" data-id="37944975"
                        data-storeId="116318"
                        data-img="{{asset('/uploads/product/'.$list->product_image)}}">
                        <div class="product-item__image position-relative">
                            <a href="/chi-tiet-giay/{{$list->product_slug}}"
                                class="d-block image-ab position-absolute">
                                <img class="lazyload productHover productHover37944975"
                                    src="{{asset('/uploads/product/'.$list->product_image)}}" data-sizes="auto"
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
                            <span class="d-block text-uppercase product-item_cate mt-2"></span>
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
                @endif
               
                
             

                <div class="col-12">
                    {{-- <div class="paginator"><span class="labelPages">1 - 4 / 4</span><span
                            class="titlePages">&nbsp;&nbsp;Trang: </span></div> --}}
                            @if (isset($category_by_id))
                                {{ $category_by_id->onEachSide(2)->links() }}
                            @elseif(isset($brand_by_id))
                                {{ $brand_by_id->onEachSide(2)->links() }}
                            @endif
                            
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection