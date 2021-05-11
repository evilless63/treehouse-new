<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.slider.index')->with([
            'sliders' => $this->sliders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create')->with([
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
        if ($request->has('is_active')) {
            $data['is_active'] = 1;
        } else {
            $data['is_active'] = 0;
        }
        $data['slug'] = str_slug(request()->get('localization')['ru']['title']);


        if ($request->hasFile('source_path')) {
            $folder = 'videos' . '/' . $data['slug'];

            $time = time();
            $imageName = $time . '_' . $request->file('source_path')->getClientOriginalName();
            $request->source_path->move(public_path('videos/' . $folder),  $imageName);

            $data['source_path'] = 'videos/' . $folder .  $imageName;
            
        }

        $banner = Slider::create($data);
        foreach ($request->input('localization', []) as $k => $i) {
            $local = $banner->localizations()
                ->create($i + ['lang' => $k]);
        }

        if ($banner) {
            return redirect()->route('sliders.index')->with('success', __('adminpanel.action_success'));
        } else {
            return redirect()->route('sliders.index')->with('error', __('adminpanel.action_error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $current_slider = Slider::find($id);

        $lang_field_sets = collect();
        foreach ($this->locales as $locale) {
            $lang_field_sets->add($current_slider
                ->localization()
                ->where('lang', $locale)
                ->first());
        }

        return view('admin.slider.edit')->with([
            'current_slider' => $current_slider,
            'lang_field_sets' => $lang_field_sets
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider = Slider::find($id);
        $data = $request->all();
        if ($request->has('is_active')) {
            $data['is_active'] = 1;
        } else {
            $data['is_active'] = 0;
        }

        if ($request->hasFile('source_path')) {
            $folder = 'banners' . '/' . $slider->slug;

            $time = time();
            $imageName = $time . '_' . $request->file('source_path')->getClientOriginalName();
            $request->source_path->move(public_path('videos/' . $folder),  $imageName);
            $data['source_path'] = 'videos/' . $folder .  $imageName;
            
        }

        $haveBeenUpdated = $slider->update($data);
        foreach ($request->input('localization', []) as $k => $i) {
            $locale = $slider->localizations()->where('lang', $k)
                ->update($i + ['lang' => $k]);
        }
        if ($haveBeenUpdated) {
            return redirect()->route('sliders.index')->with('success', __('adminpanel.action_success'));
        } else {
            return redirect()->route('sliders.index')->with('error', __('adminpanel.action_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $current_slider = Slider::find($id);
        $current_slider->delete();
        return redirect()->route('sliders.index')->with('success', __('adminpanel.action_success'));
    }
}
