<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\UserEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $data['title']="Dashboard";
        $data['eventsall']=Event::with('eventType')->paginate();
        $data['events']=UserEvent::where('user_id',auth()->id())->get();
        return view ('dashboard',$data);
    }
    public function admin(Request $request)
    {
        $data['title']="Admindashboard";
        
        return view('admindashboard', $data);
    }
}
