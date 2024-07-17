@extends('pages.layout')
@section('title')
Quên mật khẩu
    
@endsection

@section('content')

<form action="" method="POST" novalidate>
    @csrf
    <label for="">Vui lòng nhập email</label>
    <input type="email" name="email" >
    @error('email')
    <small><i class="text-danger">{{ $message }}</i></small>
    @enderror
    <button type="submit">Gửi</button>
</form>
    
@endsection