@extends('admin/layout')

@section('title')
Cập nhật danh mục giày
@endsection

@section('breadcrumbs')
<a href="/admin/quan-ly-danh-muc-giay">Quản lý danh mục giày</a> / Cập nhật danh mục giày
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">CẬP NHẬT DANH MỤC GIÀY</h3>
        <?php
          $message = Session::get('message');
          if(isset($message)){
            echo ' <div class="alert alert-warning" role="alert" id="timeShowAlert">'.$message.' </div>';   
            		
          } 
        ?>
        <div class="tile-body">
          <form class="row" method="post" action="/admin/quan-ly-danh-muc-giay/cap-nhat/{{$data->id}}">
            <div class="form-group col-md-4">
              <label class="control-label">Tên danh mục giày</label>
              <input class="form-control" type="text" name="category_name" id="slug" onkeyup="ChangeToSlug()" value="{{$data->category_name}}">
              {{-- @error('category_name')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror --}}
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Slug danh mục</label>
              <input class="form-control" type="text" name="category_slug" id="convert_slug" value="{{$data->category_slug}}">
              {{-- @error('ten_sp')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror --}}
            </div>
            <div class="form-group col-md-4 ">
              <label for="exampleSelect1" class="control-label">Trạng Thái</label>
                @if($data->category_status == 1)
                <div class="form-control">    
                  <div class="form-check form-check-inline">
                      <input name="category_status" id="hien" value="1" class="form-check-input" type="radio" checked>
                      <label class="form-check-label" for="hien">Hiện(1)</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input name="category_status" id="an" value="0" class="form-check-input" type="radio" >
                      <label class="form-check-label" for="an">Ẩn(0)</label>
                  </div>
                </div>
                
                @else 
                <div class="form-control">
                  <div class="form-check form-check-inline">
                      <input name="category_status" id="hien" value="1" class="form-check-input" type="radio">
                      <label class="form-check-label" for="hien">Hiện(1)</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input name="category_status" id="an" value="0" class="form-check-input" type="radio" checked>
                      <label class="form-check-label" for="an">Ẩn(0)</label>
                  </div>
                </div>  
            @endif
            </div>
            {{-- @error('anhien')
            <small><i class="text-danger">{{ $message }}</i></small>
            @enderror --}}
           
            <div class="form-group col-md-4">
              <label for="exampleSelect1" class="control-label">Thương Hiệu</label>
              <select class="form-control" id="exampleSelect1" name="brand_id" >
                <option>-- Chọn thương hiệu --</option>
                <?php $brand = \App\Models\tbl_brand::all();  ?>
               
                @foreach ($brand as $brand)
                @if ($data->brand_id == $brand->id)
                    <option value="{{$brand->id}}" selected >{{$brand->brand_name}}</option>
                @else
                <option value="{{$brand->id}}" >{{$brand->brand_name}}</option>
                    
                @endif
                
                @endforeach
                
               
              </select>
              {{-- @error('id_loai')
                        <small><i class="text-danger">{{ $message }}</i></small>
                        @enderror --}}
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Mô tả sản phẩm</label>
              <textarea class="form-control" name="category_description" id="mota">
                        {{$data->category_description}}
              </textarea>  
            </div>
        </div>
           
           

        </div>
        <button class="btn btn-save" type="submit">Cập Nhật</button>
        @csrf
        <button class="btn btn-cancel" type="reset"><a href="/admin/quan-ly-danh-muc-giay">Hủy Bỏ</a></button>
       
      </div>
    </div>
  </div>
@endsection