@extends('layouts.master')
@section('content')
    <div
        class="md:h-[98vh] w-screen mt-20 md:mt-8 mb-10 p-4 flex flex-col md:flex-row md:items-center md:justify-between box-border">
        <div class="w-full md:w-1/2 flex justify-center order-2">
            <div class=" w-full md:w-3/4 flex flex-col items-center">
                <h1 class="text-2xl md:text-6xl break-words">Transform your business online with us!!</h1>
                <p>We are with you, your goal is now our goal. Let's achieve it together!</p>
            </div>
        </div>
        <div class="w-full md:w-1/2 bg-pink-200 md:h-full flex justify-center items-center order-1 md:order-3">
            <img class='w-3/5 h-fit'src="/assets/images/rasonix-Illustrator.svg" />
        </div>
    </div>
    {{-- our services --}}
    <h1 class="text-6xl text-center mt-7 mb-7">Our Services</h1>
    <div class="services-container flex flex-col items-center bg-slate-300 w-screen gap-2 md:gap-6 p-6">

        <div class="flex flex-col md:flex-row md:justify-between w-full md:w-3/5 gap-2 ">
            <div class="flex gap-2 bg-white shadow-md p-2 items-center rounded w-full">Android Development</div>
            <div class="flex gap-2 bg-white shadow-md p-2 items-center rounded w-full">Web Development</div>
            <div class="flex gap-2 bg-white shadow-md p-2 items-center rounded">Database Cunsulting</div>
        </div>

        <div class="flex flex-col md:flex-row md:justify-between w-full md:w-3/5 gap-2">
            <div class="flex gap-2 bg-white shadow-md p-2 items-center rounded w-full">Cross platform app</div>
            <div class="flex gap-2 bg-white shadow-md p-2 items-center rounded w-full">E-commerce Developement</div>
            <div class="flex gap-2 bg-white shadow-md p-2 items-center rounded w-full"><img
                    src="/assets/images/testing-framework.svg">
                <p>Automation Testing
                <p>
            </div>
        </div>

    </div>
@endsection
