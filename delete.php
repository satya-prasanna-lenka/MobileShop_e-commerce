<?php
require("./connects/connect.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE  FROM `admin_mobiles` WHERE `id` ='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:dashbord.php");
    } else {
        echo "error";
    }
}
