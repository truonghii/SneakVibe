<?php

namespace App\Http\Controllers;

use App\Models\tbl_blog;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();


class myController extends Controller
{
    public function cart(){
        return view('pages.cart.cart');
    }
    public function __construct() {
        $brand = \DB::table('tbl_brand')->where('brand_status',1 )->orderBy('id','asc')->get();
        view()->share( 'brand', $brand);    
    }
    public function index(){
        // sản phẩm mới 
        $product_new = DB::table('tbl_product')->where('product_status',1)->whereNull('deleted_at') 
        ->orderby('created_at','desc')->limit(8)->get();
        // sản phẩm hot
        $product_hot = DB::table('tbl_product')->where('product_status',1)
        ->where('product_hot',1)
        ->whereNull('deleted_at') 
        ->orderby('id','asc')
        ->limit(8)->get();

        // blog 

        // $data3 = DB::table('tbl_blog')
        // ->where('blog_status',1)
        // ->orderby('id','desc')
        // ->limit(3)
        // ->get();
        // $category = DB::table('tbl_blog')
        // ->join('tbl_category_blog','tbl_blog.category_blog_id','=','tbl_category_blog.id')
        // ->select('tbl_category_blog.category_name','tbl_category_blog.id')
        // ->get();
        
        // foreach ($data3 as $item) {
        //     $item->updated_at = Carbon::parse($item->updated_at);
        // }

        return view('pages.index',compact('product_new','product_hot'));
    }
    
    public function giayTheoDanhMuc($slug){
        // tìm kiếm danh mục dựa vào slug
        $category = DB::table('tbl_category')->where('category_slug',$slug)->first();
        if($category){
            $perpage= 12;
            $category_by_id = DB::table('tbl_product')
            ->join('tbl_category','tbl_product.category_id','=','tbl_category.id')
            ->where('tbl_product.category_id',$category->id)
            ->where('tbl_product.product_status', 1)
            // kiểm tra chỉ các sản phẩm có phần deleted_at có giá trị null thì hiển thị,các sản phẩm xóa mềm thì không hiển thị
            ->whereNull('deleted_at') 
            ->paginate($perpage)->withQueryString();
        }
        

        return view('pages.product',compact('category_by_id','category'));
    }

    public function giayTheoThuongHieu($slug){
        //tìm kiếm thương hiệu dựa vào slug
        $brands = DB::table('tbl_brand')->where('brand_slug',$slug)->first();
            $perpage = 12;
            $brand_by_id = DB::table('tbl_brand')
            ->join('tbl_category','tbl_category.brand_id','=','tbl_brand.id')
            ->join('tbl_product','tbl_product.category_id','=','tbl_category.id')
            ->where('tbl_brand.brand_slug',$slug)
            ->where('tbl_product.product_status', 1) 
            ->whereNull('tbl_product.deleted_at')
            ->paginate($perpage)->withQueryString();

            return view('pages.product',compact('brands','brand_by_id'));
        
    }

  

    public function giayChiTiet($slug){
        $product_detail = DB::table('tbl_product')
        ->join('tbl_category', 'tbl_product.category_id', '=', 'tbl_category.id')
        ->join('tbl_brand', 'tbl_category.brand_id', '=', 'tbl_brand.id')
        ->select('tbl_product.*', 'tbl_category.category_name as category_name', 'tbl_brand.brand_name as brand_name')
        ->where('tbl_product.product_slug', $slug)
        ->first();

        // Lấy danh mục của sản phẩm hiện tại
        $category_id = $product_detail->category_id;
        // Lấy các sản phẩm khác trong cùng danh mục
        $related_products = DB::table('tbl_product')
        ->where('category_id', $category_id)
        ->where('product_slug', '!=', $slug) // Loại trừ sản phẩm hiện tại
        ->limit(4) 
        ->get();
        return view('pages.product_detail',compact('product_detail','related_products'));
        
        
    }


    //Blog
    function blog(){
        $perpage= 12;
        $blogs = DB::table('tbl_blog')
        ->where('tbl_blog.blog_status',1)
        ->orderBy('id','asc')
        ->paginate($perpage)->withQueryString();

        
         foreach ($blogs as $item) {
            $item->updated_at = Carbon::parse($item->updated_at);
        }

       

        return view('pages.blog',compact('blogs'));
    }
    function blogChiTiet($slug){
        $blog_detail = DB::table('tbl_blog')
        ->where('blog_slug',$slug)->first();
         
        
            $blog_detail->updated_at = Carbon::parse($blog_detail->updated_at);
        

        
        return view('pages.blog_detail',compact('blog_detail'));
    }
}