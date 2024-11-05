@extends('layouts.master')

@section('title', 'Contact')

@section('content')
    <div class="contact">
        <h2>Contact Us</h2>
        <p>If you have any questions, feel free to reach out!</p>
        <div class="form1 d-flex flex-column justify-content-center" id="comment">
            <label for="username">Username</label>
            <input type="text" id="username" placeholder="username">
        
            <div class="mb-3">
                <label for="FormComment" class="form-label">Comment</label>
                <textarea id="FormComment" class="form-control" rows="3" placeholder="Your comment..."></textarea>
            </div>
        
            <button type="button" class="btn btn-success" 
                    style="height:60px; width:160px; margin:40px auto; background-color:rgb(72, 72, 72); display: block;"
                    onclick="window.location.href='http://127.0.0.1:8000/contact'">
                Submit
            </button>    
        </div>
        
    </div>
@endsection
