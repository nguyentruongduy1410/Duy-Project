<h2>Nhập Mật Khẩu Mới</h2>
    <form action="{{ route('postPassword') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ request('token') }}">
        <input type="hidden" name="email" value="{{ request('email') }}">
        
        <label for="password">Mật khẩu mới:</label>
        <input type="password" name="password" required>
        
        <label for="password_confirmation">Xác nhận mật khẩu:</label>
        <input type="password" name="password_confirmation" required>
        <p>Token: {{ request('token') }}</p>
        <p>Email: {{ request('email') }}</p>

        <button type="submit">Đặt lại mật khẩu</button>
    </form>