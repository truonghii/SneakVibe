<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\order_details;

class HistoryCotroller extends Controller
{
    public function __construct() {
        $brand = \DB::table('tbl_brand')->where('brand_status',1 )->orderBy('id','asc')->get();
        view()->share( 'brand', $brand);    
    }
    public function order_history($order){
        $list_order = order::with('details')
       -> where('id_customer', $order)
       ->orderBy('id_order', 'desc')
       ->get();       
        return view('pages.account.my_cart',compact('list_order')); 
    }
}
