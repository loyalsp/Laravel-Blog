@extends('layouts.master')
@section('title')
    Contact us
@endsection
@section('style')
    <link href="{{URL::to('css/form.css')}}" rel="stylesheet">
@endsection
@section('content')
    @include('includes.info-box')
    <form method="post" action="#" id="contact-from">
        <div class="input-group">
            <label for="name">Your Name: </label>
            <input id="name" name="name">
        </div>
        <div class="input-group">
            <label for="email">Email: </label>
            <input id="email"  name="email">
        </div>
        <div class="input-group">
            <label for="subject">Subject: </label>
            <input id="subject" name="subject">
        </div>
        <div class="input-group">
            <label for="message">Your Message: </label>
            <textarea id="message" name="message" rows="10"></textarea>
        </div>
        <input type="hidden" name="_token" value="{{Session::token()}}">
        <button type="submit">Submit message</button>

    </form>
@endsection