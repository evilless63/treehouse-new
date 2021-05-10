<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SizeVariation;
use App\Models\ColorVariation;
use Throwable;
use Image;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index')->with([
            'products' => $this->products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $current_product = Product::find($id);

        $lang_field_sets = collect();
        foreach ($this->locales as $locale) {
            $lang_field_sets->add($current_product
                ->localization()
                ->where('lang', $locale)
                ->first());
        }

        return view('admin.product.edit')->with([
            'current_product' => $current_product,
            'categories' => $this->categories,
            'choosed_categories' => $current_product->categories()->get(),
            'lang_field_sets' => $lang_field_sets
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            $product->categories()->detach();
            foreach($request->choosed_categories as $choosed_cat_id) {
                $product->categories()->attach(Category::find($choosed_cat_id));
            }

            foreach ($request->input('localization', []) as $k => $i) {
                $locale = $product->localizations()->where('lang', $k)
                    ->update($i + ['lang' => $k]);
            }

            return redirect()->route('products.index')->with('success', __('adminpanel.action_success'));
        } catch (Throwable $e) {
            report($e);
            return redirect()->route('products.index')->with('error', __('adminpanel.action_error'));
        }
        
        // if($product->update($request->all())) {
        //     return redirect()->route('categories.index')->with('success', __('adminpanel.action_success'));     
        // } else {
        //     return redirect()->route('categories.index')->with('error', __('adminpanel.action_error'));
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeDiscount() {
        $sizeVariation = SizeVariation::where('id', request()->id)->first();
        $sizeVariation->discount = request()->value;
        $sizeVariation->update();
    }

    public function changeIsNewColorVariation() {
        $colorVariation = ColorVariation::where('id', request()->id)->first();
        if(request()->is_new == "true"){
            $colorVariation->is_new = 1;
        } else {
            $colorVariation->is_new = 0;
        }
        
        $colorVariation->update();
    }

    public function changeIsBestsellerColorVariation() {
        $colorVariation = ColorVariation::where('id', request()->id)->first();
        if(request()->is_bestseller == "true"){
            $colorVariation->is_bestseller = 1;
        } else {
            $colorVariation->is_bestseller = 0;
        }
        $colorVariation->update();
    }

    public function changeIsVisibleSizeVariation() {
        $sizeVariation = SizeVariation::where('id', request()->id)->first();
        if(request()->is_visible == "true"){
            $sizeVariation->is_visible = 1;
        } else {
            $sizeVariation->is_visible = 0;
        }
        $sizeVariation->update();
    }
}
