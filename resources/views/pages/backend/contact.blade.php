@extends('layouts.backend')

@section('title', 'Kontak')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kontak Kami</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div id="card-table-contact" class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Kontak Layanan Informasi</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-sm bg-gradient-primary" data-toggle="modal"
                        data-target="#modal-add-contact">
                        Tambah Info Kontak
                    </button>
                </div>
            </div>
            <div id="card-body-table-contact" class="card-body">

            </div>

            <div class="overlay overlay-table-contact">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
        </div>

    </section>
    @include('components.backend.modals.modal-contact')
@endsection

@section('scripts')
    <!-- Jquery Validation -->
    <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>

    <!-- Bootstrap Custom File Input -->
    <script src="{{ asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/backend/contact.js') }}"></script>
@endsection
