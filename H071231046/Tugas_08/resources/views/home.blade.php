<!-- File home.blade -->
@extends('layouts.master')

@section('title', 'Home')

@section('content')
<div id="carouselExampleCaptions" class="carousel slide container-fluid mt-0" data-bs-interval="1000" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/banner.png') }}" class="d-block w-100 img-fluid"  style="max-height: 500px; object-fit: cover;" alt="foto 1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Ulurkan Tangan, Ringankan Beban</h5>
                <p>Bersama kita bisa membuat perbedaan dalam kehidupan mereka yang membutuhkan.</p>
            </div> 
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/banner2.png') }}" class="d-block w-100" style="max-height: 500px; object-fit: cover;" alt="foto 2">
            <div class="carousel-caption d-none d-md-block">
                <h5>Donasi Anda, Harapan Mereka</h5>
                <p>Setiap kontribusi Anda adalah harapan baru bagi yang membutuhkan.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/banner3.png') }}" class="d-block w-100" style="max-height: 500px; object-fit: cover;" alt="foto 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Bangkit Bersama, Bantu Sesama</h5>
                <p>Mari bangun solidaritas dengan berbagi dan peduli</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

@endsection