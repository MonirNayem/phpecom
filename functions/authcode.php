<?php

session_start();
include('../config/dbcon.php');
if(isset($_POST['register_btn']))
{
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

    if($password == $cpassword)
    {
        // Insert user data
        $insert_query = "INSERT INTO users (name,phone,email,password) VALUES ('$name','$phone','$email','$password')";
        $insert_query_run = mysqli_query($con, $insert_query);

        if($insert_query_run)
        {
            $_SESSION['message']="Registered Successfully";
            header('Location: login.php');
        }
        else
        {
            $_SESSION['message']="Something went wrong";
            header('Location: login.php');
        }
    }
    else
    {
        $_SESSION['message']="Password do not match";
        header('Location: register.php');
    }
}

?>