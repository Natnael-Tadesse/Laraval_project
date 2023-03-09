<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use Illuminate\support\Facades\Hash;
use App\models\user;
use Session;


class AuthManager extends Controller
{
    function login() {

if(Auth::check())
{
    return redirect(route('Home'));
}

        return view('login');
           }
  
    function registration(){
        if(Auth::check())
{
    return redirect(route('Home'));
}

        return view('registration');
    }
  function loginPost (Request $request)
   {
$request-> validate([
   'email' => 'required',
   'password' => 'required'
]);
  $credential = $request->only('email','password');
  if(Auth::attempt($credential))
  {
     return redirect()->intended(route('Home'));
   }
   return redirect(route('login'))->with("error","Log in failed" );
   }
function registrationPost(Request $request)
{   
    $request-> validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required'
     
     ]);
        $data['name'] = $request -> name;
      $data['email'] = $request -> email;

      $data['password'] = Hash::make($request -> password);
      $data[''] = $request -> name;

           $user =User::create($data);
           if(!$user)
           {
            return redirect(route('registration'))->with("error","Rejister fail " );
           }
           return redirect(route('login'))->with("sucess","Sucess" );
}

function logout()
{
    Session::flush();
    Auth::logout();
    return redirect(route('login'));
}
}


   ?>