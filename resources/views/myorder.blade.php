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
    <div class="card-header">Pesanan Saya</div>
    <div class="card-body">
    	<div class="container-fluid">
    		<div class="row">
        @foreach($myorder as $item)
        	<div class="col-lg-6 mb-4">
        		<div class="card border-kuning text-center">
        			<div class="card-header bg-pink">
        				<strong>{{ $item->no_pesanan }}</strong>
        			</div>
        			<div class="card-body">
        				<img src="{{ asset('storage/'.$item->catering->foto) }}" alt="{{ $item->name }}" class="img-thumbnail" width="50%" height="50px"><hr>
        				<div class="row text-left">
        					<div class="col-6">
        						Nama Masakan
        					</div>
        					<div class="col-6">
        						<p>{{ $item->catering->nama }}</p>
        					</div>
        				</div>
        				<hr>
        				<div class="row text-left">
        					<div class="col-6">
        						Paket
        					</div>
        					<div class="col-6">
        						<p>{{ $item->catering->paket }}</p>
        					</div>
        				</div>
                        <div class="row text-left">
                            <div class="col-6">
                                Jumlah Pesanan
                            </div>
                            <div class="col-6">
                                <p>{{ $item->jumlah_pesanan }}</p>
                            </div>
                        </div>
                        <div class="row text-left">
                            <div class="col-6">
                                Total
                            </div>
                            <div class="col-6">
                                <p>{{ $item->total }}</p>
                            </div>
                        </div>
                        <div class="row text-left">
                            <div class="col-6">
                                Alamat Pemesanan
                            </div>
                            <div class="col-6">
                                <p>{{ $item->alamat_pesanan }}</p>
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