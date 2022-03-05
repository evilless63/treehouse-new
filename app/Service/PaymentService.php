<?php

namespace App\Service;
use YooKassa\Client;
class PaymentService {

    private function getClient(): Client
    {
        $client = new Client();
        $client->setAuth(config('services.yookassa.shop_id'), config('services.yookassa.secret_key'));
        return $client;
    }

    public function createPayment(string $amount, string $description, array $options = [])
    {
        $client = $this->getClient();
//        $payment = $client->createPayment([
//                'amount' => [
//                    'value' => $amount,
//                    'currency' => 'RUB',
//                ],
//                'confirmation' => [
//                    'type' => 'redirect',
//                    'return_url' => route('payment.index'),
//                ],
//                'capture' => false,
//                'metadata' => [
//                    'transaction_id' => $options['transaction_id']
//                ],
//                'description' => $description
//            ],
//            uniqid('', true));

//        $payment = $client->createPayment(
//            array(
//                'amount' => array(
//                    'value' => $amount,
//                    'currency' => 'RUB',
//                ),
//                'confirmation' => array(
//                    'type' => 'redirect',
//                    'return_url' => route('payment.index'),
//                ),
//                'capture' => false,
//                'description' => $description,
//            ),
//            uniqid('', true)
//        );

//        return $payment->getConfirmation()->getConfirmationUrl();

        $responseArr = array(
            'amount' => array(
                'value' => $amount,
                'currency' => 'RUB',
            ),
            'confirmation' => array(
                'type' => 'redirect',
                'locale' => 'ru_RU',
                'return_url' => route('payment.index'),
            ),
            'capture' => false,
            'description' => $description,
            'metadata' => array(
                'transaction_id' => $options['transaction_id']
            ),
            'receipt' => array(
                'customer' => array(
                    'full_name' => 'Ivanov Ivan Ivanovich',
                    'email' => 'email@email.ru',
                    'phone' => '79211234567',
                    'inn' => '6321341814'
                ),
                'items' => array(
                    array(
                        'description' => 'Переносное зарядное устройство Хувей',
                        'quantity' => '1.00',
                        'amount' => array(
                            'value' => $amount,
                            'currency' => 'RUB'
                        ),
                        'vat_code' => '2',
                        'payment_mode' => 'full_payment',
                        'payment_subject' => 'commodity',
                        'country_of_origin_code' => 'CN',
                        'product_code' => '44 4D 01 00 21 FA 41 00 23 05 41 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 00 12 00 AB 00',
                        'customs_declaration_number' => '10714040/140917/0090376',
                        'excise' => '20.00',
//                                'supplier' => array(
//                                    'name' => 'string',
//                                    'phone' => 'string',
//                                    'inn' => 'string'
//                                )
                    ),
                )
            )
        );

        try {
            $idempotenceKey = uniqid('', true);
            $response = $client->createPayment(
                $responseArr,
                $idempotenceKey
            );

            //получаем confirmationUrl для дальнейшего редиректа
            return $response->getConfirmation()->getConfirmationUrl();
        } catch (\Exception $e) {
            $response = $e;
        }
    }
}
