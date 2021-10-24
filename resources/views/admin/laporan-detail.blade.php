@extends('layouts.adminlayouts')

@push('css')
    
@endpush

@section('main-content')
<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h4>Profile Pengguna</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <form action="{{ route('dashboard') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-danger float-right rounded">Kembali</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container">

                <div class="row">

                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <p>
                            Header Laporan <br>
                            Jenis Keperluan <br>
                            Pengirim <br>
                            Isi Laporan <br>
                            Kode Laporan <br>
                        </p>
                    </div>

                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <p>
                            : {{ $laporan->laporan_header }} <br>
                            : {{ $laporan->laporan_jeniskeperluan }} <br>
                            : {{ $laporan->laporan_pengirim }} <br>
                            : {{ $laporan->laporan_body }} <br>
                            : {{ $laporan->laporan_kode }}
                        </p>
                    </div>

                </div>
            </div>
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