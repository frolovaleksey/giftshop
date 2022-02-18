@php
    /*
     * ---------------------- admin ----------------------
     */

    $menu_admin_items_user = [
        'title' => __('admin.users'),
        'route' => 'users.index',
    ];

    $menu_admin_items_role = [
        'title' => __('admin.roles'),
        'route' => 'roles.index',
    ];

    $menu_admin_items = [
        $menu_admin_items_user,
        $menu_admin_items_role,
    ];

    $menu_admin = [
        'title' => __('admin.admin').' <i class="fa fa-angle-down"></i>',
        'li_attr' => [
            'class' => 'menu-dropdown classic-menu-dropdown'
        ],
        'a_attr'  => [
            'data-hover' => 'megamenu-dropdown',
            'data-close-others' => 'true',
            'data-toggle' => 'dropdown',
        ],
        'sub' => [
            'ul_attr' => [
                'class' => 'dropdown-menu pull-left',
            ],
            'items'   => $menu_admin_items,
        ],
    ];


    $menu_page_items_page = [
        'title' => __('admin.pages'),
        'route' => 'page.index',
    ];

    $menu_page_items_post = [
        'title' => __('admin.posts'),
        'route' => 'post.index',
    ];


    $menu_page_items_category = [
        'title' => __('admin.categories'),
        'route' => 'category.index',
    ];

    $menu_page_items = [
        $menu_page_items_page,
        $menu_page_items_post,
        $menu_page_items_category,
    ];

    $menu_pages = [
        'title' => __('admin.pages').' <i class="fa fa-angle-down"></i>',
        'li_attr' => [
            'class' => 'menu-dropdown classic-menu-dropdown'
        ],
        'a_attr'  => [
            'data-hover' => 'megamenu-dropdown',
            'data-close-others' => 'true',
            'data-toggle' => 'dropdown',
        ],
        'sub' => [
            'ul_attr' => [
                'class' => 'dropdown-menu pull-left',
            ],
            'items'   => $menu_page_items,
        ],
    ];


    $menu_shop_items_product = [
        'title' => __('admin.products'),
        'route' => 'product.index',
    ];

    $menu_shop_items_product_cat = [
        'title' => __('admin.product_cat'),
        'route' => 'product_cat.index',
    ];

    $menu_shop_items_prod_rel_tax = [
        'title' => __('admin.prod_rel_tax'),
        'route' => 'prod_rel_tax.index',
    ];

    $menu_shop_items_feed_category = [
        'title' => __('admin.feed_category'),
        'route' => 'feed_category.index',
    ];




    $menu_shop_items = [
        $menu_shop_items_product,
        $menu_shop_items_product_cat,
        $menu_shop_items_prod_rel_tax,
        $menu_shop_items_feed_category,
    ];

    $menu_shop = [
        'title' => 'Shop <i class="fa fa-angle-down"></i>',
        'li_attr' => [
            'class' => 'menu-dropdown classic-menu-dropdown'
        ],
        'a_attr'  => [
            'data-hover' => 'megamenu-dropdown',
            'data-close-others' => 'true',
            'data-toggle' => 'dropdown',
        ],
        'sub' => [
            'ul_attr' => [
                'class' => 'dropdown-menu pull-left',
            ],
            'items'   => $menu_shop_items,
        ],
    ];



    /*
     * ---------------------- first level ----------------------
     */
    $menu_items[] = $menu_admin;
    $menu_items[] = $menu_pages;
    $menu_items[] = $menu_shop;


@endphp

<ul class="nav navbar-nav">

    {!! HtmlHelper::menu($menu_items) !!}

    @if( config('system')['localisation'] )
    <li>{{get_localisation_link()}}</li>
    @endif

</ul>
