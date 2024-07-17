<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_brand;
use App\Models\tbl_category;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
     // hiển thị danh sách thương hiệu
     public function quanLyThuongHieu(){
        $list_brand = tbl_brand::orderby('id','asc')->get();
        return view('admin.brand.quan_ly_thuong_hieu',compact('list_brand'));
    }

    //Thêm mới thương hiệu
    public function themThuongHieu(){
        return view('admin.brand.them_thuong_hieu');
    }
    public function themThuongHieu_(Request $request){

        // $data = $request->all();
        $data = $request->validate(
            [
                'brand_name'=>'required|unique:tbl_brand|max:255',
                'brand_slug'=>'',
                'brand_logo'=>'image|mimes:jpg,png,jpeg,gif,svg',
                'brand_status'=>'required',
                'brand_description'=>'',
            ],
            [
                'brand_name.required' => 'Tên thương hiệu bắt buộc phải có*',
                'brand_name.unique'=> 'Tên thương hiệu đã có.Hãy nhập thương hiệu khác*',
                // 'brand_logo.required'=> 'Logo thương hiệu bắt buộc phải có*',
                'brand_logo.image' => 'Logo thương hiệu phải là ảnh',
                'brand_logo.mimes' => 'Logo thương hiệu phải có định dạng jpg, png, jpeg, gif hoặc svg',
                'brand_logo.dimensions' => 'Kích thước của logo thương hiệu không hợp lệ. Kích thước tối thiểu: 100x100 pixels, tối đa: 2000x2000 pixels.',
                'brand_status.required'=> 'Trạng thái thương hiệu bắt buộc phải có*'
                   
            ]
        );
        $brand = new tbl_brand();
        $brand->brand_name = $data['brand_name'];
        $brand->brand_slug = $data['brand_slug'];
        $brand->brand_description = isset($data['brand_description']) ? $data['brand_description'] : 'Đang cập nhật';
        $brand->brand_status = $data['brand_status'];
        if($request->hasFile('brand_logo')){
        $get_image = $request->brand_logo;
        $path = 'uploads/brand/';
        $get_name_image = $get_image->getClientOriginalName();
        
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $brand->brand_logo = $new_image;
        }else{
            
            $brand->brand_logo = 'no_image.png';
        }
        
        $brand->save();
        // Session::flash('message','Thêm thương hiệu thành công',5);
        session()->flash('message','Thêm thương hiệu thành công');
        return Redirect::to('/admin/quan-ly-thuong-hieu/them');
    }

    //Cập nhật thương hiệu
    public function capNhatThuongHieu($id){
        $data = tbl_brand::find($id);
        if($data==null) return redirect()->back();
        return view('admin.brand.cap_nhat_thuong_hieu',compact('data'));
    }
    public function capNhatThuongHieu_(Request $request,$id){
        
        $data = $request->all();
        $brand = tbl_brand::find($id);
        $brand->brand_name = $data['brand_name'];
        $brand->brand_slug = $data['brand_slug'];
        $brand->brand_description = $data['brand_description'];
        $brand->brand_status = $data['brand_status'];
        $get_image = $request->brand_logo;
        if($get_image){
            $path_unlink = 'uploads/brand/'.$brand->brand_logo;
            if(file_exists($path_unlink)){
                unlink($path_unlink);
            }
        $path = 'uploads/brand/';
        
        $get_name_image = $get_image->getClientOriginalName();
        
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path,$new_image);
        $brand->brand_logo = $new_image;
        } 
        $brand->save();
        Session::flash('message','Cập nhật thương hiệu thành công');
        return Redirect::to('/admin/quan-ly-thuong-hieu');
    }

    //Xóa thương hiệu
    public function xoaThuongHieu(Request $request, $id){

    // Kiểm tra xem có bản ghi liên quan trong bảng con không
    $hasCategory = tbl_category::where('brand_id', $id)->exists();

    // Nếu có, hiển thị thông báo cảnh báo và chuyển hướng lại
    if ($hasCategory) {
        Session::flash('message','Không thể xóa thương hiệu này vì có danh mục liên quan. Hãy xóa hết danh mục trong thương hiệu này trước.');
        return redirect()->back();
    }

    // Nếu không có bản ghi liên quan trong bảng con, tiến hành xóa bản ghi trong bảng cha
    try {
        DB::beginTransaction();

        // Xóa bản ghi trong bảng cha
        
        $data = tbl_brand::findOrFail($id);
        $path_unlink = 'uploads/brand/'.$data->brand_logo;
            if(file_exists($path_unlink)){
                unlink($path_unlink);
            }
            $data->delete();
        DB::commit();
        
        Session::flash('message','Đã xóa thương hiệu thành công');
        return redirect()->back();
    } catch (\Exception $e) {
        DB::rollback();
        Session::flash('message','Đã xảy ra lỗi không xóa được thương hiệu');
        return redirect()->back();
    }
}
}