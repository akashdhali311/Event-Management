<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Comment;
use App\Models\UserEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data['events']=Event::with('eventType')->paginate();
        return view('home',$data); 
    }
    public function singleEvent($id){
        $data['status'] = array(

           '0' => 'Going',
           '1' => 'maybe goingt',
           '2' => 'interestedt',

        );
        
        $data['events']=Event::with('eventType')->where('id',$id)->first();
        $data['comment']=Comment::with('users')->where('event_id',$id)->get();

        return view('singleEvent',$data);
    }
    public function comment(Request $request)
    {
        if(Auth::check()== true)
        {
            $id= $request->event_id;
            $userId=auth()->id();
            Comment::create([
                'user_id'=> $userId,
                'event_id'=> $id,
                'comment'=> $request->comment,
            ]);
        
        $data['status'] = array(

            '0' => 'Going',
            '1' => 'maybe goingt',
            '2' => 'interestedt',
 
         );
         UserEvent::create([
            'user_id'=>$userId,
            'event_id'=>$id,
            'status'=> $request->status,
        ]);
        $data['events']=Event::with('eventType')->where('id',$id)->first();
        $data['comment']=Comment::where('event_id',$id)->get();
        return view('singleEvent',$data);
        }else { 
        return redirect()->route('signin');
        }

    }
    public function userIsGoing($id,$c_id){
        
        return back();
    }
}
