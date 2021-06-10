<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ColorVariation;
use App\Models\Promocode;
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
            'promocodes' => Promocode::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promocodes.create');
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
        try {
            $promocode = new Promocode();
            $promocode->save($data);

            foreach ($request->cat_ids as $id) {
                $category = Category::where('id', $id)->first();
                if ($category !== null) {
                    $promocode->categories()->attach($category);
                }
            }

            foreach ($request->color_variations_ids as $id) {
                $colorVatiation = ColorVariation::where('id', $id)->first();
                if ($colorVatiation !== null) {
                    $promocode->colorVariations()->attach($colorVatiation);
                }
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
            $promocode->update($request->data);
            $promocode->categories()->detach();
            $promocode->colorVariations()->detach();

            foreach ($request->cat_ids as $id) {
                $category = Category::where('id', $id)->first();
                if ($category !== null) {
                    $promocode->categories()->attach($category);
                }
            }

            foreach ($request->color_variations_ids as $id) {
                $colorVatiation = ColorVariation::where('id', $id)->first();
                if ($colorVatiation !== null) {
                    $promocode->colorVariations()->attach($colorVatiation);
                }
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
