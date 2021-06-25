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
            Слайдеры -- Редактирование
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{route('sliders.update', $current_slider->id)}}"  enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div x-data="{openTab: 1 ,activeClasses: 'border-l border-t border-r rounded-t text-blue-700',inactiveClasses: 'text-blue-500 hover:text-blue-800'}" class="my-6">
                            <ul class="flex border-b">
                                @foreach($lang_field_sets as $lang_field_set)

                                <li @click="openTab = {{$loop->index + 1}}" :class="{ '-mb-px': openTab === {{$loop->index + 1}} }" class="-mb-px mr-1">
                                    <span :class="openTab === {{$loop->index + 1}} ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold cursor-pointer">
                                        {{$lang_field_set->lang}}
                                    </span>
                                </li>

                                @endforeach
                            </ul>
                            <div class="w-full pt-4">
                                @foreach($lang_field_sets as $lang_field_set)
                                <div x-show="openTab === {{$loop->index + 1}}">
                                    <label>{{__('adminpanel.name')}} -- {{$lang_field_set->lang}}</label>
                                    <input type="text" class="form-control"placeholder="{{__('adminpanel.name')}}" name="localization[{{$lang_field_set->lang}}][title]" class="@error('title') is-invalid @enderror" value="{{$lang_field_set->title}}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <label>Ссылка</label>
                        <input type="text" class="form-control"placeholder="ссылка" name="link" value="{{$current_slider->link}}">
                        <!-- <a href="{{$current_slider->link}}">Посмотреть ссылку</a> -->

                        <label>Видео (в приоритете при указании и изображения и видео, рекомендуется использовать видео 1920 на 1080 px)</label>
                        <input type="file" class="filepond my-4" name="source_path">

                        <label>Изображение (рекомендуется использовать изображение 1920 на 1080 px)</label>
                        <input type="file" class="filepond my-4" name="source_path_img">
                        <!-- <label>Ссылка на ресурс (youtube)</label>
                        <input type="text" class="form-control"class="filepond my-4" name="source_path" value="{{$current_slider->source_path}}"> -->
                        <br> 
                        <label>Использовать на сайте</label>
                        <input type="checkbox" name="is_active" @if($current_slider->is_active) checked @endif>
                        <br>    
                        <label>Заполнять текстом поверх слайдера из наименования</label>
                        <input type="checkbox" name="text_needed" @if($current_slider->text_needed) checked @endif>
                        <br> 
                        <input type="submit" class="btn btn-primary"value="{{__('adminpanel.edit')}}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>