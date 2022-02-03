<x-app-layout>
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('success') !!}</li>
            </ul>
        </div>
    @endif

    @if (\Session::has('error'))
        <div class="alert alert-error">
            <ul>
                <li>{!! \Session::get('error') !!}</li>
            </ul>
        </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-16">
            Промокоды -- Редактирование
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('promocodes.update', $promocode->id)}}"  enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-check form-check-inline">

                        <div class="mb-5">
                            <label class="form-label">Промокод:</label>
                            <div class="">
                                <input class="form-control " id="name" name="name" type="text" required value="{{$promocode->name}}">
                                <button id="generate_promocode" class="btn btn-primary">Генерация промокода</button>
                            </div>
                        </div>

                        <div class="mb-5">
                        <label class="form-label">Максимальное количество использований промокода:</label>
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="usable_count" value="999999999" @if($promocode->usable_count == 999999999) checked @endif>
                                    <label class="form-check-label">
                                        Без ограничений
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" id="usable_count" name="usable_count" @if($promocode->usable_count != 999999999) checked value="{{$promocode->usable_count}}" @endif>
                                    <label class="form-check-label" >
                                        Количество
                                        <input class="form-control" id="usable_count_changer" type="number" step="1" min="0" @if($promocode->usable_count != 999999999) value="{{$promocode->usable_count}}" @else disabled @endif >
                                    </label>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                        <label class="form-label">Выберите тип скидки для промокода:</label>
                            <select class="form-select" id="promocode_type" name="promocode_type" required>
                                @foreach(config('enums.promocode_types') as $k => $promocode_type)
                                <option value="{{$k}}" @if($promocode->promocode_type == $k) selected @endif>{{$promocode_type}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                        <label class="form-label">Задайте правило применения скидки:</label>
                            <div id="rule_type_changer">

                                <label class="form-label">Скидка</label>
                                <input class="form-control" type="number" step="1" min="0" name="discount" value="{{$promocode->discount}}" required>
                                <span id="percent_discount_text" @if($promocode->promocode_type == "price_discount") style="display: none" @endif>% на</span>
                                <span id="price_discount_text" @if($promocode->promocode_type == "percent_discount") style="display: none" @endif >руб. на</span>

                                <select class="form-select" name="rule_type" required>
                                    @foreach(config('enums.promocode_rules') as $k => $promocode_rule)
                                    <option value="{{$k}}" @if($promocode->rule_type == $k) selected @endif >{{$promocode_rule}}</option>
                                    @endforeach
                                </select>

                                <div id="min_subtotal_wrapper" @if($promocode->rule_type != 'order_sum_more_than') style="display:none" @endif >
                                    <input class="form-control" id="min_subtotal" type="number" step="1" min="0" name="min_subtotal">
                                    <span id="price_discount_text">руб.</span>
                                </div>

                                <div id="categories_wrapper" @if($promocode->rule_type != 'every_product_from_category') style="display:none" @endif>
                                    <select  id="categories" name="categories[]" multiple>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if(in_array($category->id, $categories_ids)) selected @endif>{{$category->getLocalizeTitleRu()}}</option>
                                        @endforeach
                                    </select>
                                </div>
   
                                
                                <div id="products_wrapper" @if($promocode->rule_type != 'choosed_products') style="display:none" @endif>
                                    <select id="products" name="products[]" multiple>
                                        @foreach($products as $product)
                                        <option value="{{$product->id}}" @if(in_array($product->id, $products_ids)) selected @endif>
                                            {{$product->product->getLocalizeTitleRu()}} @if($product->color->id !== 76){{$product->color->getLocalizeTitleRu()}}@endif
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="without_sales" @if($promocode->without_sales) checked @endif>
                                <label class="form-check-label">
                                    Без учета товаров со скидками
                                </label>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="form-label">Дата и время начала действия промокода:</label>
                            <input class="form-control" name="from" type="datetime-local" value="{{date('Y-m-d\TH:i', strtotime($promocode->from))}}" required>
                        </div>

                        <div class="mb-2">
                            <label class="form-label">Дата и время окончания действия промокода:</label>
                            <input class="form-control" name="to" id="date_to" type="datetime-local" @if( $promocode->to != '2122-02-03 01:07:00' ) required value="{{date('Y-m-d\TH:i', strtotime($promocode->to))}}" @endif  >
                        </div>

                        <div class="mb-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="promocode_newer_ends"  name="promocode_newer_ends" @if( $promocode->to == '2122-02-03 01:07:00' ) checked @endif>
                                <label class="form-check-label">
                                    Никогда не заканчивается
                                </label>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="{{__('adminpanel.edit')}}">

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    

    <script>
        $(document).ready(function () {

            $("input:radio[name='usable_count']").change(function () {
                if ($("input[name='usable_count']:checked").val() == '999999999') {
                    $('#usable_count_changer').prop( "disabled", true )
                } else {
                    $('#usable_count_changer').prop( "disabled", false )
                }
            })

            $('#promocode_type').change(function () {
                $('#percent_discount_text').toggle()
                $('#price_discount_text').toggle()
            })

            $('#usable_count_changer').on("change paste keyup", function() {
                $('#usable_count').val($(this).val())
            });

            $("select[name='rule_type']").change(function() {
                if(this.value == 'order_sum_more_than') {
                    $('#min_subtotal_wrapper').show()
                    $("#min_subtotal").prop('required',true);
                } else {
                    $('#min_subtotal_wrapper').hide()
                    $("#min_subtotal").prop('required',false);
                }

                if(this.value == 'every_product_from_category') {
                    $('#categories_wrapper').show()
                } else {
                    $('#categories_wrapper').hide()
                }

                if(this.value == 'choosed_products') {
                    $('#products_wrapper').show()
                } else {
                    $('#products_wrapper').hide()
                }
            })

            $(function() {
                $('#categories').selectize({
                    plugins: ["remove_button"],
                    delimiter: ",",
                    persist: false,
                    create: function (input) {
                        return {
                        value: input,
                        text: input,
                        };
                    },
                    sortField: 'text'
                })

                $('#products').selectize({
                    plugins: ["remove_button"],
                    delimiter: ",",
                    persist: false,
                    create: function (input) {
                        return {
                        value: input,
                        text: input,
                        };
                    },
                    sortField: 'text'
                })
            })

            $('#generate_promocode').click(function(e){
                e.preventDefault()
                $('#name').val(makeid())
            })

            $('#promocode_newer_ends').click(function(){
                if ($(this).is(':checked')){
                    $('#date_to').prop('required',false);
                } else {
                    $('#date_to').prop('required',true);
                }
            })    

            function makeid() {
                var result           = '';
                var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                var charactersLength = characters.length;
                for ( var i = 0; i < 8; i++ ) {
                    result += characters.charAt(Math.floor(Math.random() * 
                    charactersLength));
                }
            return result;
            }
            })
    </script>
</x-app-layout>
