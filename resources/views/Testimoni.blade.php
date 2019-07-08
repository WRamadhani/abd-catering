@extends('templates.app')
@section('content')
<div class="card">
	<div class="card-header">Testimoni</div>
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
		<form action="{{ route('testi') }}" method="POST" accept-charset="utf-8">
			@csrf
			<div class="card border-kuning">
				<div class="card-header">
						<strong>Testimoni {{ Auth::user()->username }}</strong>
					</div>
				<div class="card-body">
					<div class="form-group row">
						<label for="deskripsi" class="col-sm-2 col-form-label text-md-right">
							{{ __('Testimoni') }}
						</label>
						<div class="col-md-10">
							<textarea name="deskripsi" class="form-control {{$errors->first('deskripsi') ? "is-invalid": ""}}" id="deskripsi" cols="20" rows="5">{{ old('deskripsi') }}</textarea>
							@if ($errors->has('deskripsi'))
							<span class="invalid-feedback">
								<strong>{{ $errors->first('deskripsi') }}</strong>
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