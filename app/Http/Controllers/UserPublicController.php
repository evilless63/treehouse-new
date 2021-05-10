<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ColorVariation;
use App\Models\Banner;
use App\Models\Color;
use View;
use Auth;
use Cart;
use LaravelLocalization;
use App;
// use App\Repositories\ProductRepository;
// use App\Repositories\CategoryRepository;
// use Phpfastcache\Helper\Psr16Adapter;
use App\Models\InstagramPost;

class UserPublicController extends Controller
{


    private $productRepository;
    public $mainmenu_categories;
    public $categories_menu;
    public $wishlist;

    public function __construct()
    {
        parent::__construct();
        // $this->productRepository = app(ProductRepository::class);
        // $this->categoryRepository = app(CategoryRepository::class);
        $this->mainmenu_categories = Category::where('in_header', '1')->get();
        $this->categories_menu = Category::buildMenu(Category::all());

        if (!Auth::guest()) {
            $this->wishlist = Cart::instance('wishlist')->content();
        } else {
            $this->wishlist = false;
        }

        View::share('mainmenu_categories', $this->mainmenu_categories);
        View::share('wishlist', $this->wishlist);
        View::share('categories_menu', $this->categories_menu);
    }

    public function index()
    {
        // $new_products = Product::where('is_visible','1')->where('is_new', '1')->get();
        $new_products = ColorVariation::where('is_new', '1')->get();
        $bestseller_products = ColorVariation::where('is_bestseller', '1')->get();
        $topLeftBanner = Banner::where('banner_position', 'TOP-LEFT')->first();
        $topRightBanner = Banner::where('banner_position', 'TOP-RIGHT')->first();
        $downLeftBanner = Banner::where('banner_position', 'DOWN_LEFT')->first();
        $downRightBanner = Banner::where('banner_position', 'DOWN_RIGHT')->first();
        // $instagram_posts = InstagramPost::all();
        $instagram_posts = collect([]); //TODO treehouse
        return view('user.public.index', compact('new_products', 'bestseller_products', 'instagram_posts', 'topLeftBanner', 'topRightBanner', 'downLeftBanner', 'downRightBanner'));
    }

    public function category($slug = null)
    {

        $wishlist = false;

        if ($slug == null) {
            $category = Category::where('id', 1)->first();
        } else {
            $category = Category::where('slug', $slug)->first();
        }

        if ($category <> null) {
            $category_name = $category->getLocalizeTitle(LaravelLocalization::getCurrentLocale());
        } else {
            $category_name = __('userpanel.default_category_name');
        }

        $all_categories = Category::all();
        // if(!$id) {
        //     // $products_by_category = $this->productRepository->getProductsByCategoryId(1);
        //     $products_by_category = $category->products();
        // } else {
        //     // $products_by_category = $this->productRepository->getProductsByCategoryId($id);
        // }
        $products_by_category = $category->products()->get();
        $collectionColorsVariations = collect();
        foreach ($products_by_category as $product) {
            foreach ($product->colorVariations as $colorVariation) {
                $collectionColorsVariations->push($colorVariation);
            }
        }

        $products_by_category = $collectionColorsVariations->shuffle();

        $recently_viewed_ids = session()->get('recently_viewed_ids');
        if (!$recently_viewed_ids) {
            $recently_viewed_ids = [];
        }

        // array_push($recently_viewed_ids, $id);
        session()->put('recently_viewed_ids', $recently_viewed_ids);
        $recently_viewed_products = ColorVariation::whereIn('id', $recently_viewed_ids)->get();

        return view('user.public.catalog', compact('all_categories', 'wishlist', 'products_by_category', 'recently_viewed_products', 'category_name'));
    }

    public function login()
    {
        return view('user.public.login');
    }

    public function product($product_slug, $color_slug)
    {
        // dd(geoip(request()->ip()));

        // if(!Auth::guest()) {
        //     $wishlist = Auth::user()->wishlists();
        // } else {
        $wishlist = false;
        // }
        $product = Product::where('slug', $product_slug)->first();
        $color = Color::where('slug', $color_slug)->first();
        $colorVariation = ColorVariation::where('product_id', $product->id)->where('color_id', $color->id)->first();
        $productLangFields = $product->localization()
        ->where('lang', LaravelLocalization::getCurrentLocale())
        ->first();

        // $related_products = $this->productRepository->getRelatedProducts($id);
        $related_products = []; //TODO treehouse
        // $images = $this->productRepository->getGallery($id);
        $images = $colorVariation->images; //TODO treehouse
        // $product = Product::find($id);
        // $product = Product::where('slug', $product_slug)->first();

        $recently_viewed_ids = session()->get('recently_viewed_ids');
        if (!$recently_viewed_ids) {
            $recently_viewed_ids = [];
        }

        // array_push($recently_viewed_ids, $id);
        array_push($recently_viewed_ids, $colorVariation->id);
        session()->put('recently_viewed_ids', $recently_viewed_ids);
        $recently_viewed_products = ColorVariation::whereIn('id', $recently_viewed_ids)->get();

        return view('user.public.product', compact('wishlist', 'related_products', 'images', 'product', 'recently_viewed_products', 'colorVariation', 'productLangFields'));
    }

    public function articles()
    {
        return view('user.public.block_cards');
    }

    public function article()
    {
        return view('user.public.blog_page');
    }
}
