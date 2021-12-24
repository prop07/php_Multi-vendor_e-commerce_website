<?php  include "connection.php";
 $user_id= $_GET['id'];
 $product_id=$_GET['pid'];
 $_SESSION['id']= $user_id;
 $del="DELETE FROM `product_info` WHERE `product_id`=$product_id";
  if( mysqli_query($conn, $del)==false){
 $em="You cannot delete this product Beacuse This product had Orderd by Your Customer";
 header("location:home.php?error=$em");}
 else{
    header("location:home.php");}
 
 
 ?>