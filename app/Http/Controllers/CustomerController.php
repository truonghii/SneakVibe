<?php

namespace App\Http\Controllers;
use App\Models\tbl_customers;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function index(){
        $customers = tbl_customers::orderby('id','asc')->get();
        return view('admin.customer.quan_ly_customer',compact('customers'));
    }
    function delete($id){
        $data = tbl_customers::find($id);
            $data->delete();
            Session::flash('message','Đã xóa khách hàng này');
            return redirect()->back();
        
    }
}
    