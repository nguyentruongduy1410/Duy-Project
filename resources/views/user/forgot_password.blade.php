<form id="hide-right-forgot-password"  action="{{ route('forgot_password') }}"  method="POST">
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
    @csrf
    <i class="bx bx-x" id="close-login"></i>
    <div class="all-login">
        <h1>QUÊN MẬT KHẨU</h1>
        <input class="email" id="email" name="email" type="email" placeholder="Email" >
        <button type="submit" class="continue">Gửi email xác nhận</button>
    </div>
</form>



