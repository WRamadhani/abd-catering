@extends('templates.app')
@section('content')
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ Session::get('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="card">
    <div class="card-header">Data Catering</div>
    <div class="row">
        <div class="col-md-6 mt-3 ml-5">
            <a class="btn btn-outline-primary " href="{{ route('catering.create') }}">
                <i class="fas fa-plus-circle"></i>
                Tambah<span class="sr-only">(current)</span>
            </a>
        </div>
        <div class="col-md-5 mt-3">
            <form class="form-inline my-2 my-lg-0" action="">
                <input class="form-control mr-sm-2 col-lg" type="text" placeholder="Filter by Nama" aria-label="Search" name="search">
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
                        <th scope="col">Nama</th>
                        <th scope="col">Paket</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($catering as $item)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td class="text-left">{{ $item->nama }}</td>
                        <td>{{ $item->paket }}</td>
                        <td>
                            <a class="btn-sm btn-primary mr-1" href="{{ route('catering.show',$item->id) }}">
                                <i class="fas fa-eye"></i>
                                Detail <span class="sr-only">(current)</span></a>
                                <a class="btn-sm btn-success d-inline mr-1" href="{{ route('catering.edit',$item->id) }}">
                                    <i class="fas fa-pencil-alt"></i>
                                    Edit <span class="sr-only">(current)</span></a>
                                    <form class="d-inline" onsubmit="return confirm('Delete this item permanently?')" action="{{route('catering.destroy', $item->id)}}" method="POST">
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
                <div class="row justify-content-center">
        {{ $catering->links() }}
    </div>
            </div>
        </div>
        <hr>
        <div class="card border-kuning">
            <div class="card-header bg-pink">
                Testimoni Pelanggan
            </div>
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        @foreach($testimoni as $item)
                        <div class="col-lg-4 mb-4">
                            <div class="card text-center border-kuning">
                                <div class="card-header bg-pink ">
                                    <strong>{{ $item->user->username }}</strong>
                                </div>
                                <div class="card-body text-left">
                                    <div class="row">
                                        <div class="col-12">
                                            <p>{{ $item->deskripsi }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endsection