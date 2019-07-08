@extends('templates.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ asset('1.png') }}" id="userbanner" height="140px" width="100%">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <p class="lead">No Pesanan :</p>
                        </div>
                        <div class="col-md-6 col-sm-4">
                            <p class="lead">{{ $orders['no_pesanan'] }}</p>
                        </div>
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="lead">Pelanggan :</p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <p class="lead">{{ $orders->user->username }}</p>
                        </div>
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="lead">Catering :</p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <p class="lead">{{ $orders->catering->nama }}</p>
                        </div>
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="lead">Jumlah Pesanan :</p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <p class="lead">{{ $orders['jumlah_pesanan'] }}</p>
                        </div>
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="lead">Waktu Pesanan :</p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <p class="lead">{{ $orders['waktu_pesanan'] }}</p>
                        </div>
                        <br>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p class="lead">Total :</p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <p class="lead">{{ $orders['total'] }}</p>
                        </div>
                        <br>
                    </div>
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
