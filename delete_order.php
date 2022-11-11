<?php
include("./connects/connect.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `order_details` WHERE `id`= '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:user_msg.php");
    } else {
        echo "Something went wrong";
    }
}
