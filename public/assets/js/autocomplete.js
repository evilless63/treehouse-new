function initProfileEditAutocompletes() {
    $('.js-autocomplete__city').each(function() {
        var fieldObj = $(this);
        if(fieldObj.is('data-preorder')){
            console.log(fieldObj.data('preorder'));
            isPreorder = fieldObj.data('preorder');
        }
        var pluginOptions = {
            "source":"\/delivery\/delivery\/search",
            "minLength":3,
            "classes": {
                "ui-autocomplete": "autocomplete-z-index"
            },
            "create":function(event, ui) {
                fieldObj.autocomplete( "instance" )._renderItem = function(ul, item) {
                    return $("<li></li>").data("item.autocomplete", item).append("<div><b>"+item.city+"</b><small>"+item.region+"</small></div>").appendTo(ul);
                };
            },
            "select":function(event, ui) {
                event.preventDefault();
                this.value = ui.item.city;
                saveField('cart-city-object', JSON.stringify(ui.item));
                autocomplete(ui.item, fieldObj.hasClass('js-autocomplete__city-delivery'), fieldObj);
                if (fieldObj.hasClass('city-modal__input')) {
                    chooseCityModule.setCity(ui.item);
                }
            },
            // "focus":function(event, ui) {
            //     event.preventDefault();
            //     this.value = ui.item.city;

            //     autocomplete(ui.item, fieldObj.hasClass('js-autocomplete__city-delivery'), fieldObj);
            // }
        };

        $(this).autocomplete(pluginOptions);
    });
}

function selectCity(fieldObj, city, getData) {
    $.get('/delivery/delivery/search', {term: city, notnull: true}, function(res) {
        if (res && res[0] && res[0]['city']) {
            fieldObj.val(res[0]['city']);
            autocomplete(res[0], getData, fieldObj);
        }
    });
}

function autocomplete(item, getData, fieldObj) {
    if (getData) {
        $("#address-city").val(item.city);
        $("#address-state").val(item.region);
        $("#address-country").val(item.country);

        getDeliveryData(item.city, item.region, item.country);
    }
    else {
        fieldObj.closest('.item').find('.region').val(item.region);
        fieldObj.closest('.item').find('.country').val(item.country);
    }
}
var oldCity = '';
var firstLoad = true;
var isPreorder = 0;
function getDeliveryData(city, region, country, explicit) {
    explicit = typeof explicit !== 'undefined' ? explicit : false;
    var data = {
        city: city,
        region: region,
        country: country,
        'isPreorder': isPreorder
    };

    if (oldCity == city && explicit === false) return false;

    oldCity = city;
    $.post('/delivery/delivery/place', data, function(res) {
        res = res['variants'] || [];
        $('#deliveryTypeCont').show();

        $('#cart-deliverytype').html('');
        for (i in res) {
            var dtype = res[i];
            $('#cart-deliverytype').append('<option value="' + dtype.tk + '" data-description=\'' + dtype.description + '\' data-points=\'' + JSON.stringify(dtype.points) + '\' data-timetable=\'' + JSON.stringify(dtype.timetable) + '\' data-type="' + dtype.type + '" data-cost="' + dtype.cost + '" data-coststr="' + dtype.costStr + '" data-coststrapx="' + dtype.costStrAPX + '" data-payments=\'' + JSON.stringify(dtype.paymentTypes) + '\'>' + dtype.title + '</option>');
        }

        $('#cart-deliverytype').trigger('change');

        $('#cart-delivery_date').change();

        var visible_radios = $('#cart-address input[type=radio]:visible');
        var current = $(this).find('option:selected');

        if (visible_radios.length <= 1 && (parseInt(current.data('type')) === 1 || parseInt(current.data('type')) === 4 || parseInt(current.data('type')) === 5)) {
            $('#cart-address').closest('.form__item').hide();
            $('#addressCont').show();
        }
        if (firstLoad && visible_radios.length != 1) {
            firstLoad = false;
            return false;
        }
        $('#cart-address input[type=radio]').last().click().trigger('change');

        loadFields(['cart-deliverytype',
                    'address-street',
                    'address-house',
                    'address-flat',
                    'cart-paymenttype',
                    'cart-delivery_date']);
    });
}

