@extends('admin/layout')
@section('title')
    Thêm Mới Thương Hiệu
@endsection
@section('breadcrumbs')
    <a href="/admin/quan-ly-thuong-hieu">Quản Lý Thương Hiệu</a> / Thêm Mới Thương Hiệu
    
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
        <h3 class="tile-title">THÊM THƯƠNG HIỆU</h3>
        <?php
        // $message = Session::get('message');
        $message = session()->get('message');
        if(isset($message)){
            echo ' <div class="alert alert-warning" role="alert" id="timeShowAlert">'.$message.' </div>';         
        }
        ?>
   
        <div class="tile-body">
          
          <form class="row" method="post" action="{{URL::to('/admin/quan-ly-thuong-hieu/them')}}" enctype="multipart/form-data">
            <div class="form-group col-md-4">
              <label class="control-label">Tên thương hiệu</label>
              <input class="form-control" type="text" name="brand_name" id="slug" onkeyup="ChangeToSlug()" value="{{old('brand_name')}}">
              @error('brand_name')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Slug thương hiệu</label>
              <input class="form-control" type="text" name="brand_slug" id="convert_slug" value="{{old('brand_slug')}}">
              {{-- @error('brand_name')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror --}}
            </div>
           
            <div class="form-group col-md-4">
              <label for="exampleSelect1" class="control-label">Trạng thái</label>
              <div class="form-control">
                  <div class="form-check form-check-inline">
                      <input name="brand_status" id="hien" value="1" class="form-check-input" type="radio" {{ old('brand_status') == '1' ? 'checked' : '' }}>
                      <label class="form-check-label" for="hien">Hiện (1)</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input name="brand_status" id="an" value="0" class="form-check-input" type="radio" {{ old('brand_status') == '0' ? 'checked' : '' }}>
                      <label class="form-check-label" for="an">Ẩn (0)</label>
                  </div>
              </div>
              @error('brand_status')
            <small><i class="text-danger">{{ $message }}</i></small>
            @enderror
          </div>
            
            </div>
           
          
            <div class="form-group col-md-12">
              <label class="control-label">Ảnh Logo</label>
              <div id="myfileupload">
                <input type="file" id="uploadfile" name="brand_logo" onchange="readURL(this);" />
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
            @error('brand_logo')
            <small><i class="text-danger">{{ $message }}</i></small>
            @enderror
            <div class="form-group col-md-12">
              <label class="control-label">Mô tả sản phẩm</label>
              <textarea class="form-control" name="brand_description" id="mota" class="mota"></textarea>
                    {{old('brand_description')}}
            </div>
            

        </div>
        <button class="btn btn-save" type="submit">Thêm thương hiệu</button>
        @csrf
        <button class="btn btn-cancel" type="reset">Hủy bỏ</button>
       
      </div>
    </div>
  </div>




    
@endsection