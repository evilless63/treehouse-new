<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserPrivateController;
use App\Http\Controllers\UserPublicController;
use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\SizeVariationController;
use App\Http\Controllers\ImageGalleryController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\PromocodeController;
use App\Http\Controllers\LookbookController;
use App\Models\Order;
use App\Http\Controllers\Subscription;

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

// Route::get('/', function () {
//     return view('welcome');
// });

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return redirect('/admin/categories');
});

// Route::any('/api/v1/post-cats', 'App\Http\Controllers\ServiceController@postRequestCategoryFrom1c');
// Route::any('/api/v1/post-prods', 'App\Http\Controllers\ServiceController@postRequestProductFrom1c');

// Route::get('/refereshcapcha', 'App\Http\Controllers\HelperController@refereshCapcha');
// Route::get('/getdemodata', 'App\Http\Controllers\DemoController@getDemoData');
// Route::get('/register', 'App\Http\Controllers\DemoController@registerNewCounteragent');
// Route::get('/policy', 'App\Http\Controllers\DemoController@policy')->name('policy');

// Route::post('/make-order', 'App\Http\Controllers\DemoController@postOrderTo1c')->name('make-order');
// Route::post('/register-counteragent', 'App\Http\Controllers\DemoController@postCounteragentRegisterTo1c')->name('register-counteragent');

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::resources([
        'categories' => CategoryController::class,
        'products' => ProductController::class,
        'colors' => ColorController::class,
        'sizes' => SizeController::class,
        'articles' => ArticleController::class,
        'sliders' => SliderController::class,
        'banners' => BannerController::class,
        'orders' => OrderController::class,
        'users' => UserController::class,
        'promocodes' => PromocodeController::class,
        'subscriptions' => SubscriptionController::class,
        'lookbooks' => LookbookController::class,
    ]);

    Route::any('/categories/{id}/replicate', [CategoryController::class, 'replicate'])->name('categories.replicate');
    Route::any('/articles/{id}/replicate', [ArticleController::class, 'replicate'])->name('articles.replicate');

    Route::post('/image/upload', [UploadController::class, 'imageUpload']);
    Route::post('/image/delete', [UploadController::class, 'imageDelete']);
    Route::post('/main-image/upload', [UploadController::class, 'mainImageUpload']);
    Route::post('/image/delete-from-gallery', [UploadController::class, 'deleteImageFromGallery']);

    Route::post('/product/change-discount', [ProductController::class, 'changeDiscount']);
    Route::post('/product/change-is-visible', [ProductController::class, 'changeIsVisibleSizeVariation']);
    Route::post('/product/change-is-new', [ProductController::class, 'changeIsNewColorVariation']);
    Route::post('/product/change-is-bestseller', [ProductController::class, 'changeIsBestsellerColorVariation']);

    Route::post('/user/change-is-active', [UserController::class, 'toggleIsActive']);
    Route::post('/user/change-is-admin', [UserController::class, 'toggleIsAdmin']);

    Route::post('/size-variation/update-order', [SizeVariationController::class, 'updateOrder']);
    Route::post('/gallery/update-order', [ImageGalleryController::class, 'updateOrder']);
    Route::post('/category/update-order', [CategoryController::class, 'updateOrder']);
    Route::post('/size/update-order', [SizeController::class, 'updateOrder']);
    Route::post('/banner/update-order', [BannerController::class, 'updateOrder']);
    Route::post('/slider/update-order', [SliderController::class, 'updateOrder']);
    Route::post('/lookbook/update-order', [LookbookController::class, 'updateOrder']);

    Route::post('/ckeditor/image_upload', [CKEditorController::class, 'upload'])->name('upload');
    Route::get('/export/make-and-download-subscribers', [ExcelController::class, 'makeAndDownloadExcelFile'])->name('export.subscribers');
});

