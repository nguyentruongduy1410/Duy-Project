<form id="hide-right-login"  action="{{ route('login') }}"  method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @csrf
    <i class="bx bx-x" id="close-login"></i>
    <div class="all-login">
        <h1 style="text-transform: uppercase;">{{ __('messages.login') }}</h1>
        <input class="email" id="email" name="email" type="email" placeholder="Email" >
        <input class="email" id="password" name="password" type="password" placeholder="Password" style="margin-bottom: 20px">
        <button type="submit" class="continue">{{ __('messages.continue') }}</button>
        <a class="register continue signup"  type="submit" class="continue">{{ __('messages.register') }}</a>
    </div>
</form>



