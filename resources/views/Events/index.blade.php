@extends('layout.app')

<div class=" mx-12 my-8 flex justify-between">
    <title> {{ $title?? '' }}</title>
    <a class="px-4 py-3 bg-green-600 rounded-md" href="{{route('events.create')}}">Craete A New Event</a>
</div>
<div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-blue-100 dark:text-blue-100">
        <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 dark:text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    event_type_name
                </th>

                <th scope="col" class="px-6 py-3">
                    event_Name
                </th>
                
                <th scope="col" class="px-6 py-3">
                    description
                </th>
               
                <th scope="col" class="px-6 py-3">
                    location
                </th>
                <th scope="col" class="px-6 py-3">
                    start_at
                </th>
                <th scope="col" class="px-6 py-3">
                    end_at
                </th>
                <th scope="col" class="px-6 py-3">
                    published_at
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($events as $event)
                           
            <tr class="bg-blue-600 border-b border-blue-400 hover:bg-blue-500">
                                   
                     <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                         {{$event->eventType->name}}
                     </th>
                     <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                        {{$event->name}}
                    </th>
                     
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$event->description}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$event->location}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$event->start_at}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$event->end_at}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$event->published_at}}
                    </th>
                     
                     
                     <td class="px-6 py-4">
                         
                         <td class="px-6 py-4">
                             <a href="{{route('events.edit', $event->id)}}" class="font-medium text-yellow-600  hover:underline">Show</a>
                     <a href="{{route('events.edit', $event->id)}}" class="font-medium text-green-600  hover:underline">Edit</a>
                         <form class="inline" action="{{route('events.destroy', $event->id)}}" method="post">
                         @csrf
                         @method('DELETE')
                         <input class="font-medium text-red-600 hover:underline dark:text-red-600" type="submit" value="Delete">
                         </form> 
                      </td>
                 </tr>  
                    
                
                
            </tr>
            @empty
            <td class="px-6 py-4 text-black text-center" colspan="5">
                No Data Found!
            </td>

            @endforelse
        </tbody>
    </table>    
 </div>
 
</div>