<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeliveryRequest;
use App\Http\Requests\UpdateDeliveryRequest;
use App\Models\Delivery;
use App\Models\Order;
use App\Service\CdekService;
use App\Service\PochtaService;
use Gloudemans\Shoppingcart\Facades\Cart;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.delivery.index')->with([
            'deliveries' => Delivery::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeliveryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryRequest $request)
    {
        $data = $request->all();

        if($data['price'] == null) {
            $data['price'] = 0.00;
        }

        if($request->has('calculable')) {
            $data['calculable'] = '1';
        } else {
            $data['calculable'] = '0';
        }

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


        $delivery = Delivery::create($data);

        if ($delivery) {
            return redirect()->route('delivery.index')->with('success', __('adminpanel.action_success'));
        } else {
            return redirect()->route('delivery.index')->with('error', __('adminpanel.action_error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        return view('admin.delivery.edit')->with([
            'delivery' => $delivery
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeliveryRequest  $request
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryRequest $request, Delivery $delivery)
    {

        $data = $request->all();

        if($data['price'] == null) {
            $data['price'] = 0.00;
        }

        if($request->has('calculable')) {
            $data['calculable'] = '1';
        } else {
            $data['calculable'] = '0';
        }

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


        $haveBeenUpdated = $delivery->update($data);
        if ($haveBeenUpdated) {
            return redirect()->route('delivery.index')->with('success', __('adminpanel.action_success'));
        } else {
            return redirect()->route('delivery.index')->with('error', __('adminpanel.action_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        if(Order::where('delivery_id', $delivery->id)->get()->isEmpty()) {
            $delivery->delete();
            return redirect()->route('delivery.index')->with('success', __('adminpanel.action_success'));
        } else {
            return redirect()->route('delivery.index')->with('error', "???????????????????? ???????????? ?? ???????????? ???????????????? ????????????????");
        }

    }

    public function updateOrder(Request $request){
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));

            foreach($arr as $sortOrder => $id){
                $menu = Delivery::find($id);
                $menu->sort_order = $sortOrder;
                $menu->save();
            }
            return ['success'=>true,'message'=>'Updated'];
        }
    }

    public function calculateSdek($zipCodeTo) {
        $service = new CdekService();

        $delivery_price = $service->calculate(
            404103,
            $zipCodeTo,
            $this->calculateWeight()
        );

        if(is_numeric($delivery_price)) {
            $subtotal = (float)$delivery_price + (float)str_replace(",", "", Cart::instance('shopping')->subtotal());
            $subtotal_formatted = number_format($subtotal, $decimals = 2, $decimal_separator = ".", $thousants_sep = ",");
            return [
                'subtotal' => $subtotal_formatted
            ];
        } else {
            return response()->json($delivery_price, 500 );
        }

    }

    public function calculatePochta($zipCodeTo) {
        $service = new PochtaService();
        $delivery_price = $service->calculate(
            $zipCodeTo,
            $this->calculateWeight(),
            $this->getTotalSum()
        );

        if(is_numeric($delivery_price)) {
            $subtotal = (float)$delivery_price + (float)str_replace(",", "", Cart::instance('shopping')->subtotal());
            $subtotal_formatted = number_format($subtotal, $decimals = 2, $decimal_separator = ".", $thousants_sep = ",");
            return [
                'subtotal' => $subtotal_formatted
            ];
        } else {
            return response()->json($delivery_price, 500 );
        }

    }

    private function calculateWeight() {
        $totalWeight = 0;
        $totalCount = 0;
        foreach (Cart::instance('shopping')->content() as $row) {
            $totalCount = $totalCount + $row->qty;
            if($totalCount >=6 ) {
                $totalCount = 0;
                $totalWeight = $totalWeight + 1000;
            }
        }

        if ($totalWeight == 0) {
            $totalWeight = 1000;
        }

        return $totalWeight;
    }

    private function getTotalSum() {
        return Cart::instance('shopping')->subtotal();
    }
}
