<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
use App\Models\tbl_category_blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryBlogController extends Controller
{
    public function index(){
        $list_category = tbl_category_blog::orderby('id','ASC')->get();
        return view('admin.category_blog.quan_ly_danh_muc_blog',compact('list_category'));
    }

    public function create(){
        return view('admin.category_blog.them_danh_muc_blog');
    }
    public function create_(Request $request){
        // $data = $request->all();
        $data = $request->validate(
            [
                'category_name'=>'required|unique:tbl_category_blog|max:255',
                'category_slug'=>'',
                'category_status'=>'required',
                'category_description'=>'',
            ],
            [
                'category_name.required' => 'Tên danh mục blog bắt buộc phải có*',
                'category_name.unique'=> 'Tên danh mục blog đã có.Hãy nhập danh mục khác*',
                'category_status.required'=> 'Trạng thái danh mục blog bắt buộc phải có*'
                   
            ]
        );
        
        $category_blog = new tbl_category_blog();
        $category_blog->category_name = $data['category_name'];
        $category_blog->category_slug = $data['category_slug'];
        $category_blog->category_status = $data['category_status'];
        $category_blog->category_description = $data['category_description'] ?? $category_blog->category_description;
        $category_blog->save();
        Session::flash('message','Thêm danh mục blog thành công!');
        return redirect()->back();
        
    }
    public function edit($id){
        $data = tbl_category_blog::find($id);
        if($data == null)return redirect()->back();
        return view('admin.category_blog.cap_nhat_danh_muc_blog',compact('data'));
        
    }
    public function edit_(Request $request,$id){
        $data = $request->all();
        $category_blog = tbl_category_blog::find($id);
        $category_blog->category_name = $data['category_name'];
        $category_blog->category_slug = $data['category_slug'];
        $category_blog->category_status = $data['category_status'];
        $category_blog->category_description = $data['category_description'];
        $category_blog->save();
        Session::flash('message','Cập nhật danh mục blog thành công!');
        return redirect('/admin/quan-ly-danh-muc-blog');
        
    }
    public function delete($id){
        $category_blog = tbl_category_blog::find($id);
        if($category_blog == null)return redirect()->back();
        $category_blog->delete();
        Session::flash('message','Xóa danh mục blog thành công!');
        return redirect()->back();

    }
}