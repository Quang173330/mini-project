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
        $email = mysqli_real_escape_string($this->con, $email);
        $password = mysqli_real_escape_string($this->con, $password);
        $sql="SELECT * FROM users WHERE email='$email' AND password='$password' ";
        return mysqli_query($this->con,$sql);
    }
    function getAll(){
        $sql="SELECT * FROM users";
        return mysqli_query($this->con,$sql);
    }
    function getById($id){
        $id = mysqli_real_escape_string($this->con, $id);
        $sql="SELECT * FROM users WHERE id='$id'";
        return mysqli_query($this->con,$sql);
    }
    function getByCookie($cookie){
        $cookie = mysqli_real_escape_string($this->con, $cookie);
        $sql="SELECT * FROM users WHERE cookie='$cookie'";
        return mysqli_query($this->con,$sql);
    }
    function updateRandomByEmail($email,$cookie){
        $email = mysqli_real_escape_string($this->con, $email);
        $cookie = mysqli_real_escape_string($this->con, $cookie);

        $sql="UPDATE users SET cookie = '$cookie' where email = '$email'";
        return mysqli_query($this->con,$sql);
    }
    function getByIdOrEmail($param){
        $param = mysqli_real_escape_string($this->con, $param);
        $sql="SELECT * FROM users WHERE email='$param' OR id ='$param'";
        return mysqli_query($this->con,$sql);
    }
    function UpdateById($id,$name, $email,$password){
        $id = mysqli_real_escape_string($this->con, $id);
        $name = mysqli_real_escape_string($this->con, $name);
        $email = mysqli_real_escape_string($this->con, $email);
        $password = mysqli_real_escape_string($this->con, $password);

        $sql="UPDATE users SET name = '$name', email = '$email', password='$password' WHERE id='$id'";
        return mysqli_query($this->con,$sql);
    }
    function DeleteById($param){
        $param = mysqli_real_escape_string($this->con, $param);

        $sql="DELETE FROM users WHERE id ='$param'";
        return mysqli_query($this->con,$sql);
    }
    function updatePassword($email,$password){
        $email = mysqli_real_escape_string($this->con, $email);
        $password = mysqli_real_escape_string($this->con, $password);

        $sql="UPDATE users SET password='$password' where email='$email'";
        return mysqli_query($this->con,$sql);
    }
    function updateProfileByEmail($email1,$email,$name,$age){
        $email1 = mysqli_real_escape_string($this->con, $email1);
        $email = mysqli_real_escape_string($this->con, $email);
        $name = mysqli_real_escape_string($this->con, $name);
        $age = mysqli_real_escape_string($this->con, $age);

        $sql="UPDATE users SET name='$name',email='$email',age='$age' where email='$email1'";
        return mysqli_query($this->con,$sql);
    }
    function NewPasswordById($id,$password){
        $id = mysqli_real_escape_string($this->con, $id);
        $password = mysqli_real_escape_string($this->con, $password);

        $sql="UPDATE users SET password='$password' where id='$id'";
        return mysqli_query($this->con,$sql);
    }
}
?>
