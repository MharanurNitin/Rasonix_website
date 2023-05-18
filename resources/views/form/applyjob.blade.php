@extends('layouts.master')
@section('content')
    <div class="application_container w-screen flex justify-center h-[90vh] md:min-h-screen md:pt-20 items-center">
        <div class="sub_container flex flex-col w-[95%] md:w-3/5 shadow-md  items-center p-3">
            <div class="title w-full text-center mb-6">
                <h1 class='text-3xl md:text-5xl font-semibold'>Job Application Form</h1>
            </div>
            <div class="form_container w-full">
                <form action="{{ url('career/job') }}" method="post" enctype="multipart/form-data" class="w-full ">
                    {{-- first row start --}}
                    @csrf
                    <div class="flex flex-col w-full md:flex-row md:justify-between md:mb-8">
                        <div class="min-w-[45%]  flex flex-col">
                            <label for='category_id'>Job Title</label>
                            <select name="category_id" class="border-2 outline-0 p-2 rounded-md">
                                @foreach ($jobs as $job)
                                    <option value="{{ $job->id }}">{{ $job->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="min-w-[45%] flex flex-col ">
                            <label for='name'>Full Name</label>
                            <input type="text" name="name" class=" border-2 outline-0 p-2 rounded-md">
                            @error('name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    {{-- first row complete --}}
                    {{-- second row start --}}
                    <div class="flex flex-col w-full md:flex-row md:justify-between  md:mb-8">
                        <div class="min-w-[45%] flex flex-col ">
                            <label for='name'>Mobile Number</label>
                            <input type="text" name="phone_no" class=" border-2 outline-0 p-2 rounded-md">
                            @error('phone_no')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="min-w-[45%]  flex flex-col">
                            <label for='name'>Email</label>
                            <input type="text" name="email" class="border-2 outline-0 p-2 rounded-md">
                            @error('email')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- second row complete --}}
                    {{-- third row start --}}
                    <div class="flex flex-col w-full md:flex-row md:justify-between  md:mb-8">
                        <div class="min-w-[45%]  flex flex-col">
                            <label for='name'>Gender</label>
                            <select class="border-2 outline-0 p-2 rounded-md">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="min-w-[45%] flex flex-col ">
                            <label for='resume'>Resume</label>
                            <input type="file" name="resume" class=" border-2 outline-0 p-2 rounded-md"
                                accept=".pdf,.jpeg,.png,.jpg">
                            @error('name')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- third row end --}}
                    <button class="bg-blue-700 mt-3 p-2 outline-0 text-white text-xl w-full rounded-md"
                        type="submit">Apply</button>
                </form>
            </div>
        </div>
    </div>
@endsection
