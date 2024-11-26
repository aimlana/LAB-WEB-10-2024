@extends('layouts.master')

@push('contacts')
<link rel="stylesheet" href="{{ asset('styles/contacts.css') }}">
@endpush
@section('content')

<div class="links">
    <a href="https://www.instagram.com/aliefhasyani2305?igsh=MWVrbzFha29oN3Robg=="><img src="{{ asset ('images/insta.png')}}"></a>
    <a href="https://www.iconarchive.com/tag/facebook-mini"><img src="{{ asset ('images/fb.png')}}"></a>
</div>


@endsection