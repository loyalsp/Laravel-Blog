@extends('layouts.master')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
@section('title')
    Blog index
@endsection
@section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" href="{{URL::to('css/weather.css')}}" rel="stylesheet">
@endsection
@section('content')
    @include('includes.info-box')
    @include('includes.weather')
    @foreach($posts as $post)
    <article class="blog-post">
        <h1>{{$post->title}}</h1>
        <span>{{$post->author}} | {{$post->created_at}}</span>
        <p>{{$post->body}}</p>
        <a href="{{route('blog.single',['post_id' => $post->id , 'end' => 'frontend'])}}">Read more</a>
    </article>
    @endforeach
    @if($posts->lastPage() > 1)
    <section class="pagination">

      @if($posts->currentPage() !==1)
            <a href="{{$posts->previousPageUrl()}}"><i class="fa fa-caret-left"></i></a>
          @endif
          @if($posts->currentPage() !== $posts->lastPage())
              <a href="{{$posts->nextPageUrl()}}"><i class="fa fa-caret-right"></i></a>
          @endif
    </section>
    @endif
@endsection
