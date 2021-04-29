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
                    <a href="{{route('categories.create')}}">{{__('adminpanel.create_category')}}</a>

                    @foreach($categories as $category)
                    <li style="list-style-type: none">
                        <h3>{{{ $category->getLocalizeTitleRu() }}} ----- <a href="{{route('categories.edit', $category->id)}}">{{__('adminpanel.edit')}}</a> ----- <a href="{{route('categories.replicate', $category->id)}}">Скопировать</a></h3>
                        @if(true == false)
                        @if(count($category->products))
                        @include('demo.product ',['products' => $category->products])
                        @endif
                        @endif
                        @if(count($category->childs))
                        @include('admin.category.includes.childs',['childs' => $category->childs])
                        @endif
                    </li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>