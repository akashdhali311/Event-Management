@extends('layout.app')
@section('content')
<div class=" mx-12 my-8 flex justify-between">
    <h1 class="text-gray-800 text-2xl text-center"> {{ $title }} </h1>
    <a class="px-4 py-3 bg-green-600 rounded-md" href="{{route('posts.index')}}">Go Back</a>
</div>
<div class="n-12">
    <h2 class="text-2xl text-gray-800 my-8">{{ $post->title}}</h2>
    <p class="md-8 text-gray-600" href="">{{$post->description}}</p>

</div>
@endsection