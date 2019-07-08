<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller {
    public function index(Request $request) {
        $users = User::when($request->search, function ($query) use($request) {
            $query->where('username','LIKE',"%{$request->search}%");
        })->orderBy('id','desc')->paginate(3);
        $users->appends($request->only('search'));
        return view('user.index',compact('users'));
    }

    public function create() {
        return view('user.create');
    }

    public function store(Request $request) {
        $request->validate([
            'username'=>'required|alpha_dash|min:3|max:100|unique:users',
            'role'=>'required',
            'password'=>'required|min:8',
            'password_confirmation'=>'required|same:password',
        ]);

        $new_user = new User();
        $new_user->username = $request->username;
        $new_user->role = $request->role;
        $new_user->password = Hash::make($request->password);
        $new_user->save();
        return redirect()->route('user.index')->with('status','User Succesfully Created');
    }

    public function show($id) {
        $users = User::findOrFail($id);
        return view('user.show',compact('users'));
    }
    
    public function edit($id) {
        $users = User::findOrFail($id);
        return view('user.edit',compact('users'));
    }
    
    public function update(Request $request, $id) {
        $update_user = User::findOrFail($id);
        $request->validate([
            'username'=>'required',
            'password_confirmation'=>'same:password',
            'role'=>'required',
        ]);
        $update_user->role = $request->username;
        $update_user->role = $request->role;
        $update_user->save();
        return redirect()->route('user.index')->with('status','User succesfully updated');
    }
    
    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('status', 'User Successfully deleted');
    }
}
