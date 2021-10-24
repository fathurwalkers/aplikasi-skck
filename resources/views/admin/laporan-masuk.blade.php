@extends('layouts.adminlayouts')

@push('css')
    
@endpush

@section('main-content')
<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card">
        <div class="card-body">
            <table id="example1" class="table table-bordered" style="width:100%">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Jenis Keperluan</th>
                        <th>Pengirim</th>
                        <th>Kode Laporan</th>
                        <th>Tanggal dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_laporan as $laporan)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $laporan->laporan_jeniskeperluan }}</td>
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
                                    <div class="col-sm-12 col-lg-12 col-md-12 mx-auto text-center">

                                        <form action="{{ route('laporan-detail', $laporan->id) }}">
                                            <button class="btn btn-info btn-sm" href="{{ route('laporan-detail') }}">Selengkapnya</button>
                                        </form>

                                        <form action="{{ route('laporan-detail', $laporan->id) }}">
                                            <button class="btn btn-danger btn-sm" href="{{ route('laporan-detail') }}">Hapus</button>
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