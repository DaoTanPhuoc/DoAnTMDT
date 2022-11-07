<?php
namespace App\Http\Controllers;

use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
class RegisterController extends Controller{
    public function register(Request $request){
        User::created([
            'name'=>$request->name,
            'email' =>$request->email,
            'password'=> Hash::make($request->password)
        ]);

        return back()->with('sucess', 'user has been created successfull');
    }
}