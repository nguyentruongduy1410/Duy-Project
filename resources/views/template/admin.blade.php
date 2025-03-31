<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin - Quản Lý Voucher</title>
    <link rel="stylesheet" href="{{ asset('css/CssAdmin/danhmuc.css') }}">
    <link rel="stylesheet" href="{{ asset('css/CssAdmin/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/CssAdmin/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/CssAdmin/loginadmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/CssAdmin/qlbaivie.css') }}">
    <link rel="stylesheet" href="{{ asset('css/CssAdmin/qlbinhluan.css') }}">
    <link rel="stylesheet" href="{{ asset('css/CssAdmin/qldonhang.css') }}">
    <link rel="stylesheet" href="{{ asset('css/CssAdmin/qluser.css') }}">
    <link rel="stylesheet" href="{{ asset('css/CssAdmin/qlvoucher.css') }}">
    <link rel="stylesheet" href="{{ asset('css/CssAdmin/sanpham.css') }}">
    <link rel="stylesheet" href="{{ asset('css/CssAdmin/themsp.css') }}">
    <link rel="stylesheet" href="{{ asset('css/CssAdmin/thongke.css') }}">
</head>

<body>

    <div class="header">
        <img src="https://via.placeholder.com/150x40" alt="Logo" />
        <div class="user-icon">👤 Admin</div>
    </div>

    <div class="container">
        <div class="sidebar">
            <h2>Quản Trị</h2>
            <a href="{{ route('admin.dashboard') }}">Trang Chủ</a>
            <a href="{{ route('admin.products') }}">Sản Phẩm</a>
            <a href="{{ route('admin.categories') }}">Danh Mục Sản Phẩm</a>
            <a href="{{ route('admin.users') }}">Người Dùng</a>
            <a href="{{ route('admin.posts') }}">Quản Lý Bài Viết</a>
            <a href="{{ route('admin.orders') }}">Quản Lý Đơn Hàng</a>
            <a href="{{ route('admin.comments') }}">Quản Lý Bình Luận</a>
            <a href="{{ route('admin.vouchers') }}">Quản Lý Khuyến Mãi</a>
        </div>
        @yield('body');
    </div>
    <!-- Chart.js Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const salesData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Doanh Số',
                data: [1000, 1500, 1200, 1800, 2000, 1700],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        // Get the canvas element and draw the sales chart
        const salesChartCanvas = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(salesChartCanvas, {
            type: 'line',
            data: salesData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>

</html>