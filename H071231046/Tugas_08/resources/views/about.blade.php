<!-- File about -->
@extends('layouts.master')

@section('title', 'About')

@section('content')
<div class="container my-5">
    <!-- Bagian Visi, Misi, dan Tujuan -->
    <h2 class="text-center mb-4">Visi, Misi, dan Tujuan</h2>
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Visi</h5>
                    <p class="card-text">Menjadi organisasi yang memberikan dampak positif melalui bantuan yang berkelanjutan dan terstruktur.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Misi</h5>
                    <p class="card-text">Menyediakan platform yang memfasilitasi donasi dan bantuan untuk mereka yang membutuhkan, dengan transparansi dan kepercayaan.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Tujuan</h5>
                    <p class="card-text">Meningkatkan kesejahteraan masyarakat melalui program-program bantuan sosial dan pemberdayaan ekonomi.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Statistik Singkat -->
    <h2 class="text-center my-5">Statistik Singkat</h2>
    <div class="row text-center">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Jumlah Donatur</h3>
                    <p class="display-4 text-primary counter" data-target="1200">0</p>
                    <p class="card-text">Donatur yang telah berpartisipasi dalam berbagai program kami.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Total Donasi</h3>
                    <p class="display-4 text-primary counter" data-target="5000000">0</p>
                    <p class="card-text">Total donasi yang telah terkumpul untuk mendukung program-program kami.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title">Orang Terbantu</h3>
                    <p class="display-4 text-primary counter" data-target="3000">0</p>
                    <p class="card-text">Orang yang telah menerima bantuan atau manfaat dari program kami.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
