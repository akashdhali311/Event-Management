@extends('layout.app')


<div class="m-12">
    <div class="container max-w-2xl mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <form class="w-full" action="{{route('adminUser.store')}}" method="post">
            @csrf
           @include('User._form',['buttonText'=>'Create'])
        </form>

        
    </div>

</div>
