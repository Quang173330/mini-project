<?php
class Register extends Controller
{
    function a()
    {
        $this->view("register");
    }
    function register()
    {
        if (isset($_POST["email"])) {
            $user = $this->model("User");
            $name = $_POST["name"];
            $password = $_POST["password"];
            $email = $_POST["email"];
            $age = $_POST["age"];
            $result = $user->getByEmail($email);
            if ($result->num_rows > 0) {
                $res_array['status']=1;
                $res_array['mess']="Email is exist";
                echo json_encode($res_array);
            } else {
                $user->newUser($name, $password, $email, $age, 1);
                $res_array['status']=2;
                $res_array['mess']="Success";
                echo json_encode($res_array);
            }
        }
    }
}
