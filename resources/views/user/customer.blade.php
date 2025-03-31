@extends('template.user')
@section('body')
    <main class="account-page">
        <div class="container">
            <h1 class="page-title">My Account</h1>

            <!-- Account Navigation -->
            <div class="account-container">
                <div class="account-sidebar">
                    <div class="account-info">
                        <div class="account-avatar">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <div class="account-details">
                            <h3 class="welcome-msg">Welcome back!</h3>
                            <p class="account-email">{{$currentUser->name}}</p>
                        </div>
                    </div>
                    <nav class="account-nav">
                        <a href="#orders" class="account-nav-item active" data-target="orders">Orders</a>
                        <a href="#addresses" class="account-nav-item" data-target="addresses">Addresses</a>
                        <a href="#profile" class="account-nav-item" data-target="profile">Account Details</a>
                        <a href="#wishlist" class="account-nav-item" data-target="wishlist">Wishlist</a>
                        <a href="#" class="account-nav-item">Sign Out</a>
                    </nav>
                </div>

                <!-- Account Content Sections -->
                <div class="account-content">
                    <!-- Orders Section -->
                    <section id="orders" class="account-section active">
                        {{-- <h2 class="section-title">My Orders</h2> --}}
                        <div class="orders-empty">
                            @if(!$orders || $orders->isEmpty())
                                <i class="fas fa-shopping-bag"></i>
                                <p>You haven't placed any orders yet.</p>
                                <a href="/collections/new" class="nova-button">Start Shopping</a>
                            @else
                                @foreach ($orders as $order)
                                    <div class="box-my-order">
                                        <h3>Đơn hàng #{{ $order->id }}</h3>
                                        <div class="left-box-order">
                                            @foreach ($order->details as $detail)
                                                <div class="product-order">
                                                    <img src="{{asset('')}}img/{{$detail->product->image}}" alt="">
                                                    <p class="name-order">
                                                        {{$detail->product->name}}
                                                    </p>
                                                    <p class="price-order">Giá: {{number_format($detail->product->price)}}</p>
                                                    <p>Số lượng: {{$detail->quantity}}</p>

                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="right-box-order">
                                            <p>{{$order->payment_status}}</p>
                                            <p>{{$order->created_at}}</p>
                                            <p>{{$detail->price}}</p>

                                        </div>
                                    </div>
                                @endforeach
                            @endif


                        </div>
                    </section>

                    <!-- Addresses Section -->
                    <section id="addresses" class="account-section">
                        <h2 class="section-title">My Addresses</h2>
                        <div class="addresses-container">
                            <div class="address-card add-card">
                                <div class="add-icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <p>Add New Address</p>
                            </div>
                        </div>
                    </section>

                    <!-- Profile Section -->
                    <section id="profile" class="account-section">
                        <h2 class="section-title">Account Details</h2>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <p>Debug: {{ session('success') }}</p>
                        <p>Debug: {{ session('error') }}</p>
                        <form class="account-form" action="{{ route('password_update') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="lastName">Name</label>
                                <input type="text" id="lastName" name="name" value="{{$currentUser->name}}">
                            </div>
                            <div class="form-group">
                                <label for="currentPassword">Current Password</label>
                                <input type="password" id="current_password" name="current_password">
                            </div>
                            <div class="form-group">
                                <label for="newPassword">New Password</label>
                                <input type="password" id="new_password" name="new_password">
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm New Password</label>
                                <input type="password" id="new_password_confirmation" name="new_password_confirmation">
                            </div>
                            <button type="submit" class="nova-button">Save Changes</button>
                        </form>
                    </section>


                    <!-- Wishlist Section -->
                    <section id="wishlist" class="account-section">
                        <h2 class="section-title">My Wishlist</h2>
                        <div class="wishlist-empty">
                            <i class="fas fa-heart"></i>
                            <p>Your wishlist is empty.</p>
                            <a href="/collections/new" class="nova-button">Discover Products</a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection