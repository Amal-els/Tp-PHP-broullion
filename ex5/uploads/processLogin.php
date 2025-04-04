<?php
session_start();
$email = strip_tags($_POST['email']);
$password = strip_tags($_POST['password']);

if (isset($email) && isset($password)) {
    if ($email == "admin@gmail.com" && $password == "0000") {
        $_SESSION['user'] = $email;
        header("Location:home.php");
    } else {
        header("Location:login.php?errorMessage=Veuillez vérifier vos crédentials");
    }
}