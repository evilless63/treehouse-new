<?php

namespace App\Http\Controllers;

use App\Models\Lookbook;
use Illuminate\Http\Request;

class LookbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.lookbook.index')->with([
            'lookbooks' => $this->lookbooks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lookbook.create')->with([
            'locales' => $this->locales
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
        $data = $request->all();
        $data['slug'] = str_slug(request()->get('localization')['ru']['title']);

        if ($request->hasFile('big_img')) {
            $folder = 'lookbooks' . '/' . $data['slug'];

            $time = time();
            $imageName = $time . '_' . $request->file('big_img')->getClientOriginalName();
            $request->big_img->move(public_path('images/' . $folder),  $imageName);

            $data['big_img'] = 'images/' . $folder . '/' .  $imageName;
            
        }

        if ($request->hasFile('small_img')) {
            $folder = 'lookbooks' . '/' . $data['slug'];

            $time = time();
            $imageName = $time . '_' . $request->file('small_img')->getClientOriginalName();
            $request->small_img->move(public_path('images/' . $folder),  $imageName);

            $data['small_img'] = 'images/' . $folder . '/' .  $imageName;
            
        }

        if ($request->hasFile('category_img')) {
            $folder = 'lookbooks' . '/' . $data['slug'];

            $time = time();
            $imageName = $time . '_' . $request->file('category_img')->getClientOriginalName();
            $request->category_img->move(public_path('images/' . $folder),  $imageName);

            $data['category_img'] = 'images/' . $folder . '/' .  $imageName;
            
        }

        $lookbook = Lookbook::create($data);
        foreach ($request->input('localization', []) as $k => $i) {
            $local = $lookbook->localizations()
                ->create($i + ['lang' => $k]);
        }

        if ($lookbook) {
            return redirect()->route('lookbooks.index')->with('success', __('adminpanel.action_success'));
        } else {
            return redirect()->route('lookbooks.index')->with('error', __('adminpanel.action_error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lookbook  $lookbook
     * @return \Illuminate\Http\Response
     */
    public function show(Lookbook $lookbook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lookbook  $lookbook
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $current_lookbook = Lookbook::find($id);

        $lang_field_sets = collect();
        foreach ($this->locales as $locale) {
            $lang_field_sets->add($current_lookbook
                ->localization()
                ->where('lang', $locale)
                ->first());
        }

        return view('admin.lookbook.edit')->with([
            'current_lookbook' => $current_lookbook,
            'lang_field_sets' => $lang_field_sets
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lookbook  $lookbook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lookbook = Lookbook::find($id);
        $data = $request->all();
        if ($request->hasFile('big_img')) {
            $folder = 'lookbooks' . '/' . $lookbook->slug;

            $time = time();
            $imageName = $time . '_' . $request->file('big_img')->getClientOriginalName();
            $request->big_img->move(public_path('images/' . $folder),  $imageName);
            $data['big_img'] = 'images/' . $folder . '/' .  $imageName;
            
        }

        if ($request->hasFile('small_img')) {
            $folder = 'lookbooks' . '/' . $lookbook->slug;

            $time = time();
            $imageName = $time . '_' . $request->file('small_img')->getClientOriginalName();
            $request->small_img->move(public_path('images/' . $folder),  $imageName);
            $data['small_img'] = 'images/' . $folder . '/' .  $imageName;
            
        }

        if ($request->hasFile('category_img')) {
            $folder = 'lookbooks' . '/' . $lookbook->slug;

            $time = time();
            $imageName = $time . '_' . $request->file('category_img')->getClientOriginalName();
            $request->category_img->move(public_path('images/' . $folder),  $imageName);
            $data['category_img'] = 'images/' . $folder . '/' .  $imageName;
            
        }

        $haveBeenUpdated = $lookbook->update($data);
        foreach ($request->input('localization', []) as $k => $i) {
            $locale = $lookbook->localizations()->where('lang', $k)
                ->update($i + ['lang' => $k]);
        }
        if ($haveBeenUpdated) {
            return redirect()->route('lookbooks.index')->with('success', __('adminpanel.action_success'));
        } else {
            return redirect()->route('lookbooks.index')->with('error', __('adminpanel.action_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lookbook  $lookbook
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $current_lookbook = Lookbook::find($id);
        $current_lookbook->banners()->detach();
        $current_lookbook->delete();   
        return redirect()->route('lookbooks.index')->with('success', __('adminpanel.action_success'));
    }
}
