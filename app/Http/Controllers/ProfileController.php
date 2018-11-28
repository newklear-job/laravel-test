<?php

namespace App\Http\Controllers;

use Debugbar;
use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $user = User::where('name', $name)->first();
        return view('profile', ['user'=>$user]);
    }

    public function update_avatar(Request $request, User $user){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;
        $user->save();

        return back()->with('success','You have successfully uploaded image.');

    }
}
