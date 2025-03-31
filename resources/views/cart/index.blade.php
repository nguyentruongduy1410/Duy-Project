@extends('template.user')
@section('body')
<div id="cart-gh">
    <h3>Giỏ hàng của bạn</h3>
    @if(!empty($products) && count($products) > 0)
    <div class="table-cart">
        <div class="title-cart">
            <ul>
                <li class="ttsp">Thông tin sản phầm</li>
                <li>Đơn giá</li>
                <li>Số lượng</li>
                <li>Thành tiền</li>
            </ul>
        </div>

        

        

        <div id="tbodygh">
            @foreach($products as $item)
            <div class="title-cart">
                <ul>
                    <li class="ttsp">
                        <img src="{{ asset('img/' . $item['image']) }}" alt="{{ $item['name'] }}">
                        <div class="ttsp-content">
                            <a href="{{ url('/detail/' . $item['slug']) }}">{{ $item['name'] }}</a>
                            <p>Đen / M</p>
                            <p>Số lượng: {{ $item['quantity'] }}</p>
                            <button type="button"><a href="{{ route('cart.destroy', $item['id']) }}">xóa</a></button>
                        </div>
                    </li>
                    <li>{{number_format($item['price'])}}</li>
                    <li>
                            <button class="down" onclick="updateQuantity({{ $item['id'] }}, -1)">-</button>
                            <input size="4" value="{{ $item['quantity'] }}" maxlength="3" type="text" readonly>
                            <button class="up" onclick="updateQuantity({{ $item['id'] }}, 1)">+</button>
                    </li>
                    <li>{{number_format($item['total_price'])}}</li>
                </ul>
            </div>
            @endforeach
                
            

        </div>
        
    </div>
    
    <div class="buy-cart">
        <div class="box-buy">
            <div class="buy-tt">
                <p>Tổng tiền:</p>
                <span id="ttgh">{{array_sum(array_column($products, 'total_price'))}}</span>
            </div>
            <form id="checkout-form" action="{{ route('checkout') }}" method="GET">
                <button type="submit" class="btn btn-primary">Thanh toán</button>
            </form>
            
        </div>
    </div>
    @else
    <p>Giỏ hàng của bạn đang trống.</p>
@endif
</div>
@endsection


<script>
    function updateQuantity(id, change) {
        fetch(`/cart/update/${id}?change=${change}`)
            .then(response => location.reload()); 
    }
</script>
