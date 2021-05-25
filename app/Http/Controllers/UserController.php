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
        return view('admin.user.create')->with([
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

        if ($request->has('is_admin')) {
            $data['is_admin'] = true;
        } else {
            $data['is_admin'] = false;
        }

        if ($request->has('is_active')) {
            $data['is_active'] = true;
        } else {
            $data['is_active'] = false;
        }

        $User = User::create($data);

        if ($User) {
            return redirect()->route('users.index')->with('success', __('adminpanel.action_success'));
        } else {
            return redirect()->route('users.index')->with('error', __('adminpanel.action_error'));
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

        return view('admin.user.edit')->with([
            'current_user' => $current_User
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

        if ($haveBeenUpdated) {
            return redirect()->route('user.edit_profile')->with('success', __('adminpanel.action_success'));
        } else {
            return redirect()->route('user.edit_profile')->with('error', __('adminpanel.action_error'));
        }

        // if ($haveBeenUpdated) {
        //     return redirect()->route('users.index')->with('success', __('adminpanel.action_success'));
        // } else {
        //     return redirect()->route('users.index')->with('error', __('adminpanel.action_error'));
        // }
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
        return redirect()->route('users.index')->with('success', __('adminpanel.action_success'));
    }

    public function replicate($id)
    {
        $User = User::with('localizations')->find($id);
        $newUser = $User->replicate();
        // $replicatedCategory = $newCategory->push();
        $replicatedUser = User::create($newUser->toArray());

        foreach ($User->localizations as $localization) {
            $locArray = $localization->toArray();
            if ($locArray['lang'] == 'ru') {
                $locArray['title'] = $locArray['title'] . ' - копия';
            } else {
                $locArray['title'] = $locArray['title'] . ' - copy';
            }
            $local = $replicatedUser->localizations($locArray)
                ->create($locArray);
        }

        if ($replicatedUser) {
            return redirect()->route('users.index')->with('error', __('adminpanel.action_error'));
        } else {
            return redirect()->route('users.index')->with('success', __('adminpanel.action_success'));
        }
    }

    public function toggleIsAdmin() {
        if(request()->is_admin == 'false') {
            $is_admin = 0;
        } else {
            $is_admin = 1;
        }
        $user = User::where('id', request()->id)->first();
        $user->is_admin = $is_admin;
        $user->update();
    }

    public function toggleIsActive() {
        if(request()->is_active == 'false') {
            $is_active = 0;
        } else {
            $is_active = 1;
        }
        $user = User::where('id', request()->id)->first();
        $user->is_active = $is_active;
        $user->update();
    }
}
