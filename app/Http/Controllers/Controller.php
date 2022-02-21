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
use App\Models\Lookbook;
use App\Models\User;
use App\Models\Order;
use App\Models\Contacts;

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
    protected $lookbooks;
    protected $contacts;

    function __construct()
    {
        $this->categories = Category::orderBy('sort_order','asc')->get();  
        $this->products = Product::orderBy('slug','asc')->get(); 
        $this->locales = LaravelLocalization::getSupportedLanguagesKeys(); 
        $this->colors = Color::all();
        $this->sizes = Size::orderBy('sort_order','asc')->get();
        $this->articles = Article::where('custom', 0)->get();
        $this->sliders = Slider::where('is_active', '1')->orderBy('sort_order','asc')->get();
        $this->banners = Banner::orderBy('sort_order','asc')->get();
        $this->users = User::all();
        $this->orders = Order::orderBy('created_at', 'ASC')->get();
        $this->lookbooks = Lookbook::orderBy('sort_order','asc')->get();

        $DBcontacts = Contacts::first();
        if ($DBcontacts){
            $contacts = $DBcontacts;
        } else {
            $contacts = new Contacts();
            $contacts->phone = "";
            $contacts->whatsapp = "";
            $contacts->telegram = "";
            $contacts->mail = "";
        }

        $this->contacts = $contacts;
    }
}
