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
                            <input type="text" 	value="" placeholder="Číslo karty" class="form-control" id="Yourcard"
                                   name="Yourcard" required data-bv-remote-message="Buď jste nezadali správné číslo nebo karta ještě není připravena k aktivaci"
                                   data-bv-stringLength-message="Dárkový poukaz obsahuje 16 číslic">
                        </div>
                        <div class="form-group">
                            <input type="email" 			   value="" placeholder="Email" class="form-control"
                                   id="Youremail" name="Youremail" required
                                   data-bv-remote-message="Email je již registrován, pro pokračování přihlaste se. ">
                        </div>

                        <div class="form-group">
                            <input type="password" placeholder="Nové heslo" class="form-control" id="password" name="user_pass"
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
                        <button type="submit" class="btn button">Přihlásit</button>

                        <div class="form-group">
                            <p class="login-remember clearfix">
                                <input type="checkbox" class="form-control0" name="terms" required data-bv-message="Musíte souhlasit">
                                <label>
                                    Potvrďte prosím souhlas s				<a href="http://stips3.loc/vseobecne-obchodni-podminky/">obchodními podmínkami</a>
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
                    <p class="question">Mám u vás více voucheru/karet, co s nimi mohu dělat?</p>
                    <p>Všechny své karty můžete spravovat jednoduše pod jedním účtem. Pro aktivaci další nové karty se nezapomeňte přihlásit do svého účtu.</p>
                </li>
                <li>
                    <span>2</span>
                    <p class="question">Kdo aktivuje vouchery/karty, já nebo darující?</p>
                    <p>Aktivovat vouchery/karty může kdokoli. Pozor: údaje, které budou zadány při aktivaci, musí být údaje o obdarovaném. Na email, který je uveden při registraci, odesíláme finální voucher s informacemi pro rezervaci.</p>
                </li>
                <li>
                    <span>3</span>
                    <p class="question">Mám problém s aktivací voucheru/karet, co s tím?</p>
                    <p>Důvody mohou být následující:<br>
                        1. Zkontrolujte si správnost napsaných údajů<br>
                        2. Platba za dárek ještě nebyla připsána na náš účet, voucher/karta tedy ještě není platná.<br>
                        3. Možná se stala chybka někde jinde, pro více informací nás kontaktujte v online podpoře či na <a href="mailto:info@stips.cz">info@stips.cz</a>.
                    </p>
                </li>
                <li>
                    <span>4</span>
                    <p class="question">Je platnost voucheru/karet stejná jako platnost zážitků?</p>
                    <p>Platnost karty (a využití na ní nahraných zážitků) je vždy 1 rok od data zakoupení. Datum expirace jednotlivých karet/voucherů zjistíte vždy po přihlášení do svého účtu. </p>
                </li>
                <li>
                    <span>5</span>
                    <p class="question">Nenašel jsem odpověď na svůj dotaz, kam se mohu obrátit?</p>
                    <p>Kontaktujte našeho konzultanta. Kontakty naleznete na naší stránce v sekci <a href="/kontakt/" target="_blank">KONTAKT</a>.</p>
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

