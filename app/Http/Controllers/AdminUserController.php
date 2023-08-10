<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title']="Create User";
        $data['users']=User::all();
        return view("User.index",$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title']='User Create';
        
        $data['adminUser']= new User;
        return view('User.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $formData=$request->validated();

        if(User::create($formData)){
            return redirect()->route('adminUser.index')->
            with('SUCCESS_MASSAGE','The event has been created sucessfully!');
        }
        return redirect()->back()->withInput()->with('ERROR_MASSAGE','Somethingwent Wrong! ');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $data['title']=" User Edit";  
        
        $data['adminUser']=$user;     
        return view('User.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
