<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEEDWALA | REGISTRATION</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        body {
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .input-group {
            margin-bottom: 10px;
        }

        .input-group label {
            display: block;
            font-weight: bold;
        }

        .input-group input,
        .input-group textarea {
            width: 100%;
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .input-group textarea {
            resize: none;
            height: 100px;
        }

        button {
            padding: 10px;
            font-size: 16px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #444;
        }

        h3 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <form action="/login" method="post" enctype="multipart/form-data">


        <h3>Login Now</h3>



        @if($errors->any())
            <div style="color: red; margin-bottom: 10px;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <button type="submit">Login</button>

    </form>

</body>

</html>