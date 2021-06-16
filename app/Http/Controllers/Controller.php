<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use App\Models\Article;
use App\Models\Slider;
use App\Models\Banner;
use App\Models\User;
use App\Models\Order;

use LaravelLocalization;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $categories;
    protected $products;
    protected $locales;
    protected $colors;
    protected $sizes;
    protected $articles;
    protected $sliders;
    protected $banners;
    protected $orders;
    protected $users;
    function __construct()
    {
        $this->categories = Category::orderBy('sort_order','asc')->get();  
        $this->products = Product::orderBy('slug','asc')->get(); 
        $this->locales = LaravelLocalization::getSupportedLanguagesKeys(); 
        $this->colors = Color::all();
        $this->sizes = Size::orderBy('sort_order','asc')->get();
        $this->articles = Article::all();
        $this->sliders = Slider::all();
        $this->banners = Banner::all();
        $this->users = User::all();
        $this->orders = Order::orderBy('created_at', 'ASC')->get();
    }
}
