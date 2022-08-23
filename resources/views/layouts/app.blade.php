<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <script>


            $("#btn_last_week").click(function() {

                    let start_date=new Date($("input[name='start_date']").val());
                    let end_date=new Date($("input[name='end_date']").val());

                    let new_start_date=new Date(start_date.setDate(start_date.getDate() - 7));

                    let end_start_date=new Date(end_date.setDate(end_date.getDate() - 7));


                    $("input[name='start_date']").val(new_start_date.toISOString().split('T')[0])
                    $("input[name='end_date']").val( end_start_date.toISOString().split('T')[0])



            });


            $("#btn_next_week").click(function() {

                let start_date=new Date($("input[name='start_date']").val());
                let end_date=new Date($("input[name='end_date']").val());

                let new_start_date=new Date(start_date.setDate(start_date.getDate() + 7));

                let end_start_date=new Date(end_date.setDate(end_date.getDate() + 7));


                $("input[name='start_date']").val(new_start_date.toISOString().split('T')[0])
                $("input[name='end_date']").val( end_start_date.toISOString().split('T')[0])



                });

        </script>
    </body>
</html>
