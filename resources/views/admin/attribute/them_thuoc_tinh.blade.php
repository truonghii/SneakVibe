@extends('admin/layout')
@section('title')
    Thêm Mới Thuộc Tính
@endsection
@section('breadcrumbs')
    {{-- <a href="/admin/quan-ly-thuong-hieu">Quản Lý Thương Hiệu</a> / Thêm Mới Thương Hiệu --}}
    
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">THÊM THUỘC TÍNH</h3>
        <?php
          $message = Session::get('message');
          if(isset($message)){
            echo '<span class="text-alert" style="color:red;text-align:center;width:100%;font-style:italic">'.$message.'</span>';
            		
          }
        
        
        ?>
        <div class="tile-body">
          
          <form class="row" method="post" action="{{URL::to('/admin/quan-ly-thuoc-tinh/them')}}" enctype="multipart/form-data">
            <div class="form-group col-md-4">
                <label for="exampleSelect1" class="control-label">Tên Thuộc Tính</label>
                <select class="form-control" id="attribute" name="name" >
                  <option value="color">Màu Sắc</option>
                  <option value="size">Size</option>   
                </select>
            </div>

            <div class="form-group col-md-4 value1">
                <label class="control-label">Giá Trị</label>
                <input class="form-control" type="text" name="value" id="v1">
                {{-- @error('brand_name')
                <small><i class="text-danger">{{ $message }}</i></small>
                @enderror --}}
            </div>
            <div class="form-group col-md-4 value2" style="display:none">
                <label class="control-label">Giá Trị</label>
                <input class="form-control" type="text " name="" id="v2">
                {{-- @error('brand_name')
                <small><i class="text-danger">{{ $message }}</i></small>
                @enderror --}}
            </div>
          
          </div>
          
        </div>
        <button class="btn btn-save" type="submit">Thêm thuộc tính</button>
        @csrf
        
       
      </div>
      <table class="table table-hover table-bordered" id="sampleTable">
        <thead>
            <tr>
                <th width="10"><input type="checkbox" id="all"></th>
                <th>ID</th>
                <th>Màu sắc</th>
                <th>Giá Trị</th>
                <th>Chức Năng</th>
            </tr>
        </thead>
        <tbody>
         {{-- @foreach ($gallery as $gallery)
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
             
         @endforeach --}}
         
        </tbody>
    </table>
    <table class="table table-hover table-bordered" id="sampleTable">
      <thead>
          <tr>
              <th width="10"><input type="checkbox" id="all"></th>
              <th>ID</th>
              <th>Kích Cỡ</th>
              <th>Giá Trị</th>
              <th>Chức Năng</th>
          </tr>
      </thead>
      <tbody>
       {{-- @foreach ($gallery as $gallery)
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
           
       @endforeach --}}
       
      </tbody>
  </table>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $('#attribute').change(function(){
        var_ip = $('#attribute').val();
        if(var_ip == 'size'){
            $('.value2').show();
            $('#v2').attr({
                name:'value',
            });
            $('.value1').hide();
            $('#v1').attr({
                name:'',
            });
        }else{
            $('.value1').show();
            $('#v1').attr({
                name:'value',
            });
            $('.value2').hide();
            $('#v2').attr({
                name:'',
            });
        }
    })
</script>



    
@endsection