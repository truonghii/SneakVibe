@extends('admin/layout')

@section('title')
    Thùng rác blog
@endsection

@section('breadcrumbs')
    Thùng rác
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
</style>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row element-button">
                    
                  
      
                   
                   
                  </div>
                  <?php
          $message = Session::get('message');
          if(isset($message)){
            echo ' <div class="alert alert-warning" role="alert" id="timeShowAlert">'.$message.' </div>'; 
            		
          }
        
        
        ?>
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Ảnh bìa</th>
                            <th>Danh mục</th>
                            <th>Mô tả</th>
                            <th>Nội dung</th>
                            <th>Trạng Thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($data as $data)
                     <tr>
                     
                      <td>{{$data->id}}</td>
                      <td>
                        {{$data->blog_title}}
                        <div class="bg-info" style="padding: 5px">
                         <i>slug: {{$data->blog_slug}}</i>
                    </td>
                      <td><img src="{{asset('uploads/blog/'.$data->blog_image)}}" alt="" width="200px;"></td>
                      <td>
                        <?php $category = \App\Models\tbl_category_blog::all(); ?>
                        @foreach ($category as $category)
                         @if ($data->category_blog_id == $category->id)
                         {{$category->category_name}}
                             
                         @endif
                            
                        @endforeach
                      </td>
                      <td>{{$data->blog_description}}</td>
                      <td>{{$data->blog_content}}</td>
                     
                     
                      <td><span class="badge bg-success">
                        @if ($data->blog_status==1)
                            Hiện
                        @else
                            Ẩn
                        @endif
                      </span></td>
                     
                        
                      </td>
                      <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="return confirm('Bạn có muốn xóa vĩnh viễn blog này không?')"
                              ><a href="/admin/quan-ly-blog/xoa/{{$data->id}}"><i class="fas fa-trash-alt"></i> </a>
                          </button>
                          <button class="btn btn-primary btn-sm edit" type="button" title="khôi phục"><a href="/admin/quan-ly-blog/khoi-phuc/{{$data->id}}"><i class="fas fa-solid fa-rotate-left"></i></a></button>
                         
                      </td>
                  </tr>
                         
                     @endforeach
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection