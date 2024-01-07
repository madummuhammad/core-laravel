@extends('layouts.admin')

@section('title')
Ubah Surat Undangan
@endsection

@section('container')
<main>
	<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
		<div class="container-fluid px-4">
			<div class="page-header-content">
				<div class="row align-items-center justify-content-between pt-3">
					<div class="col-auto mb-3">
						<h1 class="page-header-title">
							<div class="page-header-icon"><i data-feather="file-text"></i></div>
							Ubah Surat Undangan
						</h1>
					</div>
					<div class="col-12 col-xl-auto mb-3">
						<button class="btn btn-sm btn-light text-primary" onclick="javascript:window.history.back();">
							<i class="me-1" data-feather="arrow-left"></i>
							Kembali Ke Semua Surat Undangan
						</button>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- Main page content-->
	<div class="container-fluid px-4">
		@if ($errors->any())
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
			<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		@endif
		<form action="{{ route('undangan.update', $item->id) }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row gx-4">
				<div class="col-lg-9">
					<div class="card mb-4">
						<div class="card-header text-success">Form Undangan</div>
						<div class="card-body">
							<div class="mb-3 row">
								<label for="no_undangan" class="col-sm-3 col-form-label">Nomor Undangan</label>
								<div class="col-sm-9">
									<input type="text" class="form-control @error('no_undangan') is-invalid @enderror" value="{{ $item->no_undangan }}" name="no_undangan" placeholder="Nomor Undangan.." required>
								</div>
								@error('no_undangan')
								<div class="invalid-feedback">
									{{ $message; }}
								</div>
								@enderror
							</div>
							<div class="mb-3 row">
								<label for="perihal" class="col-sm-3 col-form-label">Perihal</label>
								<div class="col-sm-9">
									<input type="text" class="form-control @error('perihal') is-invalid @enderror" value="{{ $item->perihal }}" name="perihal" placeholder="Nomor Undangan.." required>
								</div>
								@error('perihal')
								<div class="invalid-feedback">
									{{ $message; }}
								</div>
								@enderror
							</div>
							<div class="mb-3 row">
								<label for="file_undangan" class="col-sm-3 col-form-label">File Undangan</label>
								<div class="col-sm-9">
									<input type="file" class="form-control @error('file_undangan') is-invalid @enderror" value="{{ old('file_undangan') }}" accept=".pdf" name="file_undangan">
									<div id="file_undangan" class="form-text">Ekstensi .pdf</div>
								</div>
								@error('file_undangan')
								<div class="invalid-feedback">
									{{ $message; }}
								</div>
								@enderror
							</div>
							<div class="mb-3 row">
								<label for="isi_undangan" class="col-sm-3 col-form-label">Isi Undangan</label>
								<div class="col-sm-9">
									<textarea name="isi_undangan" class="form-control @error('isi_undangan') is-invalid @enderror" cols="30" rows="10" required>{{$item->isi_undangan}}</textarea>
								</div>
								@error('isi_undangan')
								<div class="invalid-feedback">
									{{ $message; }}
								</div>
								@enderror
							</div>
							<div class="mb-3 row">
								<label for="tgl_keluar" class="col-sm-3 col-form-label">Tanggal Keluar</label>
								<div class="col-sm-9">
									<input type="date" class="form-control @error('tgl_keluar') is-invalid @enderror" value="{{ $item->tgl_keluar }}" name="tgl_keluar" required>
								</div>
								@error('tgl_keluar')
								<div class="invalid-feedback">
									{{ $message; }}
								</div>
								@enderror
							</div>
							<div class="mb-3 row">
								<label for="letter_file" class="col-sm-3 col-form-label"></label>
								<div class="col-sm-9">
									<button type="submit" class="btn btn-success">Simpan</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</main>
	@endsection

	@push('addon-style')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
	@endpush

	@push('addon-script')
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
		$(".selectx").select2({
			theme: "bootstrap-5"
		});
	</script>
	@endpush

