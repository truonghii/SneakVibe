<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use Hash;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use App\Models\order;
use App\Models\order_detail;
use App\Models\tbl_customers;
use App\Models\vnpay;
use App\Mail\orderConfirm;
use App\Mail\orderSuccess;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class paymentController extends Controller
{
    public function __construct() {
        $brand = \DB::table('tbl_brand')->where('brand_status',1 )->orderBy('id','asc')->get();
        view()->share( 'brand', $brand);    
    }
    public function history(){
        $auth = auth('cus')->user();
        $id_customer = $auth->id;
        $list_order = order::where('id_customer', $id_customer)->orderBy('id_order', 'desc')->get();
        return view('pages.cart.history',compact('list_order')); 
    }
    public function order_history($order){
        $list_order_history = order_detail::where('id_order', $order)->orderBy('id_details', 'desc')->get();
        $list_order = order::where('id_order', $order)->orderBy('id_order', 'desc')->get();
        return view('pages.cart.order_history',compact('list_order_history','list_order')); 
    }
    public function pay_send(Request $request){
        $data = $request->validate(
            [
                'name'=>'required|min:3|max:50',
                'phone'=>'required|min:10|max:11',
                'email'=>'required|email|ends_with:@gmail.com',
                'city'=>'required|max:255',
                'district'=>'required|max:255',
                'ward'=>'required|max:255',
                'address'=>'required|max:255',

            ],
            [
                'name.required' => 'Tên bắt buộc phải có*',
                'name.min'=>'Tên phải tối thiểu 3 ký tự*',
                'name.max'=>'Tên quá dài*',
                'phone.required' => 'Số điện thoại bắt buộc phải có*',
                'phone.min'=>'Tên phải tối thiểu 10 ký tự*',
                'phone.max'=>'Tên quá dài*',
                'email.required' => 'Email bắt buộc phải có*',
                'email.email'=>'email viết sai cú pháp*',
                'email.ends_with'=>'Phải kết thúc bằng @gmail.com*',
                'city.required' => 'Thành phố bắt buộc phải có*',
                'city.max'=>'Tên quá dài*',
                'district.required' => 'Quận Huyện bắt buộc phải có*',
                'district.max'=>'Tên quá dài*',
                'ward.required' => 'Phường phố bắt buộc phải có*',
                'ward.max'=>'Tên quá dài*',
                'address.required' => 'Số nhà bắt buộc phải có*',
                'address.max'=>'Tên quá dài*',
            ]
        );
        // dd($request->all());
        $auth = auth('cus')->user();
        $hinhthuc = $request->input('paymentMethod');
        $total = $request->input('total');
        if($hinhthuc == 0){
            if(session('cart')){
                $token = Str::random(12);
                $order = new order;
                $order->fill($request->all());
                $order ->token = $token;
                $order ->id_customer = $auth->id;
                $order ->total_amount = $total;

                // dd($order);
                $order ->save();
                
                $mailinfo = $order->email;
                $nameinfo = $order->name;
                $tokeninfo = $order ->token;
                $idinfo = $order->id_order;
                $Mail = Mail::to($mailinfo)->send(new orderConfirm($nameinfo, $tokeninfo));
                $id = $order -> id_order;
                $idpro = $request->input('id_sp');
                $id_pro = \App\Models\tbl_product::where('id',$idpro)->first();
                if(session('cart')){
                    foreach(session('cart') as $item){ 
                        $order_detail = new order_detail;
                        $order_detail -> name_sp =  $item['name'];
                        $order_detail -> quantity = $item['quantity'];
                        $order_detail -> price =  $item['price'];
                        $order_detail -> image =  $item['image'];
                        $order_detail -> size =  $item['size'];
                        $order_detail -> id_order =  $id;
                        //$order_detail -> id_product =$id_pro;
                    $order_detail-> save();
                    }
                }else{
                    echo '';
                }
            }else{
                echo '';
            }
            session()->forget('cart');
            session()->forget('voucher');
            return(view('pages.cart.orderConfirm'));

        }elseif($hinhthuc == 1){
            $orderss[] = array(
                'total_amount' => $total,
                'id_customer' => $auth->id,
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'city' => $request->input('city'),
                'district' => $request->input('district'),
                'ward' => $request->input('ward'),
                'address' => $request->input('address'),
                'note' => $request->input('note'),
                'paymentMethod' => $request->input('paymentMethod'),
                'status' => 1,
            );

            session()->put('orderss', $orderss);
            
            return  view('vnpay.vnpay_pay',compact('total'));
        
         
        }
    }
    public function vnpay(Request $request){
      
        $data = $request -> all();
        
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return";
        $vnp_TmnCode = "AFS6JVLM";//Mã website tại VNPAY 
        $vnp_HashSecret = "JQCFESSBPWPKBMTSZIAXDHUQOLPNYMPJ"; //Chuỗi bí mật
        
        $vnp_TxnRef = "10000"; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh Toán Đơn Hàng";
        $vnp_OrderType = "SneakVibe";
        $vnp_Amount = $data['total'] * 100;
        $vnp_Locale = "VN";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );
        
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }
        
        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }
    
    public function payment(){
        
        return  view('vnpay.vnpay_create_payment');
    }
    
    public function tt_return_vnpay(Request $request){ 
           
        return redirect('/')->with('massege','Đặt Hàng Thành Công');
    }
    public function vn_pay_cart(){
        
        return  view('page_cart.vnpay-cart', $data);
    }
    public function vn_pay_return(){
        
        $vnp_TmnCode = "AFS6JVLM";//Mã website tại VNPAY 
        $vnp_HashSecret = "JQCFESSBPWPKBMTSZIAXDHUQOLPNYMPJ"; //Chuỗi bí mật
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
         foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
            }
        }

       
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
               $vnpay =\App\Models\vnpay::create([
                'vnp_Amount' => $inputData['vnp_Amount'],
                'vnp_BankCode'=>$inputData['vnp_BankCode'],
                'vnp_BankTranNo'=>$inputData['vnp_BankTranNo'],
                'vnp_CardType'=>$inputData['vnp_CardType'],
                'vnp_OrderInfo'=>$inputData['vnp_OrderInfo'],
                'vnp_PayDate'=>$inputData['vnp_PayDate'],
                'vnp_ResponseCode'=>$inputData['vnp_ResponseCode'],
                'vnp_TmnCode'=>$inputData['vnp_TmnCode'],
                'vnp_TransactionNo'=>$inputData['vnp_TransactionNo'],
                'vnp_TransactionStatus'=>$inputData['vnp_TransactionStatus'],
                'vnp_TxnRef'=>$inputData['vnp_TxnRef'],
                'vnp_SecureHash'=>$secureHash
                ]); 
                $total = $vnpay->vnp_Amount;
                if(session('orderss')){
                    foreach(session('orderss') as $or){
                        $order = \App\Models\order::create([
                            'total_amount' => $total,
                            'id_customer' => $auth->id,
                            'city' => $or['city'],
                            'district' => $or['district'],
                            'ward' => $or['ward'],
                            'address' => $or['address'],
                            'phone' => $or['phone'],
                            'status' => 1,
                            'token' => 'null',
                            'email' => $or['email'],
                            'name' => $or['name'],
                            'note' => $or['note'],
                            'paymentMethod' => 1
                        ]);
                    }
                }
                $id_order = $order->id_order; 
                
                $total = $vnpay->vnp_Amount;
                if(session('cart')){
                    foreach(session('cart') as $k){
                        $cart = \App\Models\order_detail::create([
                            'id_order' => $id_order,
                            'quantity' => $k['quantity'],
                            'name_sp' => $k['name'],
                            'price' => $k['price'],
                        ]);
                    }
                };
                $id_order = $order->id_order;
                $name = $order->name;
                $gmail = $order->email;
                $mailinfo = $order->email;
                $nameinfo = $order->name;
                $tokeninfo = "";
                $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
                $Mail = Mail::to($mailinfo)->send(new orderSuccess($nameinfo, $tokeninfo));
                // Mail::send('email.order',[
                //     'name' => $name,
                //     'date' => $now,
                //     'id' =>  $id_order,
                //     'carts' => $cart,
                // ],function($mail) use($gmail){
                //     $mail -> to($gmail);
                //     $mail -> from('truongnguynphan113@gmail.com');
                //     $mail -> subject('Hóa Đơn Đặt Hàng');
                // });
                // $qtynew = $cart->quantity;
                // $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
                // $date = \App\Models\tk_order::where('order_date',$now)->first();
                // $date_count = $date->count(); 
                // $total = $vnpay->vnp_Amount;
                // if($date_count > 0){
                //     $date = \App\Models\tk_order::where('order_date',$now)->first();
                //     $salesnew = $date->sales;
                //     $qty = $date->qty;
                //     $total_order = $date->total_order;
                //     $date = \App\Models\tk_order::where('order_date',$now)->update([
                //         'sales' => $salesnew + $total ,
                //         'qty' => $qtynew + $qty,
                //         'total_order' => $total_order + 1
                //     ]);
                // }else{
                //     $date = \App\Models\tk_order::create([
                //         'order_date' =>  $now,
                //         'sales' => $salesnew + $total ,
                //         'qty' => $qtynew,
                //         'total_order' => 1
                //     ]);
                // }
                session()->forget('cart');
                
                session()->forget('voucher');
            } 
            else {
                echo "ádfasfas";
                }
        } else {
            echo "Chu ky khong hop le";
            }
                
                return  view('pages.cart.orderConfirm');
    }


    public function paymenttt(){
        if (Auth::check()) {
            $user = Auth::user();
            
        } else {
            echo "chưa";
        }
    }
    
public function creat_payment(){
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://localhost/vnpay_php/vnpay_return.php";
    $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
    $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
    $vnp_TmnCode = "AFS6JVLM";
    $vnp_HashSecret = "JQCFESSBPWPKBMTSZIAXDHUQOLPNYMPJ"; //Chuỗi bí mật

    $startTime = date("YmdHis");
    $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
    $vnp_TxnRef = rand(1,10000); //Mã giao dịch thanh toán tham chiếu của merchant
    $vnp_Amount = $_POST['amount']; // Số tiền thanh toán
    $vnp_Locale = $_POST['language']; //Ngôn ngữ chuyển hướng thanh toán
    $vnp_BankCode = $_POST['bankCode']; //Mã phương thức thanh toán
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán
    
    $inputData = array(
        "vnp_Version" => "2.1.0",
         "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount* 100,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => "Thanh toan GD:" + $vnp_TxnRef,
        "vnp_OrderType" => "other",
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
        "vnp_ExpireDate"=>$expire
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }

    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    header('Location: ' . $vnp_Url); 
    die();
}
}