$(function() {
    initProfileEditAutocompletes();
    var orderForm = $('#order-dynamic-form[data-preorder=1]');
    if (orderForm.length) {
        isPreorder = orderForm.data('preorder');
    }
    if ($('#address-city').val()) {
        getDeliveryData($('#address-city').val(), $('#address-state').val(), $('#address-country').val());
    }

    $(document).on('change', '.js-autocomplete__city', function() {
        $(this).val($(this).val().trim());
        if($(this).is('data-preorder')){
            console.log(fieldObj.data('preorder'));
            isPreorder = fieldObj.data('preorder');
        }
        if ($('#address-city').length) {
            if ($(this).val() !== $('#address-city').val()) {
                $('#cart-deliverytype option').remove();
                $('#cart-paymenttype option').remove();
                $('#address-city').val('');
                $('#address-state').val('');
                $('#address-country').val('');
                $('#deliveryTypeCont').hide();
            }

            // не выбрали в автокомплите, найдем по названию
            if (!$('#address-city').val()) {
                selectCity($(this), $(this).val(), true);
            }

            $('#cart-boxberrypvzid').val('');
            $('#boxberry_address>span').text('');
            $('#boxberry_address').hide();
        }
        else {
            selectCity($(this), $(this).val());
        }
    });

    $(document).on('change', '#cart-deliverytype[data-main=true]', function() {
        var current = $(this).find('option:selected');
        if (current.data('type') != 1) {
            $('#addressCont').hide();
            $('#cartAdressesList').hide();
        } else {
            $('#cartAdressesList').show();
        }
        $('.deliveryCost').hide();
        $('.city-pickup').hide();
        $('.city-pickup select').html('');
        updateDateTimeInput();

        if (parseInt(current.data('type')) === 1 || parseInt(current.data('type')) === 4 || parseInt(current.data('type')) === 5) {
            if ($('#cart-address input[type=radio]').data('value') == 'new') {
                $('#addressCont').show();
            }
        } else {
            $('#addressCont').hide();
        }
        if (parseInt(current.data('cost')) > 0) {
            $('#deliveryCost').html(current.data('coststr'));
            $('#deliveryCost2').html(current.data('coststrapx'));
            $('.deliveryCost').show();
        }

        var points = current.data('points');
        if (typeof points === 'object' && points.length > 0) {
            for (i in points) {
                var dtype = points[i];
                $('.city-pickup select').append('<option data-description=\'' + dtype.description + '\' value="' + dtype.tk + '" data-type="' + dtype.type + '" data-cost="' + dtype.cost + '" data-coststr="' + dtype.costStr + '" data-payments=\'' + JSON.stringify(dtype.paymentTypes) + '\'>' + dtype.title + '</option>');
            }
            $('.city-pickup').show();
        }

        if (parseInt(current.val()) === 22) {
            $('#boxberry_link').show();
        } else {
            $('#boxberry_link').hide();
            $('#boxberry_address').hide();
        }

        var paymentTypes = current.data('payments');
        $('#cart-paymenttype').html('');
        for (var i in paymentTypes) {
            var ptype = paymentTypes[i];
            if (parseInt(i) !== 10 || parseInt(i) !== 11 || (window.ApplePaySession && ApplePaySession.canMakePayments)) {
                $('#cart-paymenttype').append('<option value="' + i + '">' + ptype + '</option>');
            }
        }

        $('#cart-paymenttype').trigger('change');

        var data = {
            deliveryPrice: current.data('cost'),
            totalCost: $('#totalCost').data('cost')
        };

        if (window.cartApp) {
            window.cartApp.setDeliveryCost(current.data('cost'));
        } else {
            $.get('/delivery/delivery/get-cost', data, function(res) {
                $('#totalCost').html(res[0]);
                $('#totalCost2').html(res[1]);
            });
        }
    });

    $(document).on('change', '#cart-paymenttype', function() {
        var current = $(this),
            current_delivery = $('#cart-deliverytype[data-main=true] option:selected'),
            text = '';

        if (current.length > 0 && current[0].options.length > 0) {
            if (parseInt(current.val()) === 1 || parseInt(current.val()) === 9 || parseInt(current.val()) === 10) {
                text = $('.send-order-btn').data('paidtitle');
                window.isOnlinePayment = true;
            } else {
                text = $('.send-order-btn').data('notpaidtitle');
                window.isOnlinePayment = false;
            }
            $('.send-order-btn').html(text);
            $('.order-total__agreement span').html(text.toLowerCase());
            if (parseInt(current.val()) >= 2 && parseInt(current.val()) <= 5 || parseInt(current_delivery.data('type')) === 5) {
                $('#cart-callme').prop('checked', false);
                $('#cart-callme').closest('.form__item').hide();
                if (parseInt(current_delivery.data('type')) === 5) {
                    $('#delivery_help').show();
                }
            } else {
                $('#cart-callme').closest('.form__item').show();
                $('#delivery_help').hide();
            }
        }
    });
    $(document).on('click', '.boxberry_container_close', function() {
        $('html').removeClass('t-popup');
    });
    $(document).on('change', '#cart-delivery_date', function() {
        updateDateTimeInput();
    });
    $(document).on('change', '#cart-callme', function() {
        if ($(this).prop('checked')) {
            $('#accept_not_call').show();
        }
        else {
            $('#accept_not_call').hide();
        }

        if ($(this).prop('checked') && $('#cart-delivery_time option').length > 0) {
            $('.delivery-date-row').show();
        } else {
            $('.delivery-date-row').hide();
            $('.delivery-date-row .has-error').removeClass('has-error');
        }
    });

    $(document).on('change', '#cart-address input[type=radio]', function(e){
        var data = $(this).data('value');
        var parent = $(this).closest('#cart-address');
        if (!parent.is(':visible')) return;

        if (data == 'new') {
            $('#address-street').val('');
            $('#address-house').val('');
            $('#address-flat').val('');
            $('#addressCont').show();
        } else {
            $('#addressCont').hide();
            for (var attr in data) {
                if (attr == 'city' && data[attr] != $('#cart-city').val()) {
                    $('#cart-city').val(data[attr]);
                    $('#address-'+attr).val(data[attr]);
                } else {
                    $('#address-'+attr).val(data[attr]);
                }
            }
            firstLoad = true;
            getDeliveryData($('#address-city').val(), $('#address-state').val(), $('#address-country').val());
        }
    });
});

