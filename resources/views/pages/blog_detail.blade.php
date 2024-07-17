@extends('pages.layout')
@section('title')
    
@endsection

@section('content')
<div class="container-pre newsPage">
    <!--    <div class="row">-->
    <div class="content-page row">
        <div class="left-content col-12 col-lg-9">
            <div class="news-item m-0">
                <div class="news-item__head text-center">
                    <h4 class="news-item__cate">
                        <a href="#" class="text-uppercase font-weight-bold"> Tin tức</a>
                    </h4>
                    <h3 class="news-item__title font-weight-bold beforPre position-relative"> {{$blog_detail->blog_title}} </h3>
                    <p class="text-uppercase m-0">{{$blog_detail->updated_at->diffForHumans()}}</p>
                </div>
                <div class="news-item__image position-relative">
                    <a href="javascript:" class="d-block">
                        <img src="{{asset('/uploads/blog/'.$blog_detail->blog_image)}}"
                            alt="{{$blog_detail->blog_title}}">
                    </a>
                    <div class="position-absolute date-abso">
                        <div class="text-center col-12 p-0">
                            <span class="font-weight-bold">{{$blog_detail->updated_at->format('d')}}</span>
                            <span class="font-weight-bold">Th{{$blog_detail->updated_at->format('m')}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detail-news">
                    {!!$blog_detail->blog_content!!}
                <div class="blog-share">
                    <div
                        class="share-group pt-1 beforPre d-flex align-items-center justify-content-center position-relative">
                        <a target="_blank"
                            href="http://www.facebook.com/sharer.php?u=http://t0239.store.nhanh.vn/cham-soc-va-ve-sinh-giay-sneaker-nhung-kien-thuc-co-ban-can-nam-vung-n99087.html"
                            class="share-face d-inline-block rounded-circle text-center"
                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a target="_blank"
                            href="http://twitter.com/share?url=http://t0239.store.nhanh.vn/cham-soc-va-ve-sinh-giay-sneaker-nhung-kien-thuc-co-ban-can-nam-vung-n99087.html"
                            class="share-twitter d-inline-block rounded-circle text-center"
                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a target="_blank"
                            href="mailto:enteryour@addresshere.com?subject=Chăm sóc và vệ sinh giày sneaker: Những kiến thức cơ bản cần nắm vững&body=Check%20this%20out:%20http://t0239.store.nhanh.vn/cham-soc-va-ve-sinh-giay-sneaker-nhung-kien-thuc-co-ban-can-nam-vung-n99087.html"
                            class="share-mail d-inline-block rounded-circle text-center">
                            <i class="far fa-envelope"></i>
                        </a>
                        <a target="_blank"
                            href="http://pinterest.com/pin/create/button/?url=http://t0239.store.nhanh.vn/cham-soc-va-ve-sinh-giay-sneaker-nhung-kien-thuc-co-ban-can-nam-vung-n99087.html&amp;media=https://pos.nvncdn.com/eb9ddb-116318/art/20220324_wWWVQBP2cFaEYaShKCF0GwO8.png&amp;description=Ch%c4%83m%20s%c3%b3c%20v%c3%a0%20v%e1%bb%87%20sinh%20gi%c3%a0y%20sneaker:%20Nh%e1%bb%afng%20ki%e1%ba%bfn%20th%e1%bb%a9c%20c%c6%a1%20b%e1%ba%a3n%20c%e1%ba%a7n%20n%e1%ba%afm%20v%e1%bb%afng"
                            class="share-pinter d-inline-block rounded-circle text-center"
                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;">
                            <i class="fab fa-pinterest"></i>
                        </a>
                        <a target="_blank"
                            href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://t0239.store.nhanh.vn/cham-soc-va-ve-sinh-giay-sneaker-nhung-kien-thuc-co-ban-can-nam-vung-n99087.html&amp;title=Ch%c4%83m%20s%c3%b3c%20v%c3%a0%20v%e1%bb%87%20sinh%20gi%c3%a0y%20sneaker:%20Nh%e1%bb%afng%20ki%e1%ba%bfn%20th%e1%bb%a9c%20c%c6%a1%20b%e1%ba%a3n%20c%e1%ba%a7n%20n%e1%ba%afm%20v%e1%bb%afng"
                            class="share-linked d-inline-block rounded-circle text-center"
                            onclick="window.open(this.href,this.title,'width=500,height=500,top=300px,left=300px');  return false;">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="blog-comment">
                <h5>Bình luận</h5>
                <div class="fb-comments"
                    data-href="http://t0239.store.nhanh.vn/cham-soc-va-ve-sinh-giay-sneaker-nhung-kien-thuc-co-ban-can-nam-vung-n99087.html"
                    data-numposts="5" data-width="100%"></div>
            </div>
        </div>
        <div class="right-content col-12 col-lg-3">
            <h2 class="beforPre title position-relative">
                <span class=" text-uppercase font-weight-bold">chuyên mục</span>
            </h2>
            <ul class="cateNews-list p-0">
                <li><a href="tin-tuc-nc103898.html" class="d-inline-block font-weight-bold active">Tin tức</a>
                </li>
                <li><a href="tuyen-dung-nc103909.html" class="d-inline-block ">Tuyển dụng</a></li>
            </ul>
        </div>
    </div>
    <!--    </div>-->
</div>

<style>
    .container-pre {
        max-width: 1110px
    }

    .share-group {
        margin-top: 2em;
    }

    .share-group a {
        border-color: silver;
        color: silver;
    }
</style>
@endsection