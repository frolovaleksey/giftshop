@include('front.parts.head')

<body id="body" class="scroll_block theme-stips @if($webItem->getItemType() == 'product' )single-product @endif ">

<div id="st-container" class="st-container">
    <div class="st-pusher" style="min-height: 927px;">
        <div class="st-content">
            <div class="st-content-inner">
                <div class="page-wrapper fixNav-enabled">

                    <div class="header-wrapper">
                        @include('front.parts.header')
                    </div>

                    @yield('content')

                </div> <!-- st-container -->

                @include('front.parts.footer')

            </div>
        </div>
    </div>
</div>

@include('front.parts.footer_scripts')

</body>
</html>

