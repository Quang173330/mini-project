<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossOrigin="anonymous" />
    <link rel="stylesheet" href="http://localhost/mini-project/mvc/views/assets/css/register.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form class="login-form">
        <span id="mess_name" class="span"></span>
        <input id="name" type="text" name="name" placeholder="Name" />
        <span id="mess_email" class="span"></span>
        <input id="email" type="email" name="email" placeholder="Email" />
        <span id="mess_pass" class="span"></span>
        <input id="password" type="text" name="password" placeholder="Password" />
        <span id="confirm_password" class="span"></span>
        <input id="re_password" type="text" name="re_password" placeholder="Retype Password" />
        <span id="mess_age" class="span"></span>
        <input id="age" type="number" name="age" placeholder="Age" />
        <button id="button" type="button" name="signup">Sign up</button>
    </form>
</body>
<script src="http://localhost:8080/mini-project/mvc/views/assets/js/register.js"></script>

</html>