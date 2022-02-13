<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$localisationActive = false;

if( !function_exists('call_routes')) {
    function call_routes()
    {
        $middleware = ['auth'];

        if(env('MAINTENANCE', true)){
            $middleware[] = 'maintence';
        }

        Route::middleware($middleware)->group(function () {

            Route::get('/', 'WellcomeController@index')->name('wellcome.index');

            // Admin
            Route::group(['prefix' => 'admin'], function () {
                Route::resource('users', 'Admin\UserController');
                Route::group(['prefix' => 'users'], function () {
                    Route::put('set_pass/{id}', 'Admin\UserController@setPass')->name('users_set_pass');
                    Route::put('set_role/{id}', 'Admin\UserController@setRole')->name('users_set_role');
                    Route::post('lock/{id}', 'Admin\UserController@lock')->name('users.lock');
                    Route::post('unlock/{id}', 'Admin\UserController@unlock')->name('users.unlock');
                });

                Route::resource('roles', 'Admin\RoleController');
                Route::put('roles/set_permission/{id}', 'Admin\RoleController@setPermission')->name('role_set_permission');
                Route::put('roles/copy_permission/{id}', 'Admin\RoleController@copyPermission')->name('role.copy_permission');


                Route::post('fields/{type}/{id?}', 'Admin\FieldController@getFields')->name('field.get_fields');
                Route::post('repeaterfields/{type}/{id?}', 'Admin\FieldController@getRepeaterFields')->name('field.get_repeater_fields');
                Route::delete('field/{id}', 'Admin\FieldController@destroyMediaField')->name('field.destroy_media_field');
                Route::get('relation/{model}/{field}/{id?}', 'Admin\FieldController@getRelationOptions')->name('field.get_relation_options');

                Route::resource('page', 'Admin\PageController');
                Route::resource('post', 'Admin\PostController');
                Route::resource('category', 'Admin\CategoryController');
                Route::resource('product_cat', 'Admin\ProductCategoryController');
                Route::resource('prod_rel_tax', 'Admin\ProductRelationTaxonomyController');
                Route::resource('feed_category', 'Admin\FeedCategoryController');

                Route::resource('product', 'Admin\ProductController');
            });

            // Front
            Route::group(['prefix' => 'product'], function () {
                Route::get('{slug}', 'Front\ProductController@show')->name('product.front.show');
            });

            Route::group(['prefix' => 'cart'], function () {
                Route::get('add/{id}', 'Front\CartController@addProduct')->name('cart.add');
                Route::get('delete/{id}', 'Front\CartController@deleteProduct')->name('cart.delete');
            });


            Route::group(['prefix' => 'post'], function () {
                Route::get('{slug}', 'Front\PostController@show')->name('post.front.show');
            });

            Route::group(['prefix' => 'page'], function () {
                Route::get('{slug}', 'Front\PageController@show')->name('page.front.show');
            });


            Route::get('testp', 'TestController@index')->name('test.index');

        });


        Route::get('maintence', function () {

            if(!env('MAINTENANCE', true)){
                return redirect('/');
            }

            return view('maintence', ['title' => 'Сайт на обслуживании'] );
        })->name('maintence');

        Auth::routes();

        Route::fallback(function(){ return response()->view('errors.404', [], 404); });
    }
}



// Localisation functions

if( config('system')['localisation'] ) {
    if (!function_exists('get_localisation_link')) {
        function get_localisation_link()
        {
            $segments = Request::segments();
            $url = Request::url();

            if ($segments[0] == 'en') {
                $url = str_replace('/en', '/ru', $url);
                $link = '<a href="' . $url . '">RU</a>';
            } else {
                $url = str_replace('/ru', '/en', $url);
                $link = '<a href="' . $url . '">EN</a>';
            }
            echo $link;
        }
    }
}else{
    function get_localisation_link()
    {
        $link = '<a href="' . Request::url() . '">Lang</a>';
        echo $link;
    }
}

if( config('system')['localisation'] ){
    $segments = Request::segments();
    if ( isset($segments[0]) && $segments[0] == 'en') {
        App::setLocale('en');
        Route::group(['prefix' => 'en'], function () {
            call_routes();
        });
    }else{
        App::setLocale('ru');
        Route::group(['prefix' => 'ru'], function() {
            call_routes();
        });
    }

    Route::get('/', function () {
        return redirect( '/ru' );
    });
}else{

    // App::setLocale('ru');
    call_routes();
}







