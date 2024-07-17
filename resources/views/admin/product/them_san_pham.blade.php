@extends('admin/layout')
@section('title')
    Thêm Mới Sản Phẩm
@endsection
@section('breadcrumbs')
    <a href="/admin/quan-ly-san-pham">Quản Lý Sản Phẩm</a> / Thêm Mới Sản Phẩm
    
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
        <h3 class="tile-title">Tạo mới sản phẩm</h3>
        <?php
          $message = Session::get('message');
          if(isset($message)){
            echo ' <div class="alert alert-warning" role="alert" id="timeShowAlert">'.$message.' </div>';
            		
          }
        
        
        ?>
        <div class="tile-body">
          <div class="row element-button">
            <div class="col-sm-2">
              <a class="btn btn-add btn-sm" href="/admin/quan-ly-danh-muc-giay/them" title="Thêm danh mục"><i class="fas fa-plus"></i>
                Thêm mới danh mục
              </a>
            </div>
            <div class="col-sm-2">
              <a class="btn btn-add btn-sm " href="/admin/quan-ly-thuoc-tinh/them" title="thêm thuộc tính"><i class="fas fa-plus"></i>
                 Thêm mới thuộc tính
              </a>
            </div>
        </div>
          
          <form class="row" method="post" action="{{URL::to('/admin/quan-ly-san-pham/them')}}" enctype="multipart/form-data">
            <div class="form-group col-md-4">
              <label class="control-label">Tên sản phẩm</label>
              <input class="form-control" type="text" name="product_name" id="slug" onkeyup="ChangeToSlug()" value="{{old('product_name')}}">
              @error('product_name')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label class="control-label">Slug</label>
              <input class="form-control" type="text" name="product_slug" id="convert_slug" value="{{old('product_slug')}}">
              {{-- @error('product_name')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror --}}
            </div>
           
            <div class="form-group col-md-4 ">
              <label for="exampleSelect1" class="control-label">Trạng thái</label>
              <div class="form-control">
                <div class="form-check form-check-inline">
                    <input name="product_status" id="hien" value="1" class="form-check-input" type="radio" {{old('product_status') == '1' ? 'checked' : '' }}>
                    <label class="form-check-label" for="hien">Còn Hàng (1)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="product_status" id="an" value="0" class="form-check-input" type="radio" {{old('product_status') == '0' ? 'checked' : '' }}>
                    <label class="form-check-label" for="an">Hết Hàng (0)</label>
                </div>
               
            </div>
            @error('product_status')
            <small><i class="text-danger">{{ $message }}</i></small>
            @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="exampleSelect1" class="control-label">Danh Mục</label>
                <select class="form-control" id="exampleSelect1" name="category_id" >
                  <option value="{{old('category_id')}}">-- Chọn danh mục --</option>
                  <?php $category = \App\Models\tbl_category::all();  ?>
                 
                  @foreach ($category as $category)
                  <option value="{{$category->id}}">{{$category->category_name}}</option>
                  @endforeach
                  
                 
                </select>
                @error('category_id')
                          <small><i class="text-danger">{{ $message }}</i></small>
                          @enderror
              </div>
            
              <div class="form-group col-md-4">
                <label class="control-label">Số lượng</label>
                <input class="form-control" type="text" name="product_quantity" value="{{old('product_quantity')}}">
                @error('product_quantity')
                <small><i class="text-danger">{{ $message }}</i></small>
                @enderror
              </div>
              
              <div class="form-group col-md-4">
                <label class="control-label">Kích Cỡ</label>
               
                  @foreach ($sizes as $size)
                  <input type="checkbox" name="id_attribute[]" id="" value="{{$size->id}}">{{$size->value}}
                  @endforeach
                  
               
                
                {{-- @error('product_color')
                <small><i class="text-danger">{{ $message }}</i></small>
                @enderror --}}
              </div>
                
            <div class="form-group col-md-4">
                <label class="control-label">Giá gốc</label>
                <input class="form-control" type="text" name="product_price" value="{{old('product_price')}}">
                @error('product_price')
                <small><i class="text-danger">{{ $message }}</i></small>
                @enderror
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Giá khuyến mãi</label>
                <input class="form-control" type="text" name="product_promotion" value="{{old('product_promotion')}}">
                 @error('product_promotion')
                          <small><i class="text-danger">{{ $message }}</i></small>
                          @enderror
              </div>
              <div class="form-group col-md-4 ">
                <label for="exampleSelect1" class="control-label">Sản Phẩm Hot</label>
                <div class="form-control">
                  <div class="form-check form-check-inline">
                      <input name="product_hot" id="hien" value="1" class="form-check-input" type="radio" {{old('product_hot') == '1' ? 'checked' : '' }}>
                      <label class="form-check-label" for="hien">Có (1)</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input name="product_hot" id="an" value="0" class="form-check-input" type="radio" {{old('product_hot') == '0' ? 'checked' : '' }}>
                      <label class="form-check-label" for="an">Không (0)</label>
                  </div>
                 
              </div>
              @error('product_hot')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror
              </div>
          
            <div class="form-group col-md-12">
              <label class="control-label">Ảnh sản phẩm</label>
              <div id="myfileupload">
                <input type="file" id="uploadfile" name="product_image" onchange="readURL(this);" />
              </div>
              <div id="thumbbox">
                <img height="450" width="400" alt="Thumb image" id="thumbimage" style="display: none" />
                <a class="removeimg" href="javascript:"></a>
              </div>
              <div id="boxchoice">
                <a href="javascript:" class="Choicefile"><i class="fas fa-cloud-upload-alt"></i> Chọn ảnh</a>
                <p style="clear:both"></p>
              </div>

            </div>
            @error('product_image')
            <small><i class="text-danger">{{ $message }}</i></small>
            @enderror
            
            <div class="form-group col-md-12">
                <label class="control-label">Mô tả sản phẩm</label>
                <textarea class="form-control" name="product_description" id="mota">
  
                </textarea>
                
              </div>
        </div>
        <button class="btn btn-save" type="submit">Thêm</button>
        @csrf
        <button class="btn btn-cancel" type="reset">Hủy bỏ</button>
       
      </div>
    </div>
  </div>



    
@endsection