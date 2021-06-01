<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\ColorVariation;
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

        $imagePath = ColorVariation::where('color_id', $color->id)->where('product_id', $product->id)->first()->main_img;

        Cart::instance('shopping')->add(
            $product->id,
            $product->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) . ", " . __('userpanel.color') . ": " 
            . $color->getLocalizeTitle(LaravelLocalization::getCurrentLocale()) . ", " . __('userpanel.size') . ": " 
            . $size->getLocalizeTitle(LaravelLocalization::getCurrentLocale()),
            $request->qty,
            $sizeVariation->price,
            [
                'size' => $size->slug,
                'color' => $color->slug,
                'product_slug' => $product->slug,
                'hex' => $color->hex,
                'code' => $product->code,
                'image' => $imagePath,
            ]
        );
        return Cart::instance('shopping')->content();
    }

    public function getCartContent(){
        // dd(Cart::instance('shopping')->content());
        // return view('user.cart')->with([
        //     'categories' => $this->categories,
        //     'locales' => $this->locales
        // ]);
    }

    public function changeCount() {
        $currentRow = Cart::instance('shopping')->get(request()->row_id);
        if($currentRow->qty + request()->count == 0) {
            return;
        }
        Cart::instance('shopping')->update(request()->row_id, [
            'qty' => $currentRow->qty + request()->count
        ]);


        return [
            'qty' => Cart::instance('shopping')->get(request()->row_id)->qty, 
            'total' => Cart::instance('shopping')->get(request()->row_id)->total,
            'subtotal' => Cart::instance('shopping')->subtotal()
        ];
    }

    public function destroy() {
        Cart::instance('shopping')->destroy();
        // return redirect()->back()->with('success', __('adminpanel.action_success'));
    }

    public function removeItem() {
        Cart::instance('shopping')->remove(request()->row_id);
        return [
            'subtotal' => Cart::instance('shopping')->subtotal()
        ];
    }
}
