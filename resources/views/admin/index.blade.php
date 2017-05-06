@extends('layouts.admin-master')
@section('style')
    <link href="{{URL::to('css/modal.css')}}" type="text/css">
@endsection
@section('content')
    <div class="container">
        @include('includes.info-box')
        <div class="card">
            <header>
                <nav>
                    <ul>
                        <li><a href="{{route('admin.create.post')}}" class="btn">New post</a></li>
                        <li><a href="{{route('admin.blog.index')}}" class="btn">Show all post</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <ul>
                    {{--If no post disply this list item---}}
                    @if(count($posts) == 0)
                        <li>no post</li>
                    @else
                        @foreach($posts as $post)
                            <li>
                                <article>
                                    <div class="post-info">
                                        <h3>{{$post->title}}</h3>
                                        <span class="info">{{$post->author}} | {{$post->created_at}}</span>
                                    </div>
                                    <div calss="edit">
                                        <nav>
                                            <ul>
                                                <li><a href="{{route('admin.blog.post',['post_id' => $post->id , 'end' => 'admin'])}}">view post</a></li>
                                                <li><a href="{{route('admin.blog.post.edit',['post_id' => $post->id])}}">edit</a></li>
                                                <li><a href="{{route('delete.blog.post',['post_id' => $post->id])}}" class="danger">delete</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </article>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </section>
        </div>
        {{--second card--}}
        <div class="card">
            <header>
                <nav>
                    <ul>

                        <li><a href="#" class="btn">Show all messages</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <ul>
                    {{--If no message disply this list item---}}
                    <li>no message</li>
                    {{--if mesaages--}}
                    <li>
                        <article data-message="body" data-id="ID">
                            <div class="message-info">
                                <h3>message title</h3>
                                <span class="info">sender | date</span>
                            </div>
                            <div calss="edit">
                                <nav>
                                    <ul>
                                        <li><a href="#">view</a></li>
                                        <li><a href="#" class="danger">delete</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </article>
                    </li>
                </ul>
            </section>
        </div>
    </div>

    <div class="modal" id="contact-message-info">
        <button class="btn" id="close"> Close</button>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        var token = "{{Session::token()}}";
    </script>
    <script src="{{URL::to('js/modal.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('js/contact-message.js')}}" type="text/javascript"></script>
@endsection