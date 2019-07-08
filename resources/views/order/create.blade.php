@extends('templates.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Catering Baru</div>
                <div class="card-body">
                    <form action="{{ route('order.store') }}" class="form-group" method="POST">
                    @csrf
                    <div class="row" >
                        <div class="col-md-3">
                            <label for="user_id">Pemesan</label>
                        </div>
                        <div class="col-md-8">
                            <select name="user_id" class="custom-select">
                                <option value="">-- Pilih Pelanggan --</option>
                                @foreach($users as $item)
                                @if($item->role == 'user')
                                    <option value="{{ $item->id }}">{{ $item->username }}</option>
                                @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{$errors->first('user_id')}}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" >
                        <div class="col-md-3">
                            <label for="catering_id">Catering</label>
                        </div>
                        <div class="col-md-8">
                            <select name="catering_id" class="custom-select">
                                <option value="">-- Pilih Catering --</option>
                                @foreach($caterings as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{$errors->first('catering_id')}}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" >
                        <div class="col-md-3">
                            <label for="jumlah_pesanan">Jumlah Pesanan</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control {{$errors->first('jumlah_pesanan') ? "is-invalid": ""}}" name="jumlah_pesanan" id="jumlah_pesanan">
                            <div class="invalid-feedback">
                                {{$errors->first('jumlah_pesanan')}}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" >
                        <div class="col-md-3">
                            <label for="waktu_pesanan">Waktu Pesanan</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control {{$errors->first('waktu_pesanan') ? "is-invalid": ""}}" name="waktu_pesanan" id="waktu_pesanan">
                            <div class="invalid-feedback">
                                {{$errors->first('waktu_pesanan')}}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" >
                        <div class="col-md-3">
                            <label for="total">Total</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control {{$errors->first('total') ? "is-invalid": ""}}" name="total" id="total">
                            <div class="invalid-feedback">
                                {{$errors->first('total')}}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3 offset-md-5 offset-sm-4">
                            <button type="submit" class="btn btn-outline-primary">Create</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('sidebar')
<nav class="col-md-12 d-none d-md-block bg-light sidebar card">
    <div class="navbar-header bg-dark text-white text-center"><h4>Dashboard</h4></div>
    <ul class="nav flex-column mt-3">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('user.index') }}">
                <span class="fas fa-user"></span>
                Pengguna
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('catering.index') }}">
                <span class="fas fa-utensils"></span>
                Catering
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('order.index') }}">
                <span class="fas fa-shopping-basket"></span>
                Order
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('testimoni.index') }}">
                <span class="fas fa-comments"></span>
                Testimoni
            </a>
        </li>
    </ul>
</nav>
<br>
@endsection
