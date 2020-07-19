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


    Route::group(['middleware' => ['admin', 'admin.localize'], 'prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function () {
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
        Route::post('/translate', 'App\Http\Controllers\Admin\TranslateController@translate')->name('translate');
        Route::resource('certificates', 'App\Http\Controllers\Admin\\CertificatesController');
        Route::post('/update_product_image/{id}', 'App\Http\Controllers\Admin\ImageController@updateProductImage')->name('updateProductImage');
        Route::resource('/contents', 'App\Http\Controllers\Admin\\ContentsController');
        Route::get('/shop/send_news_letter', 'App\Http\Controllers\Admin\SendNewsletterController@index')->name('sendNewsLetter.index');
        Route::post('/shop/send_news_letter', 'App\Http\Controllers\Admin\SendNewsletterController@send')->name('sendNewsLetter.send');
        Route::resource('/f-a-q', 'App\Http\Controllers\Admin\\FAQController');
        Route::resource('slider', 'App\Http\Controllers\Admin\\SliderController');
        Route::resource('products', 'App\Http\Controllers\Admin\\ProductsController');
        Route::resource('orders', 'App\Http\Controllers\Admin\\OrdersController');
        Route::get('/locale/{newLocale}', 'App\Http\Controllers\Admin\LocaleController@setLocale');
        Route::resource('our-service', 'App\Http\Controllers\Admin\OurServiceController');
        Route::post('menus/reorder', 'App\Http\Controllers\Admin\MenusController@reorder');
        Route::resource('menus', 'App\Http\Controllers\Admin\MenusController')->only(['index','update','destroy', 'store']);
    });
});

