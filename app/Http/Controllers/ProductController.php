<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_product;
use App\Models\tbl_category;
use App\Models\tbl_attribute;
use App\Models\tbl_product_attribute;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index(){
        $list_product = tbl_product::orderby('id','asc')->get();
        
        return view('admin.product.quan_ly_san_pham',compact('list_product'));
    }
    public function themSanPham(){
        
        $sizes = tbl_attribute::where('name','size')->get();
        
        return view('admin.product.them_san_pham',compact('sizes'));
    }
    public function themSanPham_(Request $request){
        
        
        $data = $request->validate(
            [
                'product_name'=>'required|unique:tbl_product|max:255',
                'product_slug'=>'',
                'product_image'=>'image|mimes:jpg,png,jpeg,gif,svg|dimensions:min_width:100,min_height:100,max_width:2000,max_height:2000',
                'product_status'=>'required',
                'product_price'=>'required|regex:/^[0-9]+$/',
                'product_promotion'=>'regex:/^[0-9]+$/',
                'product_quantity'=>'required|regex:/^[0-9]+$/',
                'category_id'=>'required',
                'product_size'=>'',
                'product_hot'=>'',
                'product_content'=>'',
                'product_description'=>'',
            ],
            [
                'product_name.required' => 'Tên sản phẩm bắt buộc phải có*',
                'product_name.unique'=> 'Tên sản phẩm đã có.Hãy nhập thương hiệu khác*',
                'product_image.image' => 'Ảnh sản phẩm phải là ảnh*',
                'product_image.mimes' => 'Logo thương hiệu phải có định dạng jpg, png, jpeg, gif hoặc svg',
                'product_image.dimensions' => 'Kích thước của logo thương hiệu không hợp lệ. Kích thước tối thiểu: 100x100 pixels, tối đa: 2000x2000 pixels.',
                'product_status.required'=> 'Cẩn phải chọn trạng thái của sản phẩm*',
                'category_id.required'=>'Vui lòng chọn danh mục cho sản phẩm*',
                'product_price.required'=>'Vui lòng nhập giá cho sản phẩm*',
                'product_price.regex'=> 'Giá tiền phải là số*',
                'product_promotion.regex'=>'Giá tiền phải là số*',
                'product_quantity.required'=>'Vui lòng nhập số lượng sản phẩm*',
                
                'product_quantity.regex'=>'Số lượng sản phẩm phải là số*',
                
                
            ]
            );
        $product = new tbl_product();
        $product->product_name = $data['product_name'];
        $product->category_id = $data['category_id'];
        $product->product_status = $data['product_status'];
        $product->product_quantity = $data['product_quantity'];
       
        $product->product_price = $data['product_price'];
        $product->product_hot = $data['product_hot'];
        // if (isset($data['product_promotion'])) {
        //     $product->product_promotion = $data['product_promotion'];
        // } else {
            
        //     $product->product_promotion = 0;
        // }
        $product->product_promotion = $data['product_promotion'];
        $product->product_slug = $data['product_slug'];
        $product->product_description = $request->has('product_description') ? $data['product_description'] : 'Đang cập nhật';

        if($request->hasFile('product_image')){
        $get_image = $request->product_image;
        $path = 'uploads/product/';
        $get_name_image = $get_image->getClientOriginalName();
        
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $product->product_image = $new_image;
        }else{
            
            $product->product_image = 'no_image.png';
        }
        
        $product->save();
        
        foreach ($request->id_attribute as $attributeId) {
            // Create a new product attribute instance
            $productAttribute = new tbl_product_attribute();
            $productAttribute->id_product = $product->id;
            $productAttribute->id_attribute = $attributeId;
            $productAttribute->save();
        }
    
        Session::flash('message','Thêm sản phẩm thành công');
        return redirect()->back();
    }

    public function capNhatSanPham($id){
        
      
        $sizes = tbl_attribute::where('name','size')->get();
        $data = tbl_product::find($id);

        // Lấy danh sách các thuộc tính đã được chọn của sản phẩm
        $selectedAttributes = tbl_product_attribute::where('id_product', $id)->pluck('id_attribute')->toArray();
        if($id==null)return redirect()->back();
        return view('admin.product.cap_nhat_san_pham',compact('data','sizes','selectedAttributes'));
    }
    public function capNhatSanPham_(Request $request, $id){
        $data = $request->all();
        $product = tbl_product::find($id);
        $product->product_name = $data['product_name'];
        $product->category_id = $data['category_id'];
        $product->product_status = $data['product_status'];
        $product->product_quantity = $data['product_quantity'];
        $product->product_price = $data['product_price'];
        $product->product_hot = $data['product_hot'];
        $product->product_promotion = $data['product_promotion'];
        $product->product_description = $data['product_description'];
        
       
        $get_image = $request->product_image;
        if($get_image){
            $path_unlink = 'uploads/product/'.$product->product_image;
            if(file_exists($path_unlink)){
                unlink($path_unlink);
            }
        }
        $path = 'uploads/product/';
        $get_name_image = $get_image->getClientOriginalName();
        
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $product->product_image = $new_image;
       
        
        $product->save();

        if(isset($request->id_attribute)){
            // Xóa tất cả các thuộc tính cũ của sản phẩm
            tbl_product_attribute::where('id_product', $id)->delete();
            // Thêm các thuộc tính mới được chọn
            foreach ($request->id_attribute as $attributeId) {
                $productAttribute = new tbl_product_attribute();
                $productAttribute->id_product = $id;
                $productAttribute->id_attribute = $attributeId;
                $productAttribute->save();
            }
        }
      
        Session::flash('message','Cập nhật sản phẩm thành công');
        return Redirect::to('/admin/quan-ly-san-pham');

        
        }

        public function xoaMemSanPham($id){
            $data = tbl_product::find($id);
            $data->delete();
            Session::flash('message','Sản phẩm đã chuyển vào thùng rác');
            return redirect()->back();
        }
        public function thungRac(){
            $data = tbl_product::onlyTrashed()->get();
            return view('admin.product.thung_rac',compact('data'));
        }
        public function xoaSanPham($id){
            $data = tbl_product::withTrashed()->find($id);
            if($data == null) return redirect()->back();
            $data->forceDelete();
            Session::flash('message','Đã xóa sản phẩm');
            return redirect()->back();
        }
        public function khoiPhuc($id){
            $data = tbl_product::withTrashed()->find($id);
            if($data == null) return redirect()->back();
            $data->restore();
            Session::flash('message','Khôi phục sản phẩm thành công');
            return redirect()->back();
        }
        public function activeProductHot($id){
            $product = tbl_product::find($id);
            if($product){
                $product->product_hot = 0;
                $product->save();
            }
            Session::flash('message','Hủy kích hoạt sản phẩm có id = '.$product->id.' thành sản phẩm hot');
            return redirect()->back();
        }
        public function unactiveProductHot($id){
            $product = tbl_product::find($id);
            if($product){
                $product->product_hot = 1;
                $product->save();
            }
            Session::flash('message','Kích hoạt sản phẩm có id = '.$product->id. ' thành sản phẩm hot');
            return redirect()->back();
        }
}