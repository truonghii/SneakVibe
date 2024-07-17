<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>THANH TOÁN VN PAY</title>
        <!-- Bootstrap core CSS -->
        <link href="/assets/bootstrap.min.css" rel="stylesheet"/>
        <!-- Custom styles for this template -->
        <link href="/assets/jumbotron-narrow.css" rel="stylesheet">  
        <script src="/assets/jquery-1.11.3.min.js"></script>
        <style>
            .pay{
               box-shadow: 2px 2px 5px #FFB6C1;
                padding: 20px;
            }
            h3{
                text-align:center;
            }
            form{
                margin:auto;
            }
        </style>
    </head>

    <body>        
        <div class="container">
             <h3>THANH TOÁN VN PAY</h3>
            <div class="table-responsive pay">
                <form action="/vnpay_create_payment" id="frmCreateOrder" method="post" class="form">        
                    <div class="form-group">
                        <label for="amount">Số tiền</label>
                        {{number_format($total)}} VND
                        <input class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required."
                        id="amount" max="100000000" min="1" name="amount" type="hidden" value="{{$total}}" />
                    </div>
                     <h4>Chọn phương thức thanh toán</h4>
                    <div class="form-group">
                        <!-- <h5>Cách 1: Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</h5> -->
                       <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
                       <label for="bankCode">Cổng thanh toán VNPAYQR</label><br>
                       
                       <input type="radio" id="bankCode" name="bankCode" value="VNBANK">
                       <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội địa</label><br>
                       
                       <input type="radio" id="bankCode" name="bankCode" value="INTCARD">
                       <label for="bankCode">Thanh toán qua thẻ quốc tế</label><br>
                       
                    </div>
                    <div class="form-group">
                        <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
                         <input type="radio" id="language" Checked="True" name="language" value="vn">
                         <label for="language">Tiếng việt</label><br>
                         <input type="radio" id="language" name="language" value="en">
                         <label for="language">Tiếng anh</label><br>
                    </div>
                    <button type="submit" class="btn" style="background-color:#FFB6C1;" href>Thanh toán</button>
                    <a href="/thanh-toan" class="btn btn-primary"> Quay Lại</a>
                    @csrf
                </form>
            </div>
            <p>
                &nbsp;
            </p>
            <footer class="footer">
                <p>&copy; VNPAY 2020</p>
            </footer>
        </div>  
    </body>
</html>
