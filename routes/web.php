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

Route::group(['middleware' => ['web']], function () {
    Route::prefix('admin')->group(function () {

        Route::get('/', 'Webkul\Admin\Http\Controllers\Controller@redirectToLogin');

        // Login Routes
        Route::get('/login', 'Webkul\User\Http\Controllers\SessionController@create')->defaults('_config', [
            'view' => 'admin::users.sessions.create'
        ])->name('admin.session.create');

        //login post route to admin auth controller
        Route::post('/login', 'Webkul\User\Http\Controllers\SessionController@store')->defaults('_config', [
            'redirect' => 'admin.welcome'
        ])->name('admin.session.store');

        // Forget Password Routes
        Route::get('/forget-password', 'Webkul\User\Http\Controllers\ForgetPasswordController@create')->defaults('_config', [
            'view' => 'admin::users.forget-password.create'
        ])->name('admin.forget-password.create');

        Route::post('/forget-password', 'Webkul\User\Http\Controllers\ForgetPasswordController@store')->name('admin.forget-password.store');

        // Reset Password Routes
        Route::get('/reset-password/{token}', 'Webkul\User\Http\Controllers\ResetPasswordController@create')->defaults('_config', [
            'view' => 'admin::users.reset-password.create'
        ])->name('admin.reset-password.create');

        Route::post('/reset-password', 'Webkul\User\Http\Controllers\ResetPasswordController@store')->defaults('_config', [
            'redirect' => 'admin.dashboard.index'
        ])->name('admin.reset-password.store');


        Route::group(['middleware' => ['admin']], function () {
            Route::view('/welcome', 'admin.dashboard')->name('admin.welcome');
            Route::resource('news', 'App\Http\Controllers\Admin\\NewsController');
            Route::resource('galleries', 'App\Http\Controllers\Admin\\GalleriesController');
            Route::resource('treatises', 'App\Http\Controllers\Admin\\TreatisesController');
            Route::get('/galleries/image_add/{galleryId}', 
                'App\Http\Controllers\Admin\ImageController@createGalleryImage');
            Route::post('/galleries/image_save/{galleryId}', 
                'App\Http\Controllers\Admin\ImageController@storeGalleryImage');
            Route::delete('/galleries/image_del/{imageId}', 'App\Http\Controllers\Admin\ImageController@delete');
            Route::get('/news/image_add/{newsId}',
                'App\Http\Controllers\Admin\ImageController@createNewsImage');
            Route::post('/news/image_save/{newsId}',
                'App\Http\Controllers\Admin\ImageController@storeNewsImage');
            Route::delete('/news/image_del/{imageId}', 'App\Http\Controllers\Admin\ImageController@delete');
        });
    });
});
