@extends('layouts.adminlayouts')

@push('css')
    
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

                {{-- Start DATA DIRI PENDAFTAR  --}}
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h5>
                            Data Diri Pendaftar : 
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>Nama Lengkap : </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama Lengkap anda... " name="nama_lengkap">
                            <small class="form-text text-muted">contoh : Risky Yatno</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>Kebangsaan : </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan tempat dan tanggal lahir anda... " name="kebangsaan">
                            <small class="form-text text-muted">contoh : INDONESIA</small>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>No. Telepon : </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan No. Telepon / Handphone anda..." name="no_telepon">
                            <small class="form-text text-muted">contoh : 085932219482</small>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>Agama : </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan agama anda... " name="agama">
                            {{-- <small class="form-text text-muted"></small> --}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>Tempat/Tanggal Lahir : </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan tempat dan tanggal lahir anda... " name="ttl">
                            <small class="form-text text-muted">contoh : 18 Desember 1997</small>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>Jenis Kelamin : </label>
                            <select id="inputState" class="form-control" name="jenis_kelamin">
                                <option selected="null">Pilih jenis Kelamin...</option>
                                <option value="Laki - laki">LAKI - LAKI</option>
                                <option value="Perempuan">PEREMPUAN</option>
                            </select>
                            {{-- <small class="form-text text-muted"></small> --}}
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>Status Kawin : </label>
                            <select id="inputState" class="form-control" name="status_kawin">
                                <option selected="null">Pilih status...</option>
                                <option value="Kawin">KAWIN</option>
                                <option value="Tidak Kawin">TIDAK KAWIN</option>
                            </select>
                            {{-- <small class="form-text text-muted"></small> --}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>Alamat Sekarang : </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan alamat tempat tinggal anda..." name="alamat_lengkap">
                            <small class="form-text text-muted">contoh : Jl. Bakti Abri, Kel. Bukit Wolio Indah, Kec. Wolio. Kota baubau, Sulawesi Tenggara</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>Nomor Kartu Penduduk : </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan No. KTP anda..." name="no_ktp">
                            <small class="form-text text-muted">No. KTP Wajib di Masukkan</small>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Passport : </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan No. Passport anda... " name="no_passport">
                            <small class="form-text text-muted">Kosongkan jika tidak ada </small>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>No. KITAS/KITAP : </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan No. KITAS / KITAP anda... " name="no_kitaskitap">
                            <small class="form-text text-muted">Kosongkan jika tidak ada </small>
                        </div>
                    </div>
                </div>
                {{-- END DATA DIRI PENDAFTAR  --}}

                {{-- START HUBUNGAN KEKELUARGAAN  --}}
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h5>
                            Hubungan Kekeluargaan : 
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>No. KITAS/KITAP : </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan No. KITAS / KITAP anda... " name="no_kitaskitap">
                            <small class="form-text text-muted">Kosongkan jika tidak ada </small>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>Status Hubungan : </label>
                            <select id="inputState" class="form-control" name="status_hubungan">
                                <option selected="null">Pilih status...</option>
                                <option value="Suami">Suami (Husband)</option>
                                <option value="Istri">Istri (Wife)</option>
                            </select>
                            {{-- <small class="form-text text-muted"></small> --}}
                        </div>
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