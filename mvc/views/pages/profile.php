

<?php
include 'header.php';

 ?>


<?php
                $row = mysqli_fetch_array($data["data"]);
               
                ?>
 <div class="card ">
   <div class="card-header">
          <h3>User Profile <span class="float-right"> <a href="index.php" class="btn btn-primary">Back</a> </h3>
        </div>
        <div class="card-body">

    


          <div style="width:600px; margin:0px auto">

          <form class="" action="" method="POST">
              <div class="form-group">
                <label for="name">Your name</label>
                <input type="text" name="name" value="<?php echo $row["name"]; ?>" class="form-control">
                
              </div>
              
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" id="email" name="email" value=" <?php echo $row["email"];?>" class="form-control">
              </div>
              

              

              <div class="form-group
              
              ">
                
              </div>

        
            
       

             


              
            


              <div class="form-group">
                <button type="submit" name="update" class="btn btn-success">Update</button>
                <a class="btn btn-primary" href="">Password change</a>
              </div>
            



             
                 
              


          </form>
        </div>

   



      </div>
    </div>
