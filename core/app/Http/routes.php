<?php
/**
 * View Composer
 */

/**
 * Route admin Back End
 */

Route::group([
    'namespace' => 'Admin', 'middleware' => 'roles', 'roles' => ['admin']],
    function () {
        Route::get('admin', [
            'as' => 'admin.getIndex',
            'uses' => 'PageController@getIndex'
        ]);

        Route::resource('admin/posts', 'PostController');
        Route::paginate('admin/posts',['as'=>'admin.posts.index', 'uses' => 'PostController@index']);
        Route::resource('admin/users', 'UserController');
        Route::resource('admin/cates', 'CateController');
    });

/**
 * Route Auth
 */
Route::group(['namespace' => 'Auth'], function () {

    Route::post('dang-ky', [
        'uses' => 'AuthController@postRegister',
        'as' => 'postRegister'
    ]);

    Route::get('dang-ky', [
        'uses' => 'AuthController@getRegister',
        'as' => 'getRegister'
    ]);

    Route::get('dang-nhap', [
        'as' => 'getLogin',
        'uses' => 'AuthController@getLogin'
    ]);

    Route::post('dang-nhap', [
        'uses' => 'AuthController@postLogin',
        'as' => 'postLogin'
    ]);

    Route::get('dang-xuat', [
        'uses' => 'AuthController@getLogout',
        'as' => 'getLogout'
    ]);

    Route::get('password/reset/{token?}', 'PasswordController@showResetForm');
    Route::post('password/email', 'PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'PasswordController@reset');
});

/**
 * Route Front End
 */

Route::group(['namespace' => 'Front'],
    function () {
        Route::get('/', function () {
            return redirect()->route('getIndex');
        });

        Route::group(['middleware' => 'roles', 'roles' => ['Admin', 'User']],
            function () {

                Route::get('/thanh-vien/{name}/{id}', [
                    'as' => 'member.index',
                    'uses' => 'UserController@index'
                ])->where(['name'], '[\w\d\-\_]+');

                Route::get('/thanh-vien/{name}/{id}/sua-thong-tin', [
                    'as' => 'member.edit',
                    'uses' => 'UserController@edit'
                ])->where(['name'], '[\w\d\-\_]+');

                Route::put('/thanh-vien/{name}/{id}/sua-thong-tin', [
                    'as' => 'member.update',
                    'uses' => 'UserController@update'
                ])->where(['name'], '[\w\d\-\_]+');

                Route::get('/thanh-vien/{name}/{id}/doi-mat-khau', [
                    'as' => 'member.changePass',
                    'uses' => 'UserController@changePass'
                ])->where(['name'],'[\w\d\-\_]+');

                Route::put('/thanh-vien/{name}/{id}/doi-mat-khau', [
                    'as' => 'member.updatePass',
                    'uses' => 'UserController@updatePass'
                ])->where(['name'],'[\w\d\-\_]+');

            });

        Route::paginate('/blog', [
            'as' => 'getIndex', 'uses' => 'PageController@getIndex'
        ]);
        Route::paginate('/blog/{cateSlug}', [
            'as' => 'blog.laptrinh', 'uses' => 'PageController@getCate'
        ]);
        Route::get('blog/{cate}/{slug}', [
            'as' => 'blog.single',
            'uses' => 'PageController@getSingle'
        ])->where(['cate', 'slug'], '[\w\d\-\_]+');
    });
