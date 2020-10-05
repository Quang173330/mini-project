<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>PHP CRUD User Management</title>
  <link rel="stylesheet" href="http://localhost/mini-project/mvc/views/assets/bootstrap.min.css">
  <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="http://localhost/mini-project/mvc/views/assets/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="http://localhost/mini-project/mvc/views/assets/style.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body>



  <div class="container">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark card-header">
      <a class="navbar-brand" href="index.php"><i class="fas fa-home mr-2"></i>Dashboard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav ml-auto">



          <?php 
            if(isset($_SESSION["permits"])){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="../Home/UserList"><i class="fas fa-users mr-2"></i>User lists </span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Home/AddUser"><i class="fas fa-user-plus mr-2"></i>Add user </span></a>
          </li>
          <?php } ?>
          <?php 
            if(isset($_SESSION["email"])){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="../Home/profileUser/"><i class="fab fa-500px mr-2"></i>Profile <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../Home/Logout"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
          </li>
          <?php } ?>
          <?php 
            if(!isset($_SESSION["email"])){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="../Register/a"><i class="fas fa-user-plus mr-2"></i>Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Login/a"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
          </li>
          <?php } ?>



        </ul>

      </div>
    </nav>