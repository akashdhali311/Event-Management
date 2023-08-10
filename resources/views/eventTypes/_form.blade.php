<div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                
    <div>
        <input 
        type="text"
        class="block border border-grey-light w -full p-3 rounded mb-4"
        name="name"
        value="{{old('name', $eventTypes->name)}}"
        placeholder="Name"/>
        @error('name')
                {{$message}}
        @enderror

    </div>
           
        
        <button
                    type="submit"
                    class="w-full text-center py-3 rounded bg-green-600 text-white hover:bg-green-dark focus:outline-none my-1"
                >{{$buttonText}}
        </button>
</div>