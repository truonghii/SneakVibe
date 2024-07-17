@extends('admin/layout')

@section('title')
    Thêm Mới Voucher
@endsection

@section('breadcrumbs')
    <a href="/admin/quan-ly-voucher">Quản Lý Voucher</a> / Thêm Mới Voucher   
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Tạo mới Voucher</h3>

        <?php
            $message = Session::get('message');
            if(isset($message)){
              echo ' <div class="alert alert-warning" role="alert" id="timeShowAlert">'.$message.' </div>';   
            }
        ?>
        <div class="tile-body">
          <form class="row" method="post" action="{{URL::to('/admin/quan-ly-voucher/them')}}">
            <div class="form-group col-md-4">
              <label class="control-label">Tên voucher</label>
              <input class="form-control" type="text" name="voucher_name">
              @error('voucher_name')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Mã khuyến mãi</label>
              <input class="form-control" type="text" name="code">
              @error('code')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Số tiền được giảm</label>
              <input class="form-control" type="text" name="discount">
              @error('discount')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Ngày hết hạn</label>
              <input class="form-control" type="date" name="expired_date">
              @error('expired_date')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Điều kiện tối thiểu</label>
              <input class="form-control" type="text" name="voucher_condition">
              @error('voucher_condition')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror
            </div>
            
           
            <div class="form-group col-md-4 ">
              <label for="exampleSelect1" class="control-label">Trạng thái</label>
              <div class="form-control">
                <div class="form-check form-check-inline">
                    <input name="status" id="hien" value="1" class="form-check-input" type="radio" value="{{old('status')}}">
                    <label class="form-check-label" for="hien">Hoạt động (1)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="status" id="an" value="0" class="form-check-input" type="radio" value="{{old('status')}}">
                    <label class="form-check-label" for="an">Ẩn (0)</label>
                </div>
             
            </div> 
            @error('status')
            <small><i class="text-danger">{{ $message }}</i></small>
            @enderror
            </div>
        </div>
        <button class="btn btn-save" type="submit">Thêm</button>
        @csrf
        <button class="btn btn-cancel" type="reset">Hủy bỏ</button>
       
      </div>
    </div>
  </div>



    
@endsection