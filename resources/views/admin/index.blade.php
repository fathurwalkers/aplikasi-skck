@extends('layouts.adminlayouts')

@section('main-content')

{{-- {{ dump($users) }} --}}

<div class="container mx-auto d-flex justify-content-center">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            @if (session('berhasil_buat_skck'))
                <div class="alert alert-success">
                    {{ session('berhasil_buat_skck') }}
                </div>
            @endif
            @if (session('batalkan_pembuatan'))
                <div class="alert alert-info">
                    {{ session('batalkan_pembuatan') }}
                </div>
            @endif
            @if (session('request_error'))
                <div class="alert alert-info">
                    {{ session('request_error') }}
                </div>
            @endif
            @if (session('skck_telah_ada'))
                <div class="alert alert-info">
                    {{ session('skck_telah_ada') }}
                </div>
            @endif

        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-lg-3 col-md-3 mb-3">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah Pengguna terdaftar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $pengguna }}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-lg-3 col-md-3 mb-3">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Jumlah SKCK Terdaftar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $total_skck }}
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-lg-3 col-md-6 mb-3">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah SKCK telah Terdaftar
                    </div>
                    <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                @if ($pendaftaran == null)
                                    0
                                @else
                                    {{ $pendaftaran->count() }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-3 mb-3">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Jumlah SKCK telah Diperpanjang</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        @if ($perpanjangan == null)
                            0
                        @else
                            {{ $perpanjangan->count() }}
                        @endif
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection