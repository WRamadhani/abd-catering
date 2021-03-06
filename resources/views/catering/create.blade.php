@extends('templates.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Catering Baru</div>
                <div class="card-body">
                    <form action="{{ route('catering.store') }}" class="form-group" method="POST">
                    @csrf
                    <div class="row" >
                        <div class="col-md-3">
                            <label for="nama">Nama</label>
                        </div>
                        <div class="col-md-8">
                            <input value="{{ old('nama') }}" type="text" class="form-control {{$errors->first('nama') ? "is-invalid": ""}}" name="nama" id="nama">
                            <div class="invalid-feedback">
                                {{$errors->first('nama')}}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" >
                        <div class="col-md-3">
                            <label for="paket">Paket</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control {{$errors->first('paket') ? "is-invalid": ""}}" name="paket" id="paket">
                            <div class="invalid-feedback">
                                {{$errors->first('paket')}}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row" >
                        <div class="col-md-3">
                            <label for="harga">Harga</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control {{$errors->first('harga') ? "is-invalid": ""}}" name="harga" id="harga">
                            <div class="invalid-feedback">
                                {{$errors->first('harga')}}
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
