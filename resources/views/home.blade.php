@extends('layouts.quixlab')

@section('content')
@php
    $pemesanan  = App\Pemesanan::all();
    $pemesananProses = App\Pemesanan::where('status', 1);
    $pemesananLokasi = App\Pemesanan::where('status', 2);
    $pemesananRancangan = App\Pemesanan::where('status', 3);
    $pemesananRAB = App\Pemesanan::where('status', 4);
    $pemesananDirektur = App\Pemesanan::where('status', 5);
    $pemesananRAP = App\Pemesanan::where('status', 6);
    $pemesananTanggalKonsumen = App\Pemesanan::where('status', 7);
    $pemesananSPK = App\Pemesanan::where('status', 8);
    $pemesananJadwalPelaksana = App\Pemesanan::where('status', 9);
    $pemesananKwitansi = App\Pemesanan::where('status', 10);
    $pemesananSelesai = App\Pemesanan::where('status', 11);
    $pemesananDitolak = App\Pemesanan::where('status', 0);
@endphp
<div class="container">
    @if (Auth::user()->user_role_id == 1)
    @include('_home_admin')

    @elseif(Auth::user()->user_role_id == 2)
    @include('_home_drafter')

    @elseif(Auth::user()->user_role_id == 3)
    @include('_home_pelaksana')

    @elseif(Auth::user()->user_role_id == 4)
    @include('_home_direktur')

    @elseif(Auth::user()->user_role_id == 5)
    @include('_home_konsumen')

    @endif
</div>
@endsection