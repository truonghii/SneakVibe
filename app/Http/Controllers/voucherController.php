<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_category_blog;
use App\Models\voucher;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;


class voucherController extends Controller
{
    public function index(){
        $list_voucher = voucher::orderby('coupon_id','ASC')->get();
        // $data = voucher::selectRaw("DATE_FORMAT(updated_at, '%d/%y/%m %H:%i:%s') AS formatted_update_at")->get();
        return view('admin.voucher.quan_ly_voucher',compact('list_voucher'));
    }

    public function create(){
        return view('admin.voucher.them_voucher');
        
    }

    public function create_(Request $request){
        
        $data = $request->validate(
            [
                'voucher_name'=>'required|unique:voucher|max:255',
                'code'=>'required',
                'discount'=>'required',
                'expired_date'=>'required',
                'voucher_condition'=>'required',
                'status'=>'required',
                
            ],
            [
                'voucher_name.required'=>'Tên voucher không được để trống*',
                'voucher_name.unique'=>'Tên voucher nãy đã tồn tại. Vui lòng đặt tên khác*',
                'code.required'=>'Mã voucher không được để trống*',
                'discount.required'=>'Số tiền được giảm không được để trống',
                'expired_date.required'=>'Ngày hết hạn không được để trống',    
                'status.required'=>'Trạng thái bắt buộc phải có',    
            ]
            );
        $voucher = new voucher();
        $voucher->voucher_name = $data['voucher_name'];
        $voucher->code = $data['code'];
        $voucher->discount = $data['discount'];
        $voucher->expired_date = $data['expired_date'];
        $voucher->voucher_condition = $data['voucher_condition'];
        $voucher->status = $data['status'];
            
        $voucher->save();
        Session::flash('message','Thêm voucher thành công');
        return redirect()->back();
    
        
        
    }

    public function edit($id){
        $data = voucher::find($id);
        if($data==null) return redirect()->back();
        return view('admin.voucher.cap_nhat_voucher',compact('data'));
        
    }

    public function edit_(Request $request, $id){
        $data = $request->all();
        $voucher = voucher::find($id);
        $voucher->voucher_name = $data['voucher_name'];
        $voucher->code = $data['code'];
        $voucher->discount = $data['discount'];
        $voucher->expired_date = $data['expired_date'];
        $voucher->voucher_condition = $data['voucher_condition'];
        $voucher->status = $data['status'];
            
        
        $voucher->save();
        Session::flash('message','Cập nhật voucher thành công');
        return redirect('/admin/quan-ly-voucher');
        
    }

    public function trash_bin(){
        $data = voucher::onlyTrashed()->get();
        return view('admin.voucher.thung_rac',compact('data'));
    }

    public function soft_delete($id){
        $data = voucher::find($id);
        if($data==null) return redirect()->back();
        $data->delete();
        Session::flash('message','Voucher đã chuyển vào thùng rác');
        return redirect()->back();
    }

    public function delete($id){
        $data = voucher::withTrashed()->find($id);
            if($data == null) return redirect()->back();
            $data->forceDelete();
            Session::flash('message','Đã xóa voucher');
            return redirect()->back();
        
    }

    public function restore($id){
        $data = voucher::withTrashed()->find($id);
            if($data == null) return redirect()->back();
            $data->restore();
            Session::flash('message','Khôi phục sản phẩm thành công');
            return redirect()->back();
        
    }
}
