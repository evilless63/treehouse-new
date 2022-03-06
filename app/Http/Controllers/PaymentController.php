<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.payment.index')->with([
            'payments' => Payment::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment.create');
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
        if($request->has('payable')) {
            $data['payable'] = '1';
        } else {
            $data['payable'] = '0';
        }
        $payment = Payment::create($data);

        if ($payment) {
            return redirect()->route('payment.index')->with('success', __('adminpanel.action_success'));
        } else {
            return redirect()->route('payment.index')->with('error', __('adminpanel.action_error'));
        }
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
        $payment = Payment::where('id', $id)->first();
        if($payment) {
            return view('admin.payment.edit')->with([
                'payment' => $payment
            ]);
        } else {
            return redirect()->route('payment.index')->with('error', __('adminpanel.action_error'));
        }
        
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
        $data = $request->all();
        if($request->has('payable')) {
            $data['payable'] = '1';
        } else {
            $data['payable'] = '0';
        }

        if($request->has('archived')) {
            $data['archived'] = '1';
        } else {
            $data['archived'] = '0';
        }
        $payment = Payment::where('id', $id)->first();
        if($payment) {
            $haveBeenUpdated = $payment->update($data);
            if ($haveBeenUpdated) {
                return redirect()->route('payment.index')->with('success', __('adminpanel.action_success'));
            } else {
                return redirect()->route('payment.index')->with('error', __('adminpanel.action_error'));
            }
        } else {
            return redirect()->route('payment.index')->with('error', __('adminpanel.action_error'));
        } 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::where('id', $id)->first();
        if($payment) {
            if(Order::where('payment_id', $payment->id)->get()->isEmpty()) {
                $payment->delete();
                return redirect()->route('payment.index')->with('success', __('adminpanel.action_success'));
            } else {
                return redirect()->route('payment.index')->with('error', "Существуют заказы с данным способом оплаты");
            }
        } else {
            return redirect()->route('payment.index')->with('error', __('adminpanel.action_error'));
        } 

    }

    public function updateOrder(Request $request){
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));
            
            foreach($arr as $sortOrder => $id){
                $menu = Payment::find($id);
                $menu->sort_order = $sortOrder;
                $menu->save();
            }
            return ['success'=>true,'message'=>'Updated'];
        }
    }
}
