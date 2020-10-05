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
    <br>
    <br>
    <button type="button" id="signup" name="login">Sign Up</button>
  </form>
</body>
<script src="http://localhost:8080/mini-project/mvc/views/assets/js/login.js"></script>

</html>


<!-- <?php
// include 'header.php';

?>




<div class="card ">
  <div class="card-header">
          <h3 class='text-center'><i class="fas fa-sign-in-alt mr-2"></i>User login</h3>
        </div>
        <div class="card-body">


            <div style="width:450px; margin:0px auto">

            <form class="" action="" method="post">
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" id="email" name="email"  class="form-control">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" id="password" name="password"  class="form-control">

                </div>
                <input type="checkbox" id="rememberme" name="rememberme" /> Remember Me 
                <br>
                <div class="form-group">
                  <button type="button" id="button" name="login" class="btn btn-success">Login</button>
                </div>


            </form>
          </div>


        </div>
      </div>
      <script src="http://localhost:8080/mini-project/mvc/views/assets/js/login.js"></script> -->