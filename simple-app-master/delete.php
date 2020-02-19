<?php
require 'header.php';
require 'config.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM `products` WHERE id='$id'";
    if(mysqli_query($conn, $sql)){
        header('location:products.php');
    }
}
?>
