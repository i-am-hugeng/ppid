@extends('errors::minimal')

@section('title', 'Not Found')

@section('message')
    <h1 class="title text-center text-warning">
        <i class="fas fa-exclamation-triangle text-warning"></i> ERROR 404
    </h1>
    <h3 class="font-weight-bold text-center text-warning">Halaman tidak ditemukan</h3>
    <p class="text-center">
        Silahkan kembali ke halaman sebelumnya, terima kasih.
    </p>
    <img class="mx-auto d-block rounded" src="{{ asset('bsn/koprol.gif') }}" height="300px" alt="" />
@endsection
