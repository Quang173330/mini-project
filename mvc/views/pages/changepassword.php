<?php
include 'header.php';
?>

<div class="card ">
    <div class="card-header">
      <h3>Change Password <span class="float-right"> <a href="index.php" class="btn btn-primary">Back</a> </h3>
    </div>
    <div class="card-body">
      <div style="width:600px; margin:0px auto">
        <form class="" action="" method="POST">
          <div class="form-group">
            <label for="old_password">Old Password</label>
            <span id="mess_old" class="span"></span>
            <input type="password" name="old_password" id="old_password"  class="form-control">      
          </div>
          <div class="form-group">
            <label for="new_password">New Password</label>
            <span id="mess_new" class="span" ></span>
            <input type="password" name="new_password" id="new_password" class="form-control">
          </div>             
          <div class="form-group">
          <label for="retype_password">Retype Password</label>
            <span id="mess_retype" class="span"></span>
            <input type="password" name="retype_password" id="retype_password" class="form-control">        
          </div>
          <div class="form-group">
            <button type="button" id="change_password" class="btn btn-primary" href="">Password change</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="http://localhost/mini-project/mvc/views/assets/js/changepassword.js"></script>
