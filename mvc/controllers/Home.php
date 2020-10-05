<?php
class Home extends Controller
{
    function SayHi()
    {
        echo "a";
    }
    function homea(){
        $check= $this->checkss();
        if($check==="admin"||$check==="user"){
            header("Location:http://localhost/mini-project/Home/profileuser");
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
            header("Location:http://localhost/mini-project/Login/a");
        }

    }
    function Edit($id){
        
        $user=$this->model("User");
        $result=$user->getById($id);  
        $this->view("edit",["data"=>$result]);
        
    }
    function EditUser(){
        $user=$this->model("User");
        $result=$user->UpdateById($_POST["id"],preg_replace('([\s]+)', ' ', $_POST["name"]),$_POST["email"],$_POST["password"]);
        $result=$user->getById($_POST["id"]);
        $_SESSION['email']=$_POST['email'];
        $_SESSION['password']=$_POST['password'];
        $this->view("profile",["data"=>$result]);
        header("location:../Home/profileuser");
        
    }
    function AddUser(){
        $check= $this->checkss();
        if($check==="admin"){
            $this->view("adduser");
        } else if($check==="user"){
            echo "Cút";
        }
        else{
            header("Location:http://localhost/mini-project/Login/a");
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
            header("Location:http://localhost/mini-project/Login/a");
        }

    }
    function ViewUser($id){
        $check= $this->checkss();
        if($check==="admin"){
            $user=$this->model("User");
            $result=$user->getById($id);
            $this->view("profile",["data"=>$result]);
        } else if($check==="user"){
            echo "Cút";
        }
        else{
            header("Location:http://localhost/mini-project/Login/a");
        }


    }
    function Delete($id){
        $user=$this->model("User");
        $user->DeleteById($id);
        $result=$user->getAll();
           
        $this->view("userlist",["data"=>$result]);
        header("location:../UserList");
    }

}
