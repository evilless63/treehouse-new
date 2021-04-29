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
            Категории -- Создание
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{route('categories.store')}}">
                        @csrf

                        @foreach($locales as $locale)

                        <label>{{__('adminpanel.name')}} -- {{$locale}}</label>
                        <input type="text" placeholder="{{__('adminpanel.name')}}" name="localization[{{$locale}}][title]" class="@error('title') is-invalid @enderror" value="{{old('title')}}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        @endforeach

                        <label>{{__('adminpanel.parent_category')}}</label>
                        <select name="parent_id">
                            <option selected value="0">{{__('adminpanel.without_category')}}</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->getLocalizeTitleRu()}}</option>
                            @endforeach
                        </select>

                        <label>Использовать в шапке сайта</label>
                        <input type="checkbox" name="in_header" value="{{old('in_header')}}">

                        <input type="submit" value="{{__('adminpanel.update')}}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>