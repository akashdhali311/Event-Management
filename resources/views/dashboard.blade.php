<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="py-4 px-6 text-right flex justify-end">

        <span class="text-gray-600 mr-4">{{auth()->user()->username}} </span>

        {{--<a class="text-blue-600" href="{{route('signup') }}">Sign Up  </a>--}}
        <form action="{{route('signout')}}" method="post">
        @csrf
        <button class="text-blue-600 " type="submit">Sign Out</button>
        </form>

    </div>
    @foreach ($eventsall as $key)
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$key->name}}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$key->description}}</p>
        <a href="{{route('singleEvent', $key->id)}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Read more
            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </a>
    </div>
    @endforeach


    @foreach ($events as $key)
<div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
<a href="#">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">@php
        $aa=App\Models\Event::where('id',$key->event_id)->first();
    @endphp
{{$aa->name}} </h5>
</a>
</div> 
 @endforeach
                
    
</body>
</html>