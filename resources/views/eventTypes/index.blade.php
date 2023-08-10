@extends('layout.app')

<div class=" mx-12 my-8 flex justify-between">
    <title> {{ $title?? '' }}</title>
    <a class="px-4 py-3 bg-green-600 rounded-md" href="{{route('eventTypes.create')}}">Craete A New Event Type</a>
</div>
<div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-blue-100 dark:text-blue-100">
        <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 dark:text-white">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($eventTypes as $eventType)
                           
            <tr class="bg-blue-600 border-b border-blue-400 hover:bg-blue-500">
                <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                    {{$eventType->name}}
                </th>
                
                <td class="px-6 py-4">
                    <a href="{{route('eventTypes.show', $eventType->id)}}" class="font-medium text-yellow-600  hover:underline">Show</a>
                    <a href="{{route('eventTypes.edit', $eventType->id)}}" class="font-medium text-green-600  hover:underline">Edit</a>
                    
                   
                    <form class="inline" action="{{route('eventTypes.destroy', $eventType->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input class="font-medium text-red-600 hover:underline" type="submit" value="Delete">
                    </form> 
                </td>
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