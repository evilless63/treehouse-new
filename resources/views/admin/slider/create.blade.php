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
            Слайдеры -- Создание
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('sliders.store')}}" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control"placeholder="{{__('adminpanel.name')}}" name="localization[{{$locale}}][title]" class="@error('title') is-invalid @enderror" value="{{old('title')}}">
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <label>Ссылка</label>
                        <input type="text" class="form-control"placeholder="ссылка" name="link" value="{{old('link')}}">

                        <label>Видео (в приоритете при указании и изображения и видео, рекомендуется использовать видео 1920 на 1080 px)</label>
                        <input type="file" class="filepond my-4" name="source_path" value="{{old('source_path')}}">

                        <label>Изображение (рекомендуется использовать изображение 1920 на 1080 px)</label>
                        <input type="file" class="filepond my-4" name="source_path_img" value="{{old('source_path_img')}}">
                        <!-- <label>Ссылка на ресурс (youtube)</label>
                        <input type="text" class="form-control"class="filepond my-4" name="source_path" value="{{old('source_path')}}"> -->
                        <br> 
                        <label>Использовать на сайте</label>
                        <input type="checkbox" name="is_active" value="{{old('is_active')}}">
                        <br> 
                        <label>Заполнять текстом поверх слайдера из наименования</label>
                        <input type="checkbox" name="text_needed" value="{{old('text_needed')}}">
                        <br> 
                        <input type="submit" class="btn btn-primary"value="{{__('adminpanel.create')}}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>