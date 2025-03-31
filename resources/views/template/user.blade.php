<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.home') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=League+Gothic&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Oxanium:wght@200..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('') }}css/style.css">
    <link rel="stylesheet" href="{{ asset('') }}css/category.css">
    <link rel="stylesheet" href="{{ asset('') }}css/product.css">
    <link rel="stylesheet" href="{{ asset('') }}css/productdetail.css">
    <link rel="stylesheet" href="{{ asset('') }}css/giohang.css">
    <link rel="stylesheet" href="{{ asset('') }}css/allproduct.css">
    <link rel="stylesheet" href="{{ asset('') }}css/checkout.css">
    <link rel="stylesheet" href="{{ asset('') }}css/grid.css">


    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div id="container">
        <header>
            <div class="header-left">
                <a href="/"><img src="{{ asset('') }}img/logo.png" alt="" width="200px"
                        style="margin-right: 20px;"></a>
                <ul>
                    <li><a href="#">{{ __('messages.introduction') }}</a></li>
                    <li><a href="/allproduct">{{ __('messages.products') }}</a></li>
                    <li><a href="">{{ __('messages.news') }}</a></li>
                    <li><a href="">{{ __('messages.contact') }}</a></li>
                </ul>
            </div>
            <div class="header-right">
                <ul class="header-right-top">
                    <li class="find">
                        <form action="{{ route('search') }}" method="GET" style="height: 100%;" >
                            <input type="text" id="search-input" name="keyword" placeholder="{{ __('messages.search_placeholder') }}" style="    border: 0; text-align:left;">
                        </form>
                        <i class='bx bx-search-alt-2'></i>
                        <div class="hide-find"  id="suggestions-box">

                        </div>
                    </li>
                    <li class="language">
                        <a href="#">VIE</a>
                    </li>
                    <li class="history">
                        <a href="#">
                            <i class='bx bx-history'></i>
                        </a>
                    </li>
                    <li class="user-list">
                        <a href="{{ route('showLogin') }}" class="user">
                            <i class='bx bx-user-circle'></i>
                        </a>
                        <div class="hide-user">
                            <div class="hide-user-login">
                                <a class="" href="">{{ __('messages.login') }}</a>
                                <a class="black-login" href="">{{ __('messages.register') }}</a>
                            </div>
                            <div class="hide-user-manage">
                                <ul class="hide-user-manage-hover">
                                    <li class="dashboard"><a href="#">
                                            <i class='bx bxs-dashboard'></i>
                                            <p>{{ __('messages.overview') }}</p>
                                        </a></li>
                                    <li class="my-orders"><a href="#">
                                            <i class='bx bxs-package'></i>
                                            <p>{{ __('messages.my_orders') }}</p>
                                        </a></li>
                                    <li class="my-info"><a href="#">
                                            <i class='bx bx-edit'></i>
                                            <p>{{ __('messages.my_info') }}</p>
                                        </a></li>
                                    <li class="notifi"><a href="#">
                                            <i class='bx bx-bell'></i>
                                            <p>{{ __('messages.notifications') }}</p>
                                        </a></li>
                                    <li class="gift-cards"><a href="#">
                                            <i class='bx bx-gift'></i>
                                            <p>{{ __('messages.gift_cards') }}</p>
                                        </a></li>
                                        <li class="log-out-user" style="display: none";>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button type="submit" style="border: none; padding: 5px 10px; cursor: pointer;">{{ __('messages.logout') }}</button>
                                            </form>
                                        </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="heart">
                        <a href="#">
                            <i class='bx bx-heart'></i>
                        </a>
                    </li>
                    <li class="cart">
                        <a href="/cart">
                            <i class='bx bx-shopping-bag'></i>
                        </a>
                    </li>
                </ul>


            </div>
        </header>
        <div id="hidden"></div>
        @yield('body')
        <footer>
            <div class="foot-all">
                <div class="foot-row1">
                    <img src="{{ asset('') }}img/logo.png" alt="" width="200px">
                    <h3>HKD Vũ Thị Quỳnh Anh</h3>
                    <p>
                        Giấy chứng nhận đăng ký HKD số 17A80041952 do Phòng Tài chính - Kế hoạch, Uỷ ban nhân dân thành
                        phố Thái Nguyên cấp ngày 30/5/2019 <br>
                        Địa chỉ: Số 235, Đường Quang Trung, Tổ 7, Phường Tân Thịnh, Thành phố Thái Nguyên, Tỉnh Thái
                        Nguyên, Việt Nam <br>
                        Email: teelabvn@gmail.com <br>
                        Điện thoại: 0865539083
                    </p>
                    <img src="{{ asset('') }}img/logo_bct.webp" alt="" width="180px">
                </div>
                <div class="foot-row2">
                    <h2 id="row-title">{{ __('messages.register') }}</h2>
                    <form action="">
                        <input placeholder="{{ __('messages.register_email') }}" type="text">
                        <button class="btn"><img src="{{ asset('') }}img/paper.png" alt="" width="20px"></button>
                    </form>
                    <p>{{ __('messages.follow_us') }}</p>
                    <div class="icon-mxh">
                        <div class="icon-box">
                            <a href=""><img src="{{ asset('') }}img/facebook.svg" alt=""></a>
                        </div>
                        <div class="icon-box">
                            <a href=""><img src="{{ asset('') }}img/instagram.svg" alt=""></a>
                        </div>
                        <div class="icon-box">
                            <a href=""><img src="{{ asset('') }}img/tiktok.svg" alt=""></a>
                        </div>
                        <div class="icon-box">
                            <a href=""><img src="{{ asset('') }}img/shopeeico.webp" alt=""></a>
                        </div>
                        <div class="icon-box">
                            <a href=""><img src="{{ asset('') }}img/lazadaico.webp" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="foot-row3">
                    <h2 id="row-title">{{ __('messages.about_us') }}</h2>
                    <ul>
                        <li><a href="">{{ __('messages.home') }}</a></li>
                        <li><a href="">{{ __('messages.products') }}</a></li>
                        <li><a href="">{{ __('messages.size') }}</a></li>
                        <li><a href="">{{ __('messages.check_order') }}</a></li>
                        <li><a href="">{{ __('messages.store_system') }}</a></li>
                    </ul>
                </div>
                <div class="foot-row3">
                    <h2 id="row-title">CHÍNH SÁCH</h2>
                    <ul>
                        <li><a href="">{{ __('messages.shop_policy') }}</a></li>
                        <li><a href="">{{ __('messages.privacy_policy') }}</a></li>
                        <li><a href="">{{ __('messages.payment_methods') }}</a></li>
                        <li><a href="">{{ __('messages.shipping_policy') }}</a></li>
                        <li><a href="">{{ __('messages.return_policy') }}</a></li>
                    </ul>
                </div>

            </div>
        </footer>

        <div id="hide-right">
            <i class='bx bx-x'></i>
            <div class="language-all">
                <h1>{{ __('messages.region') }}</h1>
                <a href="{{ route('change.language', ['lang' => 'vi']) }}">
                    <p class="lan">VIE 🇻🇳</p>
                </a>
                <a href="{{ route('change.language', ['lang' => 'en']) }}">
                    <p class="lan">US 🇬🇧</p>
                </a>
            </div>
        </div>
        @include('user.login')
        @include('user.register')
        @include('user.forgot_password')


        
        
        
        
        
    </div>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/allproduct.js') }}" defer></script>


    <script src="{{ asset('') }}js/productdetail.js"></script>
    <script src="{{ asset('') }}js/checkout.js"></script>

    
</body>

</html>