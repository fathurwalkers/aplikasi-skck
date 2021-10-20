@extends('layouts.adminlayouts')

@push('css')
    
@endpush

@section('main-content')

<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card">
        <div class="card-body">

            @if (session('status_delete'))
                <div class="alert alert-info">
                    {{ session('status_delete') }}
                </div>
            @endif

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
                                        {{-- <a class="btn btn-sm btn-danger mr-1" href="#">Hapus</a> --}}

                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#ModalDelete{{$pengguna->id}}" >Hapus {{ $pengguna->id }}</a>

                                        {{-- @include('admin.delete-user') --}}
                                        {{-- <button class="btn btn-sm btn-danger" data-toggle="modal" data-id="{{ $pengguna->id }}" data-target="#deleteModal" >Hapus {{ $pengguna->id }}</button> --}} 
                                        {{-- <button onclick="document.getElementById('id01').style.display='block'">Open Modal</button> --}}

                                    </div>
                                </div>
                            </td>

                        </tr>

                        {{-- MODAL --}}
                        <div class="modal fade" id="ModalDelete{{ $pengguna->id }}" tabindex="1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                    
                                    <div class="modal-header">
                                        <h4 class="modal-title">Konfirmasi Tindakan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    
                                    <div class="modal-body">Apakah anda yakin ingin menghapus item ini? <b> {{ $pengguna->id }} </b> ? </div>
                                    <form action="{{ route('hapus-pengguna', $pengguna->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-footer">
                                            <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        </div>
                                    </form>
                    
                                </div>
                            </div>
                        </div>
                        {{-- End MODAL --}}

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- <form action="{{ route('hapus-pengguna', $pengguna->id) }}" method="POSt" enctype="multipart/form-data">
    @csrf

    <div class="modal-fade" id="ModalDelete{{ $pengguna->id }}" tabindex="1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Tindakan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">Apakah anda yakin ingin menghapus item ini? <b> {{ $pengguna->id }} </b> ? </div>

                <div class="modal-footer">
                    <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-outline-danger">Delete</button>
                </div>

            </div>
        </div>
    </div>

</form> --}}

@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#example1').DataTable();
        });
    </script>

    {{-- <script src=//code.jquery.com/jquery-3.5.1.slim.min.js integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin=anonymous></script> --}}

    <script>
        
    </script>

@endpush