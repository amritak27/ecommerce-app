@extends('layouts.base')

@section('content')
<section class="checkout spad">
    <div class="container">
            <form method="POST" action="{{ route('login') }}" class="checkout__form">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <h5>Login</h5>                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Email <span>*</span></p>
                                <input id="email" type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                name="email" value="{{ old('email') }}" 
                                required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Password <span>*</span></p>
                                <input id="password" type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                name="password" required 
                                autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    </br>
                    <button type="submit" class="site-btn">Login</button>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                </div>
            </div>
        </form>
        <br><br>
        <div class="row">
            <div class="col-lg-12">
                <h6 class="coupon__link">Not Registered yet? 
                    <span class="icon_mail"></span> <a href="{{ route('register') }}">Register</a>
                </h6>
            </div>
        </div>
    </div>
</section>
@endsection
