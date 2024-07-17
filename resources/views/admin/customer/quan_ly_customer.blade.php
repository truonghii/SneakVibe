@extends('admin/layout')

@section('title')
    Quản lý khách hàng
@endsection

@section('breadcrumbs')
    QUẢN LÝ KHÁCH HÀNG
@endsection

@section('content')
<style>
    
    td, th {
        text-align: center !important;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
              

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
                            <th>Tên khách hàng</th>
                            <th>Giới tính</th>
                            <th>Email</th>
                            <th>SĐT</th>
                            <th>Địa Chỉ</th>
                            <th>Trạng Thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($customers as $list)
                    <tr>
                        <td width="10"><input type="checkbox" name="check1" value="1"></td>
                        <td>{{$list->id}}</td>
                        <td>{{$list->name}}</td>
                        <td>
                            @if ($list->gender == 0)
                                Nam
                            @else
                                Nữ
                            @endif
                           
                        </td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->phone}}</td>
                        <td>{{$list->address}}</td>
                        <td>
                            @if ($list->email_verified_at == null)
                                <span class="badge bg-danger">
                                    Chưa xác thực Email
                                </span>
                            @else
                            <span class="badge bg-success">
                                Đã xác thực Email
                            </span>
                            @endif
                        </td>
                        
                        <td>
                            <button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="return confirm('Bạn có muốn xóa khách hàng này không?')">
                                <a href="/admin/quan-ly-khach-hang/xoa/{{$list->id}}"><i class="fas fa-trash-alt"></i></a>
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