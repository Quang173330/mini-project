<?php
include 'header.php';

?>

      <div class="card ">
        <div class="card-header">
          <h3><i class="fas fa-users mr-2"></i>User list <span class="float-right">Welcome! <strong>
            <span class="badge badge-lg badge-secondary text-white">
</span>

          </strong></span></h3>
        </div>
        <div class="card-body pr-2 pl-2">

          <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      
                      <th  class="text-center">Name</th>
                      
                      <th  class="text-center">Email address</th>                      
                      <th  width='25%' class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($data["data"])) { ?>
                      <tr class="text-center"                      
                      >                       
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?> <br>                       
                        <td>                     
                          <a class="btn btn-success btn-sm " href="../Home/ViewUser/<?php echo $row["id"];?>">View</a>
                          <a class="btn btn-danger btn-sm " href="http://localhost/mini-project/Home/Delete/<?php echo $row["id"];?>">Delete</a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
              </table>
        </div>
      </div>



