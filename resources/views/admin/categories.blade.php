@extends('template.admin')
@section('body')
<div class="content">
    <h1>Danh Mục Sản Phẩm</h1>
    <button class="btn" onclick="openAddModal()">Thêm Danh Mục</button>
    <table class="category-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Danh Mục</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Đàn Bầu</td>
                <td>
                    <a href="#" onclick="openEditModal('1', 'Đàn Bầu')">Sửa</a> | 
                    <a href="#">Xóa</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Sáo Trúc</td>
                <td>
                    <a href="#" onclick="openEditModal('2', 'Sáo Trúc')">Sửa</a> | 
                    <a href="#">Xóa</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Đàn Tranh</td>
                <td><a href="#">Sửa</a> | <a href="#">Xóa</a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Trống Đồng</td>
                <td><a href="#">Sửa</a> | <a href="#">Xóa</a></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Đàn Nhị</td>
                <td><a href="#">Sửa</a> | <a href="#">Xóa</a></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Kèn Bầu</td>
                <td><a href="#">Sửa</a> | <a href="#">Xóa</a></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Đàn Tính</td>
                <td><a href="#">Sửa</a> | <a href="#">Xóa</a></td>
            </tr>
            <tr>
                <td>8</td>
                <td>Đàn Nguyệt</td>
                <td><a href="#">Sửa</a> | <a href="#">Xóa</a></td>
            </tr>
            <tr>
                <td>9</td>
                <td>Đàn Gáo</td>
                <td><a href="#">Sửa</a> | <a href="#">Xóa</a></td>
            </tr>
            <tr>
                <td>10</td>
                <td>Đàn K'lông Put</td>
                <td><a href="#">Sửa</a> | <a href="#">Xóa</a></td>
            </tr>
            <!-- Các hàng khác -->
        </tbody>
    </table>
</div>


<!-- Modal Thêm Danh Mục -->

<div class="modal" id="addModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('addModal')">&times;</span>
        <h2>Thêm Danh Mục</h2>
        <form id="addForm">
            <div class="form-group">
                <label for="newCategory">Tên Danh Mục</label>
                <input type="text" id="newCategory" name="newCategory" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn secondary" onclick="closeModal('addModal')">Hủy</button>
                <button type="submit" class="btn">Thêm</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Sửa Danh Mục -->
<div class="modal" id="editModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('editModal')">&times;</span>
        <h2>Sửa Danh Mục</h2>
        <form id="editForm">
            <input type="hidden" id="editCategoryId" name="editCategoryId">
            <div class="form-group">
                <label for="editCategory">Tên Danh Mục</label>
                <input type="text" id="editCategory" name="editCategory" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn secondary" onclick="closeModal('editModal')">Hủy</button>
                <button type="submit" class="btn">Lưu</button>
            </div>
        </form>
    </div>
</div>
<script>
    // Mở modal Thêm Danh Mục
    function openAddModal() {
        document.getElementById('addModal').style.display = 'flex';
    }

    // Mở modal Sửa Danh Mục
    function openEditModal(id, name) {
        document.getElementById('editModal').style.display = 'flex';
        document.getElementById('editCategoryId').value = id;
        document.getElementById('editCategory').value = name;
    }

    // Đóng modal
    function closeModal(modalId) {
        document.getElementById(modalId).style.display = 'none';
    }

    // Đóng modal khi nhấn bên ngoài
    window.onclick = function (event) {
        const addModal = document.getElementById('addModal');
        const editModal = document.getElementById('editModal');
        if (event.target === addModal) addModal.style.display = 'none';
        if (event.target === editModal) editModal.style.display = 'none';
    };
</script>

@endsection
