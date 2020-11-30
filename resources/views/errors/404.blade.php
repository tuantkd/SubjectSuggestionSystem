<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ url('public/images/logo_ctu.png') }}"/>
    <title>404 Page Not Be Found</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,700" rel="stylesheet">
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ url('public/404/css/style.css') }}" />
</head>

<body>

<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h1>4<span></span>4</h1>
        </div>
        <h2>Oops! Không tìm thấy trang</h2>
        <p>Xin lỗi! Trang bạn đang tìm kiếm không tồn tại, đã bị xóa. tên đã thay đổi hoặc tạm thời không có</p>
        <a href="{{ url('/') }}">Quay lại trang</a>
    </div>
</div>

</body>

</html>
