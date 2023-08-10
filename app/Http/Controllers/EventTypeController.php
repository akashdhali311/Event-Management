<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventType;
use Illuminate\Http\Request;
use App\Http\Requests\EventTypeRequest;

class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title']="EventTypes List";
        $data['eventTypes']=EventType::paginate();
        return view('eventTypes.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title']='Create Event Types';
        $data['eventTypes']= new EventType;
        return view("eventTypes.create",$data);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventTypeRequest $request)
    {
        $formData = $request->validated();
        
    
              
        if(EventType::create($formData)){
            return redirect()->route("eventTypes.index")->
            with('SUCCESS_MASSAGE','The event type has been created sucessfully!');
        }
        return redirect()->back()->withInput()->with('ERROR_MASSAGE','Somethingwent Wrong! ');
    }
    /**
     * Display the specified resource.
     */
    public function show(EventType $eventType)
    {
        
        $data['events']= Event::where("event_type_id",$eventType->id)->get();
        return view('eventTypes.sing_evi',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventType $eventType)
    {
        $data['title']=" Edit Event Type";  
        
        $data['eventTypes']=$eventType;     
        return view('eventTypes.edit',$data);  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventTypeRequest $request, EventType $eventType)
    {
        $formData = $request->validated();
        if($request->has('published_at')){
            $formData['published_at']=now();
        }
    
         
        if($eventType->update($formData)){
            return redirect()->route('eventTypes.index')->
            with('SUCCESS_MASSAGE','The post has been updated sucessfully!');
        }
        return redirect()->back()->withInput()->with('ERROR_MASSAGE','Somethingwent Wrong!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventType $eventType)
    {
        if($eventType->delete()){
            return redirect()->route('eventTypes.index')->
            with('SUCCESS_MASSAGE','The post has been Deleted sucessfully!');
        } 
        return redirect()->back()->with('ERROR_MASSAGE','Somethingwent Wrong! ');  
    }
}

