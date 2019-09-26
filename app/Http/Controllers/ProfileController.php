<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Auth;


class ProfileController extends Controller
{
    public function index()
    {    
        return view('profile', array('user' => Auth::user()));
    }

 

    public function update(Request $request){

 

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save( public_path('\uploads\\' . $filename) );

 

            $user = Auth::user();
            $user->image = $filename;
            $user->save();
        }
        return view('users.show', array('user' => Auth::user()));
    }
}