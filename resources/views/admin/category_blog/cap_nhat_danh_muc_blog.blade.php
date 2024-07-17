@extends('admin/layout')

@section('title')
    cập nhật danh mục blog
@endsection

@section('breadcrumbs')
    <a href="/admin/quan-ly-danh-muc-blog">Quản Lý Danh Mục Blog</a> / Cập nhật danh mục '{{$data->category_name}}'   
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Cập nhật danh mục blog</h3>

        <?php
            $message = Session::get('message');
            if(isset($message)){
            echo '<span class="text-alert" style="color:red;text-align:center;width:100%;font-style:italic">'.$message.'</span>';
            }
        ?>
        <div class="tile-body">
          <form class="row" method="post" action="{{URL::to('/admin/quan-ly-danh-muc-blog/cap-nhat/'.$data->id)}}">
            <div class="form-group col-md-4">
              <label class="control-label">Tên danh mục blog</label>
              <input class="form-control" type="text" name="category_name" id="slug" onkeyup="ChangeToSlug()" value="{{$data->category_name}}">
              {{-- @error('category_name')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror --}}
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Slug danh mục blog</label>
              <input class="form-control" type="text" name="category_slug" id="convert_slug" value="{{$data->category_slug}}">
              {{-- @error('category_name')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror --}}
            </div>
           
            <div class="form-group col-md-4 ">
              <label for="exampleSelect1" class="control-label">Trạng thái</label>
              @if ($data->category_status == 1)
                <div class="form-control">
                    <div class="form-check form-check-inline">
                        <input name="category_status" id="hien" value="1" class="form-check-input" type="radio" checked>
                        <label class="form-check-label" for="hien">Hiện (1)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="category_status" id="an" value="0" class="form-check-input" type="radio">
                        <label class="form-check-label" for="an">Ẩn (0)</label>
                    </div>
                </div>
              @else
                <div class="form-control">
                    <div class="form-check form-check-inline">
                        <input name="category_status" id="hien" value="1" class="form-check-input" type="radio">
                        <label class="form-check-label" for="hien">Hiện (1)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="category_status" id="an" value="0" class="form-check-input" type="radio" checked>
                        <label class="form-check-label" for="an">Ẩn (0)</label>
                    </div>
                </div>
              @endif
             
            {{-- @error('category_status')
            <small><i class="text-danger">{{ $message }}</i></small>
            @enderror --}}
            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Mô tả danh mục blog</label>
                <textarea class="form-control" name="category_description" id="mota" class="mota">
                    {{$data->category_description}}
                </textarea>  
            </div>
            

        </div>
        <button class="btn btn-save" type="submit">Cập Nhật</button>
        @csrf
        <button class="btn btn-cancel" type="reset">Hủy bỏ</button>
       
      </div>
    </div>
  </div>



    
@endsection