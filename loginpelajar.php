<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEM KELUAR MASUK KE KLINIK KESIHATAN SELANDAR</title>
    <link rel="stylesheet" href="./style.css">
</head>
<style>
    *{
        padding: 0;
        margin: 0;
        font-family: sans-serif;
    }

    body{
        background: url('img/clinic.jpg') no-repeat;
        background-size: cover;
    }

    .login-form{
        width: 350px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        position: absolute;
        color: lightskyblue;
    }

    .login-form h1 {
        font-size: 40px;
        text-align: center;
        text-transform: uppercase;
        margin: 40px 0;
    }

    .login-form p {
        font-size: 20px;
        margin: 15px 0;
    }

    .login-form input {
        font-size: 16px;
        width: 100%;
        padding: 15px 10px;
        border: 0;
        outline: none;
        border-radius: 5px;
    }

    .login-form button{
        font-size: 18px;
        font-weight: bold;
        margin: 20px 0;
        padding: 10px 15px;
        width: 50%;
        border-radius: 5px;
        border: 0;
    }
</style>
<body>
    <div class="login-form">
        <h1>LOG MASUK PELAJAR</h1>
        <form action="#" method="post">
            <p>Nama Pengguna</p>
            <input type="text" name="user" placeholder="Nama Pengguna">
            <p>Kata Laluan</p>
            <input type="password" name="password" placeholder="Kata Laluan">
            <button type="submit">Log Masuk</button>
        </form>
    </div>
</body>
</html>