@extends('admin/layout')

@section('title')
    Quản Lý Voucher
@endsection

@section('breadcrumbs')
    Quản Lý Voucher
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
      
                      <a class="btn btn-add btn-sm" href="/admin/quan-ly-voucher/them" title="Thêm"><i class="fas fa-plus"></i>
                        Thêm mới voucher</a>
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
                            <th>Tên Voucher</th>
                            <th>Code</th>
                            <th>Discount</th>
                            <th>Ngày hết hạn</th>
                            <th>Tình trạng</th>
                            <th>Điều kiện</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($list_voucher as $list)
                    <tr>
                        <td>{{$list->coupon_id}}</td>
                        <td>{{$list->voucher_name}}</td>
                        <td>{{$list->code}}</td>
                        <td>{{$list->discount}}</td>
                        <td>{{$list->expired_date}}</td>
                        <td>
                            
                            @if ($list->status == 1)
                            <span class="badge bg-success">Hiện</span>
                            @else
                            <span class="badge bg-danger">Ẩn</span>
                            @endif
                            
                        </td>
                        <td>{{$list->voucher_condition}}</td>
                        <td>
                            <button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="return confirm('Bạn muốn xóa danh mục {{$list->coupon_id}} này không?');">
                                <a href="/admin/quan-ly-voucher/xoa-mem/{{$list->coupon_id}}"><i class="fas fa-trash-alt"></i> </a>
                            </button>
                            <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" >
                                <a href="/admin/quan-ly-voucher/cap-nhat/{{$list->coupon_id}}"><i class="fas fa-edit"></i></a>
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