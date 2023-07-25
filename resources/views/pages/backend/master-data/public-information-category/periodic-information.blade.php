@extends('layouts.backend')

@section('title', 'Master Data Informasi Berkala')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kategori Informasi Berkala</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div id="card-table-periodic-information" class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Kategori Informasi Berkala</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-sm bg-gradient-primary" data-toggle="modal"
                        data-target="#modal-add-periodic-information">
                        Tambah Kategori Informasi Berkala
                    </button>
                </div>
            </div>
            <div id="card-body-table-periodic-information" class="card-body">

            </div>

            <div class="overlay overlay-table-periodic-information">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
        </div>

    </section>
    @include('components.backend.modals.master-data.public-information.modal-periodic-information')
@endsection

@section('scripts')
    <!-- Jquery Validation -->
    <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/backend/master-data/public-information/periodic-information.js') }}">
    </script>
@endsection
