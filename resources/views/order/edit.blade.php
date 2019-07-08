@extends('templates.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Data Order</div>
                <div class="card-body">
                    <form action="{{ route('order.update',$orders['id']) }}" method="POST" class="form-group">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-3">
                            <label for="catering_id" class="text-primary">Catering</label>
                        </div>
                        <div class="col-md-8">
                            <select name="catering_id" class="custom-select">
                                @foreach($caterings as $item)
                                <option
                                @if($item->id == $orders->catering->id)
                                selected
                                @endif
                                value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('catering_id') }}
                            </div>
                        </div>                      
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="jumlah_pesanan" class="text-primary">Jumlah Pesanan</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control {{ $errors->first('jumlah_pesanan') ? "is-invalid": "" }}" name="jumlah_pesanan" id="jumlah_pesanan" value="{{ old('jumlah_pesanan') ? old('jumlah_pesanan') : $orders['jumlah_pesanan'] }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('jumlah_pesanan') }}
                            </div>
                        </div>                      
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="waktu_pesanan" class="text-primary">Waktu Pesanan</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control {{ $errors->first('waktu_pesanan') ? "is-invalid": "" }}" name="waktu_pesanan" id="waktu_pesanan" value="{{ old('waktu_pesanan') ? old('waktu_pesanan') : $orders['waktu_pesanan'] }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('waktu_pesanan') }}
                            </div>
                        </div>                      
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="total" class="text-primary">Total</label>
                        </div>
                        <div class="col-md-8">
                            <input type="number" class="form-control {{ $errors->first('total') ? "is-invalid": "" }}" name="total" id="total" value="{{ old('total') ? old('total') : $orders['total'] }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('total') }}
                            </div>
                        </div>                      
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3 offset-md-5 offset-sm-4">
                            <button type="submit" class="btn btn-outline-primary" >Update</button>
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