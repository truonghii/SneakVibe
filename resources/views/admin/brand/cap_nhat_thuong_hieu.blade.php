@extends('admin/layout')
@section('title')
    Cập Nhật Thương Hiệu
@endsection
@section('breadcrumbs')
    <a href="/admin/quan-ly-thuong-hieu">Quản Lý Thương Hiệu</a> / Cập Nhật
    
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
        <h3 class="tile-title">Cập nhật thương hiệu</h3>
        
        <div class="tile-body">
          
          <form class="row" method="post" action="/admin/quan-ly-thuong-hieu/cap-nhat/{{$data->id}}" enctype="multipart/form-data">
            <div class="form-group col-md-4">
              <label class="control-label">Tên thương hiệu</label>
              <input class="form-control" type="text" name="brand_name"  id="slug" onkeyup="ChangeToSlug()" value="{{$data->brand_name}}">
              {{-- @error('ten_sp')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror --}}
            </div>
            <div class="form-group col-md-4">
              <label class="control-label">Slug thương hiệu</label>
              <input class="form-control" type="text" name="brand_slug"  id="convert_slug" value="{{$data->brand_slug}}" >
              {{-- @error('ten_sp')
              <small><i class="text-danger">{{ $message }}</i></small>
              @enderror --}}
            </div>
            <div class="form-group col-md-4 ">
              <label for="exampleSelect1" class="control-label">Trạng Thái</label>
            @if($data->brand_status == 1)
            <div class="form-control">
            <div class="form-check form-check-inline">
                <input name="brand_status" id="hien" value="1" class="form-check-input" type="radio" checked>
                <label class="form-check-label" for="hien">Hiện(0)</label>
            </div>
            <div class="form-check form-check-inline">
                <input name="brand_status" id="an" value="0" class="form-check-input" type="radio" >
                <label class="form-check-label" for="an">Ẩn(0)</label>
            </div>
            </div>
            @else 
            <div class="form-control">
            <div class="form-check form-check-inline">
                <input name="brand_status" id="hien" value="1" class="form-check-input" type="radio">
                <label class="form-check-label" for="hien">Hiện(1)</label>
            </div>
            <div class="form-check form-check-inline">
                <input name="brand_status" id="an" value="0" class="form-check-input" type="radio" checked>
                <label class="form-check-label" for="an">Ẩn(0)</label>
            </div>
            </div>
            @endif
            </div>
            {{-- @error('anhien')
            <small><i class="text-danger">{{ $message }}</i></small>
            @enderror --}}
            </div>
           
          
            <div class="form-group col-md-12">
              <label class="control-label">Logo thương hiệu</label>
              <div id="myfileupload">
                <input type="file" id="uploadfile" name="brand_logo" onchange="readURL(this);" />
               
              </div>
             <div id="thumbbox">
              <img height="450" width="400" alt="Thumb image" id="thumbimage"  src="{{asset('uploads/brand/'.$data->brand_logo)}}" />
              <a class="removeimg" href="javascript:"></a>
            </div>
              <div id="boxchoice">
                <a href="javascript:" class="Choicefile"><i class="fas fa-cloud-upload-alt"></i> Chọn ảnh</a>
                <p style="clear:both"></p>
              </div>

            </div>
            <div class="form-group col-md-12">
              <label class="control-label">Mô tả sản phẩm</label>
              <textarea class="form-control" name="brand_description" class="mota" id="mota">
                {{$data->brand_description}}
              </textarea>
              
            </div>

        </div>
        <button class="btn btn-save" type="submit">Cập Nhật</button>
        @csrf
        <button class="btn btn-cancel" type="reset"><a href="/admin/quan-ly-thuong-hieu">Hủy Bỏ</a></button>
       
      </div>
    </div>
  </div>

  

    
@endsection