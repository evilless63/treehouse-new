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
            Товары -- список
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" class="form-control" id="findInputSku" onkeyup="findInTableSku()" placeholder="Поиск по коду 1с">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" class="form-control" id="findInput" onkeyup="findInTable()" placeholder="Поиск по наименованию">
                            </div>
                        </div>
                    </div>
                    <table class="table" id="findTable">
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <th scope="row">{{{ $product->getLocalizeTitleRu() }}}</th>
                                <th scope="row">{{{ $product->code }}}</th>
                                <td><a href="{{route('products.edit', $product->id)}}">{{__('adminpanel.edit')}}</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>