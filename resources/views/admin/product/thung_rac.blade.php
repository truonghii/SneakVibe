@extends('admin/layout')
@section('title')
    Thùng rác
    
@endsection
@section('breadcrumb')
  Thùng rác sản phẩm 
    
@endsection

@section('content')
<style>
     td, th {
        text-align: center;
        vertical-align: middle !important; /* Căn giữa nội dung theo chiều dọc */
    }
    .btn1 a:hover{
        color: wheat;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">Thùng rác</h3>
            <?php
              $message = Session::get('message');
              if(isset($message)){
                echo ' <div class="alert alert-warning" role="alert" id="timeShowAlert">'.$message.' </div>';
                        
              }
            
            
            ?>
            <div class="tile-body">
               
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh đại diện</th>
                            <th>Album</th>
                            <th>Size</th>
                            <th>Tình trạng</th>
                            <th>Giá tiền</th>
                            <th>Giá KM</th>
                            <th>Danh mục</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($data as $data)
                       <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->product_name}}</td>
                        <td><img src="{{asset('uploads/product/'.$data->product_image)}}" alt="" width="100px;"></td>
                        <td>
                            <a href="" class="btn bg-success" title="Thêm thư viện ảnh"><i class="fas fa-image"></i></a>
                        </td>
                        <td>
                            <?php
                            $attributes = \App\Models\tbl_product_attribute::where('id_product', $data->id)->get();
                            $sizes = [];
                            foreach ($attributes as $attribute) {
                                $attr = \App\Models\tbl_attribute::find($attribute->id_attribute);
                               
                                
                                    $sizes[] = $attr->value;
                                
                            }
                            ?>
                           @foreach($sizes as $size)
                           <div style="padding-bottom: 3px; display:inline-block">
                            <span class="badge bg-primary" style="font-size: 8px">{{ $size }} </span>
                           </div>
                          @endforeach
                        </td>
                       
                        <td>
                          @if ($data->product_status==1)
                          <span class="badge bg-success">Còn Hàng </span>
                          @else
                          <span class="badge bg-danger">Hết Hàng </span>
                          @endif
                        </td>
                        <td>{{number_format($data->product_price,0,',')}}&#8363</td>
                        <td>{{number_format($data->product_promotion,0,',')}}&#8363</td>
                        <td>
                          <?php $category = \App\Models\tbl_category::all(); ?>
                          @foreach ($category as $category)
                          @if ($data->category_id == $category->id)
                            {{$category->category_name}}
                          @endif
                              
                          @endforeach
                        </td>
                        <td><button class="btn btn-danger trash" type="button" title="Xóa vĩnh viễn" onclick="return confirm('Bạn có muốn xóa vĩnh viễn sản phẩm này?')"
                                ><a href="/admin/quan-ly-san-pham/xoa/{{$data->id}}"><i class="fas fa-trash-alt"></i> </a>
                            </button>
                            <button class="btn btn-primary btn-sm edit" type="button" title="Khôi phục" onclick="return confirm('Bạn có muốn khôi phục sản phẩm này?')"><a href="/admin/quan-ly-san-pham/khoi-phuc/{{$data->id}}"><i class="fas fa-solid fa-rotate-left"></i></a></button>
                           
                        </td>
                    </tr>
                           
                       @endforeach
                       {{-- <div class='p-2'> {{ $datasp->links(); }} </div> --}}
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection