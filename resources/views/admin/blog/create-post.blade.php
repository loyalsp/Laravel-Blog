@extends('layouts.admin-master')
@section('style')
    <link href="{{URL::to('css/form.css')}}" rel="stylesheet">
    @endsection
@section('content')
    <div class="container">
        @include('includes.info-box')
        <form action="{{route('create.admin_post')}}" method="post">
            <div class="input-group">
                <label for="title">Title</label>                                                                       {{--if the form is not validated this will get the old typed value "Request::old('title')"--}}
                <input id="title" name="title" type="text" {{$errors->has('title') ? 'class=has-error' : ''}} value="{{Request::old('title')}}">
            </div>

            <div class="input-group">
                <label for="author">Author</label>
                <input id="author" name="author" type="text" {{$errors->has('author') ? 'class=has-error' : ''}} value="{{Request::old('author')}}">
            </div>

            <div class="input-group">
                <label for="category-select">Category select</label>
               <select name="category-select" id="category-select">
                   {{--foreach --}}
<option value="dummy val"></option>
               </select>

            <button class="btn" type="button">Add category</button>
            <button class="btn" type="button">Added category</button>
            <div class="added-categories">
                <ul>

                </ul>
            </div>
                <input type="hidden" name="categories" id="categories">
            </div>
            <div class="input-group">
                <label for="body">Body</label>
                <textarea id="body" name="body" rows="12" {{$errors->has('body') ? 'class=has-error' : ''}} >{{Request::old('body')}}</textarea>
            </div>
            <input type="hidden" name="_token" value="{{Session::token()}}">
            <button type="submit" class="btn"> Create post</button>
        </form>
    </div>
    @endsection
@section('script')
    <script src="{{URL::to('js/posts.js')}}" type="text/javascript"></script>
    @endsection