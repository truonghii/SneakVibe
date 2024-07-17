@extends('admin/layout')

@section('title')
    Quản lý danh mục giày
@endsection

@section('breadcrumbs')
    QUẢN LÝ DANH MỤC GIÀY
@endsection

@section('content')
<style>
     .ellipsis {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 200px; /* Điều chỉnh độ rộng tối đa của ô */
        cursor: pointer; /* Biến con trỏ thành dấu nhấp chuột khi di chuột vào */
    }
    td, th {
        text-align: center !important;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">
                      <a class="btn btn-add btn-sm" href="/admin/quan-ly-danh-muc-giay/them" title="Thêm"><i class="fas fa-plus"></i>
                        Thêm danh mục</a>  
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
                            <th width="10"><input type="checkbox" id="all"></th>
                            <th>ID</th>
                            <th>Tên loại</th>
                            <th>Slug</th>
                            <th>Tên thương hiệu</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($category as $category)
                    <tr>
                        <td width="10"><input type="checkbox" name="check1" value="1"></td>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td>{{$category->category_slug}}</td>
                        <td>
                            <?php $brand = \App\Models\tbl_brand::all(); ?>
                            @foreach ($brand as $brand)
                            @if ($category->brand_id == $brand->id)
                            {{$brand->brand_name}}
                                
                            @endif
                                
                            @endforeach
                        </td>
                        <td>{{$category->category_description}}</td>
                        <td>
                            <span class="badge bg-success">
                                @if ($category->category_status==1)
                                    Hiện
                                @else
                                    Ẩn
                                @endif
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="return confirm('Bạn có muốn xóa danh mục này không?')">
                                <a href="/admin/quan-ly-danh-muc-giay/xoa/{{$category->id}}"><i class="fas fa-trash-alt"></i></a>
                            </button>
                            <button class="btn btn-primary btn-sm edit" type="button" title="Sửa">
                                <a href="/admin/quan-ly-danh-muc-giay/cap-nhat/{{$category->id}}"><i class="fas fa-edit"></i></a>
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