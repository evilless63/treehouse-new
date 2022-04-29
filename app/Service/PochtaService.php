<?php

namespace App\Service;

use Exception;
use LapayGroup\RussianPost\CategoryList;
use LapayGroup\RussianPost\Exceptions\RussianPostException;
use LapayGroup\RussianPost\Exceptions\RussianPostTarrificatorException;
use LapayGroup\RussianPost\TariffCalculation;

class PochtaService
{
    function categoryList() {
        $CategoryList = new CategoryList();
        $categoryList = $CategoryList->parseToArray();
        dd($categoryList);
    }

    function calculate($zipCodeTo, $weight, $sumoc) {
        try {
            $objectId = 7020; // Письмо с объявленной ценностью
            // Минимальный набор параметров для расчета стоимости отправления
            $params = [
                'weight' => $weight, // Вес в граммах
                'sumoc' => $sumoc, // Сумма объявленной ценности в копейках
                'from' => 404102, // Почтовый индекс места отправления
                'to' => $zipCodeTo
            ];

            // Список ID дополнительных услуг
            // 2 - Заказное уведомление о вручении
            // 21 - СМС-уведомление о вручении
            $services = [];

            $TariffCalculation = new TariffCalculation();
            $calcInfo = $TariffCalculation->calculate($objectId, $params, $services);
            return $calcInfo->getPayNds();
        }

        catch (RussianPostTarrificatorException $e) {
            // Обработка ошибок тарификатора
            $errors = $e->getErrors();
            // Массив вида [['msg' => 'текст ошибки', 'code' => код ошибки]]
            return $errors;
        }

        catch (RussianPostException $e) {
            // Обработка ошибочного ответа от API ПРФ
            return $e;
        }

        catch (Exception $e) {
            // Обработка нештатной ситуации
            return $e;
        }
    }
}
