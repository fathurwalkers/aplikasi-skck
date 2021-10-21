@extends('layouts.adminlayouts')

@push('css')
<style>
    #output_image {
    max-width:300px;
    }
</style>
@endpush

{{-- // 'nama_lengkap' --}}
{{-- // 'ttl' --}}
{{-- // 'agama' --}}
{{-- // 'kebangsaan' --}}
{{-- // 'jenis_kelamin' --}}
{{-- // 'status_kawin' --}}
{{-- // 'pekerjaan' --}}
{{-- // 'alamat_lengkap' --}}
{{-- // 'no_ktp' --}}
{{-- // 'no_passport' --}}
{{-- // 'no_kitaskitap' --}}
{{-- // 'no_telepon' --}}

{{-- // 'status_hubungan'  Suami - Istri --}}
{{-- // 'nama_pasangan' --}}
{{-- // 'umur_pasangan' --}}
{{-- // 'agama_pasangan' --}}
{{-- // 'kebangsaan_pasangan' --}}
{{-- // 'pekerjaan_pasangan' --}}
{{-- // 'alamat_pasangan' --}}

{{-- // 'nama_ayah' --}}
{{-- // 'umur_ayah' --}}
{{-- // 'agama_ayah' --}}

@section('main-content')
<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h4>Pembuatan SKCK</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary float-right">Kembali</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">

                        @if (session('laporan_belum_ada'))
                            <div class="alert alert-info">
                                {{ session('laporan_belum_ada') }}
                            </div>
                        @endif

                        @if (session('skck_ada'))
                            <div class="alert alert-info">
                                {{ session('skck_ada') }}
                            </div>
                        @endif

                    </div>
                </div>

                <form action="{{ route('post-buat-laporan') }}" method="POST">
                @csrf

                    {{-- Start DATA DIRI PENDAFTAR  --}}
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h5>
                                Laporan Pendaftaran SKCK
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Judul Laporan : </label>
                                <input type="text" class="form-control @error('laporan_header') is-invalid @enderror" placeholder="Masukkan judul laporan... " name="laporan_header" required autofocus value="{{ old('laporan_header') }}">
                                @error('laporan_header')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                                    
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Isi Laporan : </label>
                                <input type="text" class="form-control @error('laporan_body') is-invalid @enderror" placeholder="Masukkan isi laporan... " name="laporan_body" value="{{ old('laporan_body') }}">
                                @error('laporan_body')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                                    
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Jenis Keperluan : </label>
                                <select id="inputState" class="form-control @error('laporan_jeniskeperluan') is-invalid @enderror" name="laporan_jeniskeperluan" value="{{ old('laporan_jeniskeperluan') }}" required>
                                    <option selected="null" disabled>Pilih jenis keperluan...</option>
                                    <option value="Pendaftaran">Pendaftaran</option>
                                    <option value="Perpanjangan">Perpanjangan</option>
                                </select>
                                @error('laporan_jeniskeperluan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                                    
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-md btn-success mt-2"> LANJUTKAN </button>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                            <small class="form-text text-muted">Tekan tombol "LANJUTKAN" Jika laporan telah selesai dimasukkan</small>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script type='text/javascript'>
        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function() {
                    var output = document.getElementById('output_image');
                    output.src = reader.result;
                }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush