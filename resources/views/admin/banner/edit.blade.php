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
            Баннеры -- Редактирование
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{route('banners.update', $current_banner->id)}}">
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
                                    <input type="text" placeholder="{{__('adminpanel.name')}}" name="localization[{{$lang_field_set->lang}}][title]" class="@error('title') is-invalid @enderror" value="{{$lang_field_set->title}}">
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <label>Ссылка</label>
                        <input type="text" placeholder="ссылка" name="link" value="{{$current_banner->link}}">
                        <a href="{{$current_banner->link}}">Посмотреть ссылку</a>
                        <label>Размещение баннера</label>
                        <select name="banner_position">
                            @if($current_banner->banner_position == '')
                            <option selected value="0">Не размещать</option>
                            @else
                            <option selected value="{{$current_banner->banner_position}}">{{config('enums.banner_positions')[$current_banner->banner_position]}}</option>
                            @endif
                            @foreach(config('enums.banner_positions') as $k => $banner_position)
                            <option value="{{$k}}">{{$banner_position}}</option>
                            @endforeach
                        </select>
                        <label>Изображение</label>
                        <input type="file" class="filepond my-4" name="img_path" value="{{$current_banner->img_path}}">
                        <input type="submit" value="{{__('adminpanel.edit')}}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>