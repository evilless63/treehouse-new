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
            Пользователи -- Редактирование
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{route('users.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Фамилия</label>
                            <input type="text" class="form-control" name="surname" value="{{$current_user->surname}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Имя</label>
                            <input type="text" class="form-control" name="name" value="{{$current_user->name}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Отчество</label>
                            <input type="text" class="form-control" name="patronymic" value="{{$current_user->patronymic}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$current_user->email}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Телефон</label>
                            <input type="text" id="phone" class="form-control" name="phone" value="{{$current_user->phone}}">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="hidden" value="{{$current_user->is_admin}}">
                                <input class="form-check-input" type="checkbox" value="" name="is_admin">
                                <label class="form-check-label">
                                    Права администратора
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="hidden" value="{{$current_user->is_active}}">
                                <input class="form-check-input" type="checkbox" value="" name="is_active">
                                <label class="form-check-label">
                                    Разрешено входить на сайт
                                </label>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary" value="{{__('adminpanel.edit')}}">

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>