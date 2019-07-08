@extends('templates.app')
@section('content')
<div class="card">
	<div class="card-header">Pesan</div>
	<div class="card-body">
		@if ($errors->any())
    	<div class="alert alert-danger alert-dismissible fade show">
        	<ul>
            	@foreach ($errors->all() as $error)
            		<li>{{ $error }}</li>
            	@endforeach
        	</ul>
        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        	<span aria-hidden="true">&times;</span>
    	</div>
		@endif
		<form action="{{ route('pesanan',$catering[0]->nama) }}" method="POST" accept-charset="utf-8">
			@csrf
			<div class="card border-kuning">
				<div class="card-header">
						<strong>Pemesanan {{ $catering[0]->nama }}</strong>
					</div>
				<div class="card-body">
					<div class="form-group row">
						<label for="jumlah_pesanan" class="col-sm-4 col-form-label text-md-right">
							{{ __('Jumlah Pesanan') }}
						</label>
						<div class="col-md-6">
							<input id="jumlah_pesanan" type="text" class="form-control{{ $errors->has('jumlah_pesanan') ? ' is-invalid' : '' }} input-pink" name="jumlah_pesanan" value="{{ old('jumlah_pesanan') }}" required autofocus placeholder="Minimal 10">
							@if ($errors->has('jumlah_pesanan'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('jumlah_pesanan') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group row">
						<label for="alamat_pesanan" class="col-sm-4 col-form-label text-md-right">
							{{ __('Alamat Pesanan') }}
						</label>
						<div class="col-md-6">
							<input id="alamat_pesanan" type="text" class="form-control{{ $errors->has('alamat_pesanan') ? ' is-invalid' : '' }} input-pink" name="alamat_pesanan" value="{{ old('alamat_pesanan') }}" required autofocus placeholder="Untuk saat ini hanya melayani disekitar Samarinda">
							@if ($errors->has('alamat_pesanan'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('alamat_pesanan') }}</strong>
							</span>
							@endif
						</div>
					</div>
					<div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-pink">
                    {{ __('Pesan') }}
                    </button>
                </div>
            </div>
				</div>
			</div>
		</form>
		<div class="row">
			
		</div>
	</div>
</div>
@endsection