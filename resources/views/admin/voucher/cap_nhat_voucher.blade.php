@extends('admin/layout')

@section('title')
    cập nhật voucher
@endsection

@section('breadcrumbs')
    <a href="/admin/quan-ly-voucher">Quản Lý Voucher</a> / Cập nhật danh mục '{{$data->coupon_name}}'   
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Cập nhật voucher</h3>

        <?php
            $message = Session::get('message');
            if(isset($message)){
            echo '<span class="text-alert" style="color:red;text-align:center;width:100%;font-style:italic">'.$message.'</span>';
            }
        ?>
        <div class="tile-body">
          <form class="row" method="post" action="{{URL::to('/admin/quan-ly-voucher/cap-nhat/'.$data->coupon_id)}}">
            <div class="form-group col-md-4">
              <label class="control-label">Tên voucher</label>
              <input class="form-control" type="text" name="voucher_name"value="{{$data->voucher_name}}">
              {{-- @error('voucher_name')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror --}}
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Mã khuyến mãi</label>
              <input class="form-control" type="text" name="code" id="convert_slug" value="{{$data->code}}">
              {{-- @error('code')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror --}}
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Discount</label>
              <input class="form-control" type="text" name="discount" value="{{$data->discount}}">
              @error('discount')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Ngày hết hạn</label>
              <input class="form-control" type="date" name="expired_date" value="{{$data->expired_date}}">
              @error('expired_date')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Điều kiện tối thiểu</label>
              <input class="form-control" type="text" name="voucher_condition" value="{{$data->voucher_condition}}">
              @error('voucher_condition')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror
            </div>
           
            <div class="form-group col-md-4 ">
              <label for="exampleSelect1" class="control-label">Trạng thái</label>
              @if ($data->status == 1)
                <div class="form-control">
                    <div class="form-check form-check-inline">
                        <input name="status" id="hien" value="1" class="form-check-input" type="radio" checked>
                        <label class="form-check-label" for="hien">Hiện (1)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="status" id="an" value="0" class="form-check-input" type="radio">
                        <label class="form-check-label" for="an">Ẩn (0)</label>
                    </div>
                </div>
              @else
                <div class="form-control">
                    <div class="form-check form-check-inline">
                        <input name="status" id="hien" value="1" class="form-check-input" type="radio">
                        <label class="form-check-label" for="hien">Hiện (1)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="status" id="an" value="0" class="form-check-input" type="radio" checked>
                        <label class="form-check-label" for="an">Ẩn (0)</label>
                    </div>
                </div>
              @endif
             
            {{-- @error('status')
            <small><i class="text-danger">{{ $message }}</i></small>
            @enderror --}}
            

        </div>
        <button class="btn btn-save" type="submit">Cập Nhật</button>
        @csrf
        <button class="btn btn-cancel" type="reset">Hủy bỏ</button>
       
      </div>
    </div>
  </div>



    
@endsection