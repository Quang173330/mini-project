<?php
class Home extends Controller
{
    function homea(){
        $check= $this->checkss();
        if($check==="admin"||$check==="user"){
            header("Location:http://localhost:8080/mini-project/Home/profileuser");
        } else{
            $this->view("login");
        }
    }
    function login()
    {
        $this->view("login");
    }
    function profileuser(){
        $check= $this->checkss();
        if($check==="admin"||$check==="user"){
            $param= $_SESSION["email"];
            $user=$this->model("User");
            $result=$user->getByEmail($param);
            $this->view("profile",["data"=>$result]);
        } else{
            header("Location:http://localhost:8080/mini-project/Login/a");
        }

    }
    function Edit($id){
        $user=$this->model("User");
        $result=$user->getById($id);  
        $this->view("edit",["data"=>$result]);
        
    }
    function EditUser(){
        $user=$this->model("User");
        $email=$_POST["email"];
        $name=preg_replace('([\s]+)', ' ', $_POST["name"]);
        $age=$_POST["age"];
        if($this->validateEmail($_POST["email"])&&
            $this->validateName($_POST["name"])&&           
            $this->validateDate($_POST["age"])){
        if($email===$_SESSION["email"]){
            $user->updateProfileByEmail($email,$email,$name,$age);
            $resarray["status"]="true";
            $resarray["message"]="Update success";
            echo json_encode($resarray);
        } else  {
            $result = $user->getByEmail($email);
            if ($result->num_rows > 0) {
                $resarray["status"]="false";
                $resarray["message"]="Email is exist";
                echo json_encode($resarray);
            }else {
                $user->updateProfileByEmail($_SESSION["email"],$email,$name,$age);
                $_SESSION['email']=$email;
                $resarray["status"]="true";
                $resarray["message"]="Update success";
                echo json_encode($resarray);
            }
        }
    }
    }
    function AddUser(){
        $check= $this->checkss();
        if($check==="admin"){
            $this->view("adduser");
        } else if($check==="user"){
            echo "Cút";
        }
        else{
            header("Location:http://localhost:8080/mini-project/Login/a");
        }

    }
    function Logout(){
        session_destroy();
        setcookie("cookie", "", time() - 86400*30,"/");
        header("location:../Login/a");
    }
    function UserList(){
        $check= $this->checkss();
        if($check==="admin"){
            $user=$this->model("User");
            $result=$user->getAll();
            $this->view("userlist",["data"=>$result]);
        } else if($check==="user"){
            echo "Cút";
        }
        else{
            header("Location:http://localhost:8080/mini-project/Login/a");
        }
    }
    function ViewUser($id){
        $check= $this->checkss();
        if($check==="admin"){
            $user=$this->model("User");
            $result=$user->getById($id);
            $this->view("userprofile",["data"=>$result]);
        } else if($check==="user"){
            echo "Cút";
        }
        else{
            header("Location:http://localhost:8080/mini-project/Login/a");
        }
    }
    function Delete($id){
        $user=$this->model("User");
        $user->DeleteById($id);
        $result=$user->getAll();
        $this->view("userlist",["data"=>$result]);
    }
    function cpass(){
        $check= $this->checkss();
        if($check==="admin"||$check==="user"){
            $this->view("changepassword");
        } else{
            header("Location:http://localhost:8080/mini-project/Home/profileuser");
        }
    }
    function ChangePassword(){
        if(isset($_POST["password"])){
            $password=md5($_POST["password"]);
            $old_password=md5($_POST["old_password"]);
            $email=$_SESSION["email"];
            $user=$this->model("User");
            $result=$user->getByEmail($email);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                if($old_password===$row["password"]){
                    $user->updatePassword($email,$password);
                    $_SESSION["password"]=$password;
                    $resarray["status"]="true";
                    $resarray["message"]="Update Password Success";
                    echo json_encode($resarray);
                } else {
                    $resarray["status"]="false";
                    $resarray["message"]="Password is wrong";
                    echo json_encode($resarray);
                }
            }
        }
    }
    function npass(){
        $check= $this->checkss();
        if($check==="admin"||$check==="user"){
            $id = $_POST['id'];
            $this->view("newpass",["data"=>$id]);
        } else{
            header("Location:http://localhost:8080/mini-project/Home/profileuser");
        }
    }
    function NewPassword(){
        $user=$this->model("User");
        try{
            $user->NewPasswordById($_POST['id'],md5($_POST['new_password']));   
            $resarray["status"]="true";
            $resarray["message"]="Success";
            echo json_encode($resarray);
        } catch (Exception $e){
            $resarray["status"]="false";
            $resarray["message"]=$e;
            echo json_encode($resarray);
        }
    }

}
