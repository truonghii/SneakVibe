<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_category_blog;
use App\Models\tbl_blog;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index(){
        $list_blog = tbl_blog::orderby('id','ASC')->get();
        // $data = tbl_blog::selectRaw("DATE_FORMAT(updated_at, '%d/%y/%m %H:%i:%s') AS formatted_update_at")->get();
        return view('admin.blog.quan_ly_blog',compact('list_blog'));
    }

    public function create(){
        return view('admin.blog.them_blog');
        
    }

    public function create_(Request $request){
        
        $data = $request->validate(
            [
                'blog_title'=>'required|unique:tbl_blog|max:255',
                'blog_image'=>'required|image',
                'blog_slug'=>'',
                'blog_status'=>'required',
                'blog_content'=>'required',
                'category_blog_id'=>'required',
            ],
            [
                'blog_title.required'=>'Tiêu đề bài viết không được để trống*',
                'blog_title.unique'=>'Tên tiêu đề nãy đã tồn tại. Vui lòng đặt tên khác*',
                'blog_image.required'=>'Ảnh bìa bài viết không được để trống*',
                'blog_image.image'=>'Ảnh bài phải là hình ảnh*',
                'blog_status.required'=>'Trạng thái bài viết không được để trống*',
                'blog_content.required'=>'Nội dung bài viết không được để trống',
                'category_blog_id.required'=>'Danh mục bài viết không được để trống',    
            ]
            );
        $blog = new tbl_blog();
        $blog->blog_title = $data['blog_title'];
        $blog->blog_slug = $data['blog_slug'];
        $blog->blog_description = $data['blog_description']??'Đang Cập Nhật';
        $blog->blog_content = $data['blog_content'];
        $blog->category_blog_id = $data['category_blog_id'];
        $blog->blog_status = $data['blog_status'];
        // $blog->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        
        if($request->hasFile('blog_image')){
            $get_image = $request->blog_image;
            $path = 'uploads/blog/';
            $get_name_image = $get_image->getClientOriginalName();
            
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $blog->blog_image = $new_image;
            }else{
                
                $blog->blog_image = 'no_image.png';
            }
            
        
        $blog->save();
        Session::flash('message','Thêm blog thành công');
        return redirect()->back();
    
        
        
    }

    public function edit($id){
        $data = tbl_blog::find($id);
        if($data==null) return redirect()->back();
        return view('admin.blog.cap_nhat_blog',compact('data'));
        
    }

    public function edit_(Request $request, $id){
        $data = $request->all();
        $blog = tbl_blog::find($id);
        $blog->blog_title = $data['blog_title'];
        $blog->blog_slug = $data['blog_slug'];
        $blog->blog_description = $data['blog_description'];
        $blog->blog_content = $data['blog_content'];
        $blog->category_blog_id = $data['category_blog_id'];
        $blog->blog_status = $data['blog_status'];
        
        if($request->hasFile('blog_image')){
            $get_image = $request->blog_image;
            if($get_image){
                $path_unlink = 'uploads/blog/'.$blog->blog_image;
                if(file_exists($path_unlink)){
                    unlink($path_unlink);
                }
            }
    
            $path = 'uploads/blog/';
            $get_name_image = $get_image->getClientOriginalName();
            
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $blog->blog_image = $new_image;
            }else{
                
                $blog->blog_image = 'no_image.png';
            }
            
        
        $blog->save();
        Session::flash('message','Cập nhật blog thành công');
        return redirect('/admin/quan-ly-blog');
        
    }

    public function trash_bin(){
        $data = tbl_blog::onlyTrashed()->get();
        return view('admin.blog.thung_rac',compact('data'));
    }

    public function soft_delete($id){
        $data = tbl_blog::find($id);
        if($data==null) return redirect()->back();
        $data->delete();
        Session::flash('message','Blog đã chuyển vào thùng rác');
        return redirect()->back();
    }

    public function delete($id){
        $data = tbl_blog::withTrashed()->find($id);
            if($data == null) return redirect()->back();
            $data->forceDelete();
            Session::flash('message','Đã xóa blog');
            return redirect()->back();
        
    }

    public function restore($id){
        $data = tbl_blog::withTrashed()->find($id);
            if($data == null) return redirect()->back();
            $data->restore();
            Session::flash('message','Khôi phục sản phẩm thành công');
            return redirect()->back();
        
    }
}