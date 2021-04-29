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
            Заказ № {{$order->id}}-- Редактирование
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{route('orders.update', $order->id)}}">
                        @csrf
                        @method('patch')

                        <h3>Информация о пользователе</h3>
                        <table class="table-auto">
                            <tbody>
                                <tr>
                                    <td>Имя</td>
                                    <td>{{$order->user->name}}</td>
                                </tr>
                                <tr>
                                    <td>Фамилия</td>
                                    <td>{{$order->user->surname}}</td>
                                </tr>
                                <tr>
                                    <td>Телефон</td>
                                    <td>{{$order->user->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Почта</td>
                                    <td>{{$order->user->email}}</td>
                                </tr>
                            </tbody>
                        </table>

                        <h3>Информация о заказе</h3>
                        <table class="table-auto">
                            <thead>
                                <tr>
                                    <th>Код</th>
                                    <th>Наименование</th>
                                    <th>Цвет</th>
                                    <th>Количество</th>
                                    <th>Стоимость в рублях</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart as $cartItem)
                                <tr>
                                    <td>{{$cartItem->options->code}}</td>
                                    <td>{{$cartItem->name}}</td>
                                    <td><input type="color" value="{{$cartItem->options->hex}}" disabled></td>
                                    <td>{{$cartItem->qty}} {{__('userpanel.units')}}</td>
                                    <td>{{$cartItem->total}} {{__('userpanel.currency')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <h3>Информация о доставке</h3>
                        (Адрес и тп)

                        @if($order->is_closed)
                        <a href="{{route('orders.index')}}">К списку заказов</a>
                        @else
                        <input type="submit" value="{{__('adminpanel.edit')}}">
                        @endif


                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>