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

                    <form method="POST" action="{{route('banners.update', $current_banner->id)}}"  enctype="multipart/form-data">
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

                        <div class="mb-3">
                            <label>В каких лукбуках отображать: </label>
                            @if ($current_banner->lookbooks->count() > 0)
                                @foreach ($lookbooks as $lookbook)
                                    @if ($current_banner->lookbooks->contains($lookbook))
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input"
                                                name="choosed_lookbooks[{{ $current_banner->id }}][]"
                                                value="{{ $lookbook->id }}" type="checkbox" checked>
                                            <label
                                                class="form-check-label">{{ $lookbook->getLocalizeTitleRu() }}</label>
                                        </div>
                                    @else
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input"
                                                name="choosed_lookbooks[{{ $current_banner->id }}][]"
                                                value="{{ $lookbook->id }}" type="checkbox">
                                            <label
                                                class="form-check-label">{{ $lookbook->getLocalizeTitleRu() }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                @foreach ($lookbooks as $lookbook)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input"
                                            name="choosed_lookbooks[{{ $current_banner->id }}][]"
                                            value="{{ $lookbook->id }}" type="checkbox">
                                        <label
                                            class="form-check-label">{{ $lookbook->getLocalizeTitleRu() }}</label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        
                        <label>Изображение</label>
                        <h5>Текущее изображение</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{asset($current_banner->img_path)}}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <input type="file" class="filepond my-4" name="img_path">

                        <h5>Текущее изображение 2</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{asset($current_banner->img_path_2)}}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <input type="file" class="filepond my-4" name="img_path_2">
                        
                        <input type="submit" class="btn btn-primary"value="{{__('adminpanel.edit')}}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>