<?php
class Home extends Controller
{
    function SayHi()
    {
        echo "a";
    }
    function homea(){
        $check= $this->checkss();
        if($check){
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
        $param= $_SESSION["email"];

        $user=$this->model("User");
        $result=$user->getByEmail($param);
           
        $this->view("profile",["data"=>$result]);
    }
    function Edit($id){
        
        $user=$this->model("User");
        $result=$user->getById($id);  
        $this->view("edit",["data"=>$result]);
        
    }
    function EditUser(){
        $user=$this->model("User");
        $result=$user->UpdateById($_POST["id"],$_POST["name"],$_POST["email"],$_POST["password"]);
        $result=$user->getById($_POST["id"]);
        $_SESSION['email']=$_POST['email'];
        $_SESSION['password']=$_POST['password'];
        $this->view("profile",["data"=>$result]);
        header("location:../Home/profileuser");
        
    }
    function Logout(){
        
        session_destroy();
        setcookie("cookie", "", time() - 86400*30,"/");
        $this->view("login");
        header("location:../Login/a");
        
    }

}
