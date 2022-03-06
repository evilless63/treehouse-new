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
            Способы доставки -- Создание
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('delivery.store')}}"  enctype="multipart/form-data">
                        @csrf
                        <div class="mb-5">
                            <label class="form-label">Наименование метода доставки:</label>
                            <div class="">
                            <input type="text" class="form-control " name="method" value="{{old('method')}}" required>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="form-label">Описание метода доставки (если необходимо):</label>
                            <div class="">
                            <textarea name="description" class="form-control" id="description" cols="20" rows="4">
                                {{old('description')}}
                            </textarea>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="form-label">Фиксированная базовая стоимость:</label>
                            <div class="">
                            <input type="number" step="0.01" class="filepond my-4" name="price" value="{{old('price')}}">
                            </div>
                        </div>

                        <div class="mb-5">
                            <div class="form-check">
                                <input type="checkbox" name="payable">
                                <label class="form-check-label">
                                    Используется оплата на сайте для данного метода доставки (если включено - переход к оплате, иначе - формирование заказа без оплаты)
                                </label>
                            </div>
                        </div>
                        
                        <div class="mb-5">
                            <div class="form-check">
                                <input type="checkbox" name="calculable">
                                <label class="form-check-label">
                                    Возможен расчет доставки на сайте (требуется наличие подключенного сервиса API)
                                </label>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="{{__('adminpanel.create')}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>