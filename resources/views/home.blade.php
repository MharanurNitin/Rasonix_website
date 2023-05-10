<x-master>
    <x-slot>
        @section('title')
            HOME PAGE
        @endsection
    </x-slot>
    @section('content')
        <h1>Hello Nitin</h1>
        @include('contact')
    @endsection
</x-master>
