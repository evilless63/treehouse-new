<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;
use Auth;
use View;
use App\Models\Wishlist;
use Cart;

class AddressController extends Controller
{

    public $categories;
    public $wishlist;
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
        View::share('wishlist', $this->wishlist);
        View::share('categories_menu', $this->categories_menu);
        View::share('company_articles', $this->company_articles);
        View::share('blog_articles', $this->blog_articles);
        View::share('customer_articles', $this->customer_articles);
        View::share('categories', $this->categories);
        View::share('contacts', $this->contacts);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $adresses = Auth::user()->addresses()->get();
        return view('user.private.adresses')->with([
            'adresses' => $adresses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.private.create-adress');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if (Address::all()->count() == 0) {
            $data['is_default'] = 1;
        }
        $data['user_id'] = Auth::user()->id;

        $adress = Address::create($data);

        return redirect()->route('user.adresses')->with(['success', 'Адрес успешно добавлен']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adress = Address::where('id', $id)->first();
        return view('user.private.edit-adress')->with([
            'adress' => $adress,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $adress = Address::where('id', $id)->first();
        $data = $request->all();

        if ($request->has('is_default')) {
            $data['is_default'] = 1;
            $currentDefaultAdress = Auth::user()->addresses()->where('is_default', 1)->first();
            if ($currentDefaultAdress != null) {
                $currentDefaultAdress->is_default = 0;
                $currentDefaultAdress->save();
            }
        } else {
            $data['is_default'] = 0;
        }

        $adress->update($data);
        return redirect()->route('user.adresses')->with(['success', 'Адрес успешно обновлен']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adress = Address::where('id', $id)->first();
        if ($adress->is_default == 1) {
            $currentDefaultAdress = Auth::user()->addresses()->first();
            if ($currentDefaultAdress != null) {
                $currentDefaultAdress->is_default = 1;
                $currentDefaultAdress->save();
            }
        }
        $adress->delete();
        return redirect()->route('user.adresses')->with(['success', 'Адрес успешно удален']);
    }
}
