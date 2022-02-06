<!-- desktop header menu start -->
<div class="menu-box hide-mobile hide-tablet" id="navbar-middle">
    <div class="hold-header">

        <!-- search desktop start -->
        <div class="search-wrap">
            <div class="dgwt-wcas-search-wrapp dgwt-wcas-has-submit woocommerce js-dgwt-wcas-layout-classic dgwt-wcas-layout-classic js-dgwt-wcas-mobile-overlay-disabled">
                <form class="dgwt-wcas-search-form" role="search"
                      action="https://stips.cz/" method="get">
                    <div class="dgwt-wcas-sf-wrapp">
                        <label class="screen-reader-text"
                               for="dgwt-wcas-search-input-107b">Products
                            search</label>

                        <input id="dgwt-wcas-search-input-107b"
                               type="search" class="dgwt-wcas-search-input"
                               name="s" placeholder="Hledat zážitek..."
                               autocomplete="off">
                        <div class="dgwt-wcas-preloader"
                             style="right: 40px;"></div>

                        <button type="submit" name="dgwt-wcas-search-submit"
                                class="dgwt-wcas-search-submit">Hledat
                        </button>

                        <input type="hidden" name="post_type"
                               value="product">
                        <input type="hidden" name="dgwt_wcas" value="1">

                    </div>
                </form>
            </div>
        </div>
        <!-- search desktop end -->

        <div class="menu-main-container">
            <ul id="menu-production_menu" class="menu">
                <li id="menu-item-24860"
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-24860 item-level-0 firstItem">
                    <a href="https://stips.cz/recenze/">Recenze</a></li>
                <li id="menu-item-81876"
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-81876 item-level-0">
                    <a href="https://stips.cz/jak-na-to/">Jak to funguje</a>
                </li>
                <li id="menu-item-24862"
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-24862 item-level-0">
                    <a href="https://stips.cz/kontakt/">Kontakt</a></li>
                <li id="menu-item-24863"
                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-24863 item-level-0 lastItem">
                    <a href="https://stips.cz/vse-o-nakupu/">Vše o
                        nákupu</a></li>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        <div class="nav-right-wrap hide-mobile" id="navbar-right">
            <ul class="main-header-nav-right">
                <li class="firstItem">
                    <a class="button"
                       href="https://stips.cz/aktivovat/#register">Aktivovat
                        kartu</a>
                </li>

                <li>
                    <a href="https://stips.cz/aktivovat/"><i
                            class="far fa-user-circle grey"></i><span
                            class="txt">Přihlásit se</span></a>
                </li>

                <li class="lastItem">
                    <a>
                                                <span data-toggle="collapse" data-target="#cartlist" class="cartnav" aria-expanded="true">
                                                    <i class="fas fa-shopping-cart grey"></i>
                                                    <span id="cart-item-count-bubble">1</span><span class="txt">Košík</span>
                                                </span>
                    </a>
                    <?php include('card_list.php'); ?>
                </li>
            </ul>
        </div>

    </div>
</div>
<!-- desktop header menu end -->
