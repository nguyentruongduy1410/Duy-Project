@extends('template.admin')
@section('body')
    <div class="content">
        <h1>Danh Sách Sản Phẩm Nhạc Cụ Dân Tộc</h1>

        <div class="filter">
            <button class="btn add add-product" id="addProductBtn">Thêm Sản Phẩm</button>
            <form method="GET" action="{{ route('admin.products') }}">
                <select name="category_id" onchange="this.form.submit()">
                    <option value="">Tất cả danh mục</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Slug</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Danh Mục</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Giá giảm</th>
                    <th>Ảnh</th>
                    <th>Số sao</th>
                    <th>Ngày thêm</th>
                    <th>Ngày sửa</th>
                    <th>Mô Tả</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample product rows -->

                @foreach ($products as $product){
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->slug}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category_id}}</td>
                        <td>{{$product->quantity}}</td>

                        <td>{{$product->price}}đ</td>
                        <td>{{$product->sale_price}}đ</td>
                        <td>
                            <img src="{{ asset('') }}img/{{$product->image}}" alt="Đàn Tranh" class="product-image">
                        </td>
                        <td>{{$product->rating}}đ</td>
                        <td>{{$product->created_at}}đ</td>
                        <td>{{$product->update_at}}đ</td>
                        <td>{{$product->description}}</td>
                        <td class="gom">
                            <button class="btn edit">Sửa</button>
                            <button class="btn delete">Xóa</button>
                        </td>
                    </tr>
                    }

                @endforeach




                <!-- Repeat sample rows as needed -->
            </tbody>
        </table>


        <div class="pagination">
            <a href="{{ $products->previousPageUrl() }}" class="page-link">
                <i class="fas fa-chevron-left"></i>
            </a>

            @for ($i = 1; $i <= $products->lastPage(); $i++)
                <a href="{{ $products->url($i) }}" class="page-link {{ $i == $products->currentPage() ? 'active' : '' }}">
                    {{ $i }}
                </a>
            @endfor

            <a href="{{ $products->nextPageUrl() }}" class="page-link">
                <i class="fas fa-chevron-right"></i>
            </a>
        </div>
    </div>
    <!-- The Modal --> <!-- from them sp --> <!-- from them sp -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Thêm Sản Phẩm Mới</h2>
            <form>
                <div class="form-group">
                    <label for="productName">Tên Sản Phẩm</label>
                    <input type="text" id="productName" name="productName" required>
                </div>
                <div class="form-group">
                    <label for="category">Danh Mục</label>
                    <select id="category" name="category" required>
                        <option value="dan">Đàn</option>
                        <option value="trong">Trống</option>
                        <option value="sao">Sáo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="productImage">Ảnh Sản Phẩm</label>
                    <input type="file" id="productImage" name="productImage" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label for="description">Mô Tả</label>
                    <textarea id="description" name="description" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn add">Thêm Sản Phẩm</button>
            </form>
        </div>
    </div>

    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("addProductBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function () {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection