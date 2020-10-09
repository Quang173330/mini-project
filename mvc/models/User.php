<?php
class User extends DB{
    function newUser($name,$password,$email,$age,$permits){
        $query="INSERT INTO users (name,password,email,age,permits) Values ('".$name."','".$password."','".$email."','".$age."',".$permits.")";
        mysqli_query($this->con,$query);
    }
    function getByEmail($email){
        $email = mysqli_real_escape_string($this->con, $email);
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
        $sql="SELECT * FROM users WHERE email='$param' OR id ='$param'";
        return mysqli_query($this->con,$sql);
    }
    function UpdateById($id,$name, $email,$password){
        $sql="UPDATE users SET name = '$name', email = '$email', password='$password' WHERE id='$id'";
        return mysqli_query($this->con,$sql);
    }
    function DeleteById($param){
        $sql="DELETE FROM users WHERE id ='$param'";
        return mysqli_query($this->con,$sql);
    }
    function updatePassword($email,$password){
        $sql="UPDATE users SET password='$password' where email='$email'";
        return mysqli_query($this->con,$sql);
    }
    function updateProfileByEmail($email1,$email,$name,$age){
        $sql="UPDATE users SET name='$name',email='$email',age='$age' where email='$email1'";
        return mysqli_query($this->con,$sql);
    }
    function NewPasswordById($id,$password){
        $sql="UPDATE users SET password='$password' where id='$id'";
        return mysqli_query($this->con,$sql);
    }
}
?>
