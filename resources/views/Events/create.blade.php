@extends('layout.app')

<div class=" mx-12 my-8 flex justify-between">
    <h1 class="text-gray-800 text-2xl text-center"> {{ $title }} </h1>
    <a class="px-4 py-3 bg-green-600 rounded-md" href="{{route('events.index')}}">Go Back</a>
</div>
<div class="m-12">
    <div class="container max-w-2xl mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <form class="w-full" action="{{route('events.store')}}" method="post">
            @csrf
           @include('Events._form',['buttonText'=>'Create'])
        </form>

        
    </div>

</div>
