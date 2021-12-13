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
                    <h4>Pengubahan SKCK</h4>
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

                <form action="{{ route('post-update-skck', $skck->id) }}" method="POST" enctype="multipart/form-data">
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
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Jenis Keperluan Pembuatan SKCK : </label>
                                <select id="inputState" class="form-control" name="jenis_keperluan_pembuatan">
                                    <option selected="{{ $skck->jenis_keperluan_pembuatan }}">{{ $skck->jenis_keperluan_pembuatan }}</option>
                                    <option value="Pencalonan Anggota Legislatif Tingkat Kabupaten / Kota ">Pencalonan Anggota Legislatif Tingkat Kabupaten / Kota</option>
                                    <option value="Melamar Sebagai PNS">Melamar Sebagai PNS</option>
                                    <option value="Melamar Sebagai Anggota TNI / POLRI">Melamar Sebagai Anggota TNI / POLRI</option>
                                    <option value="Pencalonan Pejabat Publik">Pencalonan Pejabat Publik</option>
                                    <option value="Kepemilikan Senjata Api">Kepemilikan Senjata Api</option>
                                    <option value="PerempuanMelamar Pekerjaan Swasta dan BUMN di Tingkat Kabupaten / Kota">Melamar Pekerjaan Swasta dan BUMN di Tingkat Kabupaten / Kota </option>
                                    <option value="Pencalonan Kepala Daerah Tingkat Kabupaten / Kota">Pencalonan Kepala Daerah Tingkat Kabupaten / Kota </option>
                                    <option value="Pass Bandara Soetta">Pass Bandara Soetta </option>
                                    <option value="Melanjutkan Pendidikan Kedinasan dan di Luar Kabupaten / Kota">Melanjutkan Pendidikan Kedinasan dan di Luar Kabupaten / Kota </option>
                                    <option value="Calon Penerima Penghargaan">Calon Penerima Penghargaan </option>
                                    <option value="Keperluan Lain di Tingkat Kabupaten">Keperluan Lain di Tingkat Kabupaten </option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2 mb-2">
                        <div class="col-sm-12 col-md-12 col-lg-12 mt-2 mb-2">
                            <label for="">Isi jawaban anda pada kotak "Jawaban" (Masukkan jawaban "TIDAK ADA" jika tidak punya jawaban.)</label>
                            <div class="form-check">
                                {{-- <input class="form-check-input" type="radio" id="gridRadios1" value="option1" name="jenis_pidana_type"> --}}
                                <label class="" for="gridRadios1">
                                  a. Apakah Saudara pernah tersangkut perkara pidana? <i>(Have you ever caught in a criminal case?)</i>
                                </label>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span style="color:red;">* </span>Jawaban : </label>
                                    <input type="text" class="form-control" placeholder="Masukkan Jawaban anda... " name="jenis_pidana_value_a" value="{{ $skck->jenis_pidana_value_a }}">
                                    {{-- <small class="form-text text-muted">contoh : Risky Yatno</small> --}}
                                </div>
                            </div>
                            <div class="form-check">
                                {{-- <input class="form-check-input" type="radio" id="gridRadios2" value="option2" name="jenis_pidana_type"> --}}
                                <label class="" for="gridRadios2">
                                  b. Dalam perkara apa? <i>(in what kind of case?)</i>
                                </label>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span style="color:red;">* </span>Jawaban : </label>
                                    <input type="text" class="form-control" placeholder="Masukkan Jawaban anda... " name="jenis_pidana_value_b" value="{{ $skck->jenis_pidana_value_b }}">
                                    {{-- <small class="form-text text-muted">contoh : Risky Yatno</small> --}}
                                </div>
                            </div>
                            <div class="form-check">
                                {{-- <input class="form-check-input" type="radio" id="gridRadios2" value="option2" name="jenis_pidana_type"> --}}
                                <label class="" for="gridRadios2">
                                  c. Bagaimana putusannya dan Vonis hakim ? <i>(What is the decision of the judge and verdict?)</i>
                                </label>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span style="color:red;">* </span>Jawaban : </label>
                                    <input type="text" class="form-control" placeholder="Masukkan Jawaban anda... " name="jenis_pidana_value_c" value="{{ $skck->jenis_pidana_value_c }}">
                                    {{-- <small class="form-text text-muted">contoh : Risky Yatno</small> --}}
                                </div>
                            </div>
                            <div class="form-check">
                                {{-- <input class="form-check-input" type="radio" id="gridRadios2" value="option2" name="jenis_pidana_type"> --}}
                                <label class="" for="gridRadios2">
                                  d. Apakah Saudara sedang dalam proses perkara pidana ? Kasus apa ? <i>(Are you currently in the process of a criminal case? What kind of case?)</i>
                                </label>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span style="color:red;">* </span>Jawaban : </label>
                                    <input type="text" class="form-control" placeholder="Masukkan Jawaban anda... " name="jenis_pidana_value_d" value="{{ $skck->jenis_pidana_value_d }}">
                                    {{-- <small class="form-text text-muted">contoh : Risky Yatno</small> --}}
                                </div>
                            </div>
                            <div class="form-check">
                                {{-- <input class="form-check-input" type="radio" id="gridRadios2" value="option2" name="jenis_pidana_type"> --}}
                                <label class="" for="gridRadios2">
                                  e. Sampai sejauh mana proses hukumnya ? <i>(To what extent is the legal process?)</i>
                                </label>
                                <div class="form-group">
                                    <label for="exampleInputEmail1"><span style="color:red;">* </span>Jawaban : </label>
                                    <input type="text" class="form-control" placeholder="Masukkan Jawaban anda... " name="jenis_pidana_value_e" value="{{ $skck->jenis_pidana_value_e }}">
                                    {{-- <small class="form-text text-muted">contoh : Risky Yatno</small> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Nama Lengkap : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap anda... " name="nama_lengkap" required autofocus value="{{ $skck->nama_lengkap }}">
                                <small class="form-text text-muted">contoh : Risky Yatno</small>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <img id="output_image" class="border border-1" value="{{ asset('foto/') }}/{{ $skck->foto }}"/>
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
                    </div> --}}

                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Alamat Sekarang : </label>
                                <input type="text" class="form-control" placeholder="Masukkan alamat tempat tinggal anda..." name="alamat_lengkap" value="{{ $skck->alamat_lengkap }}">
                                <small class="form-text text-muted">contoh : Jl. Bakti Abri, Kel. Bukit Wolio Indah, Kec. Wolio. Kota baubau, Sulawesi Tenggara</small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Pekerjaan : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Pekerjaan anda..." name="pekerjaan" value="{{ $skck->pekerjaan }}">
                                <small class="form-text text-muted">contoh : PNS</small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Kabupaten : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Kabupaten..." name="kabupaten" value="{{ $skck->kabupaten }}">
                                <small class="form-text text-muted">contoh : Buton</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Kebangsaan : </label>
                                <input type="text" class="form-control" placeholder="Masukkan tempat dan tanggal lahir anda... " name="kebangsaan" value="{{ $skck->kebangsaan }}">
                                <small class="form-text text-muted">contoh : INDONESIA</small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>No. Telepon : </label>
                                <input type="number" class="form-control" placeholder="Masukkan No. Telepon / Handphone anda..." name="no_telepon" value="{{ $skck->no_telepon }}">
                                <small class="form-text text-muted">contoh : 085932219482</small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Agama : </label>
                                <input type="text" class="form-control" placeholder="Masukkan agama anda... " name="agama" value="{{ $skck->agama }}">
                                {{-- <small class="form-text text-muted"></small> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Tempat/Tanggal Lahir : </label>
                                <input type="text" class="form-control" placeholder="Masukkan tempat dan tanggal lahir anda... " name="ttl" value="{{ $skck->ttl }}">
                                <small class="form-text text-muted">contoh : BAUBAU, 18 Desember 1997</small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Jenis Kelamin : </label>
                                <select id="inputState" class="form-control" name="jenis_kelamin" value="{{ $skck->jenis_kelamin }}">
                                    <option selected="{{ $skck->jenis_kelamin }}">{{ $skck->jenis_kelamin }}</option>
                                    <option value="Laki - laki">LAKI - LAKI</option>
                                    <option value="Perempuan">PEREMPUAN</option>
                                </select>
                                {{-- <small class="form-text text-muted"></small> --}}
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Status Kawin : </label>
                                <select id="inputState" class="form-control" name="status_kawin" value="{{ $skck->status_kawin }}">
                                    <option selected="{{ $skck->status_kawin }}">{{ $skck->status_kawin }}</option>
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
                                <input type="number" class="form-control" placeholder="Masukkan No. KTP anda..." name="no_ktp" value="{{ $skck->no_ktp }}">
                                <small class="form-text text-muted">No. KTP Wajib di Masukkan</small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nomor Passport : </label>
                                <input type="number" class="form-control" placeholder="Masukkan No. Passport anda... " name="no_passport" value="{{ $skck->no_passport }}">
                                <small class="form-text text-muted">Kosongkan jika tidak ada </small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>No. KITAS/KITAP : </label>
                                <input type="number" class="form-control" placeholder="Masukkan No. KITAS / KITAP anda... " name="no_kitaskitap" value="{{ $skck->no_kitaskitap }}">
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
                                <input type="text" class="form-control" placeholder="Masukkan Nama..." name="nama_pasangan" value="{{ $skck->nama_pasangan }}">
                                {{-- <small class="form-text text-muted">Kosongkan jika tidak ada </small> --}}
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Status Hubungan : </label>
                                <select id="inputState" class="form-control" name="status_hubungan" value="{{ $skck->status_hubungan }}">
                                    <option selected="null">Pilih status...</option>
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
                                <input type="text" class="form-control" placeholder="Masukkan alamat..." name="alamat_pasangan" value="{{ $skck->alamat_pasangan }}">
                                <small class="form-text text-muted">contoh : Jl. Bakti Abri, Kel. Bukit Wolio Indah, Kec. Wolio. Kota baubau, Sulawesi Tenggara</small>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Pekerjaan : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Pekerjaan..." name="pekerjaan_pasangan" value="{{ $skck->pekerjaan_pasangan }}">
                                <small class="form-text text-muted">contoh : PNS</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Umur : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama..." name="umur_pasangan" value="{{ $skck->umur_pasangan }}">
                                <small class="form-text text-muted">contoh : 35 TAHUN </small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Kebangsaan : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Kebangsaan..." name="kebangsaan_pasangan" value="{{ $skck->kebangsaan_pasangan }}">
                                <small class="form-text text-muted">contoh : Indonesia</small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Agama : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Agama..." name="agama_pasangan" value="{{ $skck->agama_pasangan }}">
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
                                <input type="text" class="form-control" placeholder="Masukkan Nama..." name="nama_ayah" value="{{ $skck->nama_ayah }}">
                                <small class="form-text text-muted">contoh : Muh. Ismail </small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Umur : </label>
                                <input type="text" class="form-control" placeholder="Masukkan umur..." name="umur_ayah" value="{{ $skck->umur_ayah }}">
                                <small class="form-text text-muted">contoh : 35 Tahun</small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Agama : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Agama..." name="agama_ayah" value="{{ $skck->agama_ayah }}">
                                {{-- <small class="form-text text-muted">Kosongkan jika tidak ada </small> --}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Kebangsaan : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Kebangsaan..." name="kebangsaan_ayah" value="{{ $skck->kebangsaan_ayah }}">
                                <small class="form-text text-muted">contoh : INDONESIA </small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Pekerjaan : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Pekerjaan..." name="pekerjaan_ayah" value="{{ $skck->pekerjaan_ayah }}">
                                <small class="form-text text-muted">contoh : PNS</small>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1"><span style="color:red;">* </span>Alamat : </label>
                                <input type="text" class="form-control" placeholder="Masukkan Alamat Sekarang..." name="alamat_sekarang_ayah" value="{{ $skck->alamat_sekarang_ayah }}">
                                <small class="form-text text-muted">contoh : Jl. Bakti Abri, Bukit Wolio Indah </small>
                            </div>
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

{{-- @push('js')
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
@endpush --}}