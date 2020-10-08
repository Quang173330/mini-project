<?php
class App{
    protected $controller="Login";
    protected $action="a";
    protected $params=[];
    function __construct(){
        $arr[0]="  ";
        $arr[1]="  ";
        if(null !== $this->UrlProcess()){
            $arr = $this->UrlProcess();
        }
 
        // Controller
        if( file_exists("./mvc/controllers/".$arr[0].".php") ){
            $this->controller = $arr[0];
            unset($arr[0]);
        } else {
            header("location:http://localhost:8080/mini-project/Login/a");
        }

        require_once "./mvc/controllers/". $this->controller .".php";
        $this->controller = new $this->controller;

        // Action
        if(isset($arr[1])){
            if( method_exists( $this->controller , $arr[1]) ){
                $this->action = $arr[1];
                unset($arr[1]);
            }
            else {
                header("location:http://localhost:8080/mini-project/Login/a");
            }
        } else {
            header("location:http://localhost:8080/mini-project/Login/a");
        }

        // Params
        $this->params = $arr?array_values($arr):[];

        call_user_func_array([$this->controller, $this->action], $this->params );

    }

    function UrlProcess(){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }

}
?>