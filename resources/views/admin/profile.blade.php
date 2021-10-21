@extends('layouts.adminlayouts')

@push('css')
    
@endpush

@section('main-content')
<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h4>Perpanjangan SKCK</h4>
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
                            <img class="img-fluid d-flex mr-3" src="{{ asset('foto') }}/{{ $data_skck->foto }}" alt="" width="400px">
                        </p>
                    </div>

                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <p>
                            Nama <br>
                            Username <br>
                            Email <br>
                            Status Pengguna <br>
                            No. Telepon <br>
                        </p>
                    </div>

                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <p>
                            : {{ $users->login_nama }} <br>
                            : {{ $users->login_username }} <br>
                            : {{ $users->login_email }} <br>
                            : <button class="btn btn-sm btn-success">{{ strtoupper($users->login_status) }}</button> <br>
                            : {{ $data_skck->no_telepon }} <br>
                        </p>
                    </div>

                </div> 

                <hr> 

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h4>Data SKCK</h4>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <p>
                            Nama Lengkap <br>
                            Tempat/Tanggal Lahir <br>
                            Pekerjaan <br>
                            Alamat <br>
                            Agama <br>
                            <br>
                            No. Telepon <br>
                            Status <br>
                            Kebangsaan <br>
                            Jenis Kelamin <br>
                            Status Kawin <br>
                            <br>
                            No. KTP <br>
                            No. Passport <br>
                            No. KITAS/KITAP <br>
                            <br>
                            Status Hubungan <br>
                            Nama Pasangan <br>
                            Umur Pasangan <br>
                            Alamat Pasangan <br>
                            Agama Pasangan <br>
                            Kebangsaan Pasangan <br>
                            Pekerjaan Pasangan <br>
                            <br>
                            Nama Ayah <br> 
                            Umur Ayah <br> 
                            Agama Ayah <br>
                        </p>
                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <p>
                            : {{ $data_skck->nama_lengkap }} <br>
                            : {{ $data_skck->ttl }} <br>
                            : {{ $data_skck->pekerjaan }} <br>
                            : {{ $data_skck->alamat_lengkap }} <br>
                            : {{ $data_skck->agama }} <br>
                            <br>
                            : {{ $data_skck->no_telepon }} <br>
                            : {{ $data_skck->status_skck }} <br>
                            : {{ $data_skck->kebangsaan }} <br>
                            : {{ $data_skck->jenis_kelamin }} <br>
                            : {{ $data_skck->status_kawin }} <br>
                            <br>
                            : {{ $data_skck->no_ktp }} <br>
                            : {{ $data_skck->no_passport }} <br>
                            : {{ $data_skck->no_kitaskitap }} <br>
                            <br>
                            : {{ $data_skck->status_hubungan }} <br>
                            : {{ $data_skck->nama_pasangan }} <br>
                            : {{ $data_skck->umur_pasangan }} <br>
                            : {{ $data_skck->alamat_pasangan }} <br>
                            : {{ $data_skck->agama_pasangan }} <br>
                            : {{ $data_skck->kebangsaan_pasangan }} <br>
                            : {{ $data_skck->pekerjaan_pasangan }} <br>
                            <br>
                            : {{ $data_skck->nama_ayah }} <br>
                            : {{ $data_skck->umur_ayah }} <br>
                            : {{ $data_skck->agama_ayah }} <br>
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