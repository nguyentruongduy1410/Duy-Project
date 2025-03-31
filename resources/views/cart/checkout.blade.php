@extends('template.user')
@section('body')
<div id="checkout-all" class="">
    <div class="checkout-left col l-8 m-12 c-12">
        <div class="checkout-box">
            <h2>Địa chỉ nhận hàng</h2>
            <div class="checkout-information">
                <div class="information-home">
                    <p>Nhà riêng</p>
                </div>
                <p>Nguyễn Trường Duy</p>
                <p>-</p>
                <p>0962615032</p>
            </div>
            <div class="checkout-location">
                <p>48/5d2, Phường Trung Mỹ Tây, Quận 12, Hồ Chí Minh</p>
                <button class="change-payment-method" href="">Thay đổi</button>
            </div>
        </div>

        <div class="checkout-box">
            <h2>Hình thức thanh toán</h2>
            <div class="checkout-payment">
                <form class="payment-method">
                    <img src="{{ asset('') }}img/icon-thanh-toán-7651ec377ce85a4c35912fb6b92385e4.png" alt="" width="35px">
                    <label for="">Thanh toán bằng tiền mặt</label>
                </form>
                <button class="change-payment-method" href="">Thay đổi</button>
            </div>
        </div>

        <div class="checkout-box">
            <h2>Thông tin kiện hàng</h2>
            @foreach ($products as $productItem)
                <div class="checkout-product-all">
                    <div class="package-information">
                        <div class="package-img">
                            <img src="{{ asset('')}}img/{{ $productItem->image }}" alt="">
                        </div>
                        <div class="package-contents">
                            <p>{{ $productItem->name }}</p>
                            {{-- <p>{{ $productItem->image }}"</p> phiên bản --}} 
                        </div>
                    </div>
                    <div class="package-price">
                        <p>{{ $productItem->quantity}}</p>
                        <p>x</p>
                        <p class="package-price-color">{{number_format($productItem->price)}}đ</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="checkout-box">
            <div class="checkout-box-total">
                <div class="checkout-box-text">
                    <textarea name="" id="" >Ghi chú</textarea>
                </div>
                <div class="box-total-amount">
                    <div class="bill-price">
                        <p>Tổng tiền:</p>
                        <p>{{number_format($total_price)}}đ</p>
                    </div>
                    <div class="btn-cart">
                        <button>Đặt hàng</button>
                    </div>
                </div>
                <div class="checkout-box-clause">
                    <p>Nhấn "Đặt hàng" đồng nghĩa việc bạn đồng ý tuân theo Chính sách xử lý dữ liệu cá nhân&Điều khoản ...</p>
                </div>
            </div>
            <div class="checkout-box-total-mobile">
                <div class="checkout-mobile">
                    <p>Ghi chú</p>
                    <p>Thay đổi</p>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout-right  col l-4 m-12 c-12">
        <div class="btn-cart">
            <button>Đặt hàng</button>
        </div>
        <h2>Đơn hàng</h2>
        <div class="bill-price">
            <p>Tạm tính</p>
            <p>2.000.000đ</p>
        </div>
        <div class="bill-price">
            <p>Giảm giá</p>
            <p>2.000.000đ</p>
        </div>
        <div class="bill-price">
            <p>Phí vận chuyển</p>
            <p>2.000.000đ</p>
        </div>
        <div class="bill-price">
            <p>Thành tiền (đã VAT)</p>
            <p>2.000.000đ</p>
        </div>
        <hr>
        <p class="checkout-right-clause">Nhấn "Đặt hàng" đồng nghĩa việc bạn đồng ý tuân theo Chính sách xử lý dữ liệu cá nhân&Điều khoản ...</p>

    </div>
   
</div>
<div class="change_payment_method_box">
    <div class="box_method">
        <div class="box_method_title">
            <h3>Địa chỉ nhận hàng</h3>
            <i class='bx bx-x exits-method'></i>
        </div>
        <form class="payment-method">
            <input class="payment-checkbox" type="checkbox" name="" id="">
            <img src="{{ asset('') }}img/icon-thanh-toán-7651ec377ce85a4c35912fb6b92385e4.png" alt="" width="35px">
            <label for="">Thanh toán bằng tiền mặt</label>
        </form>
        <form class="payment-method">
            <input class="payment-checkbox" type="checkbox" name="" id="">
            <img src="{{ asset('') }}img/icon-thanh-toán-7651ec377ce85a4c35912fb6b92385e4.png" alt="" width="35px">
            <label for="">Thanh toán bằng VNPAY</label>
        </form>
        <div class="box-method-continue">
            <button class="exits-method">Hủy</button>
            <button class="continue-method">Tiếp tục</button>
        </div>
    </div>
</div>

<div class="change_payment_method_box">
    <div class="box_method">
        <div class="box_method_title">
            <h3>Hình thức thanh toán</h3>
            <i class='bx bx-x exits-method'></i>
        </div>
        <form action="/set-payment-method" class="payment-method" method="POST">
            @csrf
            <div class="payment1">
                <input class="payment-checkbox" type="checkbox"  name="payment_method" id="" value="Thanh toán bằng tiền mặt">
                <input type="hidden" name="payment_img" value="{{ asset('img/icon-thanh-toán-7651ec377ce85a4c35912fb6b92385e4.png') }}">
                <img src="{{ asset('') }}img/icon-thanh-toán-7651ec377ce85a4c35912fb6b92385e4.png" alt="" width="35px">
                <label for="">Thanh toán bằng tiền mặt</label>
            </div>
            <div class="payment1">
                <input class="payment-checkbox" type="checkbox" name="payment_method" id="" value="Thanh toán bằng VNPAY">
                <input type="hidden" name="payment_img" value="{{ asset('img/icon-thanh-toán-7651ec377ce85a4c35912fb6b92385e4.png') }}">

                <img src="{{ asset('') }}img/icon-thanh-toán-7651ec377ce85a4c35912fb6b92385e4.png" alt="" width="35px">
                <label for="">Thanh toán bằng VNPAY</label>
            </div>
        <div class="box-method-continue">
            <button class="exits-method">Hủy</button>
            <button type="submit" class="continue-method">Tiếp tục</button>
        </div>
    </form>

    </div>
</div>
<form  action="/payment" id="frmCreateOrder" method="post" style="float: left; display: none;">      
    @csrf  
    <div class="form-group">
        <label for="amount">Số tiền</label>
        <input class="form-control" data-val="true" data-val-number="The field Amount must be a number." data-val-required="The Amount field is required." id="amount" max="100000000" min="1" name="amount" type="number" value="{{$total_price}}" />
    </div>
     <h4>Chọn phương thức thanh toán</h4>
    <div class="form-group">
        <h5>Cách 1: Chuyển hướng sang Cổng VNPAY chọn phương thức thanh toán</h5>
       <input type="radio" Checked="True" id="bankCode" name="bankCode" value="">
       <label for="bankCode">Cổng thanh toán VNPAYQR</label><br>
       
       <h5>Cách 2: Tách phương thức tại site của đơn vị kết nối</h5>
       <input type="radio" id="bankCode" name="bankCode" value="VNPAYQR">
       <label for="bankCode">Thanh toán bằng ứng dụng hỗ trợ VNPAYQR</label><br>
       
       <input type="radio" id="bankCode" name="bankCode" value="VNBANK">
       <label for="bankCode">Thanh toán qua thẻ ATM/Tài khoản nội địa</label><br>
       
       <input type="radio" id="bankCode" name="bankCode" value="INTCARD">
       <label for="bankCode">Thanh toán qua thẻ quốc tế</label><br>
       
    </div>
    <div class="form-group">
        <h5>Chọn ngôn ngữ giao diện thanh toán:</h5>
         <input type="radio" id="language" Checked="True" name="language" value="vn">
         <label for="language">Tiếng việt</label><br>
         <input type="radio" id="language" name="language" value="en">
         <label for="language">Tiếng anh</label><br>
         
    </div>
    <button type="submit" class="btn btn-default" href>Thanh toán</button>
</form>
@endsection


