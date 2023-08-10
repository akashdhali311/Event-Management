<div class="flex w-full m-5 justify-between">
    <div>
        <div class=" my-4 mx-6  text-blue-600">
            <a  href="{{route('eventTypes.index')}}">Event Type</a>
       </div>
       <div class=" my-4 mx-6  text-blue-600">
        <a  href="{{route('events.index')}}"> Event </a>
   </div>
   <div class=" my-4 mx-6  text-blue-600">
    <a  href="{{route('adminUser.index')}}"> User </a>
</div>
       
    </div>
    <div class="py-4 px-6 text-right flex justify-end">

        <span class="text-gray-600 mr-4">{{auth()->user()->username}} </span>
       

        {{--<a class="text-blue-600" href="{{route('signup') }}">Sign Up  </a>--}}
        <form action="{{route('signout')}}" method="post">
        @csrf
        <button class="text-blue-600 " type="submit">Sign Out</button>
        </form>

    </div>
</div>
