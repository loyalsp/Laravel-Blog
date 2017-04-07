@extends('layouts.admin-master')

@section('content')
    <div class="container">
        <section id="post-admin">
            <a href="{{route('admin.blog.post.edit',['post_id' => $post->id])}}">Edit a post</a>
            <a href="">delete post</a>
        </section>
        <section class="post">
<h1>{{$post->title}}</h1>
            <span class="span-info">{{$post->author}} | {{$post->created_at}}</span>
            <p>{{$post->body}}</p>
        </section>
    </div>
    @endsection