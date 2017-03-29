@extends('layouts.master')

@section('title')
    Blog index
@endsection

@section('content')
    <article>
        <h1>post title</h1>
        <span>Author name | date</span>
        <p>Post content</p>
        <a href="#">Read more</a>
    </article>
    <section class="pagination">
        Pagination
    </section>
@endsection
