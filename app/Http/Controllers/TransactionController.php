<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\PaymentService;
use App\Models\Transaction;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\NotificationEventType;
use App\Enums\PaymentStatusEnum;

class TransactionController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->createWishlist();
        $this->createCartItems();
    }

    public function index()
    {
        $transactions = Transaction::all();
        return view('user.payments.index', ['transactions' => $transactions]);
    }

    public function create(Request $request, PaymentService $service)
    {
        $amount = (string)$request->input('amount');
        $description = (string)$request->input('description');

        $transaction = Transaction::create([
            'amount' => $amount,
            'description' => $description,
        ]);

        if($transaction) {
            $link = $service->createPayment($amount, $description, [
                'transaction_id' => $transaction->id
            ]);

            return redirect()->away($link);
        }
    }

    public function callBack(Request $request, PaymentService $service)
    {
        $source = file_get_contents('php://input');
        $requestBody = json_decode($source, true);

        $notification = ($requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
        ? new NotificationSucceeded($requestBody)
        : new NotificationWaitingForCapture($requestBody);

        $payment = $notification->getObject();
        if(isset($payment->status) && $payment->status === 'succeeded') {
            if((bool)$payment->paid === true) {
                $metadata = (object)$payment->metadata;
                if(isset($metadata->transaction_id)) {
                    $transactionId = (int)$metadata->transaction_id;
                    $transaction = Transaction::find($transactionId);
                    $transaction->status = PaymentStatusEnum::CONFIRMED;
                    $transaction->save();

                    if(cache()->has('balance')) {
                        cache()->forever('balance', (float)cache()->get('balance') + $payment->amount->value);
                    } else {
                        cache()->forever('balance', (float)$payment->amount->value);
                    }
                }
            }
        }
    }
}