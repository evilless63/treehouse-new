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
            Баннеры -- Создание
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('banners.store')}}">
                        @csrf

                        <div x-data="{openTab: 1 ,activeClasses: 'border-l border-t border-r rounded-t text-blue-700',inactiveClasses: 'text-blue-500 hover:text-blue-800'}" class="my-6">
                            <ul class="flex border-b">
                                @foreach($locales as $locale)

                                <li @click="openTab = {{$loop->index + 1}}" :class="{ '-mb-px': openTab === {{$loop->index + 1}} }" class="-mb-px mr-1">
                                    <span :class="openTab === {{$loop->index + 1}} ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold cursor-pointer">
                                        {{$locale}}
                                    </span>
                                </li>

                                @endforeach
                            </ul>
                            <div class="w-full pt-4">
                                @foreach($locales as $locale)
                                <div x-show="openTab === {{$loop->index + 1}}">
                                    <label>{{__('adminpanel.name')}} -- {{$locale}}</label>
                                    <input type="text" placeholder="{{__('adminpanel.name')}}" name="localization[{{$locale}}][title]" class="@error('title') is-invalid @enderror" value="{{old('title')}}">
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <label>Ссылка</label>
                        <input type="text" placeholder="ссылка" name="link" value="{{old('link')}}">
                        <label>Размещение баннера</label>
                        <select name="banner_position">
                            <option selected value="0">Не размещать</option>
                            
                            @foreach(config('enums.banner_positions') as $k => $banner_position)
                            <option value="{{$k}}">{{$banner_position}}</option>
                            @endforeach
                        </select>

                        <label>Изображение</label>
                        <input type="file" class="filepond my-4" name="img_path" value="{{old('img_path')}}">
                        <input type="submit" value="{{__('adminpanel.update')}}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>