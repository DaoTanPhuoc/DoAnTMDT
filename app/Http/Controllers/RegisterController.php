<?php
namespace App\Http\Controllers;

use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
class RegisterController extends Controller{
   public function register(){
    $data['title']='register';
    return view('register',$data);
   }

   public function register_action(Request $request){
    $request->validate([
       'name'=>'required',
       
       'password'=>'required',
       
    ]);
    $user = new User([
       'name'=>$request->name,
       'email'=>$request->email,
       'password'=>Hash::make($request->name),
    ]);
    $user->save();
    return redirect()->route('login')->with('sucess', 'Registration Sucess. Please Login! ');
   }

   public function login(){
      $data['title']='Login';
      return view('login',$data);
     }

     public function login_action(Request $request){
      $request->validate([
         'email'=>'required|email',
         'password'=>'required|string',
         
      ]);
      if(Auth::attempt(['email'=> $request->email, 'password' => $request->password])){
         $request->session()->regenerate();
         return redirect()->intended('/');
         
      }
      return back()->withErors('password', 'worng username or password');
     }

}