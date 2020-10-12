<?php 
    class Login extends Controller{
        function a(){
           $check= $this->checkss();
           if($check==="admin"||$check==="user"){
              header("Location:http://localhost:8080/mini-project/Home/profileuser");
            } else{
                $this->view("login");
            }
        }
         
        function loginuser(){
            if($this->validateEmail($_POST["email"])&&
            $this->validatePassword($_POST["password"])){
                $email=$_POST["email"];
                $password= md5($_POST["password"]);
                $user=$this->model("User");
                $result=$user->getByEmail($email);
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                        if($password==$row["password"]){
                            if($_POST["rememberme"]==="true"){
                                $cookie=$this->generateRandomString(32);
                                setcookie("cookie",$cookie,time()+86400*30,'/');
                                if($row["permits"]==1){
                                    $_SESSION["permits"]="1";
                                }
                                $_SESSION["email"]=$row["email"];
                                $_SESSION["password"]=$row["password"];
                                $result1 = $user->updateRandomByEmail($row["email"],$cookie);
                                $resarray["status"]="true";
                                $resarray["mess"]="Login success";
                                echo json_encode($resarray);

                            } else {
                                if($row["permits"]==1){
                                    $_SESSION["permits"]="1";
                                }
                                $_SESSION["email"]=$row["email"];
                                $_SESSION["password"]=$row["password"];
                                $resarray["status"]="true";
                                $resarray["mess"]="Login success";
                                echo json_encode($resarray);
                            }

                        } else{
                            $resarray["status"]="mess_pass";
                            $resarray["mess"]="Wrong Password";
                            echo json_encode($resarray);
                        }
                    
                }else {
                    $resarray["status"]="mess_email";
                    $resarray["mess"]="Email not exist";
                    echo json_encode($resarray);
                }
            } else{
                if(!$this->validateEmail($_POST["email"])) {
                    $res_array['status']="mess_email";
                    $res_array['mess']="Please enter correct email format";
                    echo json_encode($res_array);        
                }
                    else if(!$this->validatePassword($_POST["password"])) {
                    $res_array['status']="mess_pass";
                    $res_array['mess']="Password has at least 6 characters";
                    echo json_encode($res_array);
                }
            }   
        }
        function generateRandomString($length) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
    }
