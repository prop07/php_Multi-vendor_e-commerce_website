<?php include "connection.php";
if(isset($_GET['id'])){
    $user_id=$_GET['id'];
    $pid=$_GET['pid'];
    $del="DELETE FROM `cart_info` WHERE `product_id`=$pid";
    if( mysqli_query($conn, $del)==true){
        header("location:cart.php");
}}
?>
