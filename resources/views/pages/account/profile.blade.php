@extends('pages.layout')

@section('title')
    Trang hồ sơ
@endsection

@section('content')

<script defer type="text/javascript" src="https://web.nvnstatic.net/js/jquery/jquery.validationEngine-vi.js?v=22"></script><script defer type="text/javascript" src="https://web.nvnstatic.net/js/jquery/jquery.validationEngine.js?v=22"></script><link rel="stylesheet" href="https://web.nvnstatic.net/css/validationEngine.jquery.css?v=2" type="text/css"><script defer type="text/javascript" src="https://web.nvnstatic.net/tp/T0239/js/user.js?v=2"></script><link rel="stylesheet" href="https://web.nvnstatic.net/tp/T0239/css/user.css?v=2" type="text/css">

<div id="PageContainer" class="margin-page user-page">
    <div class="head-page">
        <div class="container">
            <h1 class="text-uppercase font-weight-bold mb-0 text-center">Hồ Sơ</h1>
        </div>
    </div>
    <div class="container">

        <div class="row">
            <div class="left-menu col-md-4">
                <p class="fullname-user font-weight-bold title pb-2">
                    <span>Minh Trần</span>
                </p>
                <ul class="py-3 py-md-0 pl-0 mb-0">
                    <li>
                        <a class="d-inline-block" href="/profile/edit">
                            <span class="d-inline-block"><img src="https://web.nvnstatic.net/tp/T0239/img/userProfile.png?v=3" alt="profile"></span>
                            <span class="active">Hồ sơ của tôi</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-inline-block" href="{{route('account.change_password')}}">
                            <span class="d-inline-block"><img src="https://web.nvnstatic.net/tp/T0239/img/changePass.png?v=3" alt="profile"></span>
                            <span>Đổi mật khẩu</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-inline-block" href="{{route('account.my_cart')}}">
                            <span class="d-inline-block"><img src="https://web.nvnstatic.net/tp/T0239/img/orderfile.png?v=3" alt="profile"></span>
                            <span>Đơn hàng của tôi</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="right-content col-md-8">
                <p class="font-weight-bold title m-0 text-center text-md-left"><span>Thông tin tài khoản</span></p>
                <form method="POST" action="">
                    @csrf
                    <ul class="d-flex align-items-center flex-wrap pl-0 mb-0">
                            <li class='val'>
                                <label  class="required">
                                    <span>*</span> Tên:
                                </label>
                                <input name="name" placeholder="họ và tên" type="text" value="{{$auth->name}}">
                                @error('name')
                                <small><i class="text-danger">{{ $message }}</i></small>
                                @enderror
                                <li class='val'>
                                    <label  class="required">
                                        <span>*</span> Email:
                                    </label>
                            <input  name="email" placeholder="Email" type="text" value="{{$auth->email}}">
                            </li>

                            <li class='val'>
                                <label  class="required">
                                    <span>*</span> Giới tính:
                                </label>
                                <select name="gender" id="" class="form-control" >
                                    <option value="1" {{$auth->gender == 1 ? 'selected' : ''}}>Nữ</option>
                                    <option value="0" {{$auth->gender == 0 ? 'selected' : ''}}>Nam</option>
                                </select>
                                @error('gender')
                                <small><i class="text-danger">{{ $message }}</i></small>
                                @enderror
                            </li>

                            <li class='val'>
                                <label  class="required">
                                    <span>*</span> Số điện thoại:
                                </label>
                                <input type='text' name='phone' value='{{$auth->phone}}'  placeholder="Số điện thoại"/>
                                @error('phone')
                                <small><i class="text-danger">{{ $message }}</i></small>
                                @enderror
                            </li>
                            <li class='val'>
                                <label  class="required">
                                    <span>*</span> Địa chỉ:
                                </label>
                                <input type='text' name='address' value='{{$auth->address}}' placeholder="Địa chỉ"/>
                                @error('address')
                                <small><i class="text-danger">{{ $message }}</i></small>
                                @enderror
                            </li>

                          

                        
                            <li class='val'>
                                <label  class="required">
                                    <span>*</span> Mật khẩu xác nhận:
                                </label>
                                <input type='password' name='password' placeholder="Nhập mật khẩu"/>
                                @error('password')
                                <small><i class="text-danger">{{ $message }}</i></small>
                                @enderror
                            </li>
                           
                                <button type='submit' class="btn btn-insert">Cập Nhật</button>
                                
                            
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>
<style>
    @media (min-width: 992px) {
        .container{
           max-width: 992px !important;
        }
    }
</style>
    
@endsection