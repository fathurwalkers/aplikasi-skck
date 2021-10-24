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
                            @if (empty($data_skck))
                                <img class="img-fluid d-flex mr-3" src="#" alt="" width="400px">
                            @else
                                <img class="img-fluid d-flex mr-3" src="{{ asset('foto') }}/{{ $data_skck->foto }}" alt="" width="400px">
                            @endif
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
                            @if ($data_skck == null)
                                : SKCK Belum dibuat <br>
                            @else
                                : {{ $data_skck->no_telepon }} <br>
                            @endif

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