@extends('layouts.backend')

@section('title', 'Profil')

@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profil PPID</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div id="card-table-profile" class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Profil PPID</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-sm bg-gradient-primary" data-toggle="modal"
                        data-target="#modal-add-profile">
                        Tambah Data Profil
                    </button>
                </div>
            </div>
            <div id="card-body-table-profile" class="card-body">

            </div>

            <div class="overlay overlay-table-profile">
                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
            </div>
        </div>

    </section>
    @include('components.backend.modals.modal-profile')
@endsection

@section('scripts')
    <!-- Jquery Validation -->
    <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>

    <!-- Summernote -->
    <script src="{{ asset('adminlte/plugins//summernote/summernote-bs4.min.js') }}"></script>

    <!-- Bootstrap Custom File Input -->
    <script src="{{ asset('adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/backend/profile.js') }}"></script>
@endsection
