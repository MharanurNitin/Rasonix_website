<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- tailwind css js file --}}
    <script src="{{url('assets/js/jquery.min.js')}}"></script>
    <script src="{{url('assets/js/flowbite.js')}}"></script>
    <script src="{{url('../assets/js/tailwind.js')}}"></script>
    <title>@yield('title')</title>
</head>

<body>
    {{-- navbar file --}}
    @include('layouts.includes.header');
    @yield('content');
{{-- footer file --}}
    @include('layouts.includes.footer');
</body>

</html>
