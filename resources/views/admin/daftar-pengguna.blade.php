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

                <div class="row">

                    <div class="col-sm-4 col-md-4 col-lg-4">
                        <p>Cek : </p>
                    </div>

                    <div class="col-sm-8 col-md-8 col-lg-8">
                        <p>Cek : </p>
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