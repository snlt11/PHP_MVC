<?php

class User extends Controller
{
    public function __construct(){

    }

    public function register(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
//            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                "name" => $_POST["name"],
                "email" => $_POST["email"],
                "password" => $_POST["password"],
                "confirm_password" => $_POST["confirm_password"],
                "name_error" => "",
                "email_error" => "",
                "password_error" => "",
                "confirm_password_error" => "",
            ];
            if(empty($data['name'])){
                $data['name_error'] = "Please enter your name";
            }
            if(empty($data['email'])){
                $data['email_error'] = "Please enter your email address";
            }
            if(empty($data['password'])){
                $data['password_error'] = "Password must be at least 6 characters";
            }
            if(empty($data['confirm_password'])){
                $data['confirm_password_error'] = "Confirm password need to be matches with the password";
            }else{
                if($data['password'] != $data['confirm_password']){
                    $data['password_error'] = "Password and confirmation does not match";
                    $data['confirm_password_error'] = "Password and confirmation does not match";

                }
            }
            if(empty($data['name_error'])&&empty($data['email_error'])&&empty($data['password_error'])&&empty($data['confirm_password_error'])){
                echo "success";
            }else{
                $this->view("user/register",$data);
            }

        }else{
            $this->view("user/register");
        }

    }
    public function login(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
//            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [
                "email" => $_POST["email"],
                "password" => $_POST["password"],
                "email_error" => "",
                "password_error" => "",
            ];
            if(empty($data['email'])){
                $data['email_error'] = "Please enter your email address";
            }
            if(empty($data['password'])){
                $data['password_error'] = "Password must be at least 6 characters";
            }
            if(empty($data['email_error'])&&empty($data['password_error'])){
                echo "Login successful";
            }else{
                $this->view("user/login",$data);
            }

        }else{
            $this->view("user/login");
        }


    }
}