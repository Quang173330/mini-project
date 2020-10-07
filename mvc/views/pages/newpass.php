<?php
include 'header.php';
?>

<div class="card ">
    <div class="card-header">
      <h3 class='text-center'><i class="fab fa-500px mr-2"></i></i>Change Password</h3>
    </div>
    <div class="card-body">
      <div style="width:600px; margin:0px auto">
        <form  action="http://localhost:8080/mini-project/Home/NewPassword" method="POST">
          <div class="form-group">
            <label for="new_password">New Password</label>
            <span id="mess_new" class="span" ></span>
            <input type="password" name="new_password" id="new_password" class="form-control">
          </div>            
             <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $data['data']; ?>">         
          <div class="form-group">
            <button type="submit" id="change_password" class="btn btn-primary" >Password change</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  
