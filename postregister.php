<?php
session_start();
include "connection.php";
$product_id=$_GET['id'];
if (isset($_POST['submit'])){
$email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $account_type=$_POST['format'];
    if($password==$cpassword){

$s= "SELECT * FROM `user_add` WHERE `username`='$username'";
$result= mysqli_query($conn, $s);
$num= mysqli_num_rows($result);

if($num==1){
    $em="Username already taken";
    header("location:postAccount.php?id=" .$product_id."&error=" .$em);
}
else{
    
    $sql="INSERT INTO `user_add`(`email`, `username`,
    `password`, `cpassword`, `account_type`, `reg_time`) VALUES 
   ('$email','$username','$password','$cpassword'
   ,'$account_type',current_timestamp())";
            mysqli_query($conn,$sql);
            $em="Your Account Creation Sucessfully";  
   header("location:postAccount.php?id=" .$product_id."&error=" .$em);
}

}else{
    $em="Confirm password must be same as Password ";
    header("location:postAccount.php?id=" .$product_id."&error=" .$em);

}}

else{
    echo " sorry something went wrong";
}
?>
