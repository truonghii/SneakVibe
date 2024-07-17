<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    @yield('title')
  </title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('/back_end/css/main.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <link rel="stylesheet" href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">

</head>

<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->
  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="/index.html"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{asset('/uploads/jack.jpg')}}" width="200px" height="100px"
        alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b>Hello Admin</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
     
      <li><a class="app-menu__item haha" href="{{URL::to('/admin')}}"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Bảng Điều Khiển</span></a></li>
      <li><a class="app-menu__item" href="{{URL::to('/admin/quan-ly-thuong-hieu')}}"><i class='app-menu__icon fas fa-solid fa-clipboard'></i> <span
            class="app-menu__label">Quản lý thương hiệu</span></a></li>
      <li><a class="app-menu__item" href="{{URL::to('/admin/quan-ly-danh-muc-giay')}}"><i class='app-menu__icon fas fa-solid fa-tag'></i><span
            class="app-menu__label">Quản lý danh mục giày</span></a></li>
      <li><a class="app-menu__item" href="{{URL::to('/admin/quan-ly-san-pham')}}"><i
            class='app-menu__icon fas fa-solid fa-shoe-prints'></i><span class="app-menu__label">Quản lý giày</span></a>
      </li>
      <li><a class="app-menu__item" href="{{URL::to('/admin/quan-ly-danh-muc-blog')}}"><i
        class='app-menu__icon fas fa-solid fa-tag'></i><span class="app-menu__label">Quản lý danh mục blog</span></a>
      </li>
      <li><a class="app-menu__item" href="{{URL::to('/admin/quan-ly-blog')}}"><i
        class='app-menu__icon fas fa-solid fa-blog'></i><span class="app-menu__label">Quản lý blog</span></a>
      </li>
      <li><a class="app-menu__item" href="{{URL::to('/admin/quan-ly-blog')}}"><i
        class='app-menu__icon fas fa-solid fa-comments'></i><span class="app-menu__label">Quản lý comment</span></a>
      </li>
      <li><a class="app-menu__item" href="{{URL::to('/admin/quan-ly-khach-hang')}}"><i
        class='app-menu__icon fas fa-solid fa-users'></i><span class="app-menu__label">Quản lý khách hàng</span></a>
      </li>
      <li><a class="app-menu__item" href="{{URL::to('/admin/quan-ly-don-hang')}}"><i
        class='app-menu__icon fas fa-solid fa-shopping-cart '></i><span class="app-menu__label">Quản lý đơn hàng</span></a>
      </li>
      <li><a class="app-menu__item" href="{{URL::to('/admin/quan-ly-chi-tiet-don-hang')}}"><i
        class='app-menu__icon fas fa-solid fa-cart-plus'></i><span class="app-menu__label">Quản lý chi tiết đơn hàng</span></a>
      </li>
      <li><a class="app-menu__item" href="{{URL::to('/admin/quan-ly-voucher')}}"><i
        class='app-menu__icon fas fa-solid fa-ticket-alt'></i><span class="app-menu__label">Quản lý voucher</span></a>
      </li>
      
         
    
    </ul>
  </aside>
  <main class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">
                <b>@yield('breadcrumbs')</b>
                </a>
            </li>
          </ul>
          <div id="clock"></div>
        </div>
      </div>
    </div>
   @yield('content')


    <div class="text-center" style="font-size: 13px">
      <p><b>Copyright
          <script type="text/javascript">
            document.write(new Date().getFullYear());
          </script> Phần mềm quản lý bán hàng | Dev By SneakTeam
        </b></p>
    </div>
  </main>
  <script src="{{asset('/back_end/js/jquery-3.2.1.min.js')}}"></script>
  <!--===============================================================================================-->
  <script src="{{asset('/back_end/js/popper.min.js')}}"></script>
  <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
  <!--===============================================================================================-->
  <script src="{{asset('/back_end/js/bootstrap.min.js')}}"></script>
  <!--===============================================================================================-->
  <script src="{{asset('/back_end/js/main.js')}}"></script>
  <!--===============================================================================================-->
  <script src="{{asset('/back_end/js/plugins/pace.min.js')}}"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="{{asset('/back_end/js/plugins/chart.js')}}"></script>
  <!--===============================================================================================-->
  
  <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
  <script src="//cdn.datatables.net/plug-ins/2.0.2/i18n/vi.json"></script>
  <script>
//     var table = new DataTable('#myTable', {
//     language: {
//         url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/vi.json',
//     },
// });
var table = new DataTable('#myTable');
  </script>

{{-- cài đặt time hiển thị của session flash --}}
<script>
  $("document").ready(function(){
    setTimeout(function(){
        $("#timeShowAlert").remove();
    }, 5000 );
});
</script>

  {{-- <script src="//cdn.ckeditor.com/4.24.0-lts/full/ckeditor.js"></script>
  <script>
    CKEDITOR.replace( 'mota' );

  </script> --}}
  <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/translations/vi.js"> </script>
  <script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
  <style>
      .ck-editor__editable_inline {
          min-height: 250px;
          max-height: 450px;
      }
      </style>
  <script>
          ClassicEditor.create( document.querySelector('#mota') , {
          language: 'vi',
          ckfinder: {
          uploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
          },
          items: [  
          'fontfamily', 'fontsize', '|',
          'heading', '|',        
          'alignment', '|',
          'fontColor', 'fontBackgroundColor', '|',
          'bold', 'italic', 'underline', 'subscript', 'superscript', '|',
          'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyBlock', '|', 
          'link', '|',
          'outdent', 'indent', '|',
          'bulletedList', 'numberedList', 'todoList', '|',
          'code', 'codeBlock', '|',
          'insertTable', '|',
          'uploadImage', '|',
          'ckfinder',
          'undo', 'redo'
      ],
      shouldNotGroupWhenFull: true
          })
              .then( editor => {
                  console.log( editor );
              } )
              .catch( error => {
                  console.error( error );
              } );    
  </script>

  <script type="text/javascript">
    var data = {
      labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
      datasets: [{
        label: "Dữ liệu đầu tiên",
        fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
        strokeColor: "rgb(255, 212, 59)",
        pointColor: "rgb(255, 212, 59)",
        pointStrokeColor: "rgb(255, 212, 59)",
        pointHighlightFill: "rgb(255, 212, 59)",
        pointHighlightStroke: "rgb(255, 212, 59)",
        data: [20, 59, 90, 51, 56, 100]
      },
      {
        label: "Dữ liệu kế tiếp",
        fillColor: "rgba(9, 109, 239, 0.651)  ",
        pointColor: "rgb(9, 109, 239)",
        strokeColor: "rgb(9, 109, 239)",
        pointStrokeColor: "rgb(9, 109, 239)",
        pointHighlightFill: "rgb(9, 109, 239)",
        pointHighlightStroke: "rgb(9, 109, 239)",
        data: [48, 48, 49, 39, 86, 10]
      }
      ]
    };
    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxb = $("#barChartDemo").get(0).getContext("2d");
    var barChart = new Chart(ctxb).Bar(data);
  </script>
  <script type="text/javascript">
    //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> ' + today + ' - ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }

  
  </script>
  {{-- tạo slug tự động --}}
  <script type="text/javascript">
    
    function ChangeToSlug()
        {
            var slug;
         
            //Lấy text từ thẻ input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }
         

   
   
</script>
</body>

</html>