@extends('admin/layout')
@section('title')
    Cập Nhật Sản Phẩm
@endsection
@section('breadcrumbs')
    <a href="/admin/quan-ly-san_pham">Quản Lý Sản Phẩm</a> / Cập Nhật Sản Phẩm
    
@endsection

@section('content')


<script>

    function readURL(input, thumbimage) {
      if (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
        var reader = new FileReader();
        reader.onload = function (e) {
          $("#thumbimage").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
      else { // Sử dụng cho IE
        $("#thumbimage").attr('src', input.value);

      }
      $("#thumbimage").show();
      $('.filename').text($("#uploadfile").val());
      $('.Choicefile').css('background', '#14142B');
      $('.Choicefile').css('cursor', 'default');
      $(".removeimg").show();
      $(".Choicefile").unbind('click');

    }
    $(document).ready(function () {
      $(".Choicefile").bind('click', function () {
        $("#uploadfile").click();

      });
      $(".removeimg").click(function () {
        $("#thumbimage").attr('src', '').hide();
        $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
        $(".removeimg").hide();
        $(".Choicefile").bind('click', function () {
          $("#uploadfile").click();
        });
        $('.Choicefile').css('background', '#14142B');
        $('.Choicefile').css('cursor', 'pointer');
        $(".filename").text("");
      });
    })
    
  </script>

<style>
    .Choicefile {
      display: block;
      background: #14142B;
      border: 1px solid #fff;
      color: #fff;
      width: 150px;
      text-align: center;
      text-decoration: none;
      cursor: pointer;
      padding: 5px 0px;
      border-radius: 5px;
      font-weight: 500;
      align-items: center;
      justify-content: center;
    }

    .Choicefile:hover {
      text-decoration: none;
      color: white;
    }

    #uploadfile,
    .removeimg {
      display: none;
    }

    #thumbbox {
      position: relative;
      width: 100%;
      margin-bottom: 20px;
    }

    .removeimg {
      height: 25px;
      position: absolute;
      background-repeat: no-repeat;
      top: 5px;
      left: 5px;
      background-size: 25px;
      width: 25px;
      /* border: 3px solid red; */
      border-radius: 50%;

    }

    .removeimg::before {
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      content: '';
      border: 1px solid red;
      background: red;
      text-align: center;
      display: block;
      margin-top: 11px;
      transform: rotate(45deg);
    }

    .removeimg::after {
      /* color: #FFF; */
      /* background-color: #DC403B; */
      content: '';
      background: red;
      border: 1px solid red;
      text-align: center;
      display: block;
      transform: rotate(-45deg);
      margin-top: -2px;
    }
  </style>
<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <h3 class="tile-title">Cập nhật sản phẩm</h3>
        <?php
          $message = Session::get('message');
          if(isset($message)){
            echo ' <div class="alert alert-warning" role="alert" id="timeShowAlert">'.$message.' </div>';
            		
          }
        
        
        ?>
        <div class="tile-body">
          
          <form class="row" method="post" action="{{URL::to('/admin/quan-ly-san-pham/cap-nhat/'.$data->id)}}" enctype="multipart/form-data">
            <div class="form-group col-md-4">
              <label class="control-label">Tên sản phẩm</label>
              <input class="form-control" type="text" name="product_name" value="{{$data->product_name}}">
              {{-- @error('brand_name')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror --}}
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Slug</label>
              <input class="form-control" type="text" name="product_slug" value="{{$data->product_slug}}">
              {{-- @error('brand_name')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror --}}
            </div>
           
            <div class="form-group col-md-4 ">
              <label for="exampleSelect1" class="control-label">Trạng Thái</label>
              @if($data->product_status == 1)
              <div class="form-control">    
              <div class="form-check form-check-inline">
                  <input name="product_status" id="hien" value="1" class="form-check-input" type="radio" checked>
                  <label class="form-check-label" for="hien">Hiện(1)</label>
              </div>
              <div class="form-check form-check-inline">
                  <input name="product_status" id="an" value="0" class="form-check-input" type="radio" >
                  <label class="form-check-label" for="an">Ẩn(0)</label>
              </div>
              </div>
              
          @else 
          <div class="form-control">
              <div class="form-check form-check-inline">
                  <input name="product_status" id="hien" value="1" class="form-check-input" type="radio">
                  <label class="form-check-label" for="hien">Hiện(1)</label>
              </div>
              <div class="form-check form-check-inline">
                  <input name="product_status" id="an" value="0" class="form-check-input" type="radio" checked>
                  <label class="form-check-label" for="an">Ẩn(0)</label>
              </div>
          </div>  
          @endif
              </div>
            <div class="form-group col-md-4">
                <label for="exampleSelect1" class="control-label">Danh Mục</label>
                <select class="form-control" id="exampleSelect1" name="category_id" >
                  <option>-- Chọn danh mục --</option>
                  <?php $category = \App\Models\tbl_category::all();  ?>

                  @foreach ($category as $category)
                  @if ($data->category_id == $category->id)
                  <option value="{{$category->id}}" selected>{{$category->category_name}}</option>
                  @else
                  <option value="{{$category->id}}">{{$category->category_name}}</option>
                  @endif
                  @endforeach
                 
                 
                  
                  
                  
                 
                </select>
                {{-- @error('brand_id')
                          <small><i class="text-danger">{{ $message }}</i></small>
                          @enderror --}}
              </div>
            
              <div class="form-group col-md-4">
                <label class="control-label">Số lượng</label>
                <input class="form-control" type="text" name="product_quantity" value="{{$data->product_quantity}}">
                {{-- @error('brand_name')
                <small><i class="text-danger">{{ $message }}</i></small>
                @enderror --}}
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Kích Cỡ</label>
                <div>
                  
                  @foreach ($sizes as $size)
                  <input type="checkbox" name="id_attribute[]" id="" value="{{$size->id}}"  @if(in_array($size->id, $selectedAttributes)) checked @endif>{{$size->value}}
                  @endforeach
                </div>
                  
               
                
                {{-- @error('product_color')
                <small><i class="text-danger">{{ $message }}</i></small>
                @enderror --}}
              </div>
                
            <div class="form-group col-md-4">
                <label class="control-label">Giá gốc</label>
                <input class="form-control" type="text" name="product_price" value="{{$data->product_price}}">
                {{-- @error('gia')
                <small><i class="text-danger">{{ $message }}</i></small>
                @enderror --}}
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Giá khuyến mãi</label>
                <input class="form-control" type="text" name="product_promotion" value="{{$data->product_promotion}}">
                 {{-- @error('gia_km')
                          <small><i class="text-danger">{{ $message }}</i></small>
                          @enderror --}}
              </div>
              <div class="form-group col-md-4 ">
                <label for="exampleSelect1" class="control-label">Sản Phẩm Hot</label>
                @if($data->product_hot == 1)
                <div class="form-control">    
                <div class="form-check form-check-inline">
                    <input name="product_hot" id="hien" value="1" class="form-check-input" type="radio" checked>
                    <label class="form-check-label" for="hien">Có(1)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="product_hot" id="an" value="0" class="form-check-input" type="radio" >
                    <label class="form-check-label" for="an">Không(0)</label>
                </div>
                </div>
                
            @else 
            <div class="form-control">
                <div class="form-check form-check-inline">
                    <input name="product_hot" id="hien" value="1" class="form-check-input" type="radio">
                    <label class="form-check-label" for="hien">Có(1)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="product_hot" id="an" value="0" class="form-check-input" type="radio" checked>
                    <label class="form-check-label" for="an">Không(0)</label>
                </div>
            </div>  
            @endif
                </div>
          
            <div class="form-group col-md-12">
              <label class="control-label">Ảnh sản phẩm</label>
              <div id="myfileupload">
                <input type="file" id="uploadfile" name="product_image" onchange="readURL(this);" />
              </div>
              <div id="thumbbox">
                <img height="450" width="400" alt="Thumb image" id="thumbimage" src="{{asset('uploads/product/'.$data->product_image)}}" />
                <a class="removeimg" href="javascript:"></a>
              </div>
              <div id="boxchoice">
                <a href="javascript:" class="Choicefile"><i class="fas fa-cloud-upload-alt"></i> Chọn ảnh</a>
                <p style="clear:both"></p>
              </div>

            </div>
            {{-- @error('brand_logo')
            <small><i class="text-danger">{{ $message }}</i></small>
            @enderror --}}
            <div class="form-group col-md-12">
                <label class="control-label">Mô tả sản phẩm</label>
                <textarea class="form-control" name="product_description" id="mota">
                    {{$data->product_description}}
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