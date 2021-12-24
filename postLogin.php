<?php

include "connection.php";
$product_id=$_GET['id'];
$username=$_POST['lusername'];
$pass=$_POST['lpassword'];
$customertype=$_POST['ltype'];


$query1="SELECT * FROM `user_add` WHERE `username`='$username' AND `password`='$pass' AND `account_type`='customer'";
$result1= mysqli_query($conn, $query1);
$num= mysqli_num_rows($result1);
if($num>0){
 
while ($row1 = mysqli_fetch_array($result1)) {

 $id=$row1['user_id'];
 
}  
 header("location:addToCart.php?id=" .$product_id."&uid=" .$id);
}

else{
   
    $em="Your Username or Password cannot matched";
     header("location:postAccount.php?id=" .$product_id."&error=".$em);
}
?>

