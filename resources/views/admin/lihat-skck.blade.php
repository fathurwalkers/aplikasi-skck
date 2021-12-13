@extends('layouts.adminlayouts')

@push('css')
    
@endpush

@section('main-content')
<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h4>Detail Lengkap SKCK</h4>
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
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h4>Data SKCK</h4>
                    </div>
                </div>

                <div class="row">
                    
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <p>
                            Jenis Keperluan <br>
                            Nama Lengkap <br>
                            Tempat/Tanggal Lahir <br>
                            Pekerjaan <br>
                            Alamat <br>
                            Agama <br>
                            <br>
                            No. Telepon <br>
                            Status <br>
                            Kebangsaan <br>
                            Kabupaten <br>
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
                            Kebangsaan Ayah <br>
                            Pekerjaan Ayah <br>
                            Alamat Sekarang <br>
                            <br>

                        </p>
                    </div>

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <p>
                            : {{ $data_skck->jenis_keperluan_pembuatan }} <br>
                            : {{ $data_skck->nama_lengkap }} <br>
                            : {{ $data_skck->ttl }} <br>
                            : {{ $data_skck->pekerjaan }} <br>
                            : {{ $data_skck->alamat_lengkap }} <br>
                            : {{ $data_skck->agama }} <br>
                            <br>
                            : {{ $data_skck->no_telepon }} <br>
                            : {{ $data_skck->status_skck }} <br>
                            : {{ $data_skck->kebangsaan }} <br>
                            : {{ $data_skck->kabupaten }} <br>
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
                            : {{ $data_skck->kebangsaan_ayah }} <br>
                            : {{ $data_skck->pekerjaan_ayah }} <br>
                            : {{ $data_skck->alamat_sekarang_ayah }} <br>
                        </p>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-12">
                        Perkara Kriminal : <br>
                        <p>a. Apakah Saudara pernah tersangkut perkara pidana? <i>(Have you ever caught in a criminal case?)</i><br>
                        Jawaban : {{ $data_skck->jenis_pidana_value_a }}</p>

                        </p>b. Dalam perkara apa? <i>(in what kind of case?)</i><br>
                        Jawaban : {{ $data_skck->jenis_pidana_value_b }}</p>

                        <p>c. Bagaimana putusannya dan Vonis hakim ? <i>(What is the decision of the judge and verdict?)</i><br>
                        Jawaban : {{ $data_skck->jenis_pidana_value_c }}</p>

                        <p>d. Apakah Saudara sedang dalam proses perkara pidana ? Kasus apa ? <i>(Are you currently in the process of a criminal case? What kind of case?)</i><br>
                        Jawaban : {{ $data_skck->jenis_pidana_value_d }}</p>

                        <p>e. Sampai sejauh mana proses hukumnya ? <i>(To what extent is the legal process?)</i><br>
                        Jawaban : {{ $data_skck->jenis_pidana_value_e }}</p>
                        <br>
                    </div>
                    
                </div>

                @if($data_skck->status_skck == 'unverified')
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto d-flex justify-content-center">
                        <form action="{{ route('kirim-verifikasi') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $data_skck->id }}" name="skck">
                            <button type="submit" class="btn btn-md btn-info rounded">
                                <i class="fas fa-print"></i>
                                Verifikasi SKCK
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 mx-auto d-flex justify-content-center">
                        <p class="text-info mt-1">Klik tombol "Verifikasi SKCK" untuk mem-verifikasi permintaan pendaftaran / perpanjangan SKCK anda.</p>
                    </div>
                </div>
                @endif

                
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