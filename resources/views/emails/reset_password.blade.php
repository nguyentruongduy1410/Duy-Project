<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
</head>
<body>
    <h2>Yêu cầu đặt lại mật khẩu</h2>
    <p>Chúng tôi nhận được yêu cầu đặt lại mật khẩu của bạn. Nếu bạn không thực hiện, hãy bỏ qua email này.</p>
    
    <p>Nhấp vào nút dưới đây để đặt lại mật khẩu:</p>
    <a href="{{ $resetLink }}" 
       style="background-color: #28a745; color: white; padding: 10px 20px; text-decoration: none;">
       Đặt lại mật khẩu
    </a>

    <p>Hoặc bạn có thể sao chép và dán liên kết này vào trình duyệt:</p>
    <p>{{ $resetLink }}</p>

    <p>Liên kết có hiệu lực trong 15 phút.</p>
</body>
</html>
