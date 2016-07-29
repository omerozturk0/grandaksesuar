<?php

/*
 * Route permission izinleri
 * */
 include_once 'routes_permissions.php';

/*
 * Back-end yönlendirme kısımları
 * */

// Genel İşlemler
Route::get('elfinder', '\Barryvdh\Elfinder\ElfinderController@showCKeditor4');
Route::get('download/images/{img}', 'Backend\GeneralController@download');

// Kullanıcı İşlemleri
Route::controller('admin/auth', 'Backend\Auth\AuthController');
Route::get('password/reset/{token}', 'Backend\Auth\AuthController@getReset');
Route::post('password/reset', 'Backend\Auth\AuthController@postReset');

// Panel İşlemleri
Route::group([
    'middleware' => ['admin.auth', 'permission:login-admin-panel'],
    'prefix' => 'admin',
], function () {

    // Modüller
    Route::resource('contact', 'Backend\ContactController', ['except' => ['show', 'index']]);
    Route::resource('user', 'Backend\UserController', ['except' => 'show']);
    Route::resource('page', 'Backend\PageController', ['except' => 'show']);
    Route::resource('customergroup', 'Backend\CustomerGroupController', ['except' => 'show']);
    Route::resource('attribute', 'Backend\AttributeController', ['except' => 'show']);
    Route::get('attribute/{attribute}/child', ['as' => 'admin.attribute.child', 'uses' => 'Backend\AttributeController@getChild']);
    Route::resource('category', 'Backend\CategoryController', ['except' => 'show']);
    Route::get('category/{category}/child', ['as' => 'admin.category.child', 'uses' => 'Backend\CategoryController@getChild']);
    Route::resource('static', 'Backend\StaticController', ['except' => 'show']);
    Route::resource('product', 'Backend\ProductController', ['except' => 'show']);
    Route::post('role/{id}/attach/permissions', 'Backend\RoleController@attachPermissions');
    Route::resource('role', 'Backend\RoleController', ['except' => 'show']);
    Route::resource('permission', 'Backend\PermissionController', ['except' => 'show']);
    Route::resource('menu', 'Backend\MenuController', ['except' => 'show']);
    Route::get('menu/{menu}/child', ['as' => 'admin.menu.child', 'uses' => 'Backend\MenuController@getChild']);

    // Genel
    Route::controller('{module}/{id}/gallery', 'Backend\GalleryController');
    Route::controller('settings', 'Backend\SettingsController');
    Route::controller('/', 'Backend\PanelController');

});

Route::group([
    'middleware' => ['localize'],
    'prefix' => LaravelLocalization::setLocale(),
], function () {

    Route::get('/', 'Frontend\SiteController@index');
    Route::get('{slug}', 'Frontend\SiteController@routeBySlug');
    Route::get('control/deneme', function (\App\Helpers\NavigationBar $nav) {
        return $nav->makeNavBar();
    });

});
