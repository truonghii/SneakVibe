@extends('pages.layout')
@section('title')
Quên mật khẩu
    
@endsection

@section('content')

<form action="" method="POST" novalidate>
    @csrf
    <label for="">Vui lòng nhập mật khẩu mới</label>
    <input type="password" name="password" >
    @error('password')
    <small><i class="text-danger">{{ $message }}</i></small>
    @enderror
    <label for="">Vui lòng nhập  nhập lại</label>
    <input type="password" name="confirm_password" >
    @error('confirm_password')
    <small><i class="text-danger">{{ $message }}</i></small>
    @enderror
    <button type="submit">Đổi</button>
</form>
    
@endsection