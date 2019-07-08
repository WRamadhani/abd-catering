<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Mobile_Detect;
use App\Catering;
use App\Testimoni;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $detect = new Mobile_Detect;
        if (Auth::user()->role == 'catering') {
            return redirect('/caterer');
        }elseif (Auth::user()->role == 'user') {
            return redirect('/home');
        }else {
            if ($detect->isMobile()) {
                Auth::logout();
                return redirect()->route('login')->with('status','Admin disarankan menggunakan perangkat dengan layar besar (Laptop, Tablet, PC)');
            }
            return redirect()->route('user.index');
        }
    }

    public function indexCatering(Request $request) {
        $catering = Catering::when($request->search, function ($query) use($request) {
            $query->where('nama','LIKE',"%{$request->search}%");
        })->orderBy('id','desc')->paginate(3);
        $catering->appends($request->only('search'));
        $testimoni = Testimoni::all();
        return view('caterer', compact('catering','testimoni'));
    }

    public function indexUser() {
        $catering = Catering::all();
        $testimoni = Testimoni::all();
        return view('home', compact('catering','testimoni'));
    }    
}
