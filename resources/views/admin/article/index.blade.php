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
            Статьи -- Список
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="mb-3">
                        <a class="btn btn-primary" href="{{route('articles.create')}}">Создать статью</a>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" class="form-control" id="findInput" onkeyup="findInTable()" placeholder="Поиск по наименованию">
                    </div>

                    <table class="table" id="findTable">
                        <tbody>
                            @foreach($articles as $article)
                            <tr>
                                <th scope="row">{{{ $article->getLocalizeTitleRu() }}}</th>
                                <td><a href="{{route('articles.edit', $article->id)}}">{{__('adminpanel.edit')}}</a></td>
                                <td><a href="{{route('articles.replicate', $article->id)}}">Скопировать</a></td>
                                <td>
                                    <form method="POST" action="{{route('articles.destroy', $article->id)}}">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger" value="Удалить">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>