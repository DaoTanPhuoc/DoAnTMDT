<?php

namespace App\Http\Controllers;

use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Psy\Readline\Hoa\Console;

class RegisterController extends Controller
{
   public function register()
   {
      $data['title'] = 'register';
      return view('register', $data);
   }

   public function register_action(Request $request)
   {
      $request->validate([
         'name' => 'required',

         'password' => 'required',

      ]);
      $user = new User([
         'name' => $request->name,
         'email' => $request->email,
         'password' => Hash::make($request->password),
      ]);
      $user->save();
      return redirect()->route('login')->with('sucess', 'Registration Sucess. Please Login! ');
   }

   public function login()
   {
      $data['title'] = 'Login';
      return view('login', $data);
   }

   public function login_action(Request $request)
   {
      $request->validate([
         'email' => 'required|email',
         'password' => 'required|string',
      ]);

      $request->password = Hash::make($request->password);
      $credentials = $request->only('email', 'password');
      if (Auth::attempt($credentials)) {
         $request->session()->regenerate();
         return redirect()->route('index');
      } else echo $request->password;
   }
}