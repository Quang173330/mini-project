<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossOrigin="anonymous" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <title>Document</title>
</head>
<?php
   include 'header.php';
  ?>
<body>
    <div class="card ">
    <div class="card-header">
      <h3 class='text-center'><i class="fas fa-sign-in-alt mr-2"></i>User login</h3>
    </div>
    <div class="card-body">


      <div style="width:450px; margin:0px auto">

        <form class="" action="" method="post">
          <span id="mess_form" class="span"></span>
          <div class="form-group">
            <label for="name">Name</label>
            <span id="mess_name" class="span"></span>
            <input type="text" id="name" name="name" class="form-control" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <span id="mess_email" class="span"></span>
            <input type="email" id="email" name="email" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <span id="mess_pass" class="span"></span>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="re_password">Retype password</label>
            <span id="confirm_password" class="span"></span>
            <input type="password" id="re_password" name="re_password" class="form-control" placeholder="Retype Password">
          </div>
          <div class="form-group">
            <label for="age">Age</label>
            <span id="mess_age" class="span"></span>
            <input type="text" id="age" name="age" class="form-control" placeholder="Age">
          </div>
          <div class="form-group">
            <button type="button" id="button" name="register" class="btn btn-success">Register</button>
          </div>


        </form>
      </div>


    </div>
  </div>
</body>
<script src="http://localhost/mini-project/mvc/views/assets/js/register.js"></script>

</html>







