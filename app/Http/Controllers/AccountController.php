<?php

namespace App\Http\Controllers;

use App\Mail\VerifyAccount;
use App\Mail\ForgotPassword;
use App\Models\tbl_customers_reset_tokens;
use App\Models\tbl_customers;
use App\Models\order;
use DB;
use Mail;
use Hash;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct() {
        $brand = \DB::table('tbl_brand')->where('brand_status',1 )->orderBy('id','asc')->get();
        view()->share( 'brand', $brand);    
    }
    // đăng nhập
    public function login(){
        return view('pages.account.login');
    }
    public function check_login(Request $request){
        $request->validate([
            
            'email'=>'required|email|exists:tbl_customers',
            'password'=>'required', 
        ],[
            'email.required'=>'Email không được để trống*',
            'email.email'=>'email viết sai cú pháp*',
            'email.exists'=>'Email không tồn tại*',
            'password.required'=>'Mật khẩu không được để trống*',  
        ]);
        $data= $request->only('email','password');
        $check = auth('cus')->attempt($data);
        if($check){
            $user = auth('cus')->user();
            if($user->email_verified_at == null){
                auth('cus')->logout();
                return redirect()->back()->with('ok','Bạn chưa xác thực email, Vui lòng xác thực trước khi đăng nhập');
            }
            return redirect('/')->with('ok','Đăng Nhập Thành Công');
        } 
        return redirect()->back()->with('no','Mật khẩu hoặc email không trùng khớp');
    }
    //đăng xuất

    function logout(){
        if(session('cart')){
            auth('cus')->logout();
            Session::forget('cart');
            return redirect('/')->with('ok','Đăng xuất thành công');
        } else{
            auth('cus')->logout();
            return redirect('/')->with('ok','Đăng xuất thành công');
        }
    }
        

    //đăng ký
    public function register(){
        return view('pages.account.register');
    }
    public function check_register(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:50',
            'email'=>'required|email|min:6|max:100|unique:tbl_customers',
            'password'=>'required|min:6',
            'confirm_password'=>'required|same:password',    
        ],[
            'name.required'=>'Họ tên không được để trống*',
            'name.min'=>'Tên phải tối thiểu 3 ký tự*',
            'name.max'=>'Tên quá dài*',
            'email.required'=>'Email không được để trống*',
            'email.email'=>'email viết sai cú pháp*',
            'email.unique'=>'Email đã tồn tại*',
            'password.required'=>'Mật khẩu không được để trống*',
            'password.min'=>'Mật khẩu phải tối thiểu 6 ký tự*',
            'confirm_password.required'=>'Cần phải xác nhận lại mật khẩu*',
            'confirm_password.same'=>'Mật khẩu không trùng khớp. Vui lòng nhập lại*'
        ]);
        $data = $request->only('name','email');
        $data['password'] = bcrypt($request->password);
        $acc=tbl_customers::create($data);
        if($acc){
            Mail::to($acc->email)->send(new VerifyAccount($acc));
            return redirect()->route('account.login')->with('ok','vui lòng vào gmail xác thực');
        }
        return redirect()->back()->with('ok','có lỗi');
    }
    // xác thực tài khoản
    public function verify($email){
        $acc = tbl_customers::where('email',$email)
        ->whereNull('email_verified_at')
        ->firstOrFail();
        tbl_customers::where('email',$email)->update(['email_verified_at'=>date('Y-m-d')]);
        return redirect()->route('account.login')->with('ok','xác thực thành công');
        
    }

    //thay đổi mật khẩu

    public function change_password(){
        return view('pages.account.change_password');
    }
    public function check_change_password(Request $request){
        $auth = auth('cus')->user();
        $request->validate([
            'old_password'=>['required',
             function($attr, $value, $fail) use($auth){
                if(!Hash::check($value, $auth->password)){
                   return $fail('Mật khẩu của bạn không trùng khớp !!!');
                }
            }],
            'password'=> 'required|min:4|max:50',
            'confirm_password'=>'required|same:password'
        ],[
            'old_password.required'=>'Vui lòng nhập mật khẩu cũ*',
            'password.required'=>'Vui lòng nhập mật khẩu mới*',
            'password.min'=>'Mật khẩu phải nhìu hơn 4 ký tự*',
            'password.max'=>'Mật khẩu phải ít hơn 50 ký tự*',
            'confirm_password.required'=>'Vui lòng nhập lại mật khẩu mới*',
            'confirm_password.same'=>'Mật khẩu không trùng khớp với mật khẩu mới*',
        ]);
      
        $data['password'] = bcrypt($request->password);
        if($auth->update($data)){
         auth('cus')->logout();
            return redirect()->route('account.login')->with('ok','Cập nhật mật khẩu thành công, Hãy đăng nhập lại');
        }
        return redirect()->back()->with('no','Có vài lỗi xảy ra, hãy kiểm tra lại');
        
    }

    //quên mật khẩu

    public function forgot_password(){
        return view('pages.account.forgot_password');
    }
    public function check_forgot_password(Request $request){
        $request->validate([
            'email'=>'required|email|exists:tbl_customers',
            
        ],[
            'email.required'=>'Vui lòng nhập Email của bạn*',
            'email.exists'=>'Email không tồn tại*',
            'email.email'=>'Vui lòng nhập đúng cú pháp Email*'
        ]);

        $customer = tbl_customers::where('email',$request->email)->first();
        $token = \Str::random(50);
        $tokenData = [
            'email'=>$request->email,
            'token'=>$token
        ];
        
        
        if(tbl_customers_reset_tokens::create($tokenData)){
            Mail::to($request->email)->send(new ForgotPassword($customer,$token));
            
           return redirect()->back()->with('ok','Vui lòng kiểm tra email để tiếp tục');
        }
        return redirect()->back()->with('no','Có lỗi xảy ra, vui lòng kiểm tra lại');
       
        
    }

     //reset password
     public function reset_password($token){
        
        $tokenData = tbl_customers_reset_tokens::where('token',$token)->firstOrFail();
       
        
        
        return view('pages.account.reset_password');
    }
    public function check_reset_password(Request $request, $token){
        $request->validate([
            'password'=>'required|min:4',
            'confirm_password'=>'required|same:password',
        ]);
        $tokenData = tbl_customers_reset_tokens::where('token',$token)->firstOrFail();
        $customer = tbl_customers::where('email',$tokenData->email)->firstOrFail();
        $data = [
            'password' =>bcrypt($request->password)
        ];
        $check = $customer->update($data);
        if($check){
            // Xóa token sau khi mật khẩu đã được cập nhật
            $tokenData->delete();
            return redirect()->route('account.login')->with('ok','Thay đổi mật khẩu thành công');
        }
        return redirect()->back()->with('no','Đã xảy ra lỗi, vui lòng kiểm tra lại');
    }
    

    //profile
    public function profile(){
        $auth = auth('cus')->user();
        return view('pages.account.profile', compact('auth'));
    }
    public function check_profile(Request $request){
        $auth = auth('cus')->user();
        $request->validate([
            'name'=>'required|min:3|max:50',
            'email'=>'required|email|min:6|max:100|unique:tbl_customers,email,'.$auth->id,
            
            'password'=>['required', function($attr, $value, $fail) use($auth){
                if(!Hash::check($value, $auth->password))
                return $fail('Mật khẩu không đúng. Vui lòng nhập lại');
            }],
          
            
        ],[
            'name.required'=>'Họ tên không được để trống*',
            'name.min'=>'Tên phải tối thiểu 3 ký tự*',
            'name.max'=>'Tên quá dài*',
            'password.required'=> 'Vui lòng nhập mật khẩu*'
            
          
           
        ]);
        $data = $request->only('name','email','address','password','phone','gender');
       
        $check = $auth->update($data);
        
        // $check= $auth->update($data);
        
        if($check){
            return redirect()->back()->with('ok','cập nhật thành công');
        }
        return redirect()->back()->with('no','Đã có lỗi xảy ra');
        
        
    }
    // giỏ hàng
    public function my_cart(){
        $auth = auth('cus')->user();
        $id_customer = $auth->id;
        $list_order = order::where('id_customer', $id_customer)->orderBy('id_order', 'desc')->get();
        
        return view('pages.account.my_cart',compact('list_order'));
    }

   
    
}