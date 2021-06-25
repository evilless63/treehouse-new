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
            Лукбуки -- Редактирование
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('lookbooks.update', $current_lookbook->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div x-data="{openTab: 1 ,activeClasses: 'border-l border-t border-r rounded-t text-blue-700',inactiveClasses: 'text-blue-500 hover:text-blue-800'}"
                            class="my-6">
                            <ul class="flex border-b">
                                @foreach ($lang_field_sets as $lang_field_set)

                                    <li @click="openTab = {{ $loop->index + 1 }}"
                                        :class="{ '-mb-px': openTab === {{ $loop->index + 1 }} }" class="-mb-px mr-1">
                                        <span
                                            :class="openTab === {{ $loop->index + 1 }} ? activeClasses : inactiveClasses"
                                            class="bg-white inline-block py-2 px-4 font-semibold cursor-pointer">
                                            {{ $lang_field_set->lang }}
                                        </span>
                                    </li>

                                @endforeach
                            </ul>
                            <div class="w-full pt-4">
                                @foreach ($lang_field_sets as $lang_field_set)
                                    <div x-show="openTab === {{ $loop->index + 1 }}">
                                        <label>{{ __('adminpanel.name') }} -- {{ $lang_field_set->lang }}</label>
                                        <input type="text" class="form-control"
                                            placeholder="{{ __('adminpanel.name') }}"
                                            name="localization[{{ $lang_field_set->lang }}][title]"
                                            class="@error('title') is-invalid @enderror"
                                            value="{{ $lang_field_set->title }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <label>Размещение лукбука</label>
                        <select name="lookbook_position">
                            <option selected value="{{ $current_lookbook->lookbook_position }}">
                                {{ config('enums.lookbook_positions')[$current_lookbook->lookbook_position] }}
                            </option>                  
                            @foreach (config('enums.lookbook_positions') as $k => $lookbook_position)
                                <option value="{{ $k }}">{{ $lookbook_position }}</option>
                            @endforeach
                        </select>
                        <label>Изображения</label>

                        <div class="row">
                            <div class="col-md-6">
                                <h5>Текущее большое изображение </h5>
                                <img src="{{ asset($current_lookbook->big_img) }}" alt="" class="img-fluid">

                                <label>Новое большое изображение</label>
                                <input type="file" class="filepond my-4" name="big_img">
                            </div>
                            <div class="col-md-6">
                                <h5>Текущее маленькое изображение </h5>
                                <img src="{{ asset($current_lookbook->small_img) }}" alt="" class="img-fluid">

                                <label>Новое маленькое изображение</label>
                                <input type="file" class="filepond my-4" name="small_img">
                            </div>
                        </div>

                        <h5>Текущее изображение в перечне всех лукбуков </h5>
                        <img src="{{ asset($current_lookbook->category_img) }}" alt="" class="img-fluid">

                        <label>Изображение в перечне всех лукбуков</label>
                        <input type="file" class="filepond my-4" name="category_img">

                        <input type="submit" class="btn btn-primary" value="{{ __('adminpanel.edit') }}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
