Duy Project

Duy Project là một hệ thống thương mại điện tử được xây dựng bằng Laravel, cung cấp API cho frontend sử dụng. Hệ thống hỗ trợ quản lý sản phẩm, xử lý thanh toán và có giao diện quản trị để giám sát dữ liệu.

🚀 Tính năng đã hoàn thành

🛡️ Xác thực người dùng

Đăng ký, đăng nhập.

Quên mật khẩu có xác nhận qua email.

🛍️ Quản lý sản phẩm

Thay đổi ngôn ngữ.

Tìm kiếm sản phẩm.

Gợi ý sản phẩm dựa trên từ khóa.

Lọc sản phẩm theo danh mục.

Phân trang danh sách sản phẩm.

Xem chi tiết sản phẩm.

💳 Thanh toán

Tích hợp VNPAY để xử lý giao dịch trực tuyến.

🛠️ Admin Panel

Dashboard: Hiển thị tổng quan thông tin hệ thống.

📌 Cài đặt

Yêu cầu hệ thống

PHP 8.x

Composer

MySQL

Node.js & npm (nếu sử dụng frontend trong cùng repo)

Cách cài đặt

Clone repository:

<p><code style="color: green;">git clone https://github.com/yourusername/duy-project.git</code></p>
<p><code style="color: blue;">cd duy-project</code></p>

Cài đặt dependencies:

<p><code style="color: green;"composer install</code></p>

Cấu hình môi trường:

<p><code style="color: green;">cp .env.example .env</code></p>
<p><code style="color: blue;">php artisan key:generate</code></p>

Sau đó chỉnh sửa .env để kết nối với cơ sở dữ liệu của bạn.

Chạy migration và seeding dữ liệu:

<p><code style="color: green;">php artisan migrate --seed</code></p>


Khởi động server:
<p><code style="color: blue;">php artisan serve</code></p>

📜 API Documentation

API được cung cấp thông qua Laravel API Resource, có thể sử dụng Postman để kiểm thử.

💡 Đóng góp

Chúng tôi hoan nghênh mọi đóng góp! Vui lòng gửi pull request hoặc issue nếu bạn có ý tưởng hoặc lỗi cần báo cáo.
