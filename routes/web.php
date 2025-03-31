<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\product;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
require base_path('routes/admin.php');
//home
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/search-suggestions', [ProductController::class, 'searchSuggestions']);
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/detail/{slug}', [ProductController::class, 'detail']);
//allproduct
Route::get('/allproduct', [ProductController::class, 'allproduct'])->name('allproduct');
Route::get('/category/{id}', [ProductController::class, 'categoryProducts'])->name('category');



//cart
Route::resource('/cart', CartController::class);
Route::get('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');

//ngôn ngữ
Route::get('/change-language/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'vi'])) {
        Session::put('locale', $lang);
        App::setLocale($lang);
    }
    return redirect()->back();
})->name('change.language');



//login
Route::get('/login', [UserController::class, 'showLogin'])->name('showLogin');
Route::post('/login', [UserController::class, 'login'])->name('login');

//register
Route::get('/register', [UserController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [UserController::class, 'register'])->name('register');









//mali xác minh



Route::get('/email/verify', function () {
    return view('emails.verify-email'); // Đảm bảo view này tồn tại
})->middleware('auth')->name('verification.notice');

// Route xử lý xác nhận email

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Xác nhận email thành công
    return redirect('/home'); // Chuyển hướng sau khi xác nhận
})->middleware(['auth', 'signed'])->name('verification.verify');

// Route gửi lại email xác nhận

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//forgot pass

Route::post('/forgot_password', [UserController::class, 'ForgotPassword'])->name('forgot_password_form');
Route::get('/forgot_password', [UserController::class, 'showForgotPassword'])->name('forgot_password');
Route::post('/reset-password', [UserController::class, 'postPassword'])->name('postPassword');
Route::get('/reset-password', [UserController::class, 'getPassword'])->name('reset-password');

//customer



Route::middleware(['auth'])->group(function () {
    Route::get('/check-login', [UserController::class, 'checkLoginStatus']);
    Route::get('/customer', [UserController::class, 'showCustomer'])->name('customer');
    Route::post('/update-password', [UserController::class, 'updatePassword'])->name('password_update');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');


    //checkout

    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
    //thanh toán vnpay
    Route::post('/payment', [PaymentController::class, 'create']);
    Route::get('/payment/result', [PaymentController::class, 'result']);

    //chọn phương thức thanh toán
    Route::post('/set-payment-method', function (Request $request) {
        if (!$request->has('payment_method')) {
            return response()->json(['error' => 'Không nhận được phương thức thanh toán'], 400);
        }
        Session::put('payment_method', [
            'label' => $request->payment_method,
            'img' => $request->payment_img,
        ]);
        return redirect('/checkout');
    });
    Route::get('/get-payment-method', function () {
        return response()->json([
            'payment_method' => Session::get('payment_method', []),
            'payment_img' => Session::get('payment_img', [])

        ]);
    });


});
