<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title?? ''}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('styles')
</head>

<body>
    
       <div>
        @include('layout.includes.nav')
    </div>
       
       <a href="{{route('adminUser.create')}}">Create User</a>


       <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-blue-100 dark:text-blue-100">
            <thead class="text-xs text-white uppercase bg-blue-600 border-b border-blue-400 dark:text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $key)
                               
                <tr class="bg-blue-600 border-b border-blue-400 hover:bg-blue-500">
                    <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                        {{$key->email}}
                    </th>
                    
                    <td class="px-6 py-4">
                        <a href="{{route('adminUser.show', $key->id)}}" class="font-medium text-yellow-600  hover:underline">Show</a>
                        <a href="{{route('adminUser.edit', $key->id)}}" class="font-medium text-green-600  hover:underline">Edit</a>
                        
                       
                        <form class="inline" action="{{route('adminUser.destroy', $key->id)}}" method="post">
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
    
    
</body>
</html>