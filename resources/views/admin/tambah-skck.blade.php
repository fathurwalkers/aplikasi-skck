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

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>Nama Lengkap : </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="masukkan Nama Lengkap anda... ">
                            <small id="emailHelp" class="form-text text-muted">contoh : Risky Yatno</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>Kebangsaan : </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="masukkan tempat dan tanggal lahir anda... ">
                            <small id="emailHelp" class="form-text text-muted">contoh : INDONESIA</small>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>Agama : </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="masukkan agama anda... ">
                            {{-- <small id="emailHelp" class="form-text text-muted"></small> --}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>Tempat/Tanggal Lahir : </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="masukkan tempat dan tanggal lahir anda... ">
                            <small id="emailHelp" class="form-text text-muted">contoh : 18 Desember 1997</small>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>Jenis Kelamin : </label>
                            <select id="inputState" class="form-control">
                                <option selected>Pilih jenis Kelamin...</option>
                                <option>LAKI - LAKI</option>
                                <option>PEREMPUAN</option>
                            </select>
                            {{-- <small id="emailHelp" class="form-text text-muted"></small> --}}
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1"><span style="color:red;">* </span>Status Kawin : </label>
                            <select id="inputState" class="form-control">
                                <option selected>Pilih status...</option>
                                <option>KAWIN</option>
                                <option>TIDAK KAWIN</option>
                            </select>
                            {{-- <small id="emailHelp" class="form-text text-muted"></small> --}}
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