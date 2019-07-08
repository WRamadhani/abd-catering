<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Catering;
use App\User;
use Carbon\Carbon;
use Auth;

class OrderController extends Controller {
    public function index(Request $request) {
        $orders = Order::when($request->search, function ($query) use($request) {
            $query->where('no_pesanan','LIKE',"%{$request->search}%");
        })->orderBy('id','desc')->paginate(5);
        $orders->appends($request->only('search'));
        return view('order.index',compact('orders'));
    }

    public function create() {
        $users = User::all();
        $caterings = Catering::all();
        return view('order.create',compact('users','caterings'));
    }

    public function store(Request $request) {
        $request->validate([
            'user_id'=>'required',
            'catering_id'=>'required',
            'jumlah_pesanan'=>'required|numeric',
            'waktu_pesanan'=>'required',
            'total'=>'required|numeric',
        ]);

        $today = Carbon::now();
        $now = $today->format('YmdHms');
        $new_order = new Order();
        $new_order->no_pesanan = '00'.$now.'-'.$request->user_id.'-'.$request->catering_id.'-220419';
        $new_order->user_id = $request->user_id;
        $new_order->catering_id = $request->catering_id;
        $new_order->jumlah_pesanan = $request->jumlah_pesanan;
        $new_order->waktu_pesanan = $request->waktu_pesanan;
        $new_order->total = $request->total;
        $new_order->save();
        return redirect()->route('order.index')->with('status','Order Succesfully Created');
    }

    public function show($id) {
        $orders = Order::findOrFail($id);
        return view('order.show',compact('orders'));
    }
    
    public function edit($id) {
        $orders = Order::findOrFail($id);
        $caterings = Catering::all();
        return view('order.edit',compact('orders','caterings'));
    }
    
    public function update(Request $request, $id) {
        $update_order = Order::findOrFail($id);
        $request->validate([
            'catering_id'=>'required',
            'jumlah_pesanan'=>'required|numeric',
            'waktu_pesanan'=>'required',
            'total'=>'required|numeric',
        ]);
        $update_order->catering_id = $request->catering_id;
        $update_order->jumlah_pesanan = $request->jumlah_pesanan;
        $update_order->waktu_pesanan = $request->waktu_pesanan;
        $update_order->total = $request->total;
        $update_order->save();
        return redirect()->route('order.index')->with('status','Order Succesfully Updated');
    }
    
    public function destroy($id) {
        $orders = Order::findOrFail($id);
        $orders->delete();
        return redirect()->route('order.index')->with('status', 'Order Successfully Deleted');
    }

    public function pesan($nama) {
        $catering = Catering::where('nama',$nama)->get();
        return view('pesan',compact('catering'));
    }

    public function pesanan(Request $request, $nama) {
        $catering = Catering::where('nama',$nama)->get();
        $request->validate([
            'jumlah_pesanan'=>'required|numeric',
            'alamat_pesanan'=>'required|string',
        ]);
        if ($request->jumlah_pesanan < 10) {
            return back()->withErrors('Mohon Maaf Jumlah Pesanan Minimal 10')->withInput();
        }
        if (strtolower($request->alamat_pesanan) == 'samarinda' || strtolower($request->alamat_pesanan) == 'tenggarong' || strtolower($request->alamat_pesanan) == 'balikpapan') {
            return back()->withErrors('Mohon masukkan alamat anda dengan benar')->withInput();
        }

        if ($request->jumlah_pesanan == 10) {
            $waktu_pesanan = '2 Jam';
        } elseif ($request->jumlah_pesanan <= 20) {
            $waktu_pesanan = '3 Jam';
        } elseif ($request->jumlah_pesanan > 20 && $request->jumlah_pesanan <= 40) {
            $waktu_pesanan = '4.5 Jam';
        } elseif ($request->jumlah_pesanan > 40 && $request->jumlah_pesanan <= 70) {
            $waktu_pesanan = '2 Hari';
        } else {
            $waktu_pesanan = '3 - 7 Hari';
        }

        $total = $catering[0]->harga * $request->jumlah_pesanan;
        $today = Carbon::now();
        $now = $today->format('YmdHms');
        $new_order = new Order();
        $new_order->no_pesanan = '00'.$now.'-'.Auth::id().'-'.$catering[0]->id.'-220419';
        $new_order->user_id = Auth::id();
        $new_order->catering_id = $catering[0]->id;
        $new_order->waktu_pesanan = $waktu_pesanan;
        $new_order->alamat_pesanan = $request->alamat_pesanan;
        $new_order->jumlah_pesanan = $request->jumlah_pesanan;
        $new_order->total = $total;
        $new_order->save();
        return redirect('/home')->with('success',"'Pesanan telah diproses dan akan diantarkan dalam waktu $waktu_pesanan'");
    }

    public function myorder($username) {
        $myorder = Order::where('user_id',Auth::id())->orderBy('id','desc')->get();
        return view('myorder', compact('myorder'));
    }
}
