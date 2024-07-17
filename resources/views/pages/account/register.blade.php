@extends('pages.layout')
@section('title')
    Đăng ký
    
@endsection

@section('content')
<style>
    .card-img-left {
  width: 50%;
  /* Link to your background image using in the property below! */
  background: scroll center url('{{asset('/front_end/img/art/artCT/minh.png')}}');
  background-size: cover;
}

.btn-login {
  font-size: 1rem;
  letter-spacing: 0.05rem;
  padding: 0.75rem 1rem;
}
.container{
    margin-top: 10px
}
.gray-background {
    background-color: #f2f2f2; /* Màu xám nhạt */
}


</style>
{{-- 
<div id="signin-signup" class="margin-page signin-signup">
    <div class="head-page">
        <div class="container-pre">
            <h1 class="text-uppercase font-weight-bold mb-0 text-center">Tài Khoản</h1>
        </div>
    </div>
    <div class="container-pre content-signin">
        <div class="row">
            <div id="customer-login" class="col-md-6 form-login">
                <img src="{{asset('/front_end/img/art/artCT/minh.png')}}" alt="" width="100%"> 
            </div>
            <div class="col-md-6 form-signup">
                <h2 class="font-weight-bold title text-uppercase">Đăng ký</h2>
              
                <form method="POST" action="">
                    @csrf
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        @error('email')
                      <small><i class="text-danger">{{ $message }}</i></small>
                      @enderror
                      <input type="email" name="email" id="form2Example1" class="form-control" />
                      <label class="form-label" for="form2Example1">Email</label>
                      
                    </div>
                   
                    <div data-mdb-input-init class="form-outline mb-4">
                        @error('name')
                        <small><i class="text-danger">{{ $message }}</i></small>
                        @enderror
                        <input type="text" name="name" id="form2Example1" class="form-control" />
                        <label class="form-label" for="form2Example1">Tên</label>
                       
                      </div>
                  
                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        @error('password')
                        <small><i class="text-danger">{{ $message }}</i></small>
                        @enderror
                      <input type="password" name="password" id="form2Example2" class="form-control" />
                      <label class="form-label" for="form2Example2">Mật Khẩu</label>
                     
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                        @error('confirm_p')
                        <small><i class="text-danger">{{ $message }}</i></small>
                        @enderror
                        <input type="password" name="confirm_password" id="form2Example2" class="form-control" />
                        <label class="form-label" for="form2Example2">Xác Thực Mật Khẩu</label>
                       
                      </div>
                  
                  
                   
                  
                    <!-- Submit button -->
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Đăng ký</button>
                  </form> 
            </div>
        </div>
    </div>
</div> --}}
<div id="signin-signup" class="margin-page signin-signup">
    <div class="head-page">
        <div class="container-pre">
            <h1 class="text-uppercase font-weight-bold mb-0 text-center">Tài Khoản</h1>
        </div>
    </div>
<div class="container">
    <div class="row">
      <div class="col-lg-12 col-xl-10 mx-auto">
        <div class="card flex-row my-1 border-0 shadow rounded-3 overflow-hidden gray-background">
          <div class="card-img-left d-none d-md-flex">
            <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body p-4 p-sm-5">
            <h5 class="card-title text-center mb-2 fw-light fs-5">Đăng Ký</h5>
            <form method="POST" action="">
                @csrf

              <div class="form-floating mb-2">
                <label for="floatingInputUsername">Tên*</label>
                <input type="text" name="name" class="form-control" id="floatingInputUsername" value="{{old('name')}}"  novalidate>
                @error('name')
                <small><i class="text-danger">{{ $message }}</i></small>
                @enderror
              </div>

              <div class="form-floating mb-2">
                <label for="floatingInputEmail">Gmail*</label>
                <input type="email" name="email" class="form-control" id="floatingInputEmail" value="{{old('email')}}"  novalidate >
                @error('email')
                <small><i class="text-danger">{{ $message }}</i></small>
                @enderror
              </div>

              <hr>

              <div class="form-floating mb-2">
                <label for="floatingPassword">Mật Khẩu*</label>
                <input type="password" name="password" class="form-control" id="floatingPassword"  novalidate>
                @error('password')
                <small><i class="text-danger">{{ $message }}</i></small>
                @enderror
              </div>

              <div class="form-floating mb-3">
                <label for="floatingPasswordConfirm">Xác Thực Mật Khẩu*</label>
                <input type="password" name="confirm_password" class="form-control" id="floatingPasswordConfirm" novalidate >
                @error('confirm_password')
                      <small><i class="text-danger">{{ $message }}</i></small>
                      @enderror
              </div>

              <div class="d-grid mb-1 text-center">
                <button class="btn btn-lg btn-dark btn-login fw-bold text-uppercase btn-block"  type="submit">Đăng Ký</button>
              </div>

            

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection