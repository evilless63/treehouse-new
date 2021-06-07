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
use App\Models\Article;
// use App\Repositories\ProductRepository;
// use App\Repositories\CategoryRepository;
// use Phpfastcache\Helper\Psr16Adapter;
use App\Models\InstagramPost;
use App\Models\ProductLocalization;
use App\Models\Slider;
use App\Models\Wishlist;

class UserPublicController extends Controller
{


    private $productRepository;
    public $mainmenu_categories;
    public $categories_menu;
    public $company_articles;
    public $blog_articles;
    public $customer_articles;
    public $categories;
    public $wishlist;
    public $cartItemsCount;

    public function __construct()
    {
        parent::__construct();
        // $this->productRepository = app(ProductRepository::class);
        // $this->categoryRepository = app(CategoryRepository::class);
        $this->mainmenu_categories = Category::where('in_header', '1')->get();
        $this->categories_menu = Category::buildMenu($this->categories);
        $this->company_articles = Article::where('purpose', 'about')->get();
        $this->blog_articles = Article::where('purpose', 'blog')->get();
        $this->customer_articles = Article::where('purpose', 'counteragents')->get();

        $this->middleware(function ($request, $next) {
            $wishlistCollection = collect();
            if (Auth::guest() == false) {
                $dbWishlistPositions = Wishlist::where('user_id', Auth::user()->id)->get();
                foreach ($dbWishlistPositions as $position) {
                    $wishlistCollection->push(ColorVariation::where('id', $position->color_variation_id)->first());
                }
                $this->wishlist = $wishlistCollection->unique();
            } else {
                $this->wishlist = $wishlistCollection;
            }
            View::share('wishlist', $this->wishlist);
            return $next($request);
        });

        $this->middleware(function ($request, $next) {
            if (Auth::guest() == false) {
                $this->cartItemsCount = Cart::instance('shopping')->content()->count();
            } else {
                $this->cartItemsCount = 0;
            }
            View::share('cartItemsCount', $this->cartItemsCount);
            return $next($request);
        });

        View::share('mainmenu_categories', $this->mainmenu_categories);
        View::share('categories_menu', $this->categories_menu);
        View::share('company_articles', $this->company_articles);
        View::share('blog_articles', $this->blog_articles);
        View::share('customer_articles', $this->customer_articles);
        View::share('categories', $this->categories);
    }

    public function index()
    {
        // $new_products = Product::where('is_visible','1')->where('is_new', '1')->get();
        $new_products = ColorVariation::where('is_new', '1')->get();
        foreach ($new_products as $k => $v) {
            if (!$v->hasSizesInStock()) {
                $new_products->forget($k);
            }
        }

        $bestseller_products = ColorVariation::where('is_bestseller', '1')->get();
        foreach ($new_products as $k => $v) {
            if (!$v->hasSizesInStock()) {
                $new_products->forget($k);
            }
        }
        // dd(ColorVariation::where('is_bestseller', '1')->with(['sizeVariations' => function ($query) {
        //     $query->where('stock', '>', '0');
        //   }])->get());
        $topLeftBanner = Banner::where('banner_position', 'TOP-LEFT')->first();
        $topRightBanner = Banner::where('banner_position', 'TOP-RIGHT')->first();
        $downLeftBanner = Banner::where('banner_position', 'DOWN_LEFT')->first();
        $downRightBanner = Banner::where('banner_position', 'DOWN_RIGHT')->first();
        $videoBanner = Slider::first();

        // $instagram_posts = InstagramPost::all();
        $instagram_posts = collect([]); //TODO treehouse
        return view('user.public.index', compact('new_products', 'bestseller_products', 'instagram_posts', 'topLeftBanner', 'topRightBanner', 'downLeftBanner', 'downRightBanner', 'videoBanner'));
    }

    public function category($slug = null)
    {

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

        $products_by_category = $category->colorVariations()->get()->shuffle();
        foreach ($products_by_category as $k => $v) {
            if (!$v->hasSizesInStock()) {
                $products_by_category->forget($k);
            }
        }

        $recently_viewed_ids = session()->get('recently_viewed_ids');
        if (!$recently_viewed_ids) {
            $recently_viewed_ids = [];
        }

        session()->put('recently_viewed_ids', $recently_viewed_ids);
        $recently_viewed_products = ColorVariation::whereIn('id', $recently_viewed_ids)->get();
        foreach ($recently_viewed_products as $k => $v) {
            if (!$v->hasSizesInStock()) {
                $recently_viewed_products->forget($k);
            }
        }

        return view('user.public.catalog', compact('all_categories', 'products_by_category', 'recently_viewed_products', 'category_name'));
    }

    public function login()
    {
        return view('user.public.login');
    }

    public function register()
    {
        return view('user.public.register');
    }

    public function product($product_slug, $color_slug)
    {

        $wishlistCollection = collect();
        if (Auth::guest() == false) {
            $dbWishlistPositions = Wishlist::where('user_id', Auth::user()->id)->get();
            foreach ($dbWishlistPositions as $position) {
                $wishlistCollection->push(ColorVariation::where('id', $position->color_variation_id)->first());
            }
            $this->wishlist = $wishlistCollection->unique();
        } else {
            $this->wishlist = $wishlistCollection;
        }
        $wishlist = $this->wishlist;
        $product = Product::where('slug', $product_slug)->first();
        $color = Color::where('slug', $color_slug)->first();
        $colorVariation = ColorVariation::where('product_id', $product->id)->where('color_id', $color->id)->first();
        $productLangFields = $product->localization()
            ->where('lang', LaravelLocalization::getCurrentLocale())
            ->first();

        // $related_products = $this->productRepository->getRelatedProducts($id);
        $related_products = collect();
        foreach ($colorVariation->categories()->get() as $category) {
            foreach ($category->colorVariations()->get() as $colorVariationCat)
                $related_products->push($colorVariationCat);
        }
        $related_products = $related_products->shuffle();
        foreach ($related_products as $k => $v) {
            if (!$v->hasSizesInStock()) {
                $related_products->forget($k);
            }
        }
        // $images = $this->productRepository->getGallery($id);
        $images = $colorVariation->images()->orderBy('sort_order', 'asc')->get(); //TODO treehouse
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
        foreach ($recently_viewed_products as $k => $v) {
            if (!$v->hasSizesInStock()) {
                $recently_viewed_products->forget($k);
            }
        }
        return view('user.public.product', compact('related_products', 'images', 'product', 'recently_viewed_products', 'colorVariation', 'productLangFields', 'wishlist'));
    }

    public function articles()
    {
        return view('user.public.block_cards');
    }

    public function article($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $articleLangFields = $article->localization()
            ->where('lang', LaravelLocalization::getCurrentLocale())
            ->first();
        return view('user.public.blog_page')->with([
            'article' => $article,
            'articleLangFields' => $articleLangFields
        ]);
    }

    public function quickSearch()
    {
        $searchString = request()->search;

        $result = collect();
        $items = ProductLocalization::where('title', 'LIKE', "%{$searchString}%")->get();

        if ($items !== null) {
            foreach ($items as $item) {
                $colorVariationsStack = $item->product->colorVariations->all();
                foreach ($colorVariationsStack as $colorVariation) {
                    $result->push($colorVariation);
                }
            }
        }

        if ($result->count() > 0) {
            $html = view('user.includes.search_result', compact('result'))->render();
        } else {
            $html = view('user.includes.search_result_failed')->render();
        }

        return $html;
    }
}
