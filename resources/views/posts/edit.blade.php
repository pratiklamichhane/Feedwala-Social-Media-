@extends('layouts.app')

@section('content')

<style>
    .add-post {
        width: 90%;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 20px;
    }

    .add-post form {
        display: flex;
        justify-content: space-between;
    }

    .add-post input {
        width: 70%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .add-post input[type="file"] {
        width: 20%;
    }

    .add-post button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: black;
        color: #fff;
        cursor: pointer;
    }

    .add-post button:hover {
        background-color: #0056b3;
    }

    .alert {
        width: 90%;
        padding: 20px;
        border-radius: 5px;
        margin: 20px;
    }

    .alert ul {
        list-style: none;
    }

    .alert li {
        color: red;
    }

    .post {
        width: 90%;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 20px;
    }

    .post img {
        width: 100%;
    }

    .alert {
        background-color: #f8d7da;
        color: #721c24;
        padding: 20px;
        border-radius: 5px;
        margin: 20px;
    }

    .alert ul {
        list-style: none;
    }

    .alert li {
        color: #721c24;
    }

    .alert a {
        color: #721c24;
        text-decoration: underline;
    }




</style>

@if($errors->any())
    <div class="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="add-post">
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="caption" value="{{ $post->caption }}" placeholder="Title">
        <input type="file" name="image">
        <button type="submit">Update</button>
    </form>

    @if($post->image)
        <img src="{{ asset($post->image) }}" alt="{{ $post->caption }}" style="width: 100%; margin-top: 20px;">
    @endif
</div>

@endsection