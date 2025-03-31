@extends('template.user')
@section('body')
<aside>
    <div class="list" >
        <div class="item" >
            <img src="{{ asset('') }}img/slider_1.png" alt="">
        </div>
        <div class="item">
            <img src="{{ asset('') }}img/slider_2.png" alt="">
        </div>
        <div class="item">
            <img src="{{ asset('') }}img/slider_3.png" alt="">
        </div>
        <div class="item">
            <img src="{{ asset('') }}img/slider_4.png" alt="">
        </div>
        <div class="item">
            <img src="{{ asset('') }}img/slider_5.png" alt="">
        </div>
    </div>
    <ul class="dots">
        <li class="active"></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</aside>
<section>
    <div class="title">{{ __('messages.enjoy_your_youth') }}</div>
    <div class="content">{{ __('messages.teelab_lab') }}</div>
</section>
<div id="product">
    <div class="product-title">{{ __('messages.tshirts') }}</div>
    <div id="list">

    </div>
    <div class="box">
        @foreach ($pageList as $product)
        <div class="box-pro">
            <img src="{{ asset('') }}img/{{ $product->image }}" alt="" width="100%">
            <div class="sale">-48%</div>
            <a href="/detail/{{ $product->slug }}"><p>{{ $product->name }}</p></a>
            <div class="price">
                <p>{{ number_format($product->price) }}</p>
                <p class="sale-price">{{ number_format($product->sale_price) }}đ</p>
            </div>
    </div>
        
        @endforeach
</div>
</div>

<!-- box áo polo -->

<div id="product">
    <div class="product-title">{{ __('messages.polo_shirts') }}</div>
    <div class="box">
        @foreach ($pageList2 as $product)
        <div class="box-pro">
            <img src="{{ asset('') }}img/{{ $product->image }}" alt="" width="100%">
            <div class="sale">-48%</div>
            <a href="/detail/{{ $product->slug }}"><p>{{ $product->name }}</p></a>
            <div class="price">
                <p>{{ number_format($product->price) }}</p>
                <p class="sale-price">{{ number_format($product->price) }}đ</p>
            </div>
            </div>
        <a href="">
            
        </a>
        @endforeach
</div>
</div>

<!-- box áo sơ mi -->
<div id="product">
    <div class="product-title">{{ __('messages.shirts') }}</div>
    <div class="box">
        @foreach ($pageList3 as $product)
        <div class="box-pro">
            <img src="{{ asset('') }}img/{{ $product->image }}" alt="" width="100%">
            <div class="sale">-48%</div>
            <a href="/detail/{{ $product->slug }}"><p>{{ $product->name }}</p></a>
            <div class="price">
                <p>{{ number_format($product->price) }}</p>
                <p class="sale-price">{{ number_format($product->price) }}đ</p>
            </div>
            </div>
        <a href="">
            
        </a>
        @endforeach
</div>
</div>


<!-- box quần -->
<div id="product">
    <div class="product-title">{{ __('messages.pants') }}</div>
    <div class="box">
        @foreach ($pageList4 as $product)
        <div class="box-pro">
            <img src="{{ asset('') }}img/{{ $product->image }}" alt="" width="100%">
            <div class="sale">-48%</div>
            <a href="/detail/{{ $product->slug }}"><p>{{ $product->name }}</p></a>
            <div class="price">
                <p>{{ number_format($product->price) }}</p>
                <p class="sale-price">{{ number_format($product->price) }}đ</p>
            </div>
            </div>
        <a href="">
            
        </a>
        @endforeach
</div>
</div>


<div id="section-feedback">
    <div class="title-feedback"><h2>{{ __('messages.find_out_more') }}</h2></div>
    <div class="block-content">
        <div class="block">
            <img src="{{ asset('') }}img/feedback_1.png" alt="" width="100%">
        </div>
        <div class="block">
            <img src="{{ asset('') }}img/feedback_2.png" alt="" width="100%">
        </div>
        <div class="block hide-on-mobile">
            <img src="{{ asset('') }}img/feedback_5.png" alt="" width="100%">
        </div>
        <div class="block hide-on-mobile">
            <img src="{{ asset('') }}img/feedback_6.png" alt="" width="100%">
        </div>
    </div>
</div>

@endsection
