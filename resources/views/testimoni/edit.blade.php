@extends('templates.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit Data Testimoni</div>
                <div class="card-body">
                    <form action="{{ route('testimoni.update',$testimonis['id']) }}" method="POST" class="form-group">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-3">
                            <label for="user_id" class="text-primary">Username</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control {{ $errors->first('user_id') ? "is-invalid": "" }}" name="user_id" id="user_id" value="{{ old('user_id') ? old('user_id') : $testimonis->user->username }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('user_id') }}
                            </div>
                        </div>                      
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="deskripsi" class="text-primary">Testimoni</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="deskripsi" class="form-control {{$errors->first('deskripsi') ? "is-invalid": ""}}" id="deskripsi" cols="20" rows="5">{{ old('password') ? old('password') : $testimonis['deskripsi'] }}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('testimoni') }}
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