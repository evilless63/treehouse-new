<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index')->with([
            'users' => $this->users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.User.create')->with([
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

        $User = User::create($data);
        foreach ($request->input('localization', []) as $k => $i) {
            $local = $User->localizations()
                ->create($i + ['lang' => $k]);
        }

        if ($User) {
            return redirect()->route('Users.index')->with('success', __('adminpanel.action_success'));
        } else {
            return redirect()->route('Users.index')->with('error', __('adminpanel.action_error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $current_User = User::find($id);

        $lang_field_sets = collect();
        foreach ($this->locales as $locale) {
            $lang_field_sets->add($current_User
                ->localization()
                ->where('lang', $locale)
                ->first());
        }

        return view('admin.User.edit')->with([
            'current_User' => $current_User,
            'lang_field_sets' => $lang_field_sets
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $User = User::find($id);

        $haveBeenUpdated = $User->update($request->all());
        foreach ($request->input('localization', []) as $k => $i) {
            $locale = $User->localizations()->where('lang', $k)
                ->update($i + ['lang' => $k]);
        }
        if ($haveBeenUpdated) {
            return redirect()->route('Users.index')->with('success', __('adminpanel.action_success'));
        } else {
            return redirect()->route('Users.index')->with('error', __('adminpanel.action_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $current_User = User::find($id);
        $current_User->delete();
        return redirect()->route('Users.index')->with('success', __('adminpanel.action_success'));
    }

    public function replicate($id)
    {
        $User = User::with('localizations')->find($id);
        $newUser = $User->replicate(); 
        // $replicatedCategory = $newCategory->push();
        $replicatedUser = User::create($newUser->toArray());

        foreach ($User->localizations as $localization) {
            $locArray = $localization->toArray();
            if($locArray['lang'] == 'ru') {
                $locArray['title'] = $locArray['title'] . ' - копия';
            } else {
                $locArray['title'] = $locArray['title'] . ' - copy';
            }
            $local = $replicatedUser->localizations($locArray)
                ->create($locArray);
        }

        if($replicatedUser) {
            return redirect()->route('Users.index')->with('error', __('adminpanel.action_error'));
        } else {
            return redirect()->route('Users.index')->with('success', __('adminpanel.action_success'));
        }
    }
}
