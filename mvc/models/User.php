<?php
class User extends DB{
    function newUser($name,$password,$email,$age,$permits){
        $query="INSERT INTO users (name,password,email,age,permits) Values ('".$name."','".$password."','".$email."',".$age.",".$permits.")";
        mysqli_query($this->con,$query);
    }
    function getByEmail($email){
        $sql="SELECT * FROM users WHERE email='$email' ";
        return mysqli_query($this->con,$sql);
    }
    function getByEmailAndPassword($email,$password){
        $sql="SELECT * FROM users WHERE email='$email' AND password='$password' ";
        return mysqli_query($this->con,$sql);
    }
    function getAll(){
        $sql="SELECT * FROM users";
        return mysqli_query($this->con,$sql);
    }
    function getById($id){
        $sql="SELECT * FROM users WHERE id='$id'";
        return mysqli_query($this->con,$sql);
    }
    function getByCookie($cookie){
        $sql="SELECT * FROM users WHERE cookie='$cookie'";
        return mysqli_query($this->con,$sql);
    }
    function updateRandomByEmail($email,$cookie){
        $sql="UPDATE users SET cookie = '$cookie' where email = '$email'";
        return mysqli_query($this->con,$sql);
    }
    function getByIdOrEmail($param){
        $sql="SELECT * FROM Users WHERE email='$param' OR id ='$param'";
        return mysqli_query($this->con,$sql);
    }
    function UpdateById($id,$name, $email,$password){
        $sql="UPDATE Users SET name = '$name', email = '$email', password='$password' WHERE id='$id';";
        return mysqli_query($this->con,$sql);
    }
    function DeleteById($param){
        $sql="DELETE FROM users WHERE id ='$param'";
        return mysqli_query($this->con,$sql);
    }
    
}
?>
