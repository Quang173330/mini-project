<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <label for="email">Email address</label>
            <span id="mess_email" class="span"></span>
            <input type="email" id="email" name="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <span id="mess_pass" class="span"></span>
            <input type="password" id="password" name="password" class="form-control">

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
</body>
<script src="http://localhost/mini-project/mvc/views/assets/js/login.js"></script>

</html>