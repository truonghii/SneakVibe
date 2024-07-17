@extends('pages.layout')
@section('title')
    Blog
@endsection

@section('content')
<div class="container-pre newsPage">

    <div class="header-newsPage">
        <h1 class="text-center font-weight-bold text-uppercase">category archives : news</h1>
    </div>
 <!--    <div class="row">-->
         <div class="content-page row">
             <div class="left-content col-12 col-lg-9">
                 
                @foreach ($blogs as $list)
                <div class="news-item  ">
                    <div class="news-item__head text-center">
                        <h4 class="news-item__cate"><a href="#" class="text-uppercase font-weight-bold">Tin tức</a></h4>
                        <h3 class="news-item__title font-weight-bold beforPre position-relative">
                            <a href="cham-soc-va-ve-sinh-giay-sneaker-nhung-kien-thuc-co-ban-can-nam-vung-n99087.html">{{$list->blog_title}}</a>
                        </h3>
                        <p class="text-uppercase m-0">Cập Nhật: {{$list->updated_at->diffForHumans()}}</p>
                    </div>
                    <div class="news-item__image position-relative">
                        <a href="cham-soc-va-ve-sinh-giay-sneaker-nhung-kien-thuc-co-ban-can-nam-vung-n99087.html" class="d-block">
                            <img src="{{asset('/uploads/blog/'.$list->blog_image)}}" alt="{{$list->blog_title}}">
                        </a>
                        <div class="position-absolute date-abso">
                            <div class="text-center col-12 p-0">
                                <span class="font-weight-bold">{{ $list->updated_at->format('d') }}</span>
                                <span class="font-weight-bold">Th{{ $list->updated_at->format('m') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="news-item__infor">
                        <p class="news-item__intro m-0">{{$list->blog_description}}</p>
                        <p class="text-center view-more m-0">
                            <a href="/chi-tiet-blog/{{$list->blog_slug}}" class="d-inline-block font-weight-bold text-uppercase mt-3"> Đọc Tiếp ->  <i class="fal fa-long-arrow-right"></i></a>
                        </p>
                    </div>
                    <div class="news-item__footer d-flex align-items-center justify-content-between">
                        <span>Posted in <a href="#" class="d-inline-block">Tin tức</a> </span>
                        <span><a href="cham-soc-va-ve-sinh-giay-sneaker-nhung-kien-thuc-co-ban-can-nam-vung-n99087.html">Bình Luận</a></span>
                    </div>
                </div>
                    
                @endforeach
                 
                
                 <div class="col-12 px-0 py-3">
                    {{ $blogs->onEachSide(2)->links() }}
                </div>
             </div>
             <div class="right-content col-12 col-lg-3">
                 <h2 class="beforPre title position-relative">
                     <span class=" text-uppercase font-weight-bold">chuyên mục</span>
                 </h2>
                                 <ul class="cateNews-list p-0">

                                    <?php
                                        $category_blog = \App\Models\tbl_category_blog::where('category_status',1)->orderBy('id','asc')->get();

                                    ?>
                                    @foreach ($category_blog as $item)
                                        <li><a href="tin-tuc-nc103898.html" class="d-inline-block">{{$item->category_name}}</a></li>
                                    @endforeach
                                        
                                        
                                     </ul>
                             </div>
         </div>
 <!--    </div>-->
 </div>
 
 <style>
     .container-pre{
         max-width: 1110px
     }
 </style> 
@endsection