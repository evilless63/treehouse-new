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
            Заказы -- Список
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{route('cart.destroy')}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Очистить корзину</button>
                    </form>
                    <div class="mb-3">
                        <input type="text" class="form-control" class="form-control" id="findInput" onkeyup="findInTable()" placeholder="Поиск по наименованию">
                    </div>

                    <table class="table" id="findTable">
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <th scope="row">{{{ $order->id }}}</th>
                                <td><a href="{{route('orders.edit', $order->id)}}">Посмотреть</a></td>
                                <td> @if($order->is_closed) Закрыт (оплачен) @else Не закрыт (не оплачен)@endif</td>
                                <td>
                                    @if(!$order->is_closed)
                                    <form method="POST" action="{{route('orders.destroy', $order->id)}}">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-primary" value="Удалить">
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>