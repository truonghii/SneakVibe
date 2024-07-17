@extends('admin/layout')

@section('title')
Thêm mới danh mục giày
@endsection

@section('breadcrumbs')
<a href="/admin/quan-ly-danh-muc-giay">Quản lý danh mục giày</a> / Thêm mới danh mục giày
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">THÊM DANH MỤC GIÀY</h3>

        <?php
          $message = Session::get('message');
          if(isset($message)){
            echo ' <div class="alert alert-warning" role="alert" id="timeShowAlert">'.$message.' </div>';      
          }
        
        ?>
        <div class="tile-body">
          <div class="row element-button">
            <div class="col-sm-2">
              <a class="btn btn-add btn-sm" href="/admin/quan-ly-thuong-hieu/them"><i
                  class="fas fa-folder-plus"></i>Thêm thương hiệu</a>
            </div>
          </div>
          <form class="row" method="post" action="/admin/quan-ly-danh-muc-giay/them">
            <div class="form-group col-md-4">
              <label class="control-label">Tên danh mục giày</label>
              <input class="form-control" type="text" name="category_name" id="slug" onkeyup="ChangeToSlug()" value="{{old('category_name')}}">
              @error('category_name')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Slug danh mục</label>
              <input class="form-control" type="text" name="category_slug" id="convert_slug" value="{{old('category_slug')}}">
              {{-- @error('category_name')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror --}}
            </div>
           
            <div class="form-group col-md-4 ">
              <label for="exampleSelect1" class="control-label">Trạng Thái</label>
                <div class="form-control">
                  <div class="form-check form-check-inline">
                      <input name="category_status" id="hien" value="1" class="form-check-input" type="radio" {{old('category_status') == '1' ? 'checked' : '' }}>
                      <label class="form-check-label" for="hien">Hiện(1)</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input name="category_status" id="an" value="0" class="form-check-input" type="radio" {{old('category_status') == '0' ? 'checked' : '' }}>
                      <label class="form-check-label" for="an">Ẩn(0)</label>
                  </div>
                </div>
              @error('category_status')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="exampleSelect1" class="control-label">Thương Hiệu</label>
              <select class="form-control" id="exampleSelect1" name="brand_id" >
                <option value="{{old('brand_id')}}">-- Chọn thương hiệu --</option>
                <?php $brand = \App\Models\tbl_brand::where('brand_status', 1)->get();  ?>
               
                @foreach ($brand as $brand)
                  @if ($brand->id == old('brand_id'))
                  <option value="{{$brand->id}}" selected>{{$brand->brand_name}}</option>
                  @else
                  <option value="{{$brand->id}}">{{$brand->brand_name}}</option>    
                  @endif
                @endforeach
              </select>
              @error('brand_id')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror
            </div>

            <div class="form-group col-md-12">
              <label class="control-label">Mô tả sản phẩm</label>
              <textarea class="form-control" name="category_description" id="mota">
                      {{old('category_description')}}
              </textarea> 
            </div>

        </div>
        <button class="btn btn-save" type="submit">Thêm danh mục</button>
        @csrf
        <button class="btn btn-cancel" type="reset">Hủy bỏ</button> 
      </div>
    </div>
  </div>
@endsection