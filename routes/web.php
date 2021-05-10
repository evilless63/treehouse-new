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
use App\Models\Order;

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

Route::prefix('admin')->middleware(['auth'])->group(function () {
    App::setLocale('ru');
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
    ]);

    Route::any('/categories/{id}/replicate', [CategoryController::class, 'replicate'])->name('categories.replicate');
    Route::any('/articles/{id}/replicate', [ArticleController::class, 'replicate'])->name('articles.replicate');

    Route::post('/api/v1/importdata/colors', [ImportController::class, 'ImportColorsFrom1c']);
    Route::post('/api/v1/importdata/sizes', [ImportController::class, 'ImportSizesFrom1c']);
    Route::post('/api/v1/importdata/products', [ImportController::class, 'ImportProductsFrom1c']);

    Route::post('/image/upload', [UploadController::class, 'imageUpload']);
    Route::post('/image/delete', [UploadController::class, 'imageDelete']);
    Route::post('/image/delete-from-gallery', [UploadController::class, 'deleteImageFromGallery']);
    Route::post('/product/change-discount', [ProductController::class, 'changeDiscount']);   
});

Route::middleware('auth')->group(function () {
    Route::post('/card/add', [CartController::class, 'addToCard'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'getCartContent'])->name('cart.content');
    Route::delete('/cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/user/cabinet', [UserPrivateController::class, 'profile'])->name('user.profile');
    Route::get('/user/edit', [UserPrivateController::class, 'editProfile'])->name('user.edit_profile');
    Route::get('/user/orders', [UserPrivateController::class, 'orders'])->name('user.orders');
    Route::get('/user/subscribe', [UserPrivateController::class, 'subscribe'])->name('user.subscribe');
    Route::get('/user/wishlist', [UserPrivateController::class, 'wishlist'])->name('user.wishlist');
    Route::get('/cart', [UserPrivateController::class, 'cart'])->name('user.cart');
    Route::post('/makeorder', [UserPrivateController::class, 'makeOrderUnpayed'])->name('makeorder');
});

Route::get('/', [UserPublicController::class, 'index'])->name('user.index');
Route::get('/shop/{category?}', [UserPublicController::class, 'category'])->name('user.category');
Route::get('/login', [UserPublicController::class, 'login'])->name('login');
Route::get('/shop/{product}/{color}', [UserPublicController::class, 'product'])->name('user.product');
Route::get('/articles', [UserPublicController::class, 'articles'])->name('user.articles');
Route::get('/articles/{slug}', [UserPublicController::class, 'article'])->name('user.article');
Route::get('/info/{slug}', [UserPublicController::class, 'info'])->name('user.info');
Route::get('/home', [UserPublicController::class, 'index'])->name('home');

Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
