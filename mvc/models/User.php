<?php
class User extends DB{
    function newUser($name,$password,$email,$age,$permits){
        
        $query="INSERT INTO Users (name,password,email,age,permits) Values ('".$name."','".$password."','".$email."',".$age.",".$permits.")";
        mysqli_query($this->con,$query);
    }
    function getByEmail($email){
        $sql="SELECT * FROM Users WHERE email='$email' ";
        return mysqli_query($this->con,$sql);
    }
    function getByEmailAndPassword($email,$password){
        $sql="SELECT * FROM Users WHERE email='$email' AND password='$password' ";
        return mysqli_query($this->con,$sql);
    }
    function getAll(){
        $sql="SELECT * FROM Users";
        return mysqli_query($this->con,$sql);
    }
    function getById($id){
        $sql="SELECT * FROM Users WHERE id='$id'";
        return mysqli_query($this->con,$sql);
    }
    function getByCookie($cookie){
        $sql="SELECT * FROM Users WHERE cookie='$cookie'";
        return mysqli_query($this->con,$sql);
    }
    function updateRandomByEmail($email,$cookie){
        $sql="UPDATE Users SET cookie = '$cookie' where email = '$email'";
        return mysqli_query($this->con,$sql);
    }

}
?>
