<!DOCTYPE html>
<html lang="en">
	@include('templates.partials._head')
	<body>
		<div class="container-fluid h-100">
			<div class="row h-100">
				@include('templates.partials._top')
				{{-- <div class="container-fluid bg-patern"> --}}
					<main class="col mt-3">
						<div class="card _gradient">
							<div class="card-body">
								@yield('content')
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-md-12 w-100">
								<div class="card bg-hitam text-white">
									<div class="card-body">
										&copy;Pemrograman Framework
									</div>
								</div>
							</div>
						</div>
					</main>
				</div>
			</div>
			@include('templates.partials._script')
		</body>
	</html>