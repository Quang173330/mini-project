<?php
class Controller{
    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        require_once "./mvc/views/pages/".$view.".php";
    }
    public function checkss(){
        if(isset($_SESSION["email"])&&isset($_SESSION["password"])){
            $email = $_SESSION["email"];
            $password = $_SESSION["password"];
            $user=$this->model("User");
            $result=$user->getByEmailAndPassword($email,$password);
            if($result->num_rows>0){
                if(isset($_SESSION["permits"])){
                    return "admin";
                }else return "user";
            } else return "false";
        }
        if(isset($_COOKIE["cookie"])){
            $cookie=$_COOKIE["cookie"];
            $user=$this->model("User");
            $result = $user->getByCookie($cookie);
            if($result->num_rows>0){
                $row = $result->fetch_assoc();
                $_SESSION["email"]=$row["email"];
                $_SESSION["password"]=$row["password"];
                if($row["permits"]===1){
                    $_SESSION["permits"]="1";
                    return "admin";
                }else return "user";
            } else return "false";
        } else return "false";
    }
}
?>