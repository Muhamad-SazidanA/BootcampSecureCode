@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="container py-5">

        {{-- HERO --}}
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold">
                Sistem <span class="text-primary">Ticket Support</span>
            </h1>
            <p class="text-muted fs-5 mt-3">
                Solusi sederhana untuk mengelola laporan, keluhan, dan permintaan bantuan secara terstruktur.
            </p>

            <div class="d-flex justify-content-center gap-3 mt-4">
                {{-- <a href="{{ route('tickets.index') }}" class="btn btn-primary btn-lg">
                    🎫 Lihat Daftar Tiket
                </a> --}}
                <a href="{{ route('tickets.create') }}" class="btn btn-outline-secondary btn-lg">
                    ➕ Buat Tiket Baru
                </a>
            </div>
        </div>

        {{-- FEATURES --}}
        <div class="row text-center mb-5">
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">📌 Manajemen Tiket</h5>
                        <p class="card-text text-muted">
                            Pantau status tiket dari <strong>Open</strong> hingga <strong>Closed</strong> secara real-time.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">⚡ Proses Cepat</h5>
                        <p class="card-text text-muted">
                            Sistem dirancang ringan dan cepat untuk meningkatkan produktivitas tim support.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">🔐 Aman & Terstruktur</h5>
                        <p class="card-text text-muted">
                            Data tiket tersimpan aman dengan sistem autentikasi dan role pengguna.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{-- CTA BOTTOM --}}
        <div class="text-center py-5 bg-light rounded">
            <h3 class="fw-bold mb-3">Siap Mengelola Tiket dengan Lebih Baik?</h3>
            <p class="text-muted mb-4">
                Mulai sekarang dan rasakan kemudahan sistem ticket support ini.
            </p>

            <a href="{{ route('tickets.index') }}" class="btn btn-primary btn-lg">
                🚀 Mulai Buat Tiket
            </a>
        </div>

    </div>
@endsection