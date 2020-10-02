<html>
    <head>
        <title>Profile</title>        
    </head>
    <body>       
        <h2>Profile</h2>
        <h3>
            <?php
                $row = mysqli_fetch_array($data["data"]);
                    echo $row["id"];
                    echo "<br>";
                    echo $row["email"];
                    echo "<br>";

                    echo $row["password"];
                    echo "<br>";    
                    echo $row["name"];
                    echo "<br>";   
                    echo $_SESSION['password']; 
                    echo $_COOKIE['cookie'];                                  
                    ?>
                    <a class="btn btn-info btn-sm " href="./Edit/<?php echo $row["id"]?>">Edit</a>   
                    <a class="btn btn-info btn-sm " href="./DeleteUser/<?php echo $row["id"]?>">
                      Delete</a>
                    <a class="btn btn-info btn-sm " href="./Logout">
                      Logout</a>
              
                       
        </h3>
    </body>
</html>