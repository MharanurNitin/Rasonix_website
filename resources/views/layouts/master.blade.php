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
    {{-- montserrat font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
</head>

<body class='bg-slate-400'>
    {{-- navbar file --}}
    @include('layouts.includes.header')
    @yield('content')
{{-- footer file --}}
    @include('layouts.includes.footer')
</body>

</html>
