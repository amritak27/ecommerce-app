@extends('layouts.base')

@section('content')
<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <form method="POST" action="{{ route('register') }}" class="checkout__form">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <h5>Register</h5>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Name <span>*</span></p>
                                <input id="name" type="text" class="form-control @error('name') 
                                        is-invalid @enderror" name="name" value="{{ old('name') }}" required
                                    autocomplete="name" autofocus>
                                @error('name')
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
                                <p>Email <span>*</span></p>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
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
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
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
                                <p>Confirm Password <span>*</span></p>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">

                            </div>
                        </div>
                    </div>
                    <button type="submit" class="site-btn">Register</button>
                </div>
            </div>
        </form>
        <br><br>
        <div class="row">
            <div class="col-lg-12">
                <h6 class="coupon__link">Already have an account? 
                    <span class="icon_contacts_alt"></span> <a href="{{ route('login') }}">Login</a>
                </h6>
            </div>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection