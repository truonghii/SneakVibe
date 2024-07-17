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
        text-align: center;
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
            echo '<span class="text-alert" style="color:red;text-align:center;width:100%;font-style:italic">'.$message.'</span>';
            		
          }
        
        
        ?>
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th width="10"><input type="checkbox" id="all"></th>
                            <th>ID</th>
                            <th>name</th>
                            <th>phone</th>
                            <th>email</th>
                            <th>total_amount</th>
                            <th>Địa chỉ</th>
                            <th>Ngày Tạo</th>
                            <th>Ngày Cập Nhật</th>
                        </tr>
                    </thead>
                    <tbody>
                     @foreach ($list_order as $list)
                     <tr>
                      <td width="10"><input type="checkbox" name="check1" value="1"></td>
                      <td>{{$list->id_order}}</td>
                      <td>{{$list->name}}</td>
                      <td>{{$list->phone}}</td>
                      <td>{{$list->email}}</td>
                      <td>{{$list->total_amount}}</td>
                      <td>{{$list->city}}, {{$list->district}}, {{$list->ward}}, {{$list->address}}</td>
                      <td>{{$list->created_at}}</td>
                      <td>{{$list->updated_at}}</td>


                      <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="return confirm('Bạn có muốn xóa blog này không?')"
                              ><a href="/admin/quan-ly-don-hang/{{$list->id_order}}"><i class="fas fa-trash-alt"></i> </a>
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