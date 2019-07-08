@extends('templates.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card">
                <div class="card-header">Data Order</div>
                <div class="row">
                <div class="col-md-6 mt-3 ml-5">
                    <a class="btn btn-outline-primary " href="{{ route('order.create') }}">
                        <i class="fas fa-plus-circle"></i>
                        Tambah<span class="sr-only">(current)</span>
                    </a>
                </div>
                <div class="col-md-5 mt-3">
                    <form class="form-inline my-2 my-lg-0" action="">
                        <input class="form-control mr-sm-2 col-lg" type="text" placeholder="Filter by No Pesanan" aria-label="Search" name="search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        <i class="fas fa-search"></i>
                        Filter</button>
                    </form>
                </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>    
                                    <th scope="col">No</th>
                                    <th scope="col">No Pesanan</th>
                                    <th scope="col">Pelanggan</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td class="text-left">{{ $item->no_pesanan }}</td>
                                    <td>{{ $item->user->username }}</td>
                                    <td>{{ $item->total }}</td>
                                    <td>
                                        <a class="btn-sm btn-primary mr-1" href="{{ route('order.show',$item->id) }}">
                                            <i class="fas fa-eye"></i>
                                            Detail <span class="sr-only">(current)</span></a>
                                        <a class="btn-sm btn-success d-inline mr-1" href="{{ route('order.edit',$item->id) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit <span class="sr-only">(current)</span></a>
                                        <form class="d-inline" onsubmit="return confirm('Delete this item permanently?')" action="{{route('order.destroy', $item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn-sm btn-danger" value="Delete">
                                            <i class="fas fa-trash"></i>
                                            Delete <span class="sr-only">(current)</span></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row justify-content-center">
        {{ $orders->links() }}
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
