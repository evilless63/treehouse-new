$(function() {
    //Вызывается при нажатии на оплатить/подтвердить заказ
    $('.send-order-btn').on('click', function (e) {
        //1.Способ оплаты
        var paymentMethod = $('#cart-paymenttype option:selected').text();
        //2.Населенный пункт
        var city = $('#cart-city').val();
        //3.Способ доставки
        var deliveryMethod = $('#cart-deliverytype option:selected').text();
        var deliveryShop = '';

        var gaAction = '';
        var gaActionError = '';

        if (window.isOnlinePayment) {
            //Если это кнопка оплатить заказ
            gaAction = 'Pay button click';
            gaActionError = 'Pay button error';

            //Если самовывоз из магазина, то название магазина
            deliveryShop = $('#cart-deliverytypepickuppoint option:selected').data('description');
            deliveryShop = deliveryShop || '';

            if (deliveryShop) {
                deliveryShop = ', ' + deliveryShop;
            } else {
                deliveryShop = '';
            }
        } else {
            //Если это кнопка подтвердить заказ
            gaAction = 'Confirm button click';
            gaActionError = 'Confirm button error';
        }

        function onAfterValidate(e) {
            var validationErrors = '';
            $.each($('#order-dynamic-form').find('.form__error-message'), function (i, o) {
                if (o.innerHTML) {
                    validationErrors += (validationErrors ? ', ' : '') + o.innerHTML;
                }
            });
            var gaLabel = paymentMethod + ', ' + city + ', ' + deliveryMethod + deliveryShop + (validationErrors ? (', ' + validationErrors) : '');
            //Отправка события корзины в GA
            gaSendEvent(gaAction, gaLabel, 'Сheckout');

            if (validationErrors) {
                //Отправка события об ошибке в ga
                gaSendEvent(gaActionError, validationErrors, 'Сheckout');
            } else {
                var thankYouPageGaAction;
                var thankYouPageGaLabel;

                var isPayOnDelivery = paymentMethod.trim() === 'Наличными курьеру' ||
                    paymentMethod.trim() === 'Банковской картой курьеру';

                if (isPayOnDelivery) {
                    thankYouPageGaAction = 'Pay on delivery thank you page';
                    thankYouPageGaLabel = [paymentMethod, deliveryMethod, city].join(', ');
                } else {
                    thankYouPageGaAction = 'Pay online thank you page';
                    thankYouPageGaLabel = [paymentMethod, deliveryMethod, city, deliveryShop].join(', ');
                }

                // параметры ga события, вызываемого при открытии thank you page
                localStorage.setItem('thankYouPageGaAction', thankYouPageGaAction);
                localStorage.setItem('thankYouPageGaLabel', thankYouPageGaLabel);
            }
        }

        $('#order-dynamic-form')
            .off('afterValidate', onAfterValidate)
            .on('afterValidate', onAfterValidate);
    });

    // window.selectedDelivery = null;
    // $(document.body).on('change', "#cart-deliverytype", function (e) {
    //     var previousSelectedDelivery = window.selectedDelivery;
    //     window.selectedDelivery = $("#cart-deliverytype option:selected").text();
    //     if (previousSelectedDelivery && e.originalEvent) {
    //         var label = $('#cart-city').val() + ', ' + window.selectedDelivery;
    //         gaSendEvent('Delivery change', label, 'Сheckout');
    //     }
    // });
});