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
            Размеры -- Список
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


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

                    <div class="mb-3">
                        <input type="text" class="form-control" class="form-control" id="findInput" onkeyup="findInTable()" placeholder="Поиск по наименованию">
                    </div>

                    <table class="table" id="findTable">
                        <tbody id="sortable-sizes">
                            @foreach($sizes as $size)
                            <tr data-id="{{$size->id}}">
                                <th scope="row">{{{ $size->getLocalizeTitleRu() }}}</th>
                                <th scope="row">{{{ $size->getLocalizeShortTitle('ru') }}}</th>
                                <td><a href="{{route('sizes.edit', $size->id)}}">{{__('adminpanel.edit')}}</a></td>
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
                url: '{{ url("/admin/size/update-order") }}',
                method: 'POST',
                data: {
                    ids: idString
                }
            })
        }

        var targetGallery = $('#sortable-sizes')
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