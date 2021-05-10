<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.css" integrity="sha512-vmXqikRa5kmI3gOQygzml5nV+5NGxG8rt8KWHKj8JYYK12JUl2L8RBfWinFGTzvpwwsIRcINy9mhLyodnmzjig==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

    <link rel="stylesheet" href="{{asset('assets/owl/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/owl/assets/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/carousel-custom.css')}}">
    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropper/4.1.0/cropper.min.js" integrity="sha512-E+gDQcIvNXE60SjCS38ysf1mGh4ObBpKcUOp0oEaHQHQAdaN2p7GelOpgEdpTuCLoIJyLkNXiqFZbyD9Ak/Ygw==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('assets/owl/owl.carousel.min.js')}}"></script>


</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')


        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>


        <main>
            {{ $slot }}
        </main>
    </div>
    <script>
        function findInTable() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("findInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("findTable");
            tr = table.getElementsByTagName("tr");
            console.log(tr);

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                th = tr[i].getElementsByTagName("th")[0];
                if (th) {
                    txtValue = th.textContent || th.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        var phoneMask = IMask(
            document.getElementById('phone'), {
                mask: '+{7}(000)000-00-00'
            });

        var phoneMask = IMask(
            document.getElementById('findInput'), {
                mask: '+{7}(000)000-00-00'
            });
    </script>
</body>

</html>