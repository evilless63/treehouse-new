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
            Пользователи -- Список
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="mb-3">
                        <a class="btn btn-primary" href="{{route('users.create')}}">Создать пользователя</a>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" class="form-control" id="findInput" onkeyup="findInTable()" placeholder="Поиск по телефону">
                    </div>

                    <table class="table" id="findTable">
                        <tbody>
                            <thead>
                                <th>Телефон</th>
                                <th>Фамилия</th>
                                <th>Имя</th>
                                <th>Отчество</th>

                                <th>Является админом</th>
                                <th>Вход разрешен</th>
                            </thead>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{{ $user->phone }}}</th>
                                <td scope="row">{{{ $user->surname }}}</td>
                                <td scope="row">{{{ $user->name }}}</td>
                                <td scope="row">{{{ $user->patronymic }}}</td>

                                <td scope="row">@if($user->is_admin) ✓ @endif</td>
                                <td scope="row">@if($user->is_active) ✓ @endif</td>
                                <td>
                                    <form method="POST" action="{{route('users.destroy', $user->id)}}">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-primary" value="Удалить">
                                    </form>
                                </td>
                                <td><a href="{{route('users.edit', $user->id)}}">Редактировать</a></td>
                                <td><a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseAdresses_{{$user->id}}">Адреса</a></td>
                                <td><a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseChildren_{{$user->id}}">Дети</a></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>