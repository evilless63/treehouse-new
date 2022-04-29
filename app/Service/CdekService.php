<?php

namespace App\Service;

use AntistressStore\CdekSDK2\CdekClientV2;
use AntistressStore\CdekSDK2\Entity\Requests\Tariff;

class CdekService
{

    function calculate($from = 404103, $to = 443095, $weight = 1000) {
        $cdek_client = new CdekClientV2('TEST');
        $tariff = (new Tariff())
            ->setTariffCode(10) // Указывает код тарифа для расчета
            ->setPostalCodes($from, $to) // Экспресс-метод установки кодов отправителя и получателя
            ->setPackageWeight($weight)
        ;

        try {
            $tariff_response = $cdek_client->calculateTariff($tariff); // TariffResponse
            return $tariff_response->getTotalSum();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
