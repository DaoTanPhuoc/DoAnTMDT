<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller{
    public function login(Request $request){
       if(Auth::attempt($request->only('email','password'))){
        return redirect()->route("index");
       } 

       return back()->with('error', 'user has been created successfull');
    }
}