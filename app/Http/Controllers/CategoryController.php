<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
use App\Models\tbl_product;
use Illuminate\Http\Request;
use App\Models\tbl_brand;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //hiển thị danh sách danh mục giày
    
    public function index(){
        $category = tbl_category::orderby('id','asc')->get();
        return view('admin.category.quan_ly_danh_muc',compact('category'));
        
    }
    
    // Thêm danh mục giày
    
    public function themDanhMuc(){
        return view ('admin.category.them_danh_muc_giay');
    }
    public function themDanhMuc_(Request $request){
        $data = $request->all();
        $data = $request->validate(
            [
                'category_name'=>'required|unique:tbl_category|max:255',
                'category_slug'=>'',
                'category_status'=>'required',
                'brand_id'=>'required',
                'category_description'=>''
            ],
            [
                'category_name.required' => 'Tên danh mục bắt buộc phải có*',
                'category_name.unique'=> 'Tên danh mục đã có.Hãy nhập thương hiệu khác*',
                'category_status.required'=>'Trạng thái danh mục bắt buộc*',
                'brand_id.required'=>'Thương hiệu cho danh mục phải có*',    
            ]
        );
        $category = new tbl_category();
        $category->category_name = $data['category_name'];
        $category->category_slug = $data['category_slug'];
        $category->brand_id = $data['brand_id'];
        $category->category_description = $data['category_description'] ?? 'Đang cập nhật';
        $category->category_status = $data['category_status'];
        $category->save();
        Session::flash('message','Thêm danh mục giày thành công');
        return redirect()->back();
    }

    //Cập nhật danh mục giày
    
    public function capNhatDanhMuc($id){
        $data = tbl_category::find($id);
        if($data==null) return redirect()->back();
        return view('admin.category.cap_nhat_danh_muc_giay',compact('data'));
    }
    public function capNhatDanhMuc_(Request $request,$id){
        
        $data = $request->all();
        $category = tbl_category::find($id);
        $category->category_name = $data['category_name'];
        $category->category_slug = $data['category_slug'];
        $category->brand_id = $data['brand_id'];
        $category->category_description = $data['category_description'];
        $category->category_status = $data['category_status'];
       
        $category->save();
        Session::flash('message','Cập nhật danh mục giày thành công');
        return Redirect::to('/admin/quan-ly-danh-muc-giay');
    }
    
    //Xóa thương hiệu
    public function xoaDanhMuc(Request $request, $id){

        // Kiểm tra xem có bản ghi liên quan trong bảng con không
        $hasProduct = tbl_product::where('category_id', $id)->exists();
    
        // Nếu có, hiển thị thông báo cảnh báo và chuyển hướng lại
        if ($hasProduct) {
            Session::flash('message','Không thể xóa danh mục này vì có sản phẩm liên quan. Hãy xóa hết sản phẩm trong danh mục này trước.');
            return redirect()->back();
        }
    
        // Nếu không có bản ghi liên quan trong bảng con, tiến hành xóa bản ghi trong bảng cha
        try {
            DB::beginTransaction();
    
            // Xóa bản ghi trong bảng cha
            
            $data = tbl_category::findOrFail($id);
            $data->delete();
            DB::commit();
            Session::flash('message','Đã xóa danh mục thành công');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('message','Đã xảy ra lỗi không xóa được thương hiệu');
            return redirect()->back();
        }
    }
}