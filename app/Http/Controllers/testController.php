<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index(Request $request,$id)
    {
        //$id=$request->get('id');
        // return User::find($id);
        // return User::where('name',$name)->get();
        // return User::orderBy('id')->get();
        // $user = new User();
        // $user->name = 'nour';
        // $user->email = 'nour@gimal.com';
        // $user->password = '123456789';
        // $user->save();

        // $user=User::find(1);
        // $user->name='kahled abd albasut';
        // $user->save();

        $user=User::find(1);
        $user->delete();

    }

    public function home()
    {
        return view('home');
    }
}
