<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;
use Carbon\Carbon;

class UserController extends Controller
{
    public function showLogin(Request $request)
    {
        if ($request->ajax()) {
            return view('user.login')->render();
        }
        return redirect()->route('home');
    }
    public function showRegister(Request $request)
    {
        if ($request->ajax()) {
            return view('user.register')->render();
        }
        return redirect()->route('home');
    }
    public function showForgotPassword(Request $request){
        if($request->ajax()){
            return view('user.forgot_password')->render();
        }
        return redirect()->route('home');
    }
    public function register(Request $request){
        $validator = Validator::make($request->all(),
            [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],[
            'phone.unique' => 'Số điện thoại đã được sử dụng.',
            'email.unique' => 'Email đã tồn tại.',
            'email.email' => 'Email không hợp lệ.',
            'password.confirmed' => 'Mật khẩu nhập lại không trùng khớp.',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        try{
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'role' => 'user',
                'password' => Hash::make($request->password),
            ]);
            $token = Str::random(60);
            DB::table('email_verifications')->insert([
                'email' => $user->email,
                'token' => $token,
                'created_at' => now(),
            ]);
            $user->notify(new \App\Notifications\VerifyEmailNotification($token));
            \Log::info('Gửi email xác nhận cho: ' . $user->email);
            return response()->json([
                'success' => 'Đăng ký thành công! Vui lòng kiểm tra email để xác nhận tài khoản.'
            ]);
            // Auth::login($user);
        }catch(\Exception $e){
            return response()->json(['error' => 'Lỗi khi đăng ký. Vui lòng thử lại.'], 500);
        }
       

    }   
    public function ForgotPassword(Request $request){
        $request->validate(['email' => 'required|email|exists:users,email'], [
            'email.exists' => 'Email không tồn tại trong hệ thống.',
        ]);
        DB::table('password_resets')->where('email', $request->email)->delete();
        $token = Str::random(60);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now()
        ]);
        $resetLink = url("/reset-password?token=$token&email=" . urlencode($request->email));
        Mail::send('emails.reset_password', ['resetLink' => $resetLink], function ($message) use ($request) {
            $message->to($request->email)->subject('Đặt lại mật khẩu');
        });
        return response()->json(['message' => 'Liên kết đặt lại mật khẩu đã được gửi qua email!']);
    }
    public function getPassword(Request $request){
        $token = $request->query('token');
        return view('user.reset_password', ['token' => $token]);

    }
    public function postPassword(Request $request){
        $request->validate(['email' => 'required|email|exists:users,email'], [
            'email.exists' => 'Email không tồn tại trong hệ thống.',
        ]);
    

        dd($request->all());


        try {
            DB::table('password_resets')->where('email', $request->email)->delete();
            $token = Str::random(60);
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now()
            ]);
            \Log::info('Token đã lưu thành công:', ['email' => $request->email, 'token' => $token]);
        } catch (\Exception $e) {
            \Log::error('Lỗi khi lưu token:', ['message' => $e->getMessage()]);
        }


        $resetLink = url("/reset-password?token=$token&email=" . urlencode($request->email));
        Mail::send('emails.reset_password', ['resetLink' => $resetLink], function ($message) use ($request) {
            $message->to($request->email)->subject('Đặt lại mật khẩu');
        });
        
    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
                ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['error' => 'Email không tồn tại'], 404);
        }
        if (is_null($user->email_verified_at)) {
            return response()->json(['error' => 'Vui lòng xác nhận email trước khi đăng nhập.'], 403);
        }
        if (empty($user->password)) {
            return response()->json(['error' => 'Tài khoản này chưa có mật khẩu.'], 400);
        }
        if (!$request->filled('password')) {
            return response()->json(['error' => 'Mật khẩu không được để trống'], 400);
        }
        if (!$request->filled('email')) {
            return response()->json(['error' => 'email không được để trống'], 400);
        }
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Sai thông tin đăng nhập'], 401);
        }
     
        try{
            $request->session()->regenerate();
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        }catch(\Exception $e){
            return response()->json(['error' => 'Lỗi server: ' . $e->getMessage()], 500);
        }
      
    }
    public function checkLoginStatus(Request $request){
        return response()->json(['user' => $request->user()]);
    }
    public function logout(Request $request){
        $request->user()->tokens()->delete(); // Xóa tất cả token
        return response()->json(['message' => 'Đã đăng xuất']);
    }
}