Route::group(['middleware' => ['localize'], 'prefix' => App\Http\Middleware\LocaleMiddleware::getLocale()], function () {
    Route::get('/products', 'App\Http\Controllers\ProductsController@index')->name('public.products.index');
    Route::get('/products/by_category/{categoryId}', 'App\Http\Controllers\ProductsController@byCategory');
    Route::get('/products/{slug}', 'App\Http\Controllers\ProductsController@show')->name('public.products.show');
    Route::get('/', 'App\Http\Controllers\MainController@index')->name('main');
    Route::get('galleries/{id}', 'App\Http\Controllers\GalleriesController@show')->name('public.galleries.show');
    Route::get('/show/{type}/{id}', 'App\Http\Controllers\NewsController@show')->name('public.news.show');
    Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('public.cart.index');
    Route::get('/cart/cart-preview', 'App\Http\Controllers\CartController@cartPreview');

    Route::get('/check-out', 'App\Http\Controllers\CheckoutController@index')->name('check-out.index');
    Route::get('/check-out/summary', 'App\Http\Controllers\CheckoutController@summary')->name('check-out.summary');

    Route::post('/check-out/save-address', 'App\Http\Controllers\CheckoutController@saveAddress')->name('check-out.save-address');
    Route::post('/check-out/save-shipping', 'App\Http\Controllers\CheckoutController@saveShipping')->name('check-out.save-shipping');
    Route::post('/check-out/save-payment', 'App\Http\Controllers\CheckoutController@savePayment')->name('check-out.save-payment');
    Route::post('/check-out/save-order', 'App\Http\Controllers\CheckoutController@saveOrder')->name('check-out.save-order');
    Route::get('/check-out/success', 'App\Http\Controllers\CheckoutController@success')->name('check-out.success');

     Route::get('/blog', 'App\Http\Controllers\NewsController@index')->name('public.news.index');
     Route::get('/show/{type}/{id}', 'App\Http\Controllers\NewsController@show')->name('public.news.show');
    // Route::get('/articles', 'App\Http\Controllers\ArticlesController@index')->name('public.articles.index');
    // Route::get('/articles/{id}', 'App\Http\Controllers\ArticlesController@show')->name('public.articles.show');
    // Route::get('/partners', 'App\Http\Controllers\PartnersController@index')->name('public.partners.index');
    // Route::get('/partners/{id}', 'App\Http\Controllers\PartnersController@show')->name('public.partners.show');
    // Route::get('/treatises', 'App\Http\Controllers\TreatisesController@index')->name('public.treatises.index');
    // Route::get('/treatises/{id}', 'App\Http\Controllers\TreatisesController@show')->name('public.treatises.show');
    // Route::get('/calculations', 'App\Http\Controllers\CalculationsController@index')->name('public.calculations.index');
    // Route::get('/faq', 'App\Http\Controllers\FAQController@index')->name('public.faq.index');
    // Route::get('/products', 'App\Http\Controllers\ProductsController@index')->name('public.products.index');
    // Route::get('/products/{slug}', 'App\Http\Controllers\ProductsController@show')->name('public.products.show');
    // Route::get('/contacts', 'App\Http\Controllers\ContactsController@index')->name('public.contacts.index');
    // Route::get('/about-us', 'App\Http\Controllers\AboutUsController@index')->name('public.about-us.index');
    // Route::get('/paulownia/about', 'App\Http\Controllers\PaulowniaController@index')->name('public.paulownia.about');
    // Route::get('/term-of-sale', 'App\Http\Controllers\TermsOfSaleController@index')->name('public.terms-of-sale.index');
    // Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('public.cart.index');
    // Route::get('/certificates-technical-doc', 'App\Http\Controllers\CertificatesTechnicalDocController@index')->name('public.certificates-technical-doc.index');
    // Route::get('/service', 'App\Http\Controllers\ServiceController@index')->name('public.service.index');
    // Route::get('/consultation-during-the-cultivation', 'App\Http\Controllers\ConsultationDuringTheCultivationController@index')->name('public.consultation-during-the-cultivation.index');
    // Route::get('/analysis-and-personal-design', 'App\Http\Controllers\AnalysisAndPersonalDesignController@index')->name('public.analysis-and-personal-design.index');
    // Route::get('/check-out', 'App\Http\Controllers\CheckoutController@index')->name('check-out.index');
    // Route::get('/check-out/summary', 'App\Http\Controllers\CheckoutController@summary')->name('check-out.summary');
    // Route::post('/check-out/save-address', 'App\Http\Controllers\CheckoutController@saveAddress')->name('check-out.save-address');
    // Route::post('/check-out/save-shipping', 'App\Http\Controllers\CheckoutController@saveShipping')->name('check-out.save-shipping');
    // Route::post('/check-out/save-payment', 'App\Http\Controllers\CheckoutController@savePayment')->name('check-out.save-payment');
    // Route::post('/check-out/save-order', 'App\Http\Controllers\CheckoutController@saveOrder')->name('check-out.save-order');
    // Route::get('/check-out/success', 'App\Http\Controllers\CheckoutController@success')->name('check-out.success');

    // Route::get('/paulownia/type', 'App\Http\Controllers\PaulowniaController@type')->name('public.paulownia.type');
    // Route::get('/paulownia/productsType', 'App\Http\Controllers\PaulowniaController@getProductsType')->name('public.paulownia.productsType');
    // Route::get('/paulownia/planting', 'App\Http\Controllers\PaulowniaController@planting')->name('public.paulownia.planting');

    // Route::get('/wishlist', 'Webkul\Customer\Http\Controllers\WishlistController@index')->defaults('_config', [
    //     'view' => 'public.customer.wishlist.wishlist'
    // ])->name('wishlist.index');
    // Route::get('profile', 'Webkul\Customer\Http\Controllers\CustomerController@index')->defaults('_config', [
    //     'view' => 'public.customer.profile.index'
    // ])->name('profile.index');
    // Route::get('profile/edit', 'Webkul\Customer\Http\Controllers\CustomerController@edit')->defaults('_config', [
    //     'view' => 'public.customer.profile.edit'
    // ])->name('profile.edit');
    // Route::post('profile/edit', 'Webkul\Customer\Http\Controllers\CustomerController@update')->defaults('_config', [
    //     'redirect' => 'profile.index'
    // ])->name('profile.edit');
    // Route::get('orders', 'Webkul\Shop\Http\Controllers\OrderController@index')->defaults('_config', [
    //     'view' => 'public.customer.orders.index'
    // ])->name('public.orders.index');
    // Route::get('orders/view/{id}', 'Webkul\Shop\Http\Controllers\OrderController@view')->defaults('_config', [
    //     'view' => 'public.customer.orders.view'
    // ])->name('public.orders.view');
    // Route::get('addresses', 'Webkul\Customer\Http\Controllers\AddressController@index')->defaults('_config', [
    //     'view' => 'public.customer.address.index'
    // ])->name('address.index');
    // Route::get('addresses/create', 'Webkul\Customer\Http\Controllers\AddressController@create')->defaults('_config', [
    //     'view' => 'public.customer.address.create'
    // ])->name('address.create');
    // Route::post('addresses/create', 'Webkul\Customer\Http\Controllers\AddressController@store')->defaults('_config', [
    //     'view' => 'public.customer.address.address',
    //     'redirect' => 'address.index'
    // ])->name('address.create');
    // Route::get('addresses/edit/{id}', 'Webkul\Customer\Http\Controllers\AddressController@edit')->defaults('_config', [
    //     'view' => 'public.customer.address.edit'
    // ])->name('address.edit');
    // Route::put('addresses/edit/{id}', 'Webkul\Customer\Http\Controllers\AddressController@update')->defaults('_config', [
    //     'redirect' => 'address.index'
    // ])->name('address.edit');
    // Route::post('/write-to-us', 'App\Http\Controllers\WriteToUsController@send')->name('write-to-us');

});

Route::get('/certificate/{code}', 'App\Http\Controllers\CertificateController')->name('certificate');


