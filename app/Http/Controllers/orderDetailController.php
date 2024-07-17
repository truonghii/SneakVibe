<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order_detail;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class orderDetailController extends Controller
{
    public function index_order_detail(){
        $list_order_detail = order_detail::orderby('id_details','asc')->get();
        
        return view('admin.order.quan_ly_chi_tiet_don_hang',compact('list_order_detail'));
    }
    public function delete($id){
        $data = order_detail::find($id);
            if($data == null) return redirect()->back();
            $data->forceDelete();
            Session::flash('message','Đã xóa blog');
            return redirect()->back();
    }
}
