@extends('admin/layout')

@section('title')
    Quản lý blog
@endsection

@section('breadcrumbs')
    Quản lý blog
@endsection

@section('content')
<style>
    
    td, th {
        text-align: center !important;
        vertical-align: middle !important; /* Căn giữa nội dung theo chiều dọc */
       
    }
    th{
      white-space: nowrap; /* Không ngắt dòng nội dung */
    }
    .modal-body {
    max-height: 500px; /* Điều chỉnh chiều cao tối đa của modal */
    overflow-y: auto; /* Tạo thanh cuộn nếu nội dung vượt quá */
    
}
.modal-dialog {
    max-width: 800px; /* Thiết lập độ rộng tối đa của modal */
}

</style>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">
      
                      <a class="btn btn-add btn-sm" href="/admin/quan-ly-blog/them" title="Thêm"><i class="fas fa-plus"></i>
                        Thêm blog</a>
                        
                    </div>
                    <div class="col-sm-2">
                      <a class="btn btn-delete btn-sm " href="/admin/quan-ly-blog/thung-rac" style="color: black"><i
                          class="fas fa-trash-alt"></i> Thùng Rác</a>
                    </div>
                  
      
                   
                   
                  </div>
                    <?php
                        $message = Session::get('message');
                        if(isset($message)){
                        echo ' <div class="alert alert-warning" role="alert" id="timeShowAlert">'.$message.' </div>'; 
                        
                        }
                    ?>
                <table class="table table-hover table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th width="30%">Tiêu đề</th>
                            <th>Ảnh bìa</th>
                            <th>Danh mục</th>
                            <th>Mô tả</th>
                            <th>Nội dung</th>
                            <th>Trạng Thái</th>
                            <th>Ngày Tạo</th>
                            <th>Ngày Cập Nhật</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($list_blog as $list)
                     <tr>
                 
                      <td>{{$list->id}}</td>
                      <td>
                        {{$list->blog_title}}
                        <div class="bg-info" style="padding: 5px">
                         <i>slug: {{$list->blog_slug}}</i>
                        </div>
                    </td>
                      <td><img src="{{asset('uploads/blog/'.$list->blog_image)}}" alt="" width="200px;"></td>
                      <td>
                        <?php $category = \App\Models\tbl_category_blog::all(); ?>
                        @foreach ($category as $category)
                         @if ($list->category_blog_id == $category->id)
                         {{$category->category_name}}
                             
                         @endif
                            
                        @endforeach
                      </td>
                      <td>
                        <a href="">
                            <i class="fas fa-solid fa-eye"></i>
                        </a>
                      </td>
                      <td>
                        <a href=""  data-toggle="modal" data-target="#noidung{{$list->id}}">
                            <i class="fas fa-solid fa-eye"></i>
                        </a>
                      </td>
                     
                     
                      <td><span class="badge bg-success">
                        @if ($list->blog_status==1)
                            Hiện
                        @else
                            Ẩn
                        @endif
                      </span></td>
                     
                        
                      </td>
                      <td>{{$list->created_at->format('d/m/Y')}} ({{$list->created_at->diffForHumans()}})</td>
                      <td>{{$list->updated_at->format('d/m/Y')}} ({{$list->updated_at->diffForHumans()}})</td>

                      <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="return confirm('Bạn có muốn xóa blog này không?')"
                              ><a href="/admin/quan-ly-blog/xoa-mem/{{$list->id}}"><i class="fas fa-trash-alt"></i> </a>
                          </button>
                          <button class="btn btn-primary btn-sm edit" type="button" title="Sửa"><a href="/admin/quan-ly-blog/cap-nhat/{{$list->id}}"><i class="fas fa-edit"></i></a></button>
                         
                      </td>
                  </tr>
                  <!--
MODAL Nội dung
-->

<div class="modal fade" id="noidung{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
data-backdrop="static" data-keyboard="false" >
<div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content">
    <div class="modal-overlay" data-dismiss="modal"><a href=""><span class="badge bg-danger">&times;</span></a></div>
    <div class="modal-body">
      <div class="row">
        <div class="form-group  col-md-12">
          <span class="thong-tin-thanh-toan">
            <h5>
                {{$list->blog_title}}
            </h5>
          </span>
        </div>
        <div class="form-group col-md-12">
           {!!$list->blog_content!!}
        </div>
      </div>
      <BR>
      <a class="btn btn-cancel" data-dismiss="modal" href="#">Đóng</a>
      <BR>
    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>
</div>
<!--
MODAL
-->
                        
                  
                  
 
                     @endforeach
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection