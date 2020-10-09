<?php
include 'header.php';
?>
<?php
  $row = mysqli_fetch_array($data["data"]);  
?>
 <div class="card ">
    <div class="card-header">
      <h3 class='text-center'><i class="fab fa-500px mr-2"></i></i>My Profile</h3>
    </div>
    <div class="card-body">
      <div style="width:600px; margin:0px auto">
        <form class="" action="" method="">
          <div class="form-group">
            <label for="name">Your name</label>
            <span id="mess_name" class="span"></span>
            <input type="text" id="name" name="name" value="<?php echo $row["name"];?>" class="form-control">      
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <span id="mess_email" class="span"></span>
            <input type="email" id="email" name="email" value="<?php echo $row["email"];?>" class="form-control">
          </div>             
          <div class="form-group">
          <label for="email">Age</label>
          <span id="mess_age" class="span"></span>
            <input type="date" id="age" name="age" value="<?php echo $row["age"];?>" class="form-control">
          </div>
          <div class="form-group">
            <button type="button" id="update" name="update" class="btn btn-success">Update</button>
            <a class="btn btn-primary" href="http://localhost:8080/mini-project/Home/cpass">Password change</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="http://localhost:8080/mini-project/mvc/views/assets/js/profile.js"></script>
