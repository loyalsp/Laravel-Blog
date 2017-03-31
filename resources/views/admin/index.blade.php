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
                        <li><a href="#" class="btn">New post</a></li>
                        <li><a href="#" class="btn">Show all post</a></li>
                    </ul>
                </nav>
            </header>
            <section>
                <ul>
                    {{--If no post disply this list item---}}
                    <li>no post</li>
                    <li>
                        <article>
                            <div class="post-info">
                                <h3>Page title</h3>
                                <span class="info">Post author | date</span>
                            </div>
                            <div calss="edit">
                                <nav>
                                    <ul>
                                        <li><a href="#">view post</a></li>
                                        <li><a href="#">edit</a></li>
                                        <li><a href="#" class="danger">delete</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </article>
                    </li>
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
        var token= "{{Session::token()}}";
    </script>
    <script src="{{URL::secure('js/modal.js')}}" type="text/javascript"></script>
    <script src="{{URL::secure('js/contact-message.js')}}" type="text/javascript"></script>
    @endsection