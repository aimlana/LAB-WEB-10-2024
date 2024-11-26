
@extends('layouts.master')

@section('content')
@push('styles-home')
<link rel="stylesheet" href="{{ asset('styles/home.css') }}">
@endpush

<section >
    <div class="welcome">
        <h1>Welcome</h1>
        <h2>Tugas Praktikum 8</h2>
    </div>
    <x-button route="{{ route('about') }}">ABOUT</x-button>
    
</section>
@endsection
