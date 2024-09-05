<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEEDWALA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: black;
            color: #fff;
            padding: 30px 50px;
        }

        navbar ul {
            display: flex;
            list-style: none;
        }

        navbar ul li {
            margin-right: 10px;
        }

        navbar ul li:hover {
            cursor: pointer;
        }

        navbar ul li a {
            color: #fff;
            text-decoration: none;
        }

        navbar ul li a:hover {
            text-decoration: underline;
        }

        navbar ul li.logo {
            margin-right: 40px;
        }

        navbar button {
            padding: 10px 20px;
            background-color: #fff;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        navbar button:hover {
            background-color: #f4f4f4;
        }

        navbar button a {
            text-decoration: none;
            color: black;
        }
    </style>

</head>

<body>
    <navbar>
        <ul>
            <li class="logo"><b>Feed Wala</b></li>
            <li> <a href="/">Home</a></li>
        </ul>

        <ul>
            @if(auth()->check())

                <li>Welcome, {{ auth()->user()->name }}</li>
                <button><a href="/profile">Profile</a></button>
                <form action="/logout" method="post">
                    @csrf
                    <button>Logout</button>
                </form>
            @else
                <button><a href="/register">Register</a></button>
                <button><a href="/login">Login</a></button>
            @endif
        </ul>
    </navbar>

    @yield('content')

</body>

</html>