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
            Товары -- Редактирование
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{route('products.update', $current_product->id)}}">
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
                                    <label class="m-5">Наименование -- {{$lang_field_set->lang}}</label>
                                    <input type="text" placeholder="{{__('adminpanel.name')}}" name="localization[{{$lang_field_set->lang}}][title]" class="@error('title') is-invalid @enderror" value="{{$lang_field_set->title}}">
                                    <br>
                                    <label class="my-4">Описание -- {{$lang_field_set->lang}}</label>
                                    <textarea class="form-control pt-4" id="content-{{$lang_field_set->lang}}" name="localization[{{$lang_field_set->lang}}][content]">{{$lang_field_set->content}}</textarea>
                                    <label class="py-4">Детали -- {{$lang_field_set->lang}}</label>
                                    <textarea class="form-control pt-4" id="details-{{$lang_field_set->lang}}" name="localization[{{$lang_field_set->lang}}][details]">{{$lang_field_set->details}}</textarea>
                                    <label class="m-5">Уход -- {{$lang_field_set->lang}}</label>
                                    <textarea class="form-control pt-4" id="care-{{$lang_field_set->lang}}" name="localization[{{$lang_field_set->lang}}][care]">{{$lang_field_set->care}}</textarea>
                                    <label class="m-5">Таблица размеров -- {{$lang_field_set->lang}}</label>
                                    <textarea class="form-control pt-4" id="size_table-{{$lang_field_set->lang}}" name="localization[{{$lang_field_set->lang}}][size_table]">{{$lang_field_set->size_table}}</textarea>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <label>{{__('adminpanel.categories_for_product')}}</label>
                        @if($choosed_categories->count() > 0)
                        @foreach($categories as $category)
                        @if($choosed_categories->contains($category))
                        {{ $category->getLocalizeTitleRu() }} --- <input type="checkbox" name="choosed_categories[]" value="{{$category->id}}" checked>
                        @else
                        {{ $category->getLocalizeTitleRu() }} --- <input type="checkbox" name="choosed_categories[]" value="{{$category->id}}">
                        @endif
                        @endforeach
                        @else
                        @foreach($categories as $category)
                        {{ $category->getLocalizeTitleRu() }} --- <input type="checkbox" name="choosed_categories[]" value="{{$category->id}}">
                        @endforeach
                        @endif

                        <div x-data="{openTabColor: 1 ,activeClasses: 'border-l border-t border-r rounded-t text-blue-700',inactiveClasses: 'text-blue-500 hover:text-blue-800'}" class="my-6">
                            <ul class="flex border-b">
                                @foreach($current_product->colorVariations as $colorVariation)
                                <li @click="openTabColor = {{$loop->index + 1}}" :class="{ '-mb-px': openTabColor === {{$loop->index + 1}} }" class="-mb-px mr-1">
                                    <span :class="openTabColor === {{$loop->index + 1}} ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold cursor-pointer">
                                        {{$colorVariation->color->getLocalizeTitleRu()}}
                                    </span>
                                </li>
                                @endforeach
                            </ul>
                            <div class="w-full pt-4">
                                @foreach($current_product->colorVariations as $colorVariation)
                                <div x-show="openTabColor === {{$loop->index + 1}}">

                                    <div x-data="{openTabColorVariationTabs: 1 ,activeClasses: 'border-l border-t border-r rounded-t text-blue-700',inactiveClasses: 'text-blue-500 hover:text-blue-800'}" class="my-6">
                                        <ul class="flex border-b">

                                            <li @click="openTabColorVariationTabs = 1" :class="{ '-mb-px': openTabColorVariationTabs === 1 }" class="-mb-px mr-1">
                                                <span :class="openTabColorVariationTabs === 1 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold cursor-pointer">
                                                    Настройка главного изображения
                                                </span>
                                            </li>
                                            <li @click="openTabColorVariationTabs = 2" :class="{ '-mb-px': openTabColorVariationTabs === 2 }" class="-mb-px mr-1">
                                                <span :class="openTabColorVariationTabs === 2 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold cursor-pointer">
                                                    Настройка галереи изображений
                                                </span>
                                            </li>
                                            <li @click="openTabColorVariationTabs = 3" :class="{ '-mb-px': openTabColorVariationTabs === 3 }" class="-mb-px mr-1">
                                                <span :class="openTabColorVariationTabs === 3 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold cursor-pointer">
                                                    Остатки по размерам
                                                </span>
                                            </li>

                                        </ul>
                                        <div class="w-full pt-4">
                                            <div x-show="openTabColorVariationTabs === 1">
                                                {{$colorVariation->color->getLocalizeTitleRu()}} -- <input type="color" name="hex" value="{{$colorVariation->color->hex}}" disabled>-- <a href="{{route('colors.edit', $colorVariation->color->id)}}" class="underline" target="_blank">Редактировать параметры цвета</a>

                                                <h5>Главное изображение товара</h5>
                                                <input type="file" class="filepond my-4" name="filepond-image-{{$colorVariation->color->slug}}" data-allow-reorder="true" data-max-file-size="3MB">
                                            </div>
                                            <div x-show="openTabColorVariationTabs === 2">
                                                <h5>Галерея изображений</h5>
                                                <input type="file" class="filepond my-4" name="filepond-gallery[{{$colorVariation->color->slug}}]" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
                                            </div>
                                            <div x-show="openTabColorVariationTabs === 3">
                                                <ul>
                                                    @foreach($colorVariation->images as $image)
                                                    <li>{{$image->name}}</li>
                                                    @endforeach
                                                    @foreach($colorVariation->sizeVariations as $sizeVariation)
                                                    <li>{{$sizeVariation->size->getLocalizeTitleRu()}} -- {{$sizeVariation->price}} р. -- {{$sizeVariation->stock}} шт.</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <input type="submit" value="{{__('adminpanel.update')}}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>