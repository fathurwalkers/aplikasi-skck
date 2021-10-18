<form action="{{ route('hapus-pengguna', $pengguna->id) }}" method="POSt" enctype="multipart/form-data">
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

</form>