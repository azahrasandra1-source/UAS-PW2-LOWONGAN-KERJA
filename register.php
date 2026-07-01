<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Akun</title>

    <style>
        body{
            margin:0;
            background:#0d6efd;
            font-family:Arial, Helvetica, sans-serif;
        }

        .container{
            width:350px;
            background:#fff;
            margin:60px auto;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,.3);
        }

        h2{
            text-align:center;
            color:#6C63FF;
        }

        input{
            width:100%;
            padding:10px;
            margin:10px 0;
            border:1px solid #ccc;
            border-radius:5px;
            box-sizing:border-box;
        }

        button{
            width:100%;
            padding:10px;
            background:#0d6efd;
            color:white;
            border:none;
            border-radius:5px;
            cursor:pointer;
        }

        button:hover{
            background:#0b5ed7;
        }

        p{
            text-align:center;
        }

        a{
            text-decoration:none;
            color:#6C63FF;
        }
    </style>

</head>
<body>

<div class="container">

<h2>Registrasi Akun</h2>

<form action="controller/AuthController.php" method="POST">

<input type="text" name="nama" placeholder="Nama Lengkap" required>

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit" name="register">
Daftar
</button>

</form>

<p>
Sudah punya akun?
<a href="login.php">Login</a>
</p>

</div>

</body>
</html>