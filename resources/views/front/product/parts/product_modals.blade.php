@isMobile
<div class="col-md-12 product-content hide-mobile hide-tablet">
    <div class="product_top_nav">
        <ul class="list-items">

            <li class="firstItem">
                <div class="gift-box-image-single-product" data-toggle="modal" data-target=".gift-box-image-modal">
                    <i class="far fa-calendar-check single-gift-box-svg"></i> {{__('product.online_rservation')}}
                </div>
                <div class="modal fade gift-box-image-modal" tabindex="-1" role="dialog" aria-labelledby="k-nakupu-vzdy-neco-navic">
                    <div class="modal-dialog modal-vyhody" role="document">
                        <div class="modal-content-2">
                            <h4>{{__('product.online_rservation')}}</h4>
                            <div class="modal-content-obsah">
                                {!! __('prod_content.online_rservation') !!}
                                <div class="modal-content-obsah"></div>
                                <div class="modal-footer-obsah">
                                    <a href="/darky">{{__('product.gift_catalog')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li>
                <div class="gift-box-image-single-product" data-toggle="modal" data-target=".gift-box-image-modal-ceny-drzime">
                    <i class="fas fa-hand-holding-heart single-gift-box-svg"></i>{{__('product.gift_card')}}
                </div>
                <div class="modal fade gift-box-image-modal-ceny-drzime" tabindex="-1" role="dialog" aria-labelledby="ceny-drzime-bez-navyseni">
                    <div class="modal-dialog modal-vyhody" role="document">
                        <div class="modal-content-2">
                            <h4>{{__('product.gift_card')}}</h4>
                            <div class="modal-content-obsah">
                                {!! __('prod_content.gift_card') !!}
                                <div class="modal-content-obsah"></div>
                                <div class="modal-footer-obsah">
                                    <a href="/darky">{{__('product.gift_catalog')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li>
                <div class="gift-box-image-single-product" data-toggle="modal" data-target=".gift-box-image-modal-10-darku">
                    <i class="far fa-address-card single-gift-box-svg"></i>{{__('product.e_voucher')}}
                </div>
                <div class="modal fade gift-box-image-modal-10-darku" tabindex="-1" role="dialog" aria-labelledby="10-darku-v-jednom">
                    <div class="modal-dialog modal-vyhody" role="document">
                        <div class="modal-content-2">
                            <h4>{{__('product.e_voucher')}}</h4>
                            <div class="modal-content-obsah">
                                {!!  __('prod_content.e_voucher') !!}
                                <div class="modal-content-obsah"></div>
                                <div class="modal-footer-obsah">
                                    <a href="/darky">{{__('product.gift_catalog')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li>
                <div class="gift-box-image-single-product" data-toggle="modal" data-target=".darkove-baleni-zdarma">
                    <i class="fas fa-gifts single-gift-box-svg"></i> {{__('product.gift_package')}}
                </div>
                <div class="modal fade darkove-baleni-zdarma" tabindex="-1" role="dialog" aria-labelledby="10-darku-v-jednom">
                    <div class="modal-dialog modal-vyhody" role="document">
                        <div class="modal-content-2">
                            <h4>{{__('product.gift_package')}}</h4>
                            <div class="modal-content-obsah">
                                {!!  __('prod_content.gift_package') !!}
                                <div class="modal-content-obsah"></div>
                                <div class="modal-footer-obsah">
                                    <a href="/darky">{{__('product.gift_catalog')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li>
                <div class="gift-box-image-single-product" data-toggle="modal" data-target=".gift-box-image-modal-lehka-vymena-darku">
                    <i class="fas fa-sync single-gift-box-svg"></i> {{__('product.easy_gift_exchange')}}
                </div>
                <div class="modal fade gift-box-image-modal-lehka-vymena-darku" tabindex="-1" role="dialog" aria-labelledby="lehka-vymena-darku">
                    <div class="modal-dialog modal-vyhody" role="document">
                        <div class="modal-content-2">
                            <h4>{{__('product.easy_gift_exchange')}}</h4>
                            <div class="modal-content-obsah">
                                {!!  __('prod_content.easy_gift_exchange') !!}
                                <div class="modal-content-obsah-3">
                                    <img src="{{url('/')}}/assets/images/lehka-vymena-darku.jpg" alt="lehka-vymena-darku">
                                </div>
                                <div class="modal-footer-obsah">
                                    <a href="/darky">{{__('product.gift_catalog')}}</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li>
                <div class="gift-box-image-single-product" data-toggle="modal" data-target=".gift-box-image-modal-overeno-nami">
                    <i class="far fa-thumbs-up single-gift-box-svg"></i> {{__('product.every_experience_verified')}}
                </div>
                <div class="modal fade gift-box-image-modal-overeno-nami" tabindex="-1" role="dialog" aria-labelledby="overeno-nami">
                    <div class="modal-dialog modal-vyhody" role="document">
                        <div class="modal-content-2">
                            <h4>{{__('product.every_experience_verified')}}</h4>
                            <div class="modal-content-obsah">
                                {!!  __('prod_content.every_experience_verified') !!}
                                <div class="modal-content-obsah-3">
                                    <img src='{{url('/')}}/assets/images/overeno-nami.jpg' alt="overeno-nami">
                                </div>
                                <div class="modal-footer-obsah">
                                    <a href="/darky">{{__('product.gift_catalog')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

        </ul>
        <div class="clear"></div>
    </div>
</div>
@endif
