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
  
                $res_array['status']="mess_email";
                $res_array['mess']="Email is exist";
                echo json_encode($res_array);
            } else {
                $user->newUser($name, $password, $email, $age, 0);
                $_SESSION["email"]=$email;
                $_SESSION["password"]=$password;
                $res_array['status']="true";
                $res_array['mess']="Update Successful";
                echo json_encode($res_array);
            }
        } else {
            if(!$this->validateName($_POST["name"])) {
            $res_array['status']="mess_name";
            $res_array['mess']="Please enter correct name format";
            echo json_encode($res_array);

            }
            else if(!$this->validateEmail($_POST["email"])) {
            $res_array['status']="mess_email";
            $res_array['mess']="Please enter correct email format";
            echo json_encode($res_array);        
        }
            else if(!$this->validatePassword($_POST["password"])) {
            $res_array['status']="mess_pass";
            $res_array['mess']="Please lengthen this text to 6 characters or more";
            echo json_encode($res_array);
        }
        else if(!$this->validateDate($_POST["age"])) {
            $res_array['status']="mess_age";
            $res_array['mess']="Please enter correct date format";
            echo json_encode($res_array);
        }
        }


    }
        function adduser()
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
  
                $res_array['status']="mess_email";
                $res_array['mess']="Email is exist";
                echo json_encode($res_array);
            } else {
                $user->newUser($name, $password, $email, $age, 0);
                $_SESSION["email"]=$email;
                $_SESSION["password"]=$password;
                $res_array['status']="true";
                $res_array['mess']="Update Successful";
                echo json_encode($res_array);
            }
        } else {
            if(!$this->validateName($_POST["name"])) {
            $res_array['status']="mess_name";
            $res_array['mess']="Please enter correct name format";
            echo json_encode($res_array);

            }
            else if(!$this->validateEmail($_POST["email"])) {
            $res_array['status']="mess_email";
            $res_array['mess']="Please enter correct email format";
            echo json_encode($res_array);        
        }
            else if(!$this->validatePassword($_POST["password"])) {
            $res_array['status']="mess_pass";
            $res_array['mess']="Please lengthen this text to 6 characters or more";
            echo json_encode($res_array);
        }
        else if(!$this->validateDate($_POST["age"])) {
            $res_array['status']="mess_age";
            $res_array['mess']="Please enter correct date format";
            echo json_encode($res_array);
        }
        }


    }
    
}

