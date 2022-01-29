@extends('layouts.auth')

@section('content')

    @include('parts.ajax_redirector')

<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" method="POST" action="{{ route('login') }}">
        @csrf
        <h3 class="form-title">Sign In</h3>
        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span>Enter any username and password. </span>
        </div>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <input  placeholder="Email or Name" id="email" type="text" class="form-control form-control-solid placeholder-no-fix @error('email') is-invalid @enderror" name="login" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror

        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input placeholder="Password" id="password" type="password" class="form-control form-control-solid placeholder-no-fix @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-success uppercase">Login</button>
            <label class="rememberme check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                Remember </label>
            <a href="{{ route('password.request') }}" class="forget-password">Forgot Password?</a>
        </div>

    </form>
    <!-- END LOGIN FORM -->
</div>
@endsection
