@extends('admin/layout')

@section('title')
    Quản lý thương hiệu
@endsection

@section('breadcrumbs')
    QUẢN LÝ THƯƠNG HIỆU
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
        vertical-align: middle !important; /* Căn giữa nội dung theo chiều dọc */
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">
                      <a class="btn btn-add btn-sm" href="/admin/quan-ly-thuong-hieu/them" title="Thêm"><i class="fas fa-plus"></i>
                        Thêm mới thương hiệu</a>
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
                            <th>Tên thương hiệu</th>
                            <th>Slug</th>
                            <th>Logo</th>
                            <th>Mô tả</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($list_brand as $brand)
                       <tr>
                        <td width="10"><input type="checkbox" name="check1" value="1"></td>
                        <td>{{$brand->id}}</td>
                        <td>{{$brand->brand_name}}</td>
                        <td>{{$brand->brand_slug}}</td>
                        <td><img src="{{asset('uploads/brand/'.$brand->brand_logo)}}" alt="" width="100px;"></td>
                        <td class="ellipsis">{{$brand->brand_description}}</td>
                        <td><span class="badge bg-success">
                            @if ($brand->brand_status == 1)
                                Hiện
                            @else
                                Ẩn
                            @endif 
                        </span></td>
                        
                        <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="return confirm('Bạn muốn xóa thương hiệu {{$brand->brand_name}} này không?');">
                            <a href="/admin/quan-ly-thuong-hieu/xoa/{{$brand->id}}"><i class="fas fa-trash-alt"></i> </a>
                            </button>
                            <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" >
                            <a href="/admin/quan-ly-thuong-hieu/cap-nhat/{{$brand->id}}"><i class="fas fa-edit"></i></a>
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