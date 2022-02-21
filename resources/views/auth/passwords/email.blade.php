<!DOCTYPE html>
<html lang="cs" class="no-js responsive">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Login</title>
    @include('front.parts.head_icon')

    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}" media="all">

    <link rel="stylesheet" href="{{asset('login1.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('login2.css')}}" id="slick-css"  type="text/css" media="all">


</head>
<body id="body" class="page-template-default page page-id-10 scroll_block theme-stips woocommerce-account woocommerce-page woocommerce-lost-password woocommerce-no-js wpb-js-composer js-comp-ver-6.1 vc_responsive">

<style type="text/css">
    .page-heading, .header-wrapper, .header-scrolling, .top-footer, .bottom-footer { display: none;	}
    .st-pusher {
        background-image:url('{{asset('images/bg_pass.jpg')}}');
        background-position: center center;
        background-size: cover;
    }
    .st-content{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100vw !important;
        height: 100vh !important;
        background-image: url('{{asset('images/pass_logo.png')}}');
        background-position-x: 95%;
        background-position-y: 95%;
        background-repeat: no-repeat;
        background-color: #ffffff00;
    }

    .password_warp{
        background: #fff;
        padding: 10px;
        -webkit-box-shadow: 10px 10px 225px -67px rgba(0,0,0,0.75);
        -moz-box-shadow: 10px 10px 225px -67px rgba(0,0,0,0.75);
        box-shadow: 10px 10px 225px -67px rgba(0,0,0,0.75);
        max-width: 820px;
        min-width: 50vw;
        margin: 0 auto;
    }
    .password_warp:before {
        content: '';
        box-shadow: 0px 3px 5px -1px rgba(0, 0, 0, 0.22);
        -webkit-box-shadow: 0px 3px 5px -1px rgba(0, 0, 0, 0.22);
        -moz-box-shadow: 0px 3px 5px -1px rgba(0, 0, 0, 0.22);
        border-top: 13px solid #3abee6;
        width: 106%;
        display: block;
        position: relative;
        left: -3%;
        top: -10px;
    }
    form, .img_pass, .form_pass {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 0 20px;
        text-align: center;
        width: 100%;
    }
    .img_pass {
        margin: 10px;
    }
    .img_pass .fa {
        font-size: 60px;
        color: #d1d2d4;
    }

</style>

<div id="st-container" class="st-container">
    <div class="st-pusher">
        <div class="st-content">
            <div class="st-content-inner">
                <div class="page-wrapper fixNav-enabled">

                    <div class="container content-page">
                        <div class="page-content sidebar-position-without sidebar-mobile-bottom">
                            <div class="row">
                                <div class="content col-md-12">

                                    <div class="woocommerce">
                                        <div class="password_warp">
                                            <div class="img_pass"><i class="fa fa-lock fa-4" aria-hidden="true"></i></div>


                                            <div class="form_pass">
                                                <form method="post" class="woocommerce-ResetPassword lost_reset_password" action="{{ route('password.email') }}">
                                                    @csrf
                                                    <p>{{__('front.forget_password_note')}}</p>

                                                    @if (session('status'))
                                                        <div class="alert alert-success" role="alert">
                                                            {{ session('status') }}
                                                        </div>
                                                    @endif

                                                    <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                                        <label for="email">{{__('front.username_or_email')}}</label>
                                                        <input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="email" id="email" autocomplete="username" />
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </p>

                                                    <div class="clear"></div>

                                                    <p class="woocommerce-form-row form-row">
                                                        <button type="submit" class="woocommerce-Button button" value="{{__('front.reset_password')}}">{{__('front.reset_password')}}</button>
                                                    </p>

                                                </form>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="post-navigation">
                                    </div>

                                </div>
                            </div><!-- end row-fluid -->
                        </div>
                    </div><!-- end container -->


                </div> <!-- st-container -->

            </div>
        </div>
    </div>
</div>



</body>


</html>

<?php /*
@extends('layouts.auth')

@section('content')
    <div class="content">
                    <form class="login-form" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <h3 class="form-title">{{ __('Reset Password') }}</h3>

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="form-group">
                                <input  placeholder="{{ __('E-Mail Address') }}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
    </div>
@endsection
*/ ?>
