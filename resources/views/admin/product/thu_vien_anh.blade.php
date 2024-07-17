@extends('admin/layout')
@section('title')
    Thêm thư viện ảnh
@endsection
@section('breadcrumbs')
    <a href="/admin/quan-ly-san-pham">Quản Lý Sản Phẩm</a> / Thêm Thư Viện Ảnh
    
@endsection

@section('content')




<style>
    th, td {
        text-align: center
    }
  </style>
<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Tạo thư viện ảnh</h3>
        <?php
          $message = Session::get('message');
          if(isset($message)){
            echo ' <div class="alert alert-warning" role="alert" id="timeShowAlert">'.$message.' </div>';
            		
          }
        
        
        ?>
        <div class="tile-body">
          
          <form class="row" method="post" action="{{URL::to('/admin/quan-ly-san-pham/them-thu-vien-anh')}}" enctype="multipart/form-data">
         <input type="hidden" name="product_id" value="{{Request::Segment(4)}}">
           
            
           
          
            <div class="form-group col-md-12">
              <label class="control-label">Thư Viện Ảnh</label>
              <input type="file" required multiple name="product_detail_image[]">
              

            </div>
            {{-- @error('brand_logo')
            <small><i class="text-danger">{{ $message }}</i></small>
            @enderror --}}
          
            

        </div>
        <button class="btn btn-save" type="submit">Lưu lại</button>
        @csrf
        <button class="btn btn-cancel" type="reset">Hủy bỏ</button>
       
      </div>
      <table class="table table-hover table-bordered" id="sampleTable">
        <thead>
            <tr>
                <th width="10"><input type="checkbox" id="all"></th>
                <th>ID</th>
                <th>Tên Ảnh</th>
                <th>Hình Ảnh</th>
                <th>Chức Năng</th>
            </tr>
        </thead>
        <tbody>
         @foreach ($gallery as $gallery)
         <tr>
          <td width="10"><input type="checkbox" name="check1" value="1"></td>
          <td>{{$gallery->id}}</td>
          <td>{{$gallery->product_image_title}}</td>
          <td><img src="{{asset('uploads/gallery/'.$gallery->product_detail_image)}}" alt="" width="100px;"></td>
          <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="return confirm('Bạn có muốn xóa ảnh này không?')"
                  ><a href="/admin/quan-ly-san-pham/xoa-thu-vien-anh/{{$gallery->id}}"><i class="fas fa-trash-alt"></i> </a>
              </button>
          </td>
      </tr>
             
         @endforeach
         
        </tbody>
    </table>
    </div>
  </div>



    
@endsection