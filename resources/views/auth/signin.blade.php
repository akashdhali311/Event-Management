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
    <!-- Signing -->
<div class="bg-grey-lighter rounded bg-blue-800 min-h-screen flex flex-col">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
        <form action="{{route('signin')}}" method="post">
            @csrf
            <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                <h1 class="mb-8 text-3xl text-center">Sign in</h1>
                
    
            <div>
                <input 
                    type="email"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="email"
                    value="{{old('email')}}"
                    placeholder="Email" />
                    @error('email')
                     <p class="text-red-600 mb-4">{{$message}}</p>   
                    @enderror
            </div>
    
                <div>
                    <input 
                    type="password"
                    class="block border border-grey-light w-full p-3 rounded mb-4"
                    name="password"
                    placeholder="Password" />
                    @error('password')
                    <p class="text-red-600 mb-4">{{$message}}</p>  
                    @enderror
                </div>
    
                <button
                    type="submit"
                    class="w-full text-center py-3 rounded bg-blue-800 text-white hover:bg-green-dark focus:outline-none my-1"
                >Sign In</button>
              
            </div>
        </form>
    </div>
</div>
    
</body>
</html>