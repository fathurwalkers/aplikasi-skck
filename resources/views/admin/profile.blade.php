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
                        <button type="submit" class="btn btn-danger float-right">Kembali</button>
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