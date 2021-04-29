<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\SizeVariation;
use Illuminate\Http\Request;
use LaravelLocalization;
use Cart;

class CartController extends Controller
{
    public function addToCard(Request $request)
    {
       
        $sizeVariation =  SizeVariation::where('id', $request->size_variation_id)->first();

        if($sizeVariation->stock < $request->qty) {
            return redirect()->back()->with('error', __('adminpanel.action_error_no_stock'));
        }

        $product = Product::where('id', $request->product_id)->first();
        $color = Color::where('id', $request->color_id)->first();
        $size = Size::where('id', $sizeVariation->size->id)->first();
        Cart::instance('shopping')->add(
            $product->id,
            $product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) . ", цвет: " 
            . $color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) . ", размер: " 
            . $size->getLocalizeTitle(LaravelLocalization::getCurrentLocale()),
            $request->qty,
            $sizeVariation->price,
            [
                'size' => $size->slug,
                'color' => $color->slug,
                'hex' => $color->hex,
                'code' => $product->code
            ]
        );

        return redirect()->back()->with('success', __('adminpanel.action_success'));
    }

    public function getCartContent(){
        // dd(Cart::instance('shopping')->content());
        // return view('user.cart')->with([
        //     'categories' => $this->categories,
        //     'locales' => $this->locales
        // ]);
    }

    public function destroy() {
        Cart::instance('shopping')->destroy();
        return redirect()->back()->with('success', __('adminpanel.action_success'));
    }
}
