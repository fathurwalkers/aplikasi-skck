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
                        <th>Jenis SKCK</th>
                        <th>Nama Pemilik</th>
                        <th>No KTP</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data_skck as $skck)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>

                        @foreach ($skck->laporan as $laporan)
                            <td>{{ $laporan->laporan_jeniskeperluan}}</td>
                        @endforeach

                        <td>{{ $skck->nama_lengkap }}</td>
                        <td>{{ $skck->no_ktp }}</td>
                        <td>{{ $skck->no_telepon }}</td>
                        <td>
                            <div class="container">
                                <div class="row m-0 p-0">
                                    <div class="col-sm-12 col-lg-12 col-md-12 mx-auto text-center btn-group">
                                        <a class="btn btn-info btn-sm mr-1" href="#" role="button">Lihat</a>

                                        <form action="{{ route('print-skck-baru') }}" method="POST">
                                            <input type="hidden" value="{{ $skck->id }}">
                                            <button class="btn btn-success btn-sm mr-1" type="submit" role="button">Cetak</button>
                                        </form>

                                        <a class="btn btn-primary btn-sm mr-1" href="#" role="button">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="#" role="button">Hapus</a>
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