@extends('layouts.master')

@section('title', 'Contact')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Hubungi Kami</h2>

    <!-- Bagian Formulir Kontak -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <h4>Kontak Kami</h4>
            <p>Silakan isi formulir di bawah ini untuk menghubungi kami atau gunakan informasi kontak yang tertera di sebelah kanan.</p>

            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Pesan</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
            </form>
        </div>

        <!-- Informasi Kontak -->
        <div class="col-md-6 mb-4">
            <h4>Informasi Kontak</h4>
            <p><strong>Alamat:</strong> Jl. Mawar No. 123, Jakarta</p>
            <p><strong>Telepon:</strong> +62 21 1234 5678</p>
            <p><strong>Email:</strong> info@example.com</p>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126913.23456789123!2d106.827183!3d-6.175110!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699302f2d9e!2sJakarta!5e0!3m2!1sen!2sid!4v1614760432637!5m2!1sen!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection