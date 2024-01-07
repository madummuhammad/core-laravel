@extends('layouts.admin')

@section('title')
Ubah Surat Keterangan Nikah Tidak Tercatat
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
                            Ubah Surat Keterangan Nikah Tidak Tercatat
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <button class="btn btn-sm btn-light text-primary" onclick="javascript:window.history.back();">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Kembali Ke Semua Surat Keterangan Nikah Tidak Tercatat
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
        <form action="{{ route('keterangan.update', $item->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row gx-4">
              <div class="col-lg-9">
                <div class="card mb-4">
                    <div class="card-header text-success">Form Surat</div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="no_surat" class="col-sm-3 col-form-label">Nomor Surat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('no_surat') is-invalid @enderror" value="{{ $item->no_surat }}" name="no_surat" placeholder="Nomor Surat.." required>
                            </div>
                            @error('no_surat')
                            <div class="invalid-feedback">
                                {{ $message; }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ $item->nama }}" name="nama" placeholder="Nama.." required>
                            </div>
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message; }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('nik') is-invalid @enderror" value="{{ $item->nik }}" name="nik" placeholder="NIK.." required>
                            </div>
                            @error('nik')
                            <div class="invalid-feedback">
                                {{ $message; }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" value="{{ $item->alamat }}" name="alamat" placeholder="Alamat.." required>
                            </div>
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message; }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ $item->pekerjaan }}" name="pekerjaan" placeholder="Pekerjaan.." required>
                            </div>
                            @error('pekerjaan')
                            <div class="invalid-feedback">
                                {{ $message; }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select name="jenis_kelamin" class="form-control selectx" required>
                                    <option value="Laki-laki" @if($item->jenis_kelamin=='Laki-laki') selected @endif>Laki-laki</option>
                                    <option value="Perempuan" @if($item->jenis_kelamin=='Perempuan') selected @endif>Perempuan</option>
                                </select>
                            </div>
                            @error('jenis_kelamin')
                            <div class="invalid-feedback">
                                {{ $message; }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="file_surat" class="col-sm-3 col-form-label">File Surat</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control @error('file_surat') is-invalid @enderror" value="{{ old('file_surat') }}" accept=".pdf" name="file_surat">
                                <div id="file_surat" class="form-text">Ekstensi .pdf</div>
                            </div>
                            @error('file_surat')
                            <div class="invalid-feedback">
                                {{ $message; }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="" class="col-sm-3 col-form-label">Tempat, Tanggal Lahir</label>
                            <div class="col-sm-9 d-flex ">
                                <input type="text" class="form-control @error('tempat') is-invalid @enderror" value="{{ explode(', ',$item->ttl)[0] }}" name="tempat" placeholder="Tempat.." required>
                                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ explode(', ',$item->ttl)[1] }}" name="tgl_lahir" placeholder="tgl_lahir.." required>
                            </div>
                            @error('bin_binti')
                            <div class="invalid-feedback">
                                {{ $message; }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 row">
                            <label for="tgl_masuk" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror" value="{{ $item->tgl_masuk }}" name="tgl_masuk" required>
                            </div>
                            @error('tgl_masuk')
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

