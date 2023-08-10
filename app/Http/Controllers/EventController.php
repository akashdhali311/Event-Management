<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventType;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title']="Event List";
        $data['events']=Event::with('eventType')->paginate();
        return view('Events.index',$data);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title']='Create Event';
        $data['eventTypes']= EventType::all();
        $data['events']= new Event;
        return view("Events.create",$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $formData = $request->validated();
        if($request->has('published_at')){

            $formData['published_at']=now();
    
        }    
        if(Event::create($formData)){
            return redirect()->route('events.index')->
            with('SUCCESS_MASSAGE','The event has been created sucessfully!');
        }
        return redirect()->back()->withInput()->with('ERROR_MASSAGE','Somethingwent Wrong! ');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $data['title']=" Edit Event"; 
        
        $data['events']=$event;     
        return view('Events.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, Event $event)
    {
        $formData=$request->validated();
        
        if($eventType->update($formData)){
            return redirect()->route('eventTypes.index')->
            with('SUCCESS_MASSAGE','The post has been updated sucessfully!');
        }
        return redirect()->back()->withInput()->with('ERROR_MASSAGE','Somethingwent Wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if($event->delete()){
            return redirect()->route('events.index')->
            with('SUCCESS_MASSAGE','The post has been Deleted sucessfully!');
        } 
        return redirect()->back()->with('ERROR_MASSAGE','Somethingwent Wrong! '); 
    }
}
