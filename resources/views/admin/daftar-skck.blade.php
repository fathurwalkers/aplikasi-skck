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

                        @if ($laporanDetail->where('detail_id', $skck->id)->first())
                            @foreach ($skck->laporan as $laporan)
                                <td>{{ $laporan->laporan_jeniskeperluan }}</td>
                            @endforeach
                        @else
                            <td> TIDAK ADA DATA</td>
                        @endif

                        {{-- {{ dd($skck->laporan) }} --}}

                        {{-- @foreach ($skck->laporan as $laporan)
                        {{ dump($laporan) }}
                            @if ($laporan->isEmpty())
                                <td> TIDAK ADA DATA</td>
                            @else
                                <td>{{ $laporan->laporan_jeniskeperluan }}</td>
                            @endif
                        @endforeach --}}

                        @if ($skck->nama_lengkap == null)
                            <td> TIDAK ADA DATA</td>
                        @else
                            <td>{{ $skck->nama_lengkap }}</td>
                        @endif
                        {{-- <td>{{ $skck->nama_lengkap }}</td> --}}

                        @if ($skck->no_ktp == null)
                            <td> TIDAK ADA DATA</td>
                        @else
                            <td>{{ $skck->no_ktp }}</td>
                        @endif
                        {{-- <td>{{ $skck->no_ktp }}</td> --}}

                        @if ($skck->no_telepon == null)
                            <td> TIDAK ADA DATA</td>
                        @else
                            <td>{{ $skck->no_telepon }}</td>
                        @endif
                        {{-- <td>{{ $skck->no_telepon }}</td> --}}

                        <td>
                            <div class="container">
                                <div class="row m-0 p-0">
                                    <div class="col-sm-12 col-lg-12 col-md-12 mx-auto text-center btn-group">
                                        <a class="btn btn-info btn-sm mr-1 rounded" href="#" role="button">
                                            <i class="fas fa-info-circle"></i>
                                            Lihat
                                        </a>

                                        <form action="{{ route('print-skck-baru') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $skck->id }}" name="skck">
                                            <button class="btn btn-success btn-sm mr-1 rounded" type="submit" role="button">
                                                <i class="fas fa-print"></i>
                                                Cetak
                                            </button>
                                        </form>

                                        <a href="#" class="btn btn-sm btn-info rounded mr-1" data-toggle="modal" data-target="#ModalEdit{{$skck->id}}" >
                                            <i class="fas fa-cog"></i>
                                            Edit {{ $skck->id }}
                                        </a>

                                        <a href="#" class="btn btn-sm btn-danger rounded" data-toggle="modal" data-target="#ModalDelete{{$skck->id}}" >
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    {{-- MODAL Delete --}}
                    <div class="modal fade" id="ModalDelete{{ $skck->id }}" tabindex="1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                
                                <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi Tindakan</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body">Apakah anda yakin ingin menghapus item ini? <b> {{ $skck->id }} </b> ? </div>
                                <form action="{{ route('hapus-skck', $skck->id) }}" method="POST" enctype="multipart/form-data">
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

                    {{-- MODAL Edit --}}
                    <div class="modal fade" id="ModalEdit{{ $skck->id }}" tabindex="1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                
                                <div class="modal-header">
                                    <h4 class="modal-title">Konfirmasi Tindakan</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body">Apakah anda yakin ingin menghapus item ini? <b> {{ $skck->id }} </b> ? </div>
                                <form action="{{ route('edit-skck', $skck->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-footer">
                                        <button type="button" class="btn gray btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-outline-info">Ubah</button>
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