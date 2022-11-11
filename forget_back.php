<?php
session_start();
include("./connects/connect.php");
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $password = $_SESSION['password'];

    $pass = password_hash($password, PASSWORD_BCRYPT);

    $sql = "UPDATE `admin_login` SET `password` = '$pass' WHERE `token` = '$token'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (isset($_SESSION['msg'])) {
            $_SESSION['msg'] = "New password has been updated successfully";
            header('location:admin-login.php');
        } else {
            $_SESSION['msg'] = "New password has been updated successfully";
            header('location:admin-login.php');
        }
    } else {
        $_SESSION['msg'] = "Account not updated";
        header('location:admin-signup.php');
    }
}
