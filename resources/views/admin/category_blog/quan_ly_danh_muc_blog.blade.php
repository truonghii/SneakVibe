@extends('admin/layout')

@section('title')
    Quản Lý Danh Mục Blog
@endsection

@section('breadcrumbs')
    Quản Lý Danh Mục Blog
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
                    <div class="col-sm-2">
      
                      <a class="btn btn-add btn-sm" href="/admin/quan-ly-danh-muc-blog/them" title="Thêm"><i class="fas fa-plus"></i>
                        Thêm mới danh mục blog</a>
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
                            <th>Tên Danh Mục</th>
                            <th>Slug</th>
                            <th>Mô tả</th>
                            <th>Trạng Thái</th>
                            <th>Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($list_category as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->category_name}}</td>
                        <td>{{$list->category_slug}}</td>
                        <td>{{$list->category_description}}</td>
                        <td>
                            <span class="badge bg-success">
                            @if ($list->category_status == 1)
                                Hiện
                            @else
                                Ẩn
                            @endif
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="return confirm('Bạn muốn xóa danh mục {{$list->category_name}} này không?');">
                                <a href="/admin/quan-ly-danh-muc-blog/xoa/{{$list->id}}"><i class="fas fa-trash-alt"></i> </a>
                            </button>
                            <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" >
                                <a href="/admin/quan-ly-danh-muc-blog/cap-nhat/{{$list->id}}"><i class="fas fa-edit"></i></a>
                            </button>   
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