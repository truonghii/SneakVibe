<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\order_detail;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class orderController extends Controller
{
    public function index_order(){
        $list_order = order::orderby('id_order','asc')->get();
        // ->select('id_order','name','email', 'total_amount', 'city', 'district', 'ward', 'address', );
        return view('admin.order.quan_ly_don_hang',compact('list_order'));
    }
    public function delete($id){
        $data = order::find($id);
            if($data == null) return redirect()->back();
            $data->forceDelete();
            Session::flash('message','Đã xóa blog');
            return redirect()->back();
    }
}
