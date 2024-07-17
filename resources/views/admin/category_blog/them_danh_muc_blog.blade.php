@extends('admin/layout')

@section('title')
    Thêm Mới Danh Mục Blog
@endsection

@section('breadcrumbs')
    <a href="/admin/quan-ly-danh-muc-blog">Quản Lý Danh Mục Blog</a> / Thêm Mới Danh Mục Blog   
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Tạo mới danh mục blog</h3>

        <?php
            $message = Session::get('message');
            if(isset($message)){
              echo ' <div class="alert alert-warning" role="alert" id="timeShowAlert">'.$message.' </div>';   
            }
        ?>
        <div class="tile-body">
          <form class="row" method="post" action="{{URL::to('/admin/quan-ly-danh-muc-blog/them')}}">
            <div class="form-group col-md-4">
              <label class="control-label">Tên danh mục blog</label>
              <input class="form-control" type="text" name="category_name" id="slug" onkeyup="ChangeToSlug()" value="{{old('category_name')}}">
              @error('category_name')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Slug danh mục blog</label>
              <input class="form-control" type="text" name="category_slug" id="convert_slug" value="{{old('category_slug')}}">
              {{-- @error('category_name')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror --}}
            </div>
           
            <div class="form-group col-md-4 ">
              <label for="exampleSelect1" class="control-label">Trạng thái</label>
              <div class="form-control">
                <div class="form-check form-check-inline">
                    <input name="category_status" id="hien" value="1" class="form-check-input" type="radio" value="{{old('category_status')}}">
                    <label class="form-check-label" for="hien">Hiện (1)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="category_status" id="an" value="0" class="form-check-input" type="radio" value="{{old('category_status')}}">
                    <label class="form-check-label" for="an">Ẩn (0)</label>
                </div>
             
            </div> 
            @error('category_status')
            <small><i class="text-danger">{{ $message }}</i></small>
            @enderror
            </div>
           
            <div class="form-group col-md-12">
              <label class="control-label">Mô tả danh mục blog</label>
              <textarea class="form-control" name="category_description" id="mota" class="mota"></textarea>  
            </div>
            

        </div>
        <button class="btn btn-save" type="submit">Thêm</button>
        @csrf
        <button class="btn btn-cancel" type="reset">Hủy bỏ</button>
       
      </div>
    </div>
  </div>



    
@endsection