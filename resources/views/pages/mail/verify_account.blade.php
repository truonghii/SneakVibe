
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notification</title>
    <style>
        /* Reset CSS */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        /* Container */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        /* Header */
        .header {
            background-color: #3498db;
            color: #fff;
            padding: 30px 0;
            text-align: center;
        }
        /* Content */
        .content {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        /* Footer */
        .footer {
            margin-top: 20px;
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>XÁC THỰC TÀI KHOẢN</h1>
        </div>
        <div class="content">
            <p>Xin chào,</p>
            <p>Cảm ơn bạn đã đăng ký tài khoản. Dưới đây là thông tin đăng ký của bạn:</p>
            <ul>
                <li><strong>Tên:</strong>{{$account->name}}</li>
                <li><strong>Email:</strong> {{$account->email}}</li>
                <!-- Thay thế thông tin này bằng thông tin thực tế từ dữ liệu bạn có -->
            </ul>
            <p>
                <a href="{{route('account.verify',$account->email)}}">Click vào đây để xác thực tài khoản</a>
            </p>
        </div>
        <div class="footer">
            <p>Trân trọng,</p>
            <p>SneakVibe</p>
        </div>
    </div>
</body>
</html>
