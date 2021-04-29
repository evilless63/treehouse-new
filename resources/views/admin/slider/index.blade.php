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
            Слайдеры -- Список
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <a href="{{route('sliders.create')}}">Создать слайдер</a>

                    @foreach($sliders as $slider)
                    <li style="list-style-type: none">
                        <h3>{{{ $slider->getLocalizeTitleRu() }}} ----- <a href="{{route('sliders.edit', $slider->id)}}">{{__('adminpanel.edit')}}</a> -----
                            <form method="POST" action="{{route('sliders.destroy', $slider->id)}}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Удалить">
                            </form>
                        </h3>
                    </li>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>