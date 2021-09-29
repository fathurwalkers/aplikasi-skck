@extends('layouts.adminlayouts')

@push('css')
    
@endpush

@section('main-content')
<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card">
        <div class="card-header">
            <h4>Format Header </h4>
        </div>
        <div class="card-body">

            <div class="container">

                <div class="row d-flex justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-6">
                        <p>
                            Silahkan tekan tombol "VERIFIKASI" untuk mengirim verifikasi pengguna langsung ke Email anda yang telah terdaftar.
                        </p>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-sm-6 col-md-6 col-lg-6 d-flex justify-content-center">
                        <form action="{{ route('post-verifikasi-pengguna') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-md btn-primary">
                                VERIFIKASI
                            </button>
                        </form>
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