@extends('layouts.adminlayouts')

@push('css')
    
@endpush

@section('main-content')
<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card">
        <div class="card-body">
            @if (session('laporan_terhapus'))
                <div class="alert alert-success">
                    {{ session('laporan_terhapus') }}
                </div>
            @endif
            <table id="example1" class="table table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Jenis Keperluan</th>
                        <th>Username</th>
                        <th>Kode Laporan</th>
                        <th>Tanggal dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_laporan as $laporan)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ strtoupper($laporan->laporan_jeniskeperluan) }}</td>

                        <td>{{ $laporan->laporan_pengirim }}</td>

                        <td>{{ $laporan->laporan_kode }}</td>
                        <td class="text-center">{{ date('d/m/Y', strtotime($laporan->created_at)) }}</td>

                        {{-- @foreach ($laporan->detail as $detail)
                            <td>{{ $detail->nama_lengkap }}</td>
                            <td>{{ $detail->ttl }}</td>
                        @endforeach --}}

                        <td>
                            <div class="container">
                                <div class="row m-0 p-0">
                                    <div class="col-sm-12 col-lg-12 col-md-12 d-flex justify-content-center mx-auto">

                                        <form action="{{ route('laporan-detail') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $laporan->id }}">
                                            <button class="btn btn-info btn-sm mr-1 rounded" href="{{ route('laporan-detail') }}">Selengkapnya</button>
                                        </form>

                                        @if($laporan->laporan_jeniskeperluan == 'Verifikasi')
                                        <form action="{{ route('terima-verifikasi', $laporan->laporan_body) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $laporan->id }}">
                                            <button class="btn btn-primary btn-sm mr-1 rounded">Verifikasi</button>
                                        </form>
                                        @endif

                                        <form action="{{ route('laporan-hapus') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $laporan->id }}">
                                            <button class="btn btn-danger btn-sm rounded">Hapus</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        } );
    </script>
@endpush