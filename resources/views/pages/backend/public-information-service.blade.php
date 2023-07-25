@extends('layouts.backend')

@section('title', 'Layanan Informasi')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Layanan Informasi Publik</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div id="card-table-pi-service" class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Layanan Informasi Publik</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-sm bg-gradient-primary" data-toggle="modal"
                        data-target="#modal-add-pi-service">
                        Tambah Data Layanan Informasi
                    </button>
                </div>
            </div>
            <div id="card-body-table-pi-service" class="card-body">

            </div>

            <div class="overlay overlay-table-pi-service">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
        </div>

    </section>
    @include('components.backend.modals.modal-public-information-service')
@endsection

@section('scripts')
    <!-- Jquery Validation -->
    <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/backend/pi-service.js') }}"></script>
@endsection
