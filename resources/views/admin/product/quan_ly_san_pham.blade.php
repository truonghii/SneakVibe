@extends('admin/layout')
@section('title')
    Quản lý sản phẩm
    
@endsection
@section('breadcrumbs')
    QUẢN LÝ GIÀY
    
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
    .btn1 a:hover{
        color: wheat;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">
                      <a class="btn btn-add btn-sm" href="/admin/quan-ly-san-pham/them" title="Thêm"><i class="fas fa-plus"></i>
                        Tạo mới sản phẩm
                      </a>
                    </div>
                    <div class="col-sm-2">
                      <a class="btn btn-delete btn-sm " href="/admin/quan-ly-san-pham/thung-rac" style="color: black"><i class="fas fa-trash-alt"></i>
                         Thùng Rác
                      </a>
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
                            <th>Tên sản phẩm</th>
                            <th>Ảnh đại diện</th>
                            <th>Album</th>
                            <th width = "100px">Size</th>
                            <th>Trạng thái</th>
                            <th>Hot</th>
                            <th>Giá tiền</th>
                            <th>Giá KM</th>
                            <th>Danh mục</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($list_product as $list)
                        <tr>
                         
                          <td>{{$list->id}}</td>
                          <td>{{$list->product_name}}</td>
                          <td><img src="{{asset('uploads/product/'.$list->product_image)}}" alt="" width="100px;"></td>
                          <td>
                              <a href="/admin/quan-ly-san-pham/cap-nhat-thu-vien-anh/{{$list->id}}" class="btn bg-success" title="Thêm thư viện ảnh"><i class="fas fa-image"></i></a>
                          </td>
                          <td>
                            <?php
                            $attributes = \App\Models\tbl_product_attribute::where('id_product', $list->id)->get();
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
                            {{-- <span class="badge bg-primary">{{ implode(', ', $sizes) }} </span> --}}
                        </td>
                          <td>
                            @if ($list->product_status==1)
                            <span class="badge bg-success">Còn Hàng </span>
                            @else
                            <span class="badge bg-danger">Hết Hàng </span>
                            @endif
                          </td>
                          <td>
                            <a href="{{$list->product_hot == 1 ? URL::to('/admin/quan-ly-san-pham/active-product-hot/'.$list->id) : URL::to('/admin/quan-ly-san-pham/unactive-product-hot/'.$list->id)}}">
                              <i class="fas fa-solid fa-thumbs-{{$list->product_hot == 1 ? 'up' : 'down'}}" style="color:{{$list->product_hot == 1 ? 'blue' : 'red'}}; font-size:20px"></i>
                            </a>
                            {{-- <a href=""><i class="fas fa-solid fa-thumbs-down" style="color:red; font-size:20px"></i></a> --}}
                          </td>
                          <td>{{number_format($list->product_price,0,',')}}&#8363</td>
                          <td>{{number_format($list->product_promotion,0,',')}}&#8363</td>
                          <td>
                            <?php $category = \App\Models\tbl_category::all(); ?>
                            @foreach ($category as $category)
                              @if ($list->category_id == $category->id)
                                {{$category->category_name}}
                              @endif  
                            @endforeach
                          </td>
                          <td>
                            <button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="return confirm('Bạn có muốn xóa sản phẩm này không ?')">
                              <a href="/admin/quan-ly-san-pham/xoa-mem/{{$list->id}}"><i class="fas fa-trash-alt"></i></a>
                            </button>
                            <button class="btn btn-primary btn-sm edit" type="button" title="Cập nhật">
                              <a href="/admin/quan-ly-san-pham/cap-nhat/{{$list->id}}"><i class="fas fa-edit"></i></a>
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