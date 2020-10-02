<?php 
    class Login extends Controller{
        function a(){
            $check= $this->checkss();
            if($check){
                header("Location:http://localhost:8080/mini-project/Home/profileuser");
            } else{
                $this->view("login");
            }
        }
        function logina(){
            if(isset($_POST["email"])){
                $email=$_POST["email"];
                $password= md5($_POST["password"]);
                echo $password;
                $user=$this->model("User");
                $result=$user->getByEmail($email);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        
                        if($password==$row["password"]){
                            if($_POST["rememberme"]==="true"){
                                $cookie=$this->generateRandomString(32);
                                setcookie("cookie",$cookie,time()+86400*30,'/');
                                $_SESSION["email"]=$row["email"];
                                $_SESSION["password"]=$row["password"];
                                $result1 = $user->updateRandomByEmail($row["email"],$cookie);
                                $resarray["status"]="true";
                                $resarray["message"]=$_POST["rememberme"];
                                echo json_encode($resarray);

                            } else {
                                $_SESSION["email"]=$row["email"];
                                $_SESSION["password"]=$row["password"];
                                $resarray["status"]="true";
                                $resarray["message"]="Login success";
                                echo json_encode($resarray);
                            }

                        } else{
                            $resarray["status"]="false";
                            $resarray["message"]="Password not matching";
                            echo json_encode($resarray);
                        }
                    }
                }else {
                    $resarray["status"]="false";
                    $resarray["message"]="Email not exist";
                    echo json_encode($resarray);
                }
            } else{
                $resarray["status"]="false";
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
?>