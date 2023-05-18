@extends('layouts.master')
@section('content')
    <div
        class="main-container flex justify-center w-screen min-h-screen  pt-28 bg-[url('assets/images/contact-us-page-blue-background.jpg')]">
        <div class=" md:w-2/5  p-3 w-[95%] bg-white h-fit shadow-md rounded pb-7 text-center">
            <h1 class=" text-4xl text-slate-700 text center">Contact us👋</h1>

            @if (session('success'))
                <div class="bg-green-400 text-white p-2">{{ session('success') }}</div>
            @endif
            <form action="/contact" method="post">
                @csrf
                <div class="flex flex-col md:flex-row justify-between  shadow-sm mt-7 gap-4">
                    <div class="min-w-[45%]">
                        <input type="text" placeholder="Full Name" name="name"
                            class="p-3 bg-blue-100 w-full outline-0 focus:border-b focus:border-green-400 rounded" />
                        @error('name')
                            <div class="text-red-600"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="min-w-[45%]">
                        <input type="text" placeholder="Business Email" name="business_email"
                            class="p-3 bg-blue-100 w-full outline-0 focus:border-b focus:border-green-400 rounded" />
                        @error('business_email')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class=" mt-4 flex flex-col md:flex-row justify-between w-full md:mt-7 gap-4">
                    <div class="min-w-[45%]">
                        <input type="text" placeholder="Company Name" name="company_name"
                            class="p-3 bg-blue-200 w-full outline-0 focus:border-b focus:border-green-400 rounded" />
                        @error('company_name')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="min-w-[45%]">
                        <input type="text" placeholder="phone no"
                            name="phone_number"class="p-3 bg-blue-200 w-full outline-0 focus:border-b focus:border-green-400 rounded" />
                        @error('phone_number')
                            <div class="text-red-600">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-4 md:mt-7 ">
                    <textarea placeholder="Message" name="message" class="bg-blue-300 min-w-full p-3 rounded outline-0"></textarea>
                    @error('message')
                        <div class="text-red-600">{{ $message }}</div>
                        <script>
                            document.getElementsByTagName('textarea').style = "border"
                        </script>
                    @enderror
                </div>
                <button class="mt-4 md:mt-7 text-center bg-black text-white p-2 px-8 min-w-full">Just send<i
                        class="fa-sharp fa-light fa-arrow-up-right-from-square" style="color: #f2f4f8;"></i></button>
            </form>
        </div>
    </div>
@endsection
