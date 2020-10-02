<html>
    <head>
        <title>Profile</title>        
    </head>
    <body>       
        <h2>Profile</h2>
        <?php
            $row = mysqli_fetch_array($data["data"]);                  
        ?>
        <form action="../EditUser" method="POST" autocomplete="off">
        <input type="text" name="name" value="<?php echo $row["name"];?>"/>
        <input type="text" name="email" value="<?php echo $row["email"];?>"/>
        <input type="text" name="password" value="<?php echo $row["password"];?>"/>
        <input type="hidden" name="id" value="<?php echo $row["id"];?>"/>
        <button name="signup">Edit</button>
    </form>
    </body>
</html>