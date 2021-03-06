@include('front.parts.head_login')

<body class="page-template-login">

<div class="stips-login" style="background-image:url({{asset('images/banner-img.jpg')}});">

    <style>
        .stips-login__tab{
            display: none;
        }

        .active {
            display: block !important;
        }
    </style>

    <!-- Video popup btn -->
    <div class="stips-login__video">
        <div class="stips-login__btn-wrapper">
            <div class="stips-login__btn-wrapp">
                <a class="stips-login__btn" href="https://www.youtube.com/watch?v=dAhc4R_7GxE">
                    <img src="{{asset('images/button-icon.png')}}" alt="">
                </a>
            </div>
        </div>
    </div>

    <div class="stips-login__wrapper">

        <!-- Logo -->
        <a href="{{url('/')}}"><img src="{{asset('images/logos/logo-login.png')}}" alt=""></a>

        @php
            $request = request();
            $login = $request->old('login_submit');

            $tab1 = true;
            $tab2 = false;
            if( $login !== null ){
                $tab1 = false;
                $tab2 = true;
            }

        @endphp

        <!-- Forms -->
        <div class="stips-login__form">
            <ul class="stips-login__tabs clearfix" role="tablist">
                <li @if($tab1) class="active" @endif><a href="#tab1" data-toggle="tab" role="tab" @if($tab1) aria-selected="true" @else aria-selected="false" @endif ><i class="fa fa-gift"></i>{{__('front.card_activation')}}</a></li>
                <li @if($tab2) class="active" @endif><a href="#tab2" data-toggle="tab" role="tab" @if($tab2) aria-selected="true" @else aria-selected="false" @endif ><i class="fa fa-user"></i>{{__('front.log_in')}}</a></li>
            </ul>
            <div class="tabsct">
                <div id="tab1" role="tabpanel" class="stips-login__tab @if($tab1) active @endif ">

                    <form class="activation" action="http://stips3.loc/profile/">

                        <div class="form-group">
                            <input type="text" 	value="" placeholder="????slo karty" class="form-control" id="Yourcard"
                                   name="Yourcard" required data-bv-remote-message="Bu?? jste nezadali spr??vn?? ????slo nebo karta je??t?? nen?? p??ipravena k aktivaci"
                                   data-bv-stringLength-message="D??rkov?? poukaz obsahuje 16 ????slic">
                        </div>
                        <div class="form-group">
                            <input type="email" 			   value="" placeholder="Email" class="form-control"
                                   id="Youremail" name="Youremail" required
                                   data-bv-remote-message="Email je ji?? registrov??n, pro pokra??ov??n?? p??ihlaste se. ">
                        </div>

                        <div class="form-group">
                            <input type="password" placeholder="Nov?? heslo" class="form-control" id="password" name="user_pass"
                                   required required data-bv-message=" ">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Potvrdit heslo" name="user_pass_confirm" required
                                   data-bv-identical-message="Passwords is not identical">
                        </div>

                        <input type="hidden" name="action" value="formreg_ajax_request">
                        <input type="hidden" name="user_id" value="">
                        <input type="hidden" name="subject" value="STIPS - CARD activation">
                        <input type="hidden" name="update" value="1">
                        <button type="submit" class="btn button">P??ihl??sit</button>

                        <div class="form-group">
                            <p class="login-remember clearfix">
                                <input type="checkbox" class="form-control0" name="terms" required data-bv-message="Mus??te souhlasit">
                                <label>
                                    Potvr??te pros??m souhlas s				<a href="http://stips3.loc/vseobecne-obchodni-podminky/">obchodn??mi podm??nkami</a>
                                    <span style="color: red"> *</span>
                                </label>
                            </p>
                        </div>
                    </form>

                </div>

                <div id="tab2" role="tabpanel" class="stips-login__tab @if($tab2) active @endif ">
                    <form name="loginform" id="loginform" action="{{ route('login') }}" method="post">
                        @csrf

                        <p class="form-group">
                            <label for="login">{{__('front.login')}}</label>
                            <input required type="text" name="login" id="login" class="form-control" value="" size="20" tabindex="10" placeholder="Email" />
                            @error('login')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </p>
                        <p class="form-group">
                            <label for="password">{{__('front.password')}}</label>
                            <input required type="password" name="password" id="password" class="form-control" value="" size="20" tabindex="20" placeholder="********" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </p>
                        <p class="login-remember clearfix">
                            <input name="remember" type="checkbox" id="rememberme" value="forever" tabindex="90" />
                            <label>{{__('front.remember_password')}}</label>
                        </p>
                        <p class="form-group">
                            <input type="submit" name="login_submit" id="login_submit" class="btn button" value="{{__('front.sign_in')}}" tabindex="100" />
                        </p>
                    </form>
                    <p class="stips-login__desc">{{__('front.forget_password')}}? <a href="{{ route('password.request') }}" target="_blank">{{__('front.click_here')}}</a></p>
                </div>

            </div>
        </div>

<?php /*
        <!-- Help section -->
        <div class="stips-login__help">
            <ul>
                <li>
                    <span>1</span>
                    <p class="question">M??m u v??s v??ce voucheru/karet, co s nimi mohu d??lat?</p>
                    <p>V??echny sv?? karty m????ete spravovat jednodu??e pod jedn??m ????tem. Pro aktivaci dal???? nov?? karty se nezapome??te p??ihl??sit do sv??ho ????tu.</p>
                </li>
                <li>
                    <span>2</span>
                    <p class="question">Kdo aktivuje vouchery/karty, j?? nebo daruj??c???</p>
                    <p>Aktivovat vouchery/karty m????e kdokoli. Pozor: ??daje, kter?? budou zad??ny p??i aktivaci, mus?? b??t ??daje o obdarovan??m. Na email, kter?? je uveden p??i registraci, odes??l??me fin??ln?? voucher s informacemi pro rezervaci.</p>
                </li>
                <li>
                    <span>3</span>
                    <p class="question">M??m probl??m s aktivac?? voucheru/karet, co s t??m?</p>
                    <p>D??vody mohou b??t n??sleduj??c??:<br>
                        1. Zkontrolujte si spr??vnost napsan??ch ??daj??<br>
                        2. Platba za d??rek je??t?? nebyla p??ips??na na n???? ????et, voucher/karta tedy je??t?? nen?? platn??.<br>
                        3. Mo??n?? se stala chybka n??kde jinde, pro v??ce informac?? n??s kontaktujte v online podpo??e ??i na <a href="mailto:info@stips.cz">info@stips.cz</a>.
                    </p>
                </li>
                <li>
                    <span>4</span>
                    <p class="question">Je platnost voucheru/karet stejn?? jako platnost z????itk???</p>
                    <p>Platnost karty (a vyu??it?? na n?? nahran??ch z????itk??) je v??dy 1 rok od data zakoupen??. Datum expirace jednotliv??ch karet/voucher?? zjist??te v??dy po p??ihl????en?? do sv??ho ????tu. </p>
                </li>
                <li>
                    <span>5</span>
                    <p class="question">Nena??el jsem odpov???? na sv??j dotaz, kam se mohu obr??tit?</p>
                    <p>Kontaktujte na??eho konzultanta. Kontakty naleznete na na???? str??nce v sekci <a href="/kontakt/" target="_blank">KONTAKT</a>.</p>
                </li>
            </ul>
        </div>

        <!-- Help buttons -->
        <div class="stips-login__help-btn">
            <i class="fa fa-cog"></i>
            <span>Poradit </span>
        </div>
*/ ?>
    </div>
</div>

@include('front.parts.footer_scripts')

</body>

</html>

