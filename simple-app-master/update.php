<?php
require 'header.php';
require 'config.php';
$id=$name=$price=$condition=$image='';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    echo "$id";

    if(isset($_POST['name'])){
        $name = $_POST['name'];
    }
    if(isset($_POST['price'])){
        $price = $_POST['price'];
    }
    if(isset($_POST['description'])){
        $description = $_POST['description'];
    }

    echo $name;
//    $sql = "UPDATE `products` SET `name`='$name',`price`='$price',`description`='$description'],`product_condition`='$condition' WHERE id='$id'";
//    if(mysqli_query($conn,$sql)){
//        header('location:products.php?id= $_GET["id"]');
//    }

}

?>