@extends('layouts.app')


@section('content')
<style>
      .add-comment {
        width: 90%;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin: 20px;
    }

    .add-comment form {
        display: flex;
        justify-content: space-between;
    }

    .add-comment input {
        width: 80%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }



    .add-comment button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: black;
        color: #fff;
        cursor: pointer;
    }

    .add-comment button:hover {
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

    .post h3 {
        margin-bottom: 10px;
    }

    .post img {
        width: 100%;
        height: 300px;
        object-fit: cover;
        border-radius: 5px;
    }

    .uploader-details {
        display: flex;
        align-items: center;
    }

    .uploader-details img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .post-details {
        margin-top: 10px;
    }

    .post-details p.time {
        color: #ccc;
        margin-bottom: 10px;
    }

    .post-details p {
        margin-bottom: 10px;
    }

    .post-details img {
        width: 100%;
        height: 700px;
        object-fit: cover;
        border-radius: 5px;
    }

    .edit-post {
        display: flex;
        justify-content: flex-end;
    }

    .edit-post a {
       margin-right: 2px;

    }

    .edit-post button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .edit-post button:hover {
        background-color: #0056b3;
    }

    .post-footer {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .actions-button button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .actions-button button:hover {
        background-color: #0056b3;
    }

    .actions-button button i {
        font-size: 20px;
    }

    .actions-button button i:hover {
        color: #0056b3;
    }
</style>
<div class="post">
            <div class="uploader-details">
            @if($post->user->image)
                <img src="{{asset($post->user->image)}}" alt="">
            @else
                <img src="https://th.bing.com/th/id/OIP.uQ4DG8iPTlnHC-dBRiRHjwHaHa?rs=1&pid=ImgDetMain" alt="">
            @endif
            <p>{{$post->user->username}}</p>
            </div>
            <div class="edit-post">

            @if(auth()->check() && auth()->user()->id == $post->user_id)
                <a href="{{route('posts.edit' , $post->id)}}"><button><i class="ri-pencil-line"></i></button></a>
                <form action="{{route('posts.destroy' , $post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><i class="ri-delete-bin-6-line"></i></button>
                </form>
            @endif

            </div>
            <div class="post-details">
            <p class="time">{{$post->created_at->diffForHumans()}}</p>
            <p>{{$post->caption}}</p>
            @if($post->image)
                <img src="{{asset($post->image)}}" alt="">
            @endif
            </div>

            <div class="post-footer">
                <div class="actions-button">
                    <a href="/"><button>Go Back</button></a>
                </div>
            </div>
        </div>

        @if(auth()->check())
    <div class="add-comment">
    <form action="{{route('posts.store')}}" method="post" enctype='multipart/form-data'>
        @csrf
        <input type="text" placeholder="Write any comment?" name="comment">
        <button type="submit">Comment</button>
    </form>
    </div>
    @endif

@endsection