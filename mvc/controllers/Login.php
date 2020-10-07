<?php 
    class Login extends Controller{
        function a(){
           $check= $this->checkss();
           if($check==="admin"||$check==="user"){
              header("Location:http://localhost/mini-project/Home/profileuser");
            } else{
                $this->view("login");
            }
        }
         
        function loginuser(){
            if(isset($_POST["email"])){
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
                                $resarray["status"]="5";
                                $resarray["message"]=$_POST["rememberme"];
                                echo json_encode($resarray);

                            } else {
                                if($row["permits"]==1){
                                    $_SESSION["permits"]="1";
                                }
                                $_SESSION["email"]=$row["email"];
                                $_SESSION["password"]=$row["password"];
                                $resarray["status"]="4";
                                $resarray["message"]="Login success";
                                echo json_encode($resarray);
                            }

                        } else{
                            $resarray["status"]="3";
                            $resarray["message"]="Password not matching";
                            echo json_encode($resarray);
                        }
                    
                }else {
                    $resarray["status"]="2";
                    $resarray["message"]="Email not exist";
                    echo json_encode($resarray);
                }
            } else{
                $resarray["status"]="1";
                $resarray["message"]="Submit failed";
                echo json_encode($resarray);
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
