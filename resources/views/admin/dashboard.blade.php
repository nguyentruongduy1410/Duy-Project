@extends('template.admin')
@section('body')
    <div class="content">
        <h1>Thống Kê Tổng Quan</h1>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stats-card">
                <h2>Doanh Số Bán Hàng</h2>
                <p>{{number_format($totalRevenue)}}đ</p>
            </div>
            <div class="stats-card">
                <h2>Đơn Hàng Mới</h2>
                <p>{{ $newOrders }}</p>
            </div>
            <div class="stats-card">
                <h2>Sản Phẩm Bán Chạy</h2>
                <p>{{ $bestSellingProduct ? 'ID: ' . $bestSellingProduct->product_id . ' - SL: ' . $bestSellingProduct->total_sold : 'Chưa có dữ liệu' }}
                </p>
            </div>
        </div>

        <!-- Sales Chart -->
        <div class="chart-container">
            <h2>Biểu Đồ Doanh Số</h2>
            <canvas id="salesChart"></canvas>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($months),
                datasets: [{
                    label: 'Doanh Số (VND)',
                    data: @json($revenues),
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]

            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        })


    </script>
@endsection