Route::any('/api/v1/importdata/colors', [ImportController::class, 'ImportColorsFrom1c']);
Route::any('/api/v1/importdata/sizes', [ImportController::class, 'ImportSizesFrom1c']);
Route::any('/api/v1/importdata/products', [ImportController::class, 'ImportProductsFrom1c']);

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    App::setLocale(LaravelLocalization::setLocale());
    Route::middleware('auth')->group(function () {
        Route::post('/card/add', [CartController::class, 'addToCard'])->name('cart.add');
        Route::post('/card/change-count', [CartController::class, 'changeCount'])->name('cart.add');
        Route::post('/card/remove-item', [CartController::class, 'removeItem'])->name('cart.removeItem');
        Route::get('/cart', [CartController::class, 'getCartContent'])->name('cart.content');
        Route::delete('/cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
        Route::get('/user/cabinet', [UserPrivateController::class, 'profile'])->name('user.profile');
        Route::get('/user/edit', [UserPrivateController::class, 'editProfile'])->name('user.edit_profile');
        Route::patch('/user/update_profile/{id}', [UserController::class, 'update'])->name('user.update_profile');
        Route::get('/user/orders', [UserPrivateController::class, 'orders'])->name('user.orders');
        Route::get('/user/subscribe', [UserPrivateController::class, 'subscribe'])->name('user.subscribe');

        Route::get('/user/adresses', [AddressController::class, 'index'])->name('user.adresses');
        Route::get('/user/create-adress', [AddressController::class, 'create'])->name('user.create-adress');
        Route::post('/user/create-adress', [AddressController::class, 'store'])->name('user.store-adress');
        Route::get('/user/edit-adress/{id}', [AddressController::class, 'edit'])->name('user.edit-adress');
        Route::patch('/user/edit-adress/{id}', [AddressController::class, 'update'])->name('user.update-adress');
        Route::delete('/user/delete-adress/{id}', [AddressController::class, 'destroy'])->name('user.delete-adress');


        Route::get('/user/wishlist', [UserPrivateController::class, 'wishlist'])->name('user.wishlist');
        Route::get('/cart', [UserPrivateController::class, 'cart'])->name('user.cart');
        Route::post('/makeorder', [UserPrivateController::class, 'makeOrderUnpayed'])->name('makeorder');
        Route::post('/add-to-wishlist', [UserPrivateController::class, 'addToWishList'])->name('user.add-to-withlist');
        Route::post('/remove-from-wishlist', [UserPrivateController::class, 'removeFromWishList'])->name('user.remove-from-withlist');
        Route::get('/reset-password', [UserPrivateController::class, 'resetPassword'])->name('reset-password');
        Route::post('/reset-password', [UserPrivateController::class, 'createNewPassword'])->name('password.reset');
    });

    Route::get('/', [UserPublicController::class, 'index'])->name('user.index');
    Route::get('/shop/{category?}', [UserPublicController::class, 'category'])->name('user.category');
    Route::get('/login', [UserPublicController::class, 'login'])->name('login');
    Route::get('/register', [UserPublicController::class, 'register'])->name('register');
    Route::get('/shop/{product}/{color}', [UserPublicController::class, 'product'])->name('user.product');
    Route::get('/articles', [UserPublicController::class, 'articles'])->name('user.articles');
    Route::get('/articles/{slug}', [UserPublicController::class, 'article'])->name('user.article');
    Route::get('/info/{slug}', [UserPublicController::class, 'info'])->name('user.info');
    Route::get('/home', [UserPublicController::class, 'index'])->name('home');
    Route::post('/quick-search', [UserPublicController::class, 'quickSearch'])->name('quick-search');
    Route::post('/filter-by-size', [UserPublicController::class, 'filterCategoryProductsBySize'])->name('filter-by-size');
    Route::post('/subscribe', [UserPublicController::class, 'Subscribe'])->name('filter-by-size');
    Route::get('/lookbook/item/{id}', [UserPublicController::class, 'lookbook'])->name('user.lookbook');   
    Route::get('/lookbook', [UserPublicController::class, 'lookbooks'])->name('user.lookbooks'); 
    Route::get('/lookbook/all-wear/{id}', [UserPublicController::class, 'lookbookAllWear'])->name('user.lookbooks-allwear');
});
