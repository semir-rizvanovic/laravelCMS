<?php



Route::get('/', function () {return view('pages.index');});
//auth & user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/password/change', 'HomeController@changePassword')->name('password.change');
Route::post('/password/update', 'HomeController@updatePassword')->name('password.update');
Route::get('/user/logout', 'HomeController@Logout')->name('user.logout');

//admin=======
Route::get('admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
        // Password Reset Routes...
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/reset/password/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('admin/update/reset', 'Admin\ResetPasswordController@reset')->name('admin.reset.update');
Route::get('/admin/Change/Password','AdminController@ChangePassword')->name('admin.password.change');
Route::post('/admin/password/update','AdminController@Update_pass')->name('admin.password.update'); 
Route::get('admin/logout', 'AdminController@logout')->name('admin.logout');


        /// Administracija ///
// Slajder
Route::get('admin/slajder', 'admin\SlajderController@slajder')->name('slajder');
Route::post('admin/store/slajder', 'admin\SlajderController@storeSlajder')->name('store.slajder');
Route::get('delete/slajder/{id}', 'admin\SlajderController@deleteSlajder');
Route::get('edit/slajder/{id}', 'admin\SlajderController@editSlajder');
Route::post('update/slajder/{id}', 'admin\SlajderController@updateSlajder');

// Ikonice
Route::get('admin/ikonice', 'admin\IkoniceController@ikonice')->name('ikonice');
Route::post('admin/store/ikonice', 'admin\IkoniceController@storeIkonice')->name('store.ikonice');
Route::get('delete/ikonice/{id}', 'admin\IkoniceController@deleteIkonice');
Route::get('edit/ikonice/{id}', 'admin\IkoniceController@editIkonice');
Route::post('update/ikonice/{id}', 'admin\IkoniceController@updateIkonice');


// Kategorije
Route::get('admin/categories', 'admin\category\CategoryController@category')->name('categories');
Route::post('admin/store/category', 'admin\category\CategoryController@storecategory')->name('store.category');
Route::get('delete/category/{id}', 'admin\category\CategoryController@deletecategory');
Route::get('edit/category/{id}', 'admin\category\CategoryController@editcategory');
Route::post('update/category/{id}', 'admin\category\CategoryController@updatecategory');

// Brendovi
Route::get('admin/brands', 'admin\category\BrandController@brand')->name('brands');
Route::post('admin/store/brand', 'admin\category\BrandController@storebrand')->name('store.brand');
Route::get('delete/brand/{id}', 'admin\category\BrandController@deletebrand');
Route::get('edit/brand/{id}', 'admin\category\BrandController@editbrand');
Route::post('update/brand/{id}', 'admin\category\BrandController@updatebrand');

// Podkategorije
Route::get('admin/sub.categories', 'admin\category\SubCategoryController@subcategories')->name('sub.categories');
Route::post('admin/store/subcategory', 'admin\category\SubCategoryController@storesubcategory')->name('store.subcategory');
Route::get('delete/subcategory/{id}', 'admin\category\SubCategoryController@deletesubcat');
Route::get('edit/subcategory/{id}', 'admin\category\SubCategoryController@editsubcat');
Route::post('update/subcategory/{id}', 'admin\category\SubCategoryController@updatesubcat');
// Podkategorije + AJAX
Route::get('get/subcategory/{category_id}', 'admin\ProductController@getsubcat');


// Kuponi
Route::get('admin/sub/coupon', 'admin\category\CouponController@coupon')->name('admin.coupon');
Route::post('admin/store/coupon', 'admin\category\CouponController@storecoupon')->name('store.coupon');
Route::get('delete/coupon/{id}', 'admin\category\CouponController@deletecoupon');
Route::get('edit/coupon/{id}', 'admin\category\CouponController@editcoupon');
Route::post('update/coupon/{id}', 'admin\category\CouponController@updatecoupon');

// Newsletter
Route::get('admin/sub/newsletter', 'admin\category\NewsletterController@newsletter')->name('admin.newsletter');
Route::get('delete/newsletter/{id}', 'admin\category\NewsletterController@deletenewsletter');
Route::get('edit/newsletter/{id}', 'admin\category\NewsletterController@editnewsletter');
Route::post('update/newsletter/{id}', 'admin\category\NewsletterController@updatenewsletter');

// Proizvodi
Route::get('admin/products/all', 'admin\ProductController@index')->name('all.product');
Route::get('admin/products/add', 'admin\ProductController@create')->name('add.product');
Route::post('admin/store/product', 'admin\ProductController@store')->name('store.product');
Route::get('delete/product/{id}', 'admin\ProductController@deleteproduct');
Route::get('inactive/product/{id}', 'admin\ProductController@inactive');
Route::get('active/product/{id}', 'admin\ProductController@active');
Route::get('view/product/{id}', 'admin\ProductController@viewProduct');
Route::get('edit/product/{id}', 'admin\ProductController@editProduct');
Route::post('update/product/withoutphoto/{id}', 'admin\ProductController@updateProductWithoutPhoto');
Route::post('update/product/photo/{id}', 'admin\ProductController@updateProductPhotos');

// Vijesti Kategorije
Route::get('vijesti/kategorije/lista', 'admin\PostController@kategorijeVijesti')->name('kategorije.vijesti');
Route::post('admin/store/vijesti', 'admin\PostController@kategorijeVijestiDodaj')->name('store.vijesti.kategorija');
Route::get('delete/vijestiKategorije/{id}', 'admin\PostController@deleteVijestiKategorija');
Route::get('edit/vijestiKategorije/{id}', 'admin\PostController@editVijestiKategorija');
Route::post('update/vijestiKategorije/{id}', 'admin\PostController@updateVijestiKat');

// Vijesti 
Route::get('admin/add/news', 'admin\PostController@create')->name('add.news');
Route::get('admin/all/news', 'admin\PostController@index')->name('all.news');
Route::post('admin/store/news', 'admin\PostController@store')->name('store.news');
Route::get('delete/news/{id}', 'admin\PostController@deleteNews');
Route::get('edit/news/{id}', 'admin\PostController@editNews');
Route::post('update/news/{id}', 'admin\PostController@updateNews');




// Frontend All Routes
Route::post('store/newsletter', 'Frontcontroller@storenewsletter')->name('store.newsletter');
Route::post('quickview/{id}', 'Frontcontroller@quickView');

// Lista želja
Route::get('add/wishlist/{id}', 'WishlistController@addWishlist');
// Dodaj u korpu
Route::get('add/to/cart/{id}', 'CartController@addToCart');
Route::get('check', 'CartController@check');
Route::get('proizvod/detalji/{id}/{poduct_name}', 'ProductController@ProductView');

Route::post('cart/product/add/{id}', 'ProductController@AddCart');


// Korpa
Route::get('product/cart/', 'CartController@showCart')->name('show.cart');
Route::get('remove/cart/{rowId}', 'CartController@removeCart');
Route::post('update/korpa/proizvod/', 'CartController@UpdateCart')->name('update.korpa');
