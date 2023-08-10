<div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                
    <div>
        <input 
        type="text"
        class="block border border-grey-light w -full p-3 rounded mb-4"
        name="first_name"
        value="{{old('first_name', $adminUser->first_name)}}"
        placeholder="Fast_name"/>
        @error('first_name')
                {{$message}}
        @enderror

    </div>
    <div>
        <input 
        type="text"
        class="block border border-grey-light w -full p-3 rounded mb-4"
        name="last_name"
        value="{{old('last_name', $adminUser->last_name)}}"
        placeholder="Last_name"/>
        @error('last_name')
                {{$message}}
        @enderror

    </div>
    <div>
        <input 
        type="text"
        class="block border border-grey-light w -full p-3 rounded mb-4"
        name="username"
        value="{{old('username', $adminUser->username)}}"
        placeholder="Username"/>
        @error('username')
                {{$message}}
        @enderror

    </div>
   

    
    <div>
        <input 
        type="email"
        class="block border border-grey-light w -full p-3 rounded mb-4"
        name="email"
        value="{{old('email', $adminUser->email)}}"
        placeholder="Email"/>
        @error('email')
                {{$message}}
        @enderror

    </div>
    <div>
        <input 
        type="text"
        class="block border border-grey-light w -full p-3 rounded mb-4"
        name="password"
        value="{{old('password', $adminUser->password)}}"
        placeholder="Password"/>
        @error('password')
                {{$message}}
        @enderror

    </div>
           
        
        <button
                    type="submit"
                    class="w-full text-center py-3 rounded bg-green-600 text-white hover:bg-green-dark focus:outline-none my-1"
                >{{$buttonText}}
        </button>
</div>