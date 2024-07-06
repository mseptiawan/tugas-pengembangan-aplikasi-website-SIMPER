<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Login</title>
    <link rel="shortcut icon" href="/img/logo-sekolah-indriasana.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/style-login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');

        body {
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("https://cdn.pixabay.com/photo/2016/11/29/12/50/bookcases-1869616_1280.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Nunito', sans-serif;
        }

        .container {
            display: flex;
            flex-direction: row;
            justify-content: center;
            padding: 20px;
            width: 100%;
        }

        .box-form {
            display: flex;
            flex-direction: row;
            align-items: center;
            text-align: left;
            width: 100%;
            max-width: 1200px;
        }

        .text-welcome {
            color: white;
            font-weight: bold;
            margin-right: 40px;
            flex: 1;
            max-width: 600px;
            padding: 20px;
            font-size: 2em;
            text-align: left;
        }

        .col-form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
            flex: 1;
            max-width: 400px;
        }

        .label-admin {
            font-weight: lighter;
            color: white;
            margin-bottom: 5px;
        }

        .email-container,
        .pw-container {
            width: 100%;
            margin-bottom: 15px;
        }

        .email-pw-box {
            width: 100%;
        }

        .btn-login {
            width: 100%;
            margin-top: 15px !important;
        }

        .error-message {
            color: red;
            font-size: 0.8em;
            margin-top: 5px;
        }

        @media (max-width: 767px) {
            .container {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .box-form {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .text-welcome {
                margin-right: 0;
                margin-bottom: 20px;
                max-width: none;
                font-size: 1.5em;
                text-align: center;
            }

            .col-form {
                align-items: center;
                max-width: none;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="box-form">
            <div class="text-welcome">
                Selamat Datang di Website <br> Perpustakaan berbasis Online
            </div>
            <div class="col-form">
                <form class="email-pw-box" action="/" method="post">
                    <div class="email-container">
                        <label class="label-admin" for="email">Login Admin atau User</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="pw-container">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    @csrf
                    <div>
                        <div class="error-message">{{ session()->get('pesan') }}</div>
                    </div>
                    <button type="submit" class="btn btn-primary my-2 mb-4 btn-login">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
