<?php
class Register extends Controller
{
    function a()
    {
        setcookie("cookie", "", time() - 86400*30,"/");
        session_unset();
        $this->view("register");
    }
    function registera()
    {
        if ($this->validateEmail($_POST["email"])&&
            $this->validateName($_POST["name"])&&
            $this->validatePassword($_POST["password"])&&
            $this->validateDate($_POST["age"])) {

            $user = $this->model("User");
            $name = preg_replace('([\s]+)', ' ', $_POST["name"]);
            $password = md5($_POST["password"]);
            $email = $_POST["email"];
            $age = $_POST["age"];
            $result = $user->getByEmail($email);
            if ($result->num_rows > 0) {
  
                $res_array['status']="1";
                $res_array['mess']="Email is exist";
                echo json_encode($res_array);
            } else {
                $user->newUser($name, $password, $email, $age, 0);
                $_SESSION["email"]=$email;
                $_SESSION["password"]=$password;
                $res_array['status']="2";
                $res_array['mess']="Success";
                echo json_encode($res_array);
            }
        } else {
            $res_array['status']="3";
            $res_array['mess']=$this->validateName($_POST["name"]);
            echo json_encode($res_array);
        }
    }
}
