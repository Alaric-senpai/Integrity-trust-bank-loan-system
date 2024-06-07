<?php
require 'client.php';
$users = $database->users;
$login = $database->login;

if(isset($_POST['login'])){
    try {
        //code...
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'];

        $query = $users->find(['email'=> $email]);

        if($query){
            $userset = $login->findOne(['email' => $email]);
            if($userset){

                $ddpass = $userset['password'];
                if(password_verify($password, $ddpass)){
                    try {
                        //code...
                        $token = $userset['token'];
                        $_SESSION['token'] = $token;
                        if($query['usertype'] == "customer"){
                            header("location:customer/dashboard.php");
                            exit();     
                        }elseif($query['usertype'] == "admin"){
                            header("location:admin/dashboard.php");     
                            exit();

                        }
                    } catch (Exception $e) {
                        //throw $th;
                        echo $e->getMessage();
                        die();
                    }
                                   
                }
            }else{
                $_SESSION['error'] = "invalid credentials";
                header("location:login.php");
                exit();
            }
                
        }else{
            $_SESSION['error'] = "invalid credentials";
            header("location:login.php");
            exit();
        }


    } catch (Exception $e) {
        //throw $th;
        printf($e->getMessage());
    }
}