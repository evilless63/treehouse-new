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
        Размеры -- Редактирование
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{route('sizes.update', $current_size->id)}}">
                        @csrf
                        @method('patch')

                        @foreach($lang_field_sets as $lang_field_set)
                        <label>{{__('adminpanel.name')}} -- {{$lang_field_set->lang}}</label>
                        <input type="text" class="form-control"placeholder="{{__('adminpanel.name')}}" name="localization[{{$lang_field_set->lang}}][title]" class="@error('title') is-invalid @enderror" value="{{$lang_field_set->title}}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <label>Короткий заголовок (для фильтра в каталоге)</label>
                        <input type="text" class="form-control"placeholder="Короткий заголовок (для фильтра в каталоге)" name="localization[{{$lang_field_set->lang}}][short_title]" class="@error('short_title') is-invalid @enderror" value="{{$lang_field_set->short_title}}">
                        
                        
                        @endforeach

                        <input type="submit" class="btn btn-primary"value="{{__('adminpanel.edit')}}">

                    </form>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>