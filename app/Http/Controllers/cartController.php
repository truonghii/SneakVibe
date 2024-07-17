<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Mail;
use Hash;
use Illuminate\Pagination\Paginator;
use App\Mail\orderConfirm;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\order;
use App\Models\order_detail;
use App\Models\tbl_product;

class cartController extends Controller
{
    public function __construct() {
        $brand = \DB::table('tbl_brand')->where('brand_status',1 )->orderBy('id','asc')->get();
        view()->share( 'brand', $brand);    
    }
    public function removeCart(){
        session()->forget('cart');
    }
    public function removeVC(){
        session()->forget('voucher');
    }
    public function confirm(){
        return view('pages.cart.orderSuccess');
    } 
    public function success(){
        return view('pages.cart.orderSuccess');
    }
    public function verify($token){
        $order = order::where('token', $token)->first();
        
        if($order){
            $order->token = null;
            $order->status = 1;
            $order->save();
            return redirect()->route('confirm');
        }
        return abort(404);
    }


    public function update(Request $request){
        // dd($request->all());
        $id =  $request->input('id');
        $size =  $request->input('size');
        $idtt = $id .'_'. $size; 
        $tt = $request->input('tt');
        $qty = $request->input('qty');
        if($tt < 2){
            if($qty <= 1){
                $cart = session()->get('cart');
                unset($cart[$id]);
                session()->put('cart', $cart);
                return redirect()->back()->with('ok','Cập nhật giỏ hàng thành công');
            }else{
                $cart = session()->get('cart');
                $cart[$id]["quantity"]--;
                session()->put('cart', $cart);
                return redirect()->back()->with('ok','Cập nhật giỏ hàng thành công');
            }
        }else{
            $cart = session()->get('cart');
                $cart[$id]["quantity"]++;
                session()->put('cart', $cart);
                return redirect()->back()->with('ok','Cập nhật giỏ hàng thành công');
        }
    }

    function add_cart(Request $request){
        //dd($request->all());
        $id = $request->input('id');
        $size = $request->input('size');
        $quantity = $request->input('quantity');
        $pro = \App\Models\tbl_product::where('id',$id)->first();
         // dd($option_f);
        $cart = session()->get('cart', []);
       
        
        $cart_id = $id . '_' . $size ;
        if( isset($cart[$cart_id ]) ) {
            $cart[$cart_id ]['quantity'] ++; 
            // nếu bt giống nhau thì + qty     
        }
        else {
            $cart[$cart_id] = [
                "name" => $pro->product_name,
                "id" => $cart_id,
                "image" => $pro->product_image,
                "sale" => $pro->product_price,
                "price" => $pro->product_promotion,
                "quantity" => $request->input('quantity'),
                "size" => $request->input('size'),
            ];
    }
       session()->put('cart', $cart);
       return back()->with('ok','Thêm vào giỏ hàng thành công');
    }
    function cart(Request $request){ 
        $cart =  $request->session()->get('cart'); 
        return view('/pages.cart.cart', ['cart'=> $cart]);  
    }
    public function delete_cart_detail($id){
        $cart = session()->get('cart', []);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        
        return redirect()->back()->with('ok','Xóa sản phẩm thành công');
        // dd($cart['id']);
    }
    public function check_voucher(Request $request){
        //dd($request->all());
        $get_code = $request->input('code');
        $get_total = $request->input('total');
        $data = \App\Models\voucher::where('code', $get_code)->first();
        $cou = session()->get('voucher', []);
        //dd($data);
        if (session()->has('voucher')) {
            
            return redirect()->back()->with('ok','Đã tồn tại voucher');
        } else {
            if ($data) {
                if ($data->voucher_condition < $get_total) {
                    $cou[] =  array(
                        'code' => $data->code,
                        'dk' => $data->voucher_condition,
                        'giam' => $data->discount,
                        'tien' => $request->input('total'),
                    );
                    session()->put('voucher', $cou);
                    //Toastr::success('thêm mã giảm giá thành công', 'Thành Công');
                    return redirect()->back()->with('ok','Thêm mã giảm giá thành công');
                } else {
                    
                    return redirect()->back();
                }
                Session::save();
                return redirect()->back()->with('ok','Thêmccng');
            } else {

                return redirect()->back()->with('no','Thêm mã giảm giá thất bại');
            }
        }
    }
    public function delete_vch(Request $request){

        session()->forget('voucher');
        //Toastr::success('Xóa mã giảm giá thành công', 'Thành Công');
        return redirect()->back()->with('ok','Xóa voucher thành công');
    }
    public function pay(){
        return(view('pages.cart.pay'));
    }
    
}
