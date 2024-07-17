<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_detailproduct;
use App\Models\tbl_product;
use Illuminate\Support\Facades\Session;

class DetailProductController extends Controller
{
    public function themThuVienAnh(){
        return view('admin.product.thu_vien_anh');
    }
    public function themThuVienAnh_(Request $request){
        $product_id = $request->product_id;
        $product = tbl_product::find($product_id);
        
        
         
        $get_image = $request->product_detail_image;
        if($get_image){
            foreach($get_image as $image){
                
            
            $path = 'uploads/gallery/';
            $get_name_image = $image->getClientOriginalName();
            
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
            $image->move($path,$new_image);
            $gallery = new tbl_detailproduct();
            
            $gallery->product_id = $product->id;
            $gallery->product_image_title = $product->product_name;
            $gallery->product_detail_image = $new_image;
            $gallery->save();
            
            }
        }
        Session::flash('message','Thêm Thư Viện Ảnh Thành Công');
       
        return redirect()->back();
        
    }
    public function capNhatThuVienAnh($id){
        $gallery = tbl_detailproduct::where('product_id',$id)->orderby('id','desc')->get();
        
        return view('admin.product.thu_vien_anh',compact('gallery'));
        
    }

    public function xoaThuVienAnh($id){
        $gallery = tbl_detailproduct::find($id);
        $path = 'uploads/gallery/'.$gallery->product_detail_image;
        if(file_exists($path)){
            unlink($path);
        }
        $gallery->delete();
        Session::flash('message','Xóa Ảnh Thành Công');
        return redirect()->back();
    }
    
}