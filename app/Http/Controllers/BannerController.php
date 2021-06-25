<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Lookbook;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banner.index')->with([
            'banners' => $this->banners
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create')->with([
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

        if ($request->hasFile('img_path')) {
            $folder = 'banners' . '/' . $data['slug'];

            $time = time();
            $imageName = $time . '_' . $request->file('img_path')->getClientOriginalName();
            $request->img_path->move(public_path('images/' . $folder),  $imageName);

            $data['img_path'] = 'images/' . $folder . '/' .  $imageName;
            
        }

        if ($request->hasFile('img_path_2')) {
            $folder = 'banners' . '/' . $data['slug'];

            $time = time();
            $imageName = $time . '_' . $request->file('img_path_2')->getClientOriginalName();
            $request->img_path_2->move(public_path('images/' . $folder),  $imageName);

            $data['img_path_2'] = 'images/' . $folder . '/' .  $imageName;    
        }

        $banner = Banner::create($data);
        foreach ($request->input('localization', []) as $k => $i) {
            $local = $banner->localizations()
                ->create($i + ['lang' => $k]);
        }

        if ($banner) {
            return redirect()->route('banners.index')->with('success', __('adminpanel.action_success'));
        } else {
            return redirect()->route('banners.index')->with('error', __('adminpanel.action_error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $current_banner = Banner::find($id);

        $lang_field_sets = collect();
        foreach ($this->locales as $locale) {
            $lang_field_sets->add($current_banner
                ->localization()
                ->where('lang', $locale)
                ->first());
        }

        return view('admin.banner.edit')->with([
            'current_banner' => $current_banner,
            'lang_field_sets' => $lang_field_sets,
            'lookbooks' => $this->lookbooks
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        $data = $request->all();

        if ($request->hasFile('img_path')) {
            $folder = 'banners' . '/' . $banner->slug;

            $time = time();
            $imageName = $time . '_' . $request->file('img_path')->getClientOriginalName();
            $request->img_path->move(public_path('images/' . $folder),  $imageName);
            $data['img_path'] = 'images/' . $folder . '/' .  $imageName;       
        }

        if ($request->hasFile('img_path_2')) {
            $folder = 'banners' . '/' . $banner->slug;

            $time = time();
            $imageName = $time . '_' . $request->file('img_path_2')->getClientOriginalName();
            $request->img_path_2->move(public_path('images/' . $folder),  $imageName);
            $data['img_path_2'] = 'images/' . $folder . '/' .  $imageName;       
        }

        $haveBeenUpdated = $banner->update($data);

        foreach ($request->input('choosed_lookbooks', []) as $k => $i) {
            Banner::where('id', $k)->first()->lookbooks()->detach();
            Banner::where('id', $k)->first()->lookbooks()->attach(Lookbook::find($i));
        }

        foreach ($request->input('localization', []) as $k => $i) {
            $locale = $banner->localizations()->where('lang', $k)
                ->update($i + ['lang' => $k]);
        }
        if ($haveBeenUpdated) {
            return redirect()->route('banners.index')->with('success', __('adminpanel.action_success'));
        } else {
            return redirect()->route('banners.index')->with('error', __('adminpanel.action_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $current_banner = Banner::find($id);
        $current_banner->colorVariations()->detach();
        $current_banner->lookbooks()->detach();
        $current_banner->delete();
        return redirect()->route('banners.index')->with('success', __('adminpanel.action_success'));
    }
}
