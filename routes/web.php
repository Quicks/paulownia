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

// Route::get('/php', function () {phpinfo();}); //to check server php configuration

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
            Route::get('/factura/generate/{id}', 'Webkul\Admin\Http\Controllers\Sales\InvoiceController@generateDocument')->name('factura');
            Route::view('/welcome', 'admin.dashboard')->name('admin.welcome');
            Route::resource('news', 'App\Http\Controllers\Admin\\NewsController');
            Route::resource('galleries', 'App\Http\Controllers\Admin\\GalleriesController');
            Route::resource('treatises', 'App\Http\Controllers\Admin\\TreatisesController');
            Route::resource('offices', 'App\Http\Controllers\Admin\\OfficesController');
            Route::resource('partners', 'App\Http\Controllers\Admin\\PartnersController');
            Route::resource('articles', 'App\Http\Controllers\Admin\\ArticlesController');
            Route::get('/image_add', 'App\Http\Controllers\Admin\ImageController@createImage');
            Route::get('/image_crop/{id}', 'App\Http\Controllers\Admin\ImageController@cropImage');
            Route::post('/image_save/{id}', 'App\Http\Controllers\Admin\ImageController@storeImage');
            Route::post('/image_save_crop/{id}', 'App\Http\Controllers\Admin\ImageController@storeCrop');
            Route::delete('/image_del/{imageId}', 'App\Http\Controllers\Admin\ImageController@delete');
            Route::get('/file_add', 'App\Http\Controllers\Admin\FilesController@createFile');
            Route::post('/file_save/{id}', 'App\Http\Controllers\Admin\FilesController@storeFile');
            Route::delete('/file_del/{fileId}', 'App\Http\Controllers\Admin\FilesController@delete');
            Route::get('/images', 'App\Http\Controllers\Admin\ImageController@index')->name('images.index');
        });
    });
        Route::group(['middleware' => ['locale'], 'prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function () {
            Route::get('/news', 'App\Http\Controllers\NewsController@index')->name('public.news.index');
            Route::get('/news/{id}', 'App\Http\Controllers\NewsController@show')->name('public.news.show');
            Route::get('/articles', 'App\Http\Controllers\ArticlesController@index')->name('public.articles.index');
            Route::get('/articles/{id}', 'App\Http\Controllers\ArticlesController@show')->name('public.articles.show');
            Route::get('/galleries', 'App\Http\Controllers\GalleriesController@index')->name('public.galleries.index');
            Route::get('/galleries/{id}', 'App\Http\Controllers\GalleriesController@show')->name('public.galleries.show');
            Route::get('/partners', 'App\Http\Controllers\PartnersController@index')->name('public.partners.index');
            Route::get('/partners/{id}', 'App\Http\Controllers\PartnersController@show')->name('public.partners.show');
            Route::get('/treatises', 'App\Http\Controllers\TreatisesController@index')->name('public.treatises.index');
            Route::get('/treatises/{id}', 'App\Http\Controllers\TreatisesController@show')->name('public.treatises.show');
        });

});



