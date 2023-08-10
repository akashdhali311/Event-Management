<div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
                
    <div>
        <input 
        type="text"
        class="block border border-grey-light w -full p-3 rounded mb-4"
        name="name"
        value="{{old('name', $events->name)}}"
        placeholder="Name"/>
        @error('name')
                {{$message}}
        @enderror

    </div>
        
        <div>
            <select name="event_type_id" class="mb-4 bg-gray-50 border 
        border-gray-300 text-gray-900 text-sm rounded-lg 
        focus:ring-blue-500 focus:border-blue-500 block w-full 
        p-2.5 ">
            <option selected>Choose Category Evernt type</option>

                @foreach ($eventTypes as $eventType)
                <option  {{old('event_type_id',$events->event_type_id)==$eventType->id ? 'selected' : ''}} 
                    value="{{$eventType->id}}">{{$eventType->name}}
                </option>
                @endforeach
         
          </select>
          @error('event_type_id')
                {{$message}}
            @enderror
        </div>
    
        <div>
            <textarea class="block border border-grey-light w-full p-3 rounded mb-4" name="description" 
        value="{{old('description')}}" 
        cols="30" rows="10" 
        placeholder="Description" >{{$events->description}}</textarea>

        @error('description')
                {{$message}}
            @enderror
        </div>
        <div>
            <input 
            type="text"
            class="block border border-grey-light w -full p-3 rounded mb-4"
            name="location"
            value="{{old('location', $events->location)}}"
            placeholder="Location"/>
            @error('location')
                    {{$message}}
            @enderror
    
        </div>
        <div>
            <input 
            type="datetime-local"
            class="block border border-grey-light w -full p-3 rounded mb-4"
            name="start_at"
            value="{{old('start_at', $events->start_at)}}"
            placeholder="Start_at"/>
            @error('start_at')
                    {{$message}}
            @enderror
    
        </div>
        <div>
            <input 
            type="datetime-local"
            class="block border border-grey-light w -full p-3 rounded mb-4"
            name="end_at"
            value="{{old('end_at', $events->end_at)}}"
            placeholder="End_at"/>
            @error('end_at')
                    {{$message}}
            @enderror
    
        </div>
        
        <div class="flex items-center my-5">
            <input id="link-radio" type="checkbox" value="1" name="published_at" {{old('published_at',$events->published_at ) ? 'checked' : ''}} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 ">
            <label for="link-radio" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Publish</label>
        </div>

        
  <button
     type="submit"
      class="w-full text-center py-3 rounded bg-green-600 text-white hover:bg-green-dark focus:outline-none my-1"
      >{{$buttonText}}
    </button>
</div>

