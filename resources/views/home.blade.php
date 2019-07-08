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
<div class="row">
	<div class="col-12 text-left">
		<a href="{{ route('testimoni',Auth::user()->username) }}" class="btn btn-pink"><i class="fas fa-comments mr-2"></i>Tambahkan testimoni kamu</a>
	</div>
</div>
<br>
<div class="card">
    <div class="card-header">Catering</div>
    <div class="card-body">
    	<div class="container-fluid">
    		<div class="row">
        @foreach($catering as $item)
        	<div class="col-lg-4 mb-4">
        		<div class="card text-center border-kuning">
        			<div class="card-header bg-pink ">
        				<strong>{{ $item->nama }}</strong>
        			</div>
        			<div class="card-body">
        				<img src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->name }}" class="img-thumbnail" width="50%" height="50px"><hr>
        				<div class="row">
        					<div class="col-4">
        						Harga
        					</div>
        					<div class="col-8">
        						<p>Rp {{ $item->harga }}</p>
        					</div>
        				</div>
        				<hr>
        				<div class="row">
        					<div class="col-4">
        						Paket
        					</div>
        					<div class="col-8">
        						<p>{{ $item->paket }}</p>
        					</div>
        				</div>
        				<a href="{{ route('pesan',$item->nama) }}" class="btn btn-pink">{{ __('Pesan') }}</a>
        			</div>
        		</div>
        	</div>
        @endforeach
        </div>
    	</div>
    </div>
</div>
<hr>
<div class="card">
	<div class="card-header">
		Testimoni
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
        				{{-- <div class="row">
        					<div class="col-16"> --}}
        						<p>{{ $item->deskripsi }}</p>
        					{{-- </div>
        				</div> --}}
        			</div>
        		</div>
        	</div>
        @endforeach
        </div>
    	</div>
	</div>
</div>
@endsection