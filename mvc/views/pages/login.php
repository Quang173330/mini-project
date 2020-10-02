<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossOrigin="anonymous" />
  <link rel="stylesheet" href="http://localhost:8080/mini-project/mvc/views/assets/css/register.css"> 
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <title>Document</title>
</head>

<body>
  <form class="login-form">
    <span id="mess_email" class="span"></span>
    <input id="email" type="email" name="email" placeholder="Email" />
    <div class="input-icon">
      <span id="mess_pass" class="span"></span>

      <input id="password" type="password" name="password" placeholder="Password" />
      <i id="show" class="fa fa-eye show-password"></i>
    </div>
    <input type="checkbox" id="rememberme" name="rememberme" /> Remember Me
    
    <button type="button" id="button" name="login">Sign In</button>
  </form>
</body>
<script src="http://localhost:8080/mini-project/mvc/views/assets/js/login.js"></script>

</html>