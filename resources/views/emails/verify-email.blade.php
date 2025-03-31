<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận email</title>
</head>
<body>
    <h1>Xác nhận địa chỉ email của bạn</h1>
    <p>Xin chào {{ $user->name }},</p>
    <p>Cảm ơn bạn đã đăng ký! Vui lòng nhấp vào liên kết dưới đây để xác nhận địa chỉ email của bạn:</p>
    <a href="{{ $verificationUrl }}">Xác nhận email</a>
    <p>Nếu bạn không tạo tài khoản, vui lòng bỏ qua email này.</p>
    <p>Trân trọng,<br>Đội ngũ ứng dụng</p>
</body>
</html>