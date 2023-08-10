<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class=" mx-12 my-8 flex justify-between">
    
        <a class="px-4 py-3 bg-green-600 rounded-md" href="http://event-management.test/">Go Back</a>
    </div>
    
    <div class="n-12 text-center">
        <h2 class="text-2xl text-gray-800 my-8">Event Name:{{ $events->name}}</h2>
        <p class="md-8 text-gray-600" href="">Event Type: {{ $events->eventType->name}}</p>
        <p class="md-8 text-gray-600" href="">Description: {{ $events->description}}</p>
        <p class="md-8 text-gray-600" href="">Location: {{$events->location}}</p>
        <p class="md-8 text-gray-600" href="">Start At:{{$events->start_at}}</p>
        <p class="md-8 text-gray-600" href="">End At: {{$events->end_at}}</p>
        <p class="md-8 text-gray-600" href="">Published At: {{$events->published_at}}</p>
    
    </div>
    

    <form action="{{route('comment')}}" method="post">
        @csrf
        <input type="hidden" name="event_id" value="{{ $events->id}}">
        <div>
            <textarea class="block border border-grey-light w-full p-3 rounded mb-4" name="comment" 
        
        cols="30" rows="10" 
        placeholder="Comment" ></textarea>
        <div>
            <select name="status" class="mb-4 bg-gray-50 border 
            border-gray-300 text-gray-900 text-sm rounded-lg 
            focus:ring-blue-500 focus:border-blue-500 block w-full 
            p-2.5 ">
            <option selected>Status type</option>
            
                
    
                @foreach ($status as $key => $val)
                <option   
                    value="{{$key}}">{{$val}}</option>
                @endforeach
         
          </select>
          @error('event_type_id')
                <p class="mb-4 text-red-600">{{$message}}</p>
            @enderror
        </div>
    
        
        </div>
       
<button type="submit">Add Comment</button>
    </form>
    <div class="m-12">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        
                        <th scope="col" class="px-6 py-3">
                            Author Name
                        </th>
                        
                        <th scope="col" class="px-6 py-3">
                            Comment
                        </th>
                        
                        
                        
                    </tr>
                </thead>
                <tbody>
                   
                   @forelse ($comment as $key)
                   <tr class=" border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @php
                            $aa=App\Models\User::where('id',$key->user_id)->first();
                        @endphp
                    {{$aa->first_name}} {{$aa->last_name}}
                    </th>

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$key->comment}}
                    </th>
                    
                    
                    
                </tr>  
                   @empty
                       
                   @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>