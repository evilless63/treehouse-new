<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Auth;
use View;
use Cart;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use GuzzleHttp\Client;

class UserPrivateController extends Controller
{

    private $productRepository;
    public $mainmenu_categories;
    public $wishlist;


    public function __construct()
    {
        $this->middleware('auth');
        parent::__construct();
        // $this->productRepository = app(ProductRepository::class);
        // $this->categoryRepository = app(CategoryRepository::class);
        $this->mainmenu_categories = Category::where('in_header', '1')->get();
        $this->categories_menu = Category::buildMenu(Category::all());

        if(!Auth::guest()) {
            $this->wishlist = Cart::instance('wishlist')->content();
        } else {
            $this->wishlist = false;
        }

        View::share('mainmenu_categories', $this->mainmenu_categories);
        View::share('wishlist', $this->wishlist);
        View::share('categories_menu', $this->categories_menu);
    }

    public function profile() {
        return view('user.private.profile');
    }

    public function editProfile() {
        return view('user.private.edit-profile');
    }

    public function orders() {
        return view('user.private.orders');
    }

    public function subscribe() {
        return view('user.private.subscribe');
    }

    public function wishlist() {
        return view('user.private.wishlist');
    }

    public function cart() {
        return view('user.private.cart')->with([
            'cart' => Cart::instance('shopping')->content()
        ]);
    }

    public function addToWishList($id) {
//        $product = $this->productRepository->getInfoProduct($id);
        $product = Product::find($id);
        try {
            Auth::user()->attach($product);
        } catch (\Exception $e) {

        }
    }

    public function removeFromWishList($id) {
//        $product = $this->productRepository->getInfoProduct($id);
        $product = Product::find($id);
        try {
            Auth::user()->detach($product);
        } catch (\Exception $e) {

        }
    }


    public function makeOrderUnpayed() {
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

    public function postCounteragentRegisterTo1c(Request $request) {

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
}
