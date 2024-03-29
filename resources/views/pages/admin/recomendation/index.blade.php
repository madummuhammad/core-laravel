@extends('layouts.admin')

@section('title')
Rekomendasi Nikah
@endsection

@section('container')
<main>
    <header class="page-header page-header-dark bg-success pb-10">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon">
                                <i data-feather="file-text"></i>
                            </div>
                            Rekomendasi Nikah
                        </h1>
                        <div class="page-header-subtitle text-success">List Rekomendasi Nikah</div>
                    </div>
                </div>
                <nav class="mt-4 rounded" aria-label="breadcrumb">
                    <ol class="breadcrumb px-3 py-2 rounded mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Rekomendasi Nikah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-header-actions mb-4">
                    <div class="card-header text-success">
                        List Rekomendasi Nikah
                        @if(auth()->user()->jabatan=='Petugas')
                        <a class="btn btn-sm btn-success" href="{{ route('recomendation.create') }}">
                            Tambah Rekomendasi Nikah
                        </a>
                        @endif
                    </div>
                    <div class="card-body">
                        {{-- Alert --}}
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
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
                        {{-- List Data --}}
                        <table class="table table-striped table-hover table-sm" id="crudTable">
                            <thead>
                                <tr>
                                    <th width="10">No.</th>
                                    <th>Nomor Surat</th>
                                    <th>Perihal</th>
                                    <th>Alamat Pengiriman</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>           
    </div>
</main>
@endsection

@push('addon-script')
<script>
    var datatable = $('#crudTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
          url: '{{ url()->current() }}',
      },
      columns: [
      {
        "data": 'DT_RowIndex',
        orderable: false, 
        searchable: false
    },
    { data: 'no_surat', name: 'no_surat' },
    {
        data: 'perihal',
        name: 'perihal',
        render: function (data, type, full, meta) {
            return 'Rekomendasi Nikah';
        }
    },
    { data: 'alamat', name: 'alamat' },
    { data: 'tgl_masuk', name: 'tgl_masuk' },
    {
        data: 'status',
        name: 'status',
        render: function (data, type, full, meta) {
            if (data === 1) {
                return 'Diterima';
            } else if (data === 0) {
                return 'Ditolak';
            } else {
                return 'Belum Diverifikasi';
            }
        }
    },
    { 
        data: 'action', 
        name: 'action',
        orderable: false,
        searchable: false,
        width: '15%'
    },
    ]
});
</script>
@endpush
