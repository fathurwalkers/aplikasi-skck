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
                        <th>Jenis SKCK</th>
                        <th>Nama Pemilik</th>
                        <th>No KTP</th>
                        <th>No Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data_skck as $skck)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>

                        @foreach ($skck->laporan as $laporan)
                            @if ($laporan->laporan_jeniskeperluan == 0)
                                <td> TIDAK ADA DATA</td>
                            @else
                            <td>{{ $laporan->laporan_jeniskeperluan }}</td>
                            @endif
                        @endforeach

                        <td>{{ $skck->nama_lengkap }}</td>

                        {{-- <td>{{ $skck->no_ktp }}</td> --}}
                        <td>{{ dump($skck->no_ktp) }}</td>

                        {{-- <td>{{ $skck->no_telepon }}</td> --}}
                        <td>{{ dump($skck->no_telepon) }}</td>

                        <td>
                            <div class="container">
                                <div class="row m-0 p-0">
                                    <div class="col-sm-12 col-lg-12 col-md-12 mx-auto text-center btn-group">
                                        <a class="btn btn-info btn-sm mr-1" href="#" role="button">Lihat</a>

                                        <form action="{{ route('print-skck-baru') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $skck->id }}" name="skck">
                                            <button class="btn btn-success btn-sm mr-1" type="submit" role="button">Cetak</button>
                                        </form>

                                        <a class="btn btn-primary btn-sm mr-1" href="#" value="{{ $skck->id }}" role="button">Edit</a>

                                        <button class="btn btn-sm btn-danger" data-href="{{ route('hapus-skck', $skck->id) }}"
                                            data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-btn fa-trash-o"></i>Remove
                                        </button>

                                        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="deleteModal">Confirm Remove</h4>
                                                    </div>

                                                    <div class="modal-body">
                                                        <p>You are about to remove a team member.</p>

                                                        <p>Do you want to proceed?</p>

                                                        <p class="debug-url"></p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('hapus-skck', $skck->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" value="{{ $skck->id }}" name="skckid">
                                                            <button class="btn btn-success btn-sm mr-1" type="submit" class="btn btn-danger btn-ok"><i class="fa fa-btn fa-trash-o"></i>Remove</button>
                                                        </form>
                                                        {{-- <button type="submit" class="btn btn-danger btn-ok"><i class="fa fa-btn fa-trash-o"></i>Remove
                                                        </button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
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

        $(function () {
            $('#confirm-delete').on('show.bs.modal', function (e) {
                if ($(document.activeElement).is('button.btn.btn-sm.btn-danger')) {
                $(this).find('.btn-ok').attr('href', $(document.activeElement).data('href'));
                }
            });
        });
    </script>
@endpush