@extends('template.user')
@section('body')
 
<div id="all-product">
    <div class="product-left">
        <h3><i class='bx bx-menu'></i>Danh mục</h3>
        <ul>
            <li><a href="{{ route('allproduct') }}">Tất cả sản phẩm</a></li>
            @if(isset($categories) && count($categories) > 0)
                @foreach ($categories as $category)
                    <li><a href="{{ route('category', $category->id) }}">{{ $category->name }}</a></li>
                @endforeach
            @else
                <li>Không có danh mục nào</li>
            @endif
            </ul>
    </div>

    <div class="product-right">
        <div class="filter-all">
           <div class="item-lct">
                <span><a href="index.html">Home</a></span>
                <span>/</span>
                <span>All</span>
                <span class="">/</span>
                <span class="">0</span>
                <span class="">/</span>
                <span class="">0</span>
            </div>
          
        </div>
            <div id="product-all">
                <div class="product-title">
                    @if(!empty($keyword))
                        <p>Kết quả tìm kiếm cho: "{{ $keyword }}"</p>
                    @elseif(!empty($category_id_name))
                        <p>Danh mục: "{{ $category_id_name->name}}"</p>
                    @else
                        <p>Tất cả sản phẩm</p>
                    @endif

                </div>
                @if(count($products) > 0)
                <div class="box">
                    @foreach ($products as $product)
                    <div class="box-pro">
                        <img src="{{ asset('') }}img/{{$product->image}}" alt="" width="100%">
                        <div class="sale">-48%</div>
                        <a href="/detail/{{$product->slug}}"><p>{{$product->name}}</p></a>
                        <div class="price">
                            <p>{{number_format($product->price)}}đ</p>
                            <p class="sale-price">{{number_format($product->sale_price)}}đ</p>
                        </div>
                </div>
                    @endforeach
            </div>
            @else
             <p>Không tìm thấy sản phẩm nào.</p>
            @endif
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
</div>

</div>
@endsection