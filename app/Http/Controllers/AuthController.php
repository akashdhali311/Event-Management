<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\SigninRequest;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signin(){
        $data['title']= 'Signin';
        return view('auth.signin',$data);
    }

    public function postSignin(SigninRequest $request){
        $user= User::where('email',$request->get('email'))->first();
        if($user->is_admin == 1)
        {
            
            if(!Hash::check($request->get('password'),$user->password))
            {
                return redirect()
                ->back()
                ->withInput()
                ->withErrors(['email'=>'The Email Does not exist in our record!']);
            }
            Auth::login($user);
            return redirect()->route('admindashboard')->with('SUCCESS MESSAGE','Successfully Signin!');
            
        }else{
            if(!$user){
                return redirect()
                ->back()
                ->withInput()
                ->withErrors(['email'=>'The Email Does not exist in our record!']);
            }
            if(!Hash::check($request->get('password'),$user->password)){
                return redirect()
                ->back()
                ->withInput()
                ->withErrors(['email'=>'The Email Does not exist in our record!']);
            }
            Auth::login($user);
            return redirect()->route('dashboard')->with('SUCCESS MESSAGE','Successfully Signin!');
            
        }
        return redirect()->route('dashboard')->with('SUCCESS MESSAGE','Successfully Signin!');
            
        
    }
    public function signOut(){
        if(Auth::check())
        {
            Auth::logout();
        }
        return redirect()->route('signin')->with('SUCCESS_MASSAGE','Successfully Logout!');
    }
    public function signup(){
        $data ['title']=("Signup");
        return view('auth.signup',$data);
    }
    public function postSignup(SignupRequest $request){
        $validateData=$request->validated();        
        if (User::create($validateData)){
        return redirect()->route('signin')->with('SUCCESS_MASSAGE','You Have Been Registered Successfully.');         
        }
        return redirect()
        ->back()
        ->withInput()
        ->with('ERROR_MASSAGE','Somthing Went Wrong!');
    }
}
