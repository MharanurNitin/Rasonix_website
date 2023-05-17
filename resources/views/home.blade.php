@extends('layouts.master')
@section('content')
<div class="h-[98vh] w-screen mt-20 md:mt-8 mb-10 p-4 flex flex-col md:flex-row md:items-center md:justify-between box-border">
 <div class="w-full md:w-1/2 flex justify-center order-2">
  <div class=" w-full md:w-3/4 flex flex-col items-center">
 <h1 class="text-2xl md:text-6xl break-words">Transform your business online with us!!</h1>
 <p>We are with you, your goal is now our goal. Let's achieve it together!</p>
  </div>
 </div>
 <div class="w-full md:w-1/2 bg-pink-200 md:h-full flex justify-center items-center order-1 md:order-3"> 
  <img class='w-3/5 h-fit'src="{{url('assets/images/rasonix-Illustrator.svg')}}"/>
</div>
</div>
@endsection
