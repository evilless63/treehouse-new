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
            Категории -- Редактирование
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{route('categories.update', $current_category->id)}}">
                        @csrf
                        @method('patch')

                        @foreach($lang_field_sets as $lang_field_set)

                        <label>{{__('adminpanel.name')}} -- {{$lang_field_set->lang}}</label>
                        <input type="text" class="form-control"placeholder="{{__('adminpanel.name')}}" name="localization[{{$lang_field_set->lang}}][title]" class="@error('title') is-invalid @enderror" value="{{$lang_field_set->title}}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        @endforeach

                        {{-- <label>{{__('adminpanel.parent_category')}}</label>
                        <select name="parent_id">
                            @if($selected_category == null)
                            <option selected value="0">{{__('adminpanel.without_category')}}</option>
                            @else
                            <option selected value="{{$selected_category->id}}">{{$selected_category->getLocalizeTitleRu()}}</option>
                            @endif
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->getLocalizeTitleRu()}}</option>
                            @endforeach
                        </select> --}}

                        <label>Использовать в шапке сайта</label>
                        <input type="checkbox" name="in_header"  @if($current_category->in_header) checked @endif>
                        <br>
                        <input type="submit" class="btn btn-primary"value="{{__('adminpanel.edit')}}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>