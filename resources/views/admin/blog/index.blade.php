@extends('layouts.admin-master')
@section('style')
    <link href="{{URL::to('css/form.css')}}" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        @include('includes.info-box')
        <section id="admin-post">
            <a href="{{route('admin.create.post')}}" class="btn">New post</a>
        </section>
        <section>

            {{--If no post disply this list item---}}
            @if(count($posts) == 0)
                no post
            @else
                @foreach($posts as $post)

                    <article>
                        <div class="container">
                            <section class="post-admin">
                                <h3>{{$post->title}}</h3>
                                <span class="info">{{$post->author}} | {{$post->created_at}}</span>
                            </section>


                            <div id="post-admin">
                                <a href="{{route('admin.blog.post',['post_id' => $post->id , 'end' => 'admin'])}}">view
                                    post</a>
                                <a href="{{route('admin.blog.post.edit',['post_id' => $post->id])}}">edit</a>
                                <a href="{{route('delete.blog.post',['post_id' => $post->id])}}"
                                   class="danger">delete</a>
                            </div>
                        </div>
                    </article>

                @endforeach
            @endif

        </section>
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
    </div>
@endsection