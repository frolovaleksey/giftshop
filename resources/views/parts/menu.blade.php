@php
    /*
     * ---------------------- admin ----------------------
     */

    $menu_admin_items_user = [
        'title' => __('user.users'),
        'route' => 'users.index',
    ];

    $menu_admin_items_role = [
        'title' => __('role.roles'),
        'route' => 'roles.index',
    ];

    $menu_admin_items = [
        $menu_admin_items_user,
        $menu_admin_items_role,
    ];

    $menu_admin = [
        'title' => __('global.admin').' <i class="fa fa-angle-down"></i>',
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
        'title' => __('page.pages'),
        'route' => 'page.index',
    ];

    $menu_page_items_post = [
        'title' => __('post.posts'),
        'route' => 'post.index',
    ];


    $menu_page_items_category = [
        'title' => __('category.categories'),
        'route' => 'category.index',
    ];

    $menu_page_items = [
        $menu_page_items_page,
        $menu_page_items_post,
        $menu_page_items_category,
    ];

    $menu_pages = [
        'title' => __('page.pages').' <i class="fa fa-angle-down"></i>',
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



    /*
     * ---------------------- first level ----------------------
     */
    $menu_items[] = $menu_admin;
    $menu_items[] = $menu_pages;


@endphp

<ul class="nav navbar-nav">

    {!! HtmlHelper::menu($menu_items) !!}

    <li>{{get_localisation_link()}}</li>

</ul>
