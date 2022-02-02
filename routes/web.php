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

if( !function_exists('call_routes')) {
    function call_routes()
    {
        $middleware = ['auth'];

        if(env('MAINTENANCE', true)){
            $middleware[] = 'maintence';
        }

        Route::middleware($middleware)->group(function () {

            Route::get('/', 'WellcomeController@index')->name('wellcome.index');

            Route::group(['prefix' => 'admin'], function () {
                Route::resource('users', 'UserController');
                Route::put('users/set_pass/{id}', 'UserController@setPass')->name('users_set_pass');
                Route::put('users/set_role/{id}', 'UserController@setRole')->name('users_set_role');
                Route::post('users/lock/{id}', 'UserController@lock')->name('users.lock');
                Route::post('users/unlock/{id}', 'UserController@unlock')->name('users.unlock');

                Route::resource('roles', 'RoleController');
                Route::put('roles/set_permission/{id}', 'RoleController@setPermission')->name('role_set_permission');
                Route::put('roles/copy_permission/{id}', 'RoleController@copyPermission')->name('role.copy_permission');


                Route::post('fields/{type}/{id?}', 'FieldController@getFields')->name('field.get_fields');
                Route::delete('field/{id}', 'FieldController@destroyMediaField')->name('field.destroy_media_field');

                Route::resource('page', 'PageController');
                Route::resource('post', 'PostController');
                Route::resource('category', 'CategoryController');

            });

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
if( !function_exists('get_localisation_link')) {
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

/*
Route::get('/ru', function () {
    //return view('auth.login');
    return redirect(config('system.start_page') );
});
*/

