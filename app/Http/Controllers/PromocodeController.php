<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ColorVariation;
use App\Models\Promocode;
use App\Models\Product;
use Error;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.promocodes.index')->with([
            'promocodes' => Promocode::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promocodes.create')->with([
            'categories' => Category::all(),
            'products' => ColorVariation::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->all();

        if($request->has('promocode_newer_ends')) {
            $data['to'] = '2122-02-03T01:07';
        }

        if($data['min_subtotal'] == null) {
            $data['min_subtotal'] = 0;
        }

        if($request->has('without_sales')) {
            $data['without_sales'] = '1';
        } else {
            $data['without_sales'] = '0';
        }
 
        try {

            $promocode = Promocode::create($data);
            
            switch ($request->rule_type) {
                case 'every_product_from_category' : 
                    foreach ($request->categories as $id) {
                        $category = Category::where('id', $id)->first();
                        if ($category !== null) {
                            $promocode->categories()->attach($category);
                        }
                    }
                    break;
                case 'choosed_products' : 
                    foreach ($request->products as $id) {
                        $product = ColorVariation::where('id', $id)->first();
                        if ($product !== null) {
                            $promocode->colorVariations()->attach($product);
                        }
                    }
                    break;
            }

            return redirect()->route('promocodes.index')->with('success', __('adminpanel.action_success'));
        } catch (Error $e) {

            return redirect()->route('promocodes.index')->with('error', __('adminpanel.action_error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function show(Promocode $promocode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function edit(Promocode $promocode)
    {
        return view('admin.promocodes.edit')->with([
            'promocode' => $promocode,
            'categories' => Category::all(),
            'products' => ColorVariations::all(),
            'categories_ids' => $promocode->categories()->get()->pluck('id')->all(),
            'products_ids' => $promocode->colorVariations()->get()->pluck('id')->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promocode $promocode)
    {
        try {
            
            $promocode->categories()->detach();
            $promocode->colorVariatons()->detach();

            $data = $request->all();

            if($request->has('promocode_newer_ends')) {
                $data['to'] = '2122-02-03T01:07';
            }

            if($data['min_subtotal'] == null) {
                $data['min_subtotal'] = 0;
            }

            if($request->has('without_sales')) {
                $data['without_sales'] = '1';
            } else {
                $data['without_sales'] = '0';
            }
    
            try {

                $promocode->update($data);;
                
                switch ($request->rule_type) {
                    case 'every_product_from_category' : 
                        foreach ($request->categories as $id) {
                            $category = Category::where('id', $id)->first();
                            if ($category !== null) {
                                $promocode->categories()->attach($category);
                            }
                        }
                        break;
                    case 'choosed_products' : 
                        foreach ($request->products as $id) {
                            $product = ColorVariation::where('id', $id)->first();
                            if ($product !== null) {
                                $promocode->colorVariations()->attach($product);
                            }
                        }
                        break;
                }

                return redirect()->route('promocodes.index')->with('success', __('adminpanel.action_success'));
            } catch (Error $e) {

                return redirect()->route('promocodes.index')->with('error', __('adminpanel.action_error'));
            }
        } catch (Error $e) {

            return redirect()->route('promocodes.index')->with('error', __('adminpanel.action_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promocode  $promocode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promocode $promocode)
    {
        try {
            $promocode->categories()->detach();
            $promocode->colorVariations()->detach();
            $promocode->delete();
            return redirect()->route('promocodes.index')->with('success', __('adminpanel.action_success'));
        } catch (Error $e) {

            return redirect()->route('promocodes.index')->with('error', __('adminpanel.action_error'));
        }
    }
}