function boxberry_callback_function(result) {
    $('#boxberry_link').hide();
    $('#cart-boxberrypvzid').val(result.id);
    $('#boxberry_address span').text(result.address);
    $('#boxberry_address').show();
    $('html').removeClass('t-popup');

    var $form = $("#order-dynamic-form"),
        data = $form.data("yiiActiveForm");
    $.each(data.attributes, function() {
        this.status = 3;
    });
    $form.yiiActiveForm("validate");
}

function callmeTriggerFunction() {
    $('#cart-callme').prop('checked', true);

    if ($('#cart-callme').prop('checked') && $('#cart-delivery_time option').length > 0) {
        $('.delivery-date-row').show();
    } else {
        $('.delivery-date-row').hide();
        $('.delivery-date-row .has-error').removeClass('has-error');
    }
}

function updateDateTimeInput()
{
    var timetable = $('#cart-deliverytype[data-main=true] option:selected').data('timetable');
    $('#cart-delivery_time').html('');
    if (!timetable || timetable.length <= 0) {
        $('.delivery-date-row').hide();
        $('.delivery-date-row .has-error').removeClass('has-error');
        return;
    }

    $.post('/delivery/delivery/date', {'date': $('#cart-delivery_date').val()}, function(res) {
        if (!res.isHoliday) {
            timetable = timetable.workday;
        } else {
            timetable = timetable.holiday;
        }
        $('#cart-delivery_time').html('');
        for (var i in timetable) {
            var label = timetable[i];
            $('#cart-delivery_time').append('<option value="' + i + '">' + label + '</option>');
        }
        $('#cart-delivery_time').trigger('change');
        if (timetable && (!$.isEmptyObject(timetable)) && $('#cart-callme').prop('checked')) {
            $('.delivery-date-row').show();
        }

        loadFields(['cart-delivery_time']);
    }, "json");
}

/**
 * Сохранить поле пользователя
 * @param field
 * @param value
 */
function saveField(field, value) {
    if (window.isGuest) {
        window.disableSaving = window.disableSaving || false;
        if (!window.disableSaving) {
            //Сохранять если не авторизован
            if (value !== null) {
                sessionStorage.setItem('cart_' + field, value);
            }
        }
    }
}

/**
 * Загрузить поля пользователей
 */
function loadFields(fieldIds) {
    if (window.isGuest) {
        window.disableSaving = true;

        for (key in fieldIds) {
            var loadedValue = sessionStorage.getItem('cart_' + fieldIds[key]);
            if (loadedValue) {
                var fieldObj = null;
                if (fieldIds[key] === 'cart-city-object') {
                    fieldObj = $("#cart-city");
                    autocomplete(JSON.parse(loadedValue), fieldObj.hasClass('js-autocomplete__city-delivery'), fieldObj);
                    continue;
                }

                fieldObj = $("#" + fieldIds[key]);

                if (fieldObj[0].type === 'checkbox') {
                    fieldObj[0].checked = loadedValue == 1;
                    continue;
                }

                if (fieldObj[0].tagName === 'SELECT') {
                    fieldObj[0].selectedIndex = loadedValue;
                    continue;
                }

                $("#" + fieldIds[key]).val(loadedValue);
                $("#" + fieldIds[key]).trigger('change');
            }
        }

        window.disableSavingTimer = window.disableSavingTimer || null;

        if (window.disableSavingTimer !== null) {
            clearTimeout(window.disableSavingTimer);
        }

        window.disableSavingTimer = setTimeout(function() {
            window.disableSaving = false;
        }, 1000);
    }
}