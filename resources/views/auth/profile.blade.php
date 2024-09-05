@extends('layouts.app')
@section('content')
    <style>
        .profile {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
            gap: 50px;
        }


        .profile-user {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .profile-user img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .profile h1 {
            margin-bottom: 20px;
        }

        .account-details {
            margin-top: 20px;
            border: 1px solid #f4f4f4;
            padding: 20px;
            border-radius: 5px;
            height: 200px;
        }

        .account-details h4 {
            margin-bottom: 10px;
        }

        .account-details p {
            margin-bottom: 5px;
        }

        .account-details button {
            padding: 10px 20px;
            background-color: black;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .account-details button a {
            text-decoration: none;
            color: #fff;
        }

        .bio{
            text-align: center;
            width: 400px;
            margin: auto;
            margin-top: 50px;
        }

    
    </style>
    <section class="profile">
        <div class="profile-user">

        @if(auth()->user()->image)
            <img src="{{ asset(auth()->user()->image) }}" alt="">
        @else
            <img src="https://th.bing.com/th/id/OIP.uQ4DG8iPTlnHC-dBRiRHjwHaHa?rs=1&pid=ImgDetMain" alt="">
        @endif
        
            <h2>{{ auth()->user()->name }}</h2>
            <p>{{auth()->user()->username}}</p>
        </div>

        <div class="account-details">
        <h4>Account Details</h4>
        <p>Email: {{ auth()->user()->email }}</p>
        <p>Phone: {{ auth()->user()->phone }}</p>
        <p>Created At: {{ auth()->user()->created_at }}</p>
        <button><a href="{{route('profile.edit')}}">Edit Profile</a></button>
        </div>
    </section>

    <p class="bio">
        {{ auth()->user()->bio }}a
    </p>


   @include('components.feed')

@endsection
