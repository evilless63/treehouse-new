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
            Способы доставки -- Список
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="mb-3">
                        <a class="btn btn-primary" href="{{route('delivery.create')}}">Создать способ доставки</a>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" class="form-control" id="findInput" onkeyup="findInTable()" placeholder="Поиск по наименованию">
                    </div>

                    <table class="table" id="findTable">
                        <tbody  id="sortable-categories">
                            @foreach($deliveries as $delivery)
                            <tr data-id="{{$delivery->id}}" @if($delivery->archived) style="background: #d9d9d9;" @endif>
                                <th  scope="row">{{{ $delivery->method }}}</th>
                                <td><a href="{{route('delivery.edit', $delivery->id)}}">{{__('adminpanel.edit')}}</a></td>
                                <td>
                                    <form method="POST" action="{{route('delivery.destroy', $delivery->id)}}">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>

        function updateToDatabaseCategory(idString) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            $.ajax({
                url: '{{ url("/admin/delivery/update-order") }}',
                method: 'POST',
                data: {
                    ids: idString
                }
            })
        }

        var targetGallery = $('#sortable-categories')
        targetGallery.sortable({
            update: function(e, ui) {
                var sortData = targetGallery.sortable('toArray', {
                    attribute: 'data-id'
                })
                updateToDatabaseCategory(sortData.join(','))
            }
        })

    </script>
</x-app-layout>