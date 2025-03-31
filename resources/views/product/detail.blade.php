@extends('template.user')
@section('body')
<ul class="category">

    {{-- <li><a href="category.html">TAEKWONDO</a></li>
    <li><a href="#">VOVINAM</a></li>
    <li><a href="#">VÕ CỔ TRUYỀN</a></li>
    <li><a href="#">KARATEDO</a></li>
    <li><a href="#">AIKIDO</a></li>
    <li><a href="#">JODO</a></li>
    <li><a href="#">MMA, MUAY, BOXING</a></li>
    <li><a href="#">DỤNG CỤ THI ĐẤU</a></li> --}}
    @foreach ($product_category as $category)
        <li><a href="{{ route('category', $category->id) }}">{{$category->name}}</a></li>
    @endforeach

</ul>
<div id="all-productdetail">
    <div class="product-left">
        <div class="mini-img">
            <div class="box-img">
                <img src="{{ asset('') }}img/6-5a68750e-faea-4a17-8762-d96337f48859.webp" alt="">
            </div>
            <div class="box-img">
                <img src="{{ asset('') }}img/6-5a68750e-faea-4a17-8762-d96337f48859.webp" alt="">
            </div>
            <div class="box-img">
                <img src="{{ asset('') }}img/6-5a68750e-faea-4a17-8762-d96337f48859.webp" alt="">
            </div>
            <div class="box-img">
                <img src="" alt="">
            </div>
            <div class="box-img">
                <img src="" alt="">
            </div>
            <div class="box-img">
                <img src="" alt="">
            </div>
            <div class="box-img">
                <img src="" alt="">
            </div>
        </div>
        <div class="big-img">
            <img src="{{ asset('') }}img/{{ $product->image }}" alt="">
        </div>
        <div class="row-righ-contents">
            <div id="information-product">
                <ul class="menu-information">
                    <li><a href="">Thông tin sản phẩm</a></li>
                    <li><a href="">Thành phần</a></li>
                    <li><a href="">Hướng dẫn sử dụng</a></li>
                    <li><a href="">Đánh giá</a></li>
                </ul>
                <div class="information-contents">
                    <div class="contents-all-information">
                        <p>
                            {{ $product->description }}
                        </p>
                        <img src="{{ asset('') }}img/30S7P683-combo-3-by-vilain.jpg" alt="" width="400px">
                    </div>
                    <div class="see-more-imformation">
                        <button>Xem them</button>
                    </div>
                </div>

                <div class="information-contents">
                    <h3>Thành phần</h3>
                    <p>
                        {{ $product->description }}
                    </p>
                </div>
                <div class="information-contents">
                    <h3>Hướng dẫn sử dụng</h3>
                    <p>
                        Thành phần chính: <br>
                        Salicylic Acid 2% (BHA): Giúp loại bỏ tế bào chết, giảm dầu thừa và làm thông thoáng lỗ chân
                        lông. <br>
                        Glycerin: Dưỡng ẩm, duy trì độ ẩm tự nhiên cho da. <br>
                        Chiết xuất hoa cúc (Chamomilla Recutita Flower Extract): Làm dịu da, giảm kích ứng. <br>
                        Menthol & Menthyl Lactate: Mang lại cảm giác mát lạnh, sảng khoái. <br>
                        Tocopherol (Vitamin E): Chống oxy hóa, bảo vệ da khỏi tác động từ môi trường. <br>
                        Thành phần chi tiết: <br>
                        Aqua/Water/Eau, Sodium Laureth Sulfate, Sodium Lauryl Sulfate, Ethoxydiglycol, Salicylic Acid,
                        Cocamidopropyl Betaine, Cetyl Hydroxyethylcellulose, Glycerin, Chamomilla Recutita (Matricaria)
                        Flower Extract, Butyl Avocadate, Menthyl Lactate, Menthol,Tocopherol, Sodium Hydroxide, Sodium
                        Chloride, Disodium EDTA, Lauryl Alcohol, Sodium Sulfate, Sodium Nitrate, Hydrated Silica, EDTA,
                        Silica Dimethyl Silylate, Disodium Phosphate, Sodium Acetate, Sodium Phosphate, Phenoxyethanol,
                        Glyoxal, Methylchloroisothiazolinone, Methylisothiazolinone.
                    </p>
                </div>

                <div class="information-contents">
                    <h3>Đánh giá</h3>
                    <div class="rating-container">
                        <div class="rating-left">
                            <div class="rating-score">0.0</div>
                            <div class="stars-text">(Không có đánh giá)</div>
                            <div class="reviews-cmt-number">0 nhận xét</div>
                        </div>
                        <div class="rating-right">
                            <div class="rating-item">5 <p class="vote-none">sao</p>
                                <div class="bar"></div> 0 <p class="vote-none">Rất hài lòng</p>
                            </div>
                            <div class="rating-item">4 <p class="vote-none">sao</p>
                                <div class="bar"></div> 0 <p class="vote-none">Hài lòng</p>
                            </div>
                            <div class="rating-item">3 <p class="vote-none">sao</p>
                                <div class="bar"></div> 0 <p class="vote-none">Bình thường</p>
                            </div>
                            <div class="rating-item">2 <p class="vote-none">sao</p>
                                <div class="bar"></div> 0 <p class="vote-none">Không hài lòng</p>
                            </div>
                            <div class="rating-item">1 <p class="vote-none">sao</p>
                                <div class="bar"></div> 0 <p class="vote-none">Rất tệ</p>
                            </div>
                        </div>
                        <div class="bar">
                            <p>Chia sẻ về sản phẩm này</p>
                            <button class="btn-review">Viết bình luận</button>
                        </div>
                    </div>
                    <div class="user-reviews">
                        <h4>Đánh giá sản phẩm này</h4>
                        <div class="star">
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                            <i class='bx bx-star'></i>
                        </div>
                        <div class="comment-box">
                            <form action="">
                                <input class="cmt-box" type="text" name="" id="" placeholder="Viết bình luận...">
                                <input class="submit-cmt" type="submit" name="" id="">
                            </form>
                        </div>
                        <h4>Bình luận của người dùng</h4>
                        <div class="review-user-cmt">
                            <div class="review-header">
                                <p>Nguyễn Văn A</p>
                                <p>15/03/2025</p>
                            </div>
                            <div class="star-user">
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                            </div>
                            <p class="review-content">Sản phẩm rất tốt, giữ nếp lâu và mùi thơm dễ chịu!</p>
                            <div class="review-actions">
                                <i class='bx bx-like'>0</i>
                                <i class='bx bx-message-dots'>0</i>
                            </div>

                        </div>

                        <div class="review-user-cmt">
                            <div class="review-header">
                                <p>Nguyễn Văn A</p>
                                <p>15/03/2025</p>
                            </div>
                            <div class="star-user">
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                            </div>
                            <p class="review-content">Sản phẩm rất tốt, giữ nếp lâu và mùi thơm dễ chịu!</p>
                            <div class="review-actions">
                                <i class='bx bx-like'>0</i>
                                <i class='bx bx-message-dots'>0</i>
                            </div>

                        </div>

                        <div class="review-user-cmt">
                            <div class="review-header">
                                <p>Nguyễn Văn A</p>
                                <p>15/03/2025</p>
                            </div>
                            <div class="star-user">
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                                <i class='bx bx-star'></i>
                            </div>
                            <p class="review-content">Sản phẩm rất tốt, giữ nếp lâu và mùi thơm dễ chịu!</p>
                            <div class="review-actions">
                                <i class='bx bx-like'>0</i>
                                <i class='bx bx-message-dots'>0</i>
                            </div>
                            <div class="re-comment-box">
                            <input type="text" class="re-comment-input" placeholder="Nhập bình luận...">
                            <button class="re-comment-btn">Gửi</button>
                        </div>

                    </div>




                </div>

            </div>
            </div>
        </div>
        <div class="row-righ-relatedproduct">
            <h3>Sản phẩm liên quan</h3>
                <div class="box">
                    <div class="box-pro">
                            <img src="{{ asset('') }}img/img-7303-1.png" alt="" width="100%">
                            <div class="sale">-48%</div>
                            <p>Áo Thun Teelab Local Brand Unisex Alpaca on Animal Planet TS259</p>
                            <div class="price">
                                <p>185.000đ</p>
                                <p class="sale-price">350.000đ</p>
                            </div>
                    </div>
                    <div class="box-pro">
                        <img src="{{ asset('') }}img/img-7303-1.png" alt="" width="100%">
                        <div class="sale">-48%</div>
                        <p>Áo Thun Teelab Local Brand Unisex Alpaca on Animal Planet TS259</p>
                        <div class="price">
                            <p>185.000đ</p>
                            <p class="sale-price">350.000đ</p>
                        </div>
                    </div>
                    <div class="box-pro">
                        <img src="{{ asset('') }}img/img-7303-1.png" alt="" width="100%">
                        <div class="sale">-48%</div>
                        <p>Áo Thun Teelab Local Brand Unisex Alpaca on Animal Planet TS259</p>
                        <div class="price">
                            <p>185.000đ</p>
                            <p class="sale-price">350.000đ</p>
                        </div>
                    </div>
                    <div class="box-pro">
                        <img src="{{ asset('') }}img/img-7303-1.png" alt="" width="100%">
                        <div class="sale">-48%</div>
                        <p>Áo Thun Teelab Local Brand Unisex Alpaca on Animal Planet TS259</p>
                        <div class="price">
                            <p>185.000đ</p>
                            <p class="sale-price">350.000đ</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    
        <div class="product-right">
            <form action="/cart" method="post" style=" width: 100%;height: 100vh;">
                @csrf
            <input type="hidden" name="id" value="{{ $product->id}}">
            <h2>{{ $product->name }}</h2>
            <h3>{{ number_format($product->price) }}đ</h3>
            <div class="size-product-right">
                <h3>Size</h3>
                <div class="box-size-right">
                    <p>S</p>
                </div>
                <div class="box-size-right">
                    <p>S</p>
                </div>
                <div class="box-size-right">
                    <p>S</p>
                </div>
                <div class="box-size-right">
                    <p>S</p>
                </div>
                <div class="box-size-right">
                    <p>S</p>
                </div>
                <div class="box-size-right">
                    <p>S</p>
                </div>
            </div>
            
    
    
    
    
    
            <div class="quantity">
                <h3>Số lượng</h3>
                <div class="quantity-all">
                    <button type="button" class="up-quantity">+</button>
                    <input type="number" name="quantity" id="quantity" value="1" readonly>
                    <button type="button" class="douwn-quantity">-</button>
                </div>
            </div>
    
    
    
    
            <div class="add-to-cart">
                <input type="submit" value="Thêm vào giỏ hàng">
                <div class="favourite">
                    <i class='bx bx-heart'></i>
                </div>
            </div>
            <div class="product-details">
                <div class="details-header">
                    <h3>Chi tiết sản phẩm</h3>
                    <i class='bx bx-chevron-down'></i>
                </div>
                <div class="details-content">
                    <ul>
                        {{ $product->description }}
                    </ul>
                </div>
            </div>
            <div class="product-details">
                <div class="details-header">
                    <h3>Trả hàng trong vòng 30 ngày:</h3>
                    <i class='bx bx-chevron-down'></i>
                </div>
                <div class="details-content">
                    <ul>
                        <li>Với một số trường hợp ngoại lệ, các mặt hàng trả lại hợp lệ sẽ được hoàn lại dưới dạng
                            tín dụng cửa hàng. Các mặt hàng bị hư hỏng/lỗi sẽ được đổi nếu còn hàng.</li>
                        <li>Tất cả các khoản tín dụng cửa hàng, tiền hoàn lại và/hoặc tiền đổi hàng đến hạn sẽ được
                            phát hành trong vòng 48 giờ sau khi xử lý việc trả hàng.</li>
                        <li>Tất cả các mặt hàng bán cuối cùng đều được đánh dấu như vậy và không thể trả lại để lấy
                            tín dụng cửa hàng.</li>
                        <li>Bạn có thể tìm thêm thông tin về Chính sách trả hàng của chúng tôi.</li>
                    </ul>
                </div>
            </div>
    
        </form>
        @if(Session('succcess'))
        <div class="alert alert-success mt-2">{{ Session('succcess') }}</div>
        @endif
        </div>
   
</div>
@endsection
