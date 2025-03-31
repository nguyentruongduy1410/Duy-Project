<form id="hide-right-signup"  action="{{ route('register') }}"  method="POST">
    @csrf
    <i class="bx bx-x" id="close-login"></i>
    <div class="all-login">
        <h1 style="text-transform: uppercase;">{{ __('messages.register') }}</h1>
        
        <input class="email" id="name" name="name" type="text" placeholder="{{ __('messages.name') }}">
        <p class="error name-error text-danger"></p>

        <input class="email" id="phone" name="phone" type="text" placeholder="{{ __('messages.number_phone') }}">
        <p class="error phone-error text-danger"></p>

        {{-- <input class="email" id="address" name="address" type="text" placeholder="Địa chỉ">
        <p class="error address-error text-danger"></p> --}}

        <input class="email" id="email" name="email" type="email" placeholder="Email">
        <p class="error email-error text-danger"></p>

        <input class="email" id="password" name="password" type="password" placeholder="{{ __('messages.password') }}">
        <p class="error password-error text-danger"></p>

        <input class="email" id="password_confirmation" name="password_confirmation" type="password" placeholder="{{ __('messages.confirm_pass') }}">

        <button type="submit" class="continue">{{ __('messages.continue') }}</button>
        
        <p id="register-success" class="text-success"></p>
        <a href="" class="forgot_password" type="submit" style="margin-bottom: 10px">{{ __('messages.forgot_pass') }}</a>
        <p>
            {{ __('messages.comfirm_agree') }}
            <a href="">{{ __('messages.terms_of_service') }}</a> và <a href="">{{ __('messages.return_policy') }}</a> của Nguyễn Trường Duy.
        </p>
    </div>
</form>