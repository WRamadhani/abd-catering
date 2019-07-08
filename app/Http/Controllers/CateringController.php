<?php

namespace App\Http\Controllers;

use App\Catering;
use Illuminate\Http\Request;
use Auth;

class CateringController extends Controller {
    public function index(Request $request) {
        if(Auth::user()->role == 'catering') {
            return redirect('/caterer')->with('success', 'Operasi Berhasil Dilakukan');
        }
    
        $caterings = Catering::when($request->search, function ($query) use($request) {
            $query->where('nama','LIKE',"%{$request->search}%");
        })->orderBy('id','desc')->paginate(5);
        $caterings->appends($request->only('search'));
        return view('catering.index',compact('caterings'));
    }

    public function create() {
        return view('catering.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'nama'=>'required|string|min:3|max:100|unique:caterings',
            'paket'=>'required',
            'harga'=>'required|numeric',
        ]);

        $new_catering = new Catering();
        $new_catering->nama = $request->nama;
        $new_catering->paket = $request->paket;
        $new_catering->harga = $request->harga;
        $new_catering->save();
        return redirect()->route('catering.index')->with('status','Catering Succesfully Created');
    }

    public function show($id) {
        $caterings = Catering::findOrFail($id);
        return view('catering.show',compact('caterings'));
    }

    public function edit($id) {
        $caterings = Catering::findOrFail($id);
        return view('catering.edit',compact('caterings'));
    }

    public function update(Request $request, $id) {
        $update_catering = Catering::findOrFail($id);
        $request->validate([
            'nama'=>'string|min:3|max:100',
            'harga'=>'numeric',
        ]);

        $update_catering->nama = $request->nama;
        $update_catering->paket = $request->paket;
        $update_catering->harga = $request->harga;
        $update_catering->save();
        return redirect()->route('catering.index')->with('status','Catering Succesfully Updated');
    }

    public function destroy($id) {
        $caterings = Catering::findOrFail($id);
        $caterings->delete();
        return redirect()->route('catering.index')->with('status', 'Catering Successfully Deleted');
    }
}
