<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Auth;

class WishlistController extends Controller
{
    public function addToWishList($request)
    {

        $wishlist = new Wishlist();
        $wishlist->user_id = Auth::user()->id;
        $wishlist->color_variation_id = $request->color_variation_id;
        $wishlist->size_variation_id = $request->size_variation_id;

        $wishlist->create();

        return Auth::user() !== null ? Wishlist::where('user_id', Auth::user()->id)->get() : 0;

    }

    public function removeFromWishList($request)
    {
        $wishlist = Wishlist::where('user_id', Auth::user()->id)
        ->where('color_variation_id', $request->color_variation_id)
        ->where('size_variation_id', $request->size_variation_id);

        $wishlist->delete();

        return Auth::user() !== null ? Wishlist::where('user_id', Auth::user()->id)->get() : 0;
    }
}
