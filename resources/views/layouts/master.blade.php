<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- tailwind css js file --}}
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
    <script src="{{ url('assets/js/flowbite.js') }}"></script>
    <script src="{{ url('../assets/js/tailwind.js') }}"></script>




    {{-- fontawesome cdn link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- partical js --}}
    {{-- <script src='{{url('assets/js/particals.js')}}'></script> --}}
    {{-- ajax --}}
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>@yield('title')</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        overflow-x: hidden;
    }
</style>

<body>
    {{-- navbar file --}}
    @include('layouts.includes.header')
    @yield('content')
    {{-- footer file --}}
    {{-- @include('layouts.includes.footer') --}}
    {{-- <div class="footer"><h1>Hello this is footer</h1></div> --}}
</body>

</html>
