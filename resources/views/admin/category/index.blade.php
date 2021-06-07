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
            Категории -- Список
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-3">
                        <a class="btn btn-primary" href="{{route('categories.create')}}">{{__('adminpanel.create_category')}}</a>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control"class="form-control" id="findInput" onkeyup="findInTable()" placeholder="Поиск по наименованию">
                    </div>

                    <table class="table" id="findTable">
                        <tbody id="sortable-categories">
                            @foreach($categories as $category)
                            <tr>
                                <th scope="row">{{{ $category->getLocalizeTitleRu() }}}</th>
                                <td><a href="{{route('categories.edit', $category->id)}}">{{__('adminpanel.edit')}}</a></td>
                                <td><a href="{{route('categories.replicate', $category->id)}}">Скопировать</a></td>
                            </tr>
                            @if(true == false)
                            @if(count($category->products))
                            @include('demo.product ',['products' => $category->products])
                            @endif
                            @endif
                            @if(count($category->childs))
                            @include('admin.category.includes.childs',['childs' => $category->childs])
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( "#sortable-categories" ).sortable();
        $( "#sortable-categories" ).disableSelection();
    </script>
</x-app-layout>