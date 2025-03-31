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

git clone https://github.com/yourusername/duy-project.git
cd duy-project

Cài đặt dependencies:

composer install
npm install

Cấu hình môi trường:

cp .env.example .env
php artisan key:generate

Sau đó chỉnh sửa .env để kết nối với cơ sở dữ liệu của bạn.

Chạy migration và seeding dữ liệu:

php artisan migrate --seed

Khởi động server:

php artisan serve

📜 API Documentation

API được cung cấp thông qua Laravel API Resource, có thể sử dụng Postman để kiểm thử.

💡 Đóng góp

Chúng tôi hoan nghênh mọi đóng góp! Vui lòng gửi pull request hoặc issue nếu bạn có ý tưởng hoặc lỗi cần báo cáo.
