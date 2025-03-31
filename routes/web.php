<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\product;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
require base_path('routes/admin.php');
//home
    Route::get('/search', [ProductController::class, 'search'])->name('search');
    Route::get('/search-suggestions', [ProductController::class, 'searchSuggestions']);
    Route::get('/', [PageController::class, 'home'])->name('home');;
    Route::get('/detail/{slug}', [ProductController::class, 'detail']);
//allproduct
    Route::get('/allproduct', [ProductController::class, 'allproduct'])->name('allproduct');
    Route::get('/category/{id}', [ProductController::class, 'categoryProducts'])->name('category');
//login register
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/forgot_password', [UserController::class, 'ForgotPassword'])->name('forgot_password_form');
    Route::post('/reset-password', [UserController::class, 'postPassword'])->name('postPassword');


    Route::get('/check-login', [UserController::class, 'checkLoginStatus'])
    ->middleware('auth:sanctum');
    Route::get('/login', [UserController::class, 'showLogin'])->name('showLogin');
    Route::get('/register', [UserController::class, 'showRegister'])->name('showRegister');
    Route::get('/forgot_password', [UserController::class, 'showForgotPassword'])->name('forgot_password');
    Route::get('/reset-password', [UserController::class, 'getPassword'])->name('reset-password');
    Route::get('/verify-email', function (Request $request) {
        $token = $request->query('token');
        $verification = DB::table('email_verifications')->where('token', $token)->first();
        if (!$verification) {
            return response()->json(['message' => 'Token không hợp lệ hoặc đã hết hạn.'], 400);
        }
        $user = User::where('email', $verification->email)->first();
        if ($user) {
            $user->email_verified_at = now();
            $user->save();
            DB::table('email_verifications')->where('email', $user->email)->delete();
            return response()->json(['message' => 'Xác nhận email thành công! Bạn có thể đăng nhập.']);

        }
        return response()->json(['message' => 'Không tìm thấy người dùng.'], 404);
    });



//cart
    Route::resource('/cart', CartController::class);
    Route::get('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');
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

//ngôn ngữ
Route::get('/change-language/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'vi'])) {
        Session::put('locale', $lang);
        App::setLocale($lang);
    }
    return redirect()->back();
})->name('change.language');
