@extends('layouts.app')


@section('content')

<style>
    form {
        display: flex;
        flex-direction: column;
        gap: 20px;
        width: 50%;
        margin: 0 auto;
    }

    h2 {
        margin:20px 0px;
        text-align: center;
    }

    .form-control {
        display: flex;
        flex-direction: column;
    }

    .form-control label {
        margin-bottom: 5px;
    }

    .form-control input {
        padding: 10px;
        border: 1px solid #f4f4f4;
        border-radius: 5px;
    }

    .form-control input[type="file"] {
        padding: 10px;
        border: 1px solid #f4f4f4;
        border-radius: 5px;
    }

    .form-control input[type="submit"] {
        padding: 10px;
        border: 1px solid #f4f4f4;
        border-radius: 5px;
        background-color: black;
        color: #fff;
        cursor: pointer;
    }

    .form-control input[type="submit"]:hover {
        background-color: #f4f4f4;
        color: black;
    }

    .form-control textarea {
        padding: 10px;
        border: 1px solid #f4f4f4;
        border-radius: 5px;
    }

    .form-control textarea:focus {
        outline: none;
    }

    .form-control input:focus {
        outline: none;
    }

    .errors {
        background-color: #f4f4f4;
        color: red;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
        text-align: center;
    }

    .errors ul {
        list-style: none;
    }

    .errors ul li {
        margin-bottom: 5px;
    }

    .errors ul li::before {
        content: '*';
        margin-right: 5px;
    }

 


</style>
@if($errors->any())
    <div class="errors">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{route('profile.update')}}" method="post" enctype='multipart/form-data' >
    <h2>Edit Your Profile</h2>
    @csrf
    @method('PUT')
    <div class="form-control">
        <label for="avatar">Profile</label>
        <input type="file" id="profile" name="image">
    </div>
    <div class="form-control">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ auth()->user()->name }}">
    </div>

    <div class="form-control">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="{{ auth()->user()->username }}">
    </div>


    <div class="form-control">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}">
    </div>

    <div class="form-control">
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" value="{{ auth()->user()->phone }}">
    </div>

    <div class="form-control">
        <label for="bio">Bio</label>
        <textarea name="bio" id="bio" cols="30" rows="10">{{ auth()->user()->bio }}</textarea>
    </div>

    <div class="form-control">
        <input type="submit" value="Update Profile">
    </div>
</form>
@endsection