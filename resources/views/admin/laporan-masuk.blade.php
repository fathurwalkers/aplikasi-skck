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
                        <th>Jenis Keperluan</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Pendaftaran SKCK</td>
                        <td>Edinburgh</td>
                        <td>16/02/1989</td>
                        <td>
                            <div class="container">
                                <div class="row m-0 p-0">
                                    <div class="col-sm-12 col-lg-12 col-md-12 mx-auto text-center">
                                        <a class="btn btn-info btn-sm" href="#" role="button">Lihat</a>
                                        <a class="btn btn-success btn-sm" href="{{ route('print-skck-baru') }}" role="button">Cetak</a>
                                        <a class="btn btn-primary btn-sm" href="#" role="button">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="#" role="button">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Perpanjangan SKCK</td>
                        <td>Wallow Stier</td>
                        <td>04/10/2001</td>
                        <td>
                            <div class="container">
                                <div class="row m-0 p-0">
                                    <div class="col-sm-12 col-lg-12 col-md-12 mx-auto text-center">
                                        <a class="btn btn-info btn-sm" href="#" role="button">Lihat</a>
                                        <a class="btn btn-success btn-sm" href="{{ route('print-skck-baru') }}" role="button">Cetak</a>
                                        <a class="btn btn-primary btn-sm" href="#" role="button">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="#" role="button">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
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