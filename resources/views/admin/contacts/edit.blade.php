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
            Контакты -- Редактирование
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if(!$contacts->id)
                    <form method="POST" action="{{route('contacts.storing')}}">
                    @else
                    <form method="POST" action="{{route('contacts.updating', $contacts->id)}}">
                        @method('patch')
                    @endif
                        @csrf
                        <div class="mb-5">
                            <label class="form-label">Телефон:</label>
                            <div class="">
                                <input class="form-control " id="phone" name="phone" type="text" value="{{$contacts->phone}}">
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="form-label">Telegram:</label>
                            <div class="">
                                <input class="form-control " id="telegram" name="telegram" type="text" value="{{$contacts->telegram}}">
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="form-label">WhatsApp:</label>
                            <div class="">
                                <input class="form-control " id="whatsapp" name="whatsapp" type="text" value="{{$contacts->whatsapp}}">
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="form-label">E-mail:</label>
                            <div class="">
                                <input class="form-control " id="mail" name="mail" type="text" value="{{$contacts->mail}}">
                                <input type="hidden" name="mail" value ="">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary"value="{{__('adminpanel.edit')}}">

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        CKEDITOR.replace('details-ru', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('details-en', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
</x-app-layout>