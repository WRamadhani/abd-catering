<?php

namespace App\Http\Controllers;

use App\Testimoni;
use App\User;
use Illuminate\Http\Request;
use Auth;

class TestimoniController extends Controller {
    public function index(Request $request) {
        $testimonis = Testimoni::when($request->search, function ($query) use($request) {
            $query->where('deskripsi','LIKE',"%{$request->search}%");
        })->orderBy('id','desc')->paginate(3);
        $testimonis->appends($request->only('search'));
        return view('testimoni.index',compact('testimonis'));
    }

    public function create() {
        $users = User::all();
        return view('testimoni.create', compact('users'));
    }

    public function store(Request $request) {
        $request->validate([
            'deskripsi'=>'required|max:100',
            'user_id'=>'required',
        ]);

        $new_testimoni = new Testimoni();
        $new_testimoni->user_id = $request->user_id;
        $new_testimoni->deskripsi = $request->deskripsi;
        $new_testimoni->save();
        return redirect()->route('testimoni.index')->with('status','Testimoni Succesfully Created');
    }

    public function show($id) {
        $testimonis = Testimoni::findOrFail($id);
        return view('testimoni.show',compact('testimonis'));
    }

    public function edit($id) {
        $testimonis = Testimoni::findOrFail($id);
        return view('testimoni.edit',compact('testimonis'));
    }

    public function update(Request $request, $id) {
        $update_testimoni = Testimoni::findOrFail($id);
        $request->validate([
            'deskripsi'=>'required|max:100',
        ]);

        $update_testimoni->deskripsi = $request->deskripsi;
        $update_testimoni->save();
        return redirect()->route('testimoni.index')->with('status','Testimoni Succesfully Updated');
    }

    public function destroy($id) {
        $testimonis = Testimoni::findOrFail($id);
        $testimonis->delete();
        return redirect()->route('testimoni.index')->with('status', 'Testimoni Successfully Deleted');
    }

    public function test($username) {
        $users = User::where('username',$username)->get();
        return view('Testimoni', compact('users'));
    }

    public function testi(Request $request) {
        $request->validate([
            'deskripsi'=>'required|max:100',
        ]);

        $new_testimoni = new Testimoni();
        $new_testimoni->user_id = Auth::id();
        $new_testimoni->deskripsi = $request->deskripsi;
        $new_testimoni->save();
        return redirect('/home')->with('success',"Terima kasih telah memberikan kami feedback");
    }    
}
