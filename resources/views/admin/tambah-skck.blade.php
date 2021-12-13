@extends('layouts.adminlayouts')

@push('css')
<style>
    #output_image {
    max-width:300px;
    }
</style>
@endpush

@section('main-content')
<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h4>Pembuatan SKCK</h4>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <form action="{{ route('batalkan') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger float-right">Batalkan Pembuatan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">

                        @error("nama_lengkap") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("ttl") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("agama") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("kebangsaan") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("jenis_kelamin") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("status_kawin") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("pekerjaan") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("alamat_lengkap") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("no_ktp") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("no_telepon") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("status_hubungan") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("nama_pasangan") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("umur_pasangan") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("agama_pasangan") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("kebangsaan_pasangan") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror

                        @error("pekerjaan_pasangan") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("alamat_pasangan") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("nama_ayah") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("umur_ayah") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror
                        
                        @error("agama_ayah") 
                        <div class="alert alert-danger">
                            {{ $message }} 
                        </div>
                        @enderror

                        @if (session('laporan_telah_ada'))
                            <div class="alert alert-success">
                                {{ session('laporan_telah_ada') }}
                            </div>
                        @endif

                    </div>
                </div>

                <form action="{{ route('post-tambah-skck') }}" method="POST" enctype="multipart/form-data">
                    @csrf

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
                                <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap anda... " name="nama_lengkap" required autofocus>
                                <small class="form-text text-muted">contoh : Risky Yatno</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <img id="output_image" class="border border-1"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Foto : </label>
                                <input type="file" class="form-control-file" onchange="preview_image(event)" name="foto">
                                <small class="form-text text-muted">Upload Pas Foto ekstensi .jpg</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Alamat Sekarang : </label>
                                <input type="text" class="form-control" placeholder="Masukkan alamat tempat tinggal anda..." name="alamat_lengkap">
                                <small class="form-text text-muted">contoh : Jl. Bakti Abri, Kel. Bukit Wolio Indah, Kec. Wolio. Kota baubau, Sulawesi Tenggara</small>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Pekerjaan : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Pekerjaan anda..." name="pekerjaan">
                                <small class="form-text text-muted">contoh : PNS</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Kebangsaan : </label>
                                <input type="text" class="form-control" placeholder="Masukkan tempat dan tanggal lahir anda... " name="kebangsaan">
                                <small class="form-text text-muted">contoh : INDONESIA</small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>No. Telepon : </label>
                                <input type="number" class="form-control" placeholder="Masukkan No. Telepon / Handphone anda..." name="no_telepon">
                                <small class="form-text text-muted">contoh : 085932219482</small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Agama : </label>
                                <input type="text" class="form-control" placeholder="Masukkan agama anda... " name="agama">
                                {{-- <small class="form-text text-muted"></small> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Tempat/Tanggal Lahir : </label>
                                <input type="text" class="form-control" placeholder="Masukkan tempat dan tanggal lahir anda... " name="ttl">
                                <small class="form-text text-muted">contoh : BAUBAU, 18 Desember 1997</small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Jenis Kelamin : </label>
                                <select id="inputState" class="form-control" name="jenis_kelamin">
                                    <option selected="null" disabled>Pilih jenis Kelamin...</option>
                                    <option value="Laki - laki">LAKI - LAKI</option>
                                    <option value="Perempuan">PEREMPUAN</option>
                                </select>
                                {{-- <small class="form-text text-muted"></small> --}}
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Status Kawin : </label>
                                <select id="inputState" class="form-control" name="status_kawin">
                                    <option selected="null" disabled>Pilih status...</option>
                                    <option value="Kawin">KAWIN</option>
                                    <option value="Tidak Kawin">TIDAK KAWIN</option>
                                </select>
                                {{-- <small class="form-text text-muted"></small> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Nomor Kartu Penduduk : </label>
                                <input type="number" class="form-control" placeholder="Masukkan No. KTP anda..." name="no_ktp">
                                <small class="form-text text-muted">No. KTP Wajib di Masukkan</small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Passport : </label>
                                <input type="number" class="form-control" placeholder="Masukkan No. Passport anda... " name="no_passport" value="-">
                                <small class="form-text text-muted">Kosongkan jika tidak ada </small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>No. KITAS/KITAP : </label>
                                <input type="number" class="form-control" placeholder="Masukkan No. KITAS / KITAP anda... " name="no_kitaskitap" value="-">
                                <small class="form-text text-muted">Kosongkan jika tidak ada </small>
                            </div>
                        </div>
                    </div>
                    {{-- END DATA DIRI PENDAFTAR  --}}


                    <hr>


                    {{-- START HUBUNGAN KEKELUARGAAN  --}}
                    <div class="row mt-4">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h5>
                                Hubungan Kekeluargaan : 
                            </h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Nama : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama..." name="nama_pasangan">
                                {{-- <small class="form-text text-muted">Kosongkan jika tidak ada </small> --}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Status Hubungan : </label>
                                <select id="inputState" class="form-control" name="status_hubungan">
                                    <option selected="null" disabled>Pilih status...</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Suami">Suami (Husband)</option>
                                    <option value="Istri">Istri (Wife)</option>
                                </select>
                                {{-- <small class="form-text text-muted"></small> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Alamat : </label>
                                <input type="text" class="form-control" placeholder="Masukkan alamat..." name="alamat_pasangan">
                                <small class="form-text text-muted">contoh : Jl. Bakti Abri, Kel. Bukit Wolio Indah, Kec. Wolio. Kota baubau, Sulawesi Tenggara</small>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Pekerjaan : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Pekerjaan..." name="pekerjaan_pasangan">
                                <small class="form-text text-muted">contoh : PNS</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Umur : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama..." name="umur_pasangan">
                                <small class="form-text text-muted">contoh : 35 TAHUN </small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Kebangsaan : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Kebangsaan..." name="kebangsaan_pasangan">
                                <small class="form-text text-muted">contoh : Indonesia</small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Agama : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Agama..." name="agama_pasangan">
                                {{-- <small class="form-text text-muted">Kosongkan jika tidak ada </small> --}}
                            </div>
                        </div>
                    </div>

                    {{-- END STATUS HUBUNGAN KEKELUARGAAN  --}}

                    <hr> 

                    {{-- START DATA AYAH  --}}

                    <div class="row mt-4">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h5>
                                Data Bapak Sendiri : 
                            </h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Nama : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama..." name="nama_ayah">
                                <small class="form-text text-muted">contoh : Muh. Ismail </small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Umur : </label>
                                <input type="text" class="form-control" placeholder="Masukkan umur..." name="umur_ayah">
                                <small class="form-text text-muted">contoh : 35 Tahun</small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Agama : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Agama..." name="agama_ayah">
                                {{-- <small class="form-text text-muted">Kosongkan jika tidak ada </small> --}}
                            </div>
                    </div>
                    {{-- END DATA AYAH  --}}

                    <div class="row mt-3 mb-4">
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                            <button type="submit" class="btn btn-lg btn-success"> SELESAI </button>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center">
                            <small class="form-text text-muted">Tekan tombol "SELESAI" Jika semua data telah benar</small>
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