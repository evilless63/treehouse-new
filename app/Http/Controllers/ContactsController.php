<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacts;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storing(Request $request)
    {
        try {
            $contacts = Contacts::create($request->all());
            return redirect()->route('dashboard')->with('success', __('adminpanel.action_success'));
        } catch (Error $e) {
            return redirect()->route('dashboard')->with('error', __('adminpanel.action_error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contacts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function editing()
    {
        $DBcontacts = Contacts::first();
        if (!$DBcontacts){
            $contacts = new Contacts();
            $contacts->phone = "";
            $contacts->whatsapp = "";
            $contacts->telegram = "";
            $contacts->mail = "";
        } else {
            $contacts = $DBcontacts;
        }
        return view('admin.contacts.edit')->with([
            'contacts' => $contacts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function updating(Request $request)
    {
        $contacts = Contacts::first();
        try {
            $contacts->update($request->all());
            return redirect()->route('dashboard')->with('success', __('adminpanel.action_success'));
        } catch (Error $e) {

            return redirect()->route('dashboard')->with('error', __('adminpanel.action_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacts $contacts)
    {
        //
    }
}
