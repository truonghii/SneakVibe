@extends('pages.layout')

@section('title')
    Trang đổi mật khẩu
    
@endsection

@section('content')

<style type="text/css">
    .pageSignin label {
        display: block;
        margin-bottom: 5px;
    }
    .pageSignin li {
        width: 100%;
        margin: 20px 0;
    }
    .pageSignin input,
    .pageSignin #btnSubmit{
        width: 100%;
        padding: 7px 10px;
    }
    ul.errors li {
        color: red;
        padding: 10px 0;
    }
</style>
<div class="pageSignin" style="width: 320px;margin: 50px auto">
    <h1 style="text-align: center; margin-bottom: 20px;font-size: 20px">Đổi mật khẩu</h1>
    <form method="POST" action="">
        @csrf
        <ul >
            <li >
                <label for="oldpassword" class="required">
                    <span>*</span> Mật khẩu cũ:
                </label>
                    <input name="old_password" type="password"></li><li >
                        @error('old_password')
                        <small><i class="text-danger">{{ $message }}</i></small>
                        @enderror
                <label for="newpassword" class="required">
                    <span>*</span> Mật khẩu mới:
                </label>
                    <input name="password" type="password">
                    @error('password')
                    <small><i class="text-danger">{{ $message }}</i></small>
                    @enderror
                </li>
                <li >
                    <label for="repassword" class="required">
                        <span>*</span> Nhập lại mật khẩu mới:
                    </label>
                    <input name="confirm_password" type="password">
                    @error('confirm_password')
                    <small><i class="text-danger">{{ $message }}</i></small>
                    @enderror
                </li>
              
                <li class="btns">
                   
                    <button type="submit" name="submit" id="btnSubmit">Xác Nhận</button>
                    <a href="{{route('account.profile')}}" style="float: right">Quay về</a>
                </li>
               


            </ul>
        </form>
    </div>

    
    
@endsection