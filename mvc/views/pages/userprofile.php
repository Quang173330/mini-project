<?php
include 'header.php';
?>
<?php
  $row = mysqli_fetch_array($data["data"]);  
?>
 <div class="card ">
    <div class="card-header">
      <h3 class='text-center'><i class="fab fa-500px mr-2"></i></i>User Profile</h3>
    </div>
    <div class="card-body">
      <div style="width:600px; margin:0px auto">
        <form  action="http://localhost/mini-project/Home/npass" method="POST">
          <div class="form-group">
            <label for="name">User name</label>
            <span id="mess_name" class="span"></span>
            <input type="text" id="name" name="name" value="<?php echo $row["name"]; ?>" class="form-control"
            require readonly >      
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <span id="mess_email" class="span"></span>
            <input type="email" id="email" name="email" value=" <?php echo $row["email"];?>" class="form-control" require readonly>
          </div>             
          <div class="form-group">
          <label for="email">Age</label>
          <span id="mess_age" class="span"></span>
            <input type="text" id="age" name="age" value=" <?php echo $row["age"];?>" class="form-control" require readonly>
          </div>
          <input type="hidden" id="id" name="id" value="<?php echo $row["id"]; ?>" class="form-control">
        
          <div class="form-group">
            <button type="submit" id="update" name="update" class="btn btn-success">New Password</button>
            
          </div>
        </form>
      </div>
    </div>
  </div>

