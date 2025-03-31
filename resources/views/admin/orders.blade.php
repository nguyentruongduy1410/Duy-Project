@extends('template.admin')
@section('body')
<div class="content">
    <h1>Danh sách đơn hàng</h1>
    <table class="order-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Số lượng</th>
                <th>Ghi chú của khách hàng</th>
                <th>Ghi chú của admin</th>
                <th>Địa chỉ khách hàng</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Sản phẩm A</td>
                <td><img src="img/sp1.jpg" alt=""></td>
                <td>2</td>
                <td>Giao nhanh nhất có thể</td>
                <td><textarea class="admin-note" placeholder="Thêm ghi chú..."></textarea></td>
                <td>123 Đường ABC, Phường XYZ, Thành phố H</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Sản phẩm B</td>
                <td><img src="img/sp1.1.jpg" alt=""></td>
                <td>1</td>
                <td>Hàng tặng quà</td>
                <td><textarea class="admin-note" placeholder="Thêm ghi chú..."></textarea></td>
                <td>456 Đường DEF, Quận 5, Thành phố H</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Sản phẩm B</td>
                <td><img src="img/sp1.1.jpg" alt=""></td>
                <td>1</td>
                <td>Hàng tặng quà</td>
                <td><textarea class="admin-note" placeholder="Thêm ghi chú..."></textarea></td>
                <td>456 Đường DEF, Quận 5, Thành phố H</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Sản phẩm B</td>
                <td><img src="img/sp1.1.jpg" alt=""></td>
                <td>1</td>
                <td>Hàng tặng quà</td>
                <td><textarea class="admin-note" placeholder="Thêm ghi chú..."></textarea></td>
                <td>456 Đường DEF, Quận 5, Thành phố H</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Sản phẩm B</td>
                <td><img src="img/sp1.1.jpg" alt=""></td>
                <td>1</td>
                <td>Hàng tặng quà</td>
                <td><textarea class="admin-note" placeholder="Thêm ghi chú..."></textarea></td>
                <td>456 Đường DEF, Quận 5, Thành phố H</td>
            </tr>          <tr>
                <td>2</td>
                <td>Sản phẩm B</td>
                <td><img src="img/sp1.1.jpg" alt=""></td>
                <td>1</td>
                <td>Hàng tặng quà</td>
                <td><textarea class="admin-note" placeholder="Thêm ghi chú..."></textarea></td>
                <td>456 Đường DEF, Quận 5, Thành phố H</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Sản phẩm B</td>
                <td><img src="img/sp1.1.jpg" alt=""></td>
                <td>1</td>
                <td>Hàng tặng quà</td>
                <td><textarea class="admin-note" placeholder="Thêm ghi chú..."></textarea></td>
                <td>456 Đường DEF, Quận 5, Thành phố H</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection