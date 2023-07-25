@extends('layouts.backend')

@section('title', 'Daftar Informasi Lainnya')

@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Informasi Lainnya</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tabel Daftar Informasi Lainnya</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-sm bg-gradient-primary" data-toggle="modal"
                        data-target="#modal-add">
                        Tambah Daftar Informasi Lainnya
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <table id="dtOtherInformation" class="table table-bordered table-hover w-100 datatables">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>URL</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

        </div>

    </section>
    @include('components.backend.modals.public-information.modal-other-information-list')
@endsection

@section('scripts')
    <!-- datatables -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

    <!-- Jquery Validation -->
    <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/backend/public-information/other-information-list.js') }}"></script>
@endsection
