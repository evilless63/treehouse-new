<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Article;
use App\Models\Wishlist;
use App\Models\ColorVariation;
use Auth;
use View;
use Cart;
use App\Models\User;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use Database\Seeders\ColorVariationSeeder;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

class UserPrivateController extends Controller
{

    private $productRepository;
    public $mainmenu_categories;
    public $wishlist;
    public $company_articles;
    public $blog_articles;
    public $customer_articles;
    public $categories;
    public $cartItemsCount;

    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
        // $this->productRepository = app(ProductRepository::class);
        // $this->categoryRepository = app(CategoryRepository::class);
        $this->mainmenu_categories = Category::where('in_header', '1')->get();
        $this->categories_menu = Category::buildMenu(Category::all());
        $this->company_articles = Article::where('purpose', 'about')->get();
        $this->blog_articles = Article::where('purpose', 'blog')->get();
        $this->customer_articles = Article::where('purpose', 'counteragents')->get();
        $this->categories = Category::all();

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
                $this->cartItemsCount = Cart::instance('shopping')->count();
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

    public function profile()
    {
        return view('user.private.profile');
    }

    public function editProfile()
    {
        return view('user.private.edit-profile')->with([
            'user' => Auth()->user(),
        ]);
    }

    public function orders()
    {
        return view('user.private.orders');
    }

    public function subscribe()
    {
        return view('user.private.subscribe');
    }

    public function wishlist()
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
        return view('user.private.wishlist')->with([
            'wishlist' => $wishlist,
        ]);
    }

    public function resetPassword()
    {
        return view('user.private.reset-password');
    }

    public function createNewPassword()
    {

        $curUser = User::where('id', Auth::user()->id)->first();
        if (Hash::check(request()->old_password, $curUser->password)) {
            if (request()->password == request()->password_confirmation) {
                $curUser->password = Hash::make(request()->password);
                $curUser->save();
                return back()->with(['success', 'Пароль успешно изменен']);
            } else {
                return back()->withErrors('Пароли не совпадают');
            }
        } else {
            return back()->withErrors('Старый пароль указан неверно');
        }
    }

    public function cart()
    {
        $currentDefaultAdress = Auth::user()->addresses()->where('is_default', 1)->first();
        if ($currentDefaultAdress == null) {
            $currentDefaultAdress = new Address();
        }
        return view('user.private.cart')->with([
            'cart' => Cart::instance('shopping')->content(),
            'subtotal' => Cart::instance('shopping')->subtotal(),
            'adress' => $currentDefaultAdress,
            'user' => Auth::user(),
        ]);
    }




    public function makeOrderUnpayed()
    {
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'is_closed' => false,
            'is_paid' => false
        ]);

        $productsInOrder = Cart::instance('shopping')->store($order->id);

        $client = new Client();

        try {
            $response = $client->request('POST', 'http://31.128.156.218:55315/ushp/hs/obmen/get-orders', [
                'auth' => ['Анна', '17382256Ksu@'],
                'body' => response()->json(Cart::instance('shopping')->content(), 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE)
            ]);
        } catch (RequestException $e) {
            Log::info($e);
            return response('ERROR', 500);
        }

        $body = $response->getBody();
        $stringBody = (string) $body;


        Cart::instance('shopping')->destroy();
        return redirect()->back()->with('success', $stringBody);
    }

    public function postCounteragentRegisterTo1c(Request $request)
    {

        $client = new Client();

        try {
            $response = $client->request('POST', 'http://31.128.156.218:55315/ushp/hs/obmen/register-counteragent', [
                'auth' => ['Анна', '17382256Ksu@'],
                'body' => $request
            ]);
        } catch (RequestException $e) {
            Log::info($e);
            return response('ERROR', 500);
        }

        $body = $response->getBody()->read(4);

        return $body;
    }

    public function addToWishList()
    {
        $findedItem = Wishlist::where('user_id', request()->user_id)
            ->where('color_variation_id', request()
                ->color_variation_id)->first();

        if ($findedItem !== null) {
            $findedItem->delete();
        } else {
            $newItem = new Wishlist();
            $newItem->user_id = request()->user_id;
            $newItem->color_variation_id = request()->color_variation_id;
            // $newItem->size_id = request()->size_id;
            $newItem->save();
        }

        return Auth::user() !== null ? Wishlist::where('user_id', Auth::user()->id)->get()->count() : 0;
    }
}
