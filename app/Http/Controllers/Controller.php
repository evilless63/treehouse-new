<?php

namespace App\Http\Controllers;

use App\Models\ColorVariation;
use App\Models\Wishlist;
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

use Illuminate\Http\Request;
use App\Service\PaymentService;
use App\Models\Transaction;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\NotificationEventType;
use App\Enums\PaymentStatusEnum;

use View;
use Auth;
use Cart;
use LaravelLocalization;
use App;
use App\Models\InstagramPost;
use App\Models\ProductLocalization;
use App\Models\Subscription;
use App\Models\Contacts;

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

    private $productRepository;
    public $mainmenu_categories;
    public $categories_menu;
    public $company_articles;
    public $blog_articles;
    public $customer_articles;
    public $wishlist;
    public $cartItemsCount;
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
        $this->mainmenu_categories = Category::where('in_header', '1')->get();
        $this->categories_menu = Category::buildMenu($this->categories);
        $this->company_articles = Article::where('purpose', 'about')->get();
        $this->blog_articles = Article::where('purpose', 'blog')->get();
        $this->customer_articles = Article::where('purpose', 'counteragents')->get();

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

    protected function createWishlist() {
        
    }

}
