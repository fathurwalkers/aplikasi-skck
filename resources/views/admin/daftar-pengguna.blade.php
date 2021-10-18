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
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                
                    @foreach ($daftar_users as $pengguna)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengguna->login_nama }}</td>
                            <td>{{ $pengguna->login_username }}</td>
                            <td>{{ $pengguna->login_email }}</td>

                            <td>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex justify-content-center mx-auto">
                                        <button class="btn btn-sm btn-success">
                                            {{ strtoupper($pengguna->login_status) }}
                                        </button>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12 d-flex mx-auto justify-content-center">
                                        <a class="btn btn-sm btn-info mr-1" href="#">Lihat</a>
                                        <a class="btn btn-sm btn-primary mr-1" href="#">Ubah</a>
                                        <a class="btn btn-sm btn-danger mr-1" href="#">Hapus</a>
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