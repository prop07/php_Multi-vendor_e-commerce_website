<?php
session_start();
include "connection.php";
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
echo $num;

if($num==1){
    $em="Username already taken";
    header("location:account.php?error=$em");
}
else{
    
    $sql="INSERT INTO `user_add`(`email`, `username`,
    `password`, `cpassword`, `account_type`, `reg_time`) VALUES 
   ('$email','$username','$password','$cpassword'
   ,'$account_type',current_timestamp())";
            mysqli_query($conn,$sql);
            $em="Your Account Creation Sucessfully";
   header("location:account.php?error=$em");
}}else{
    $em="Confirm password must be same as Password ";
    header("location:account.php?error=$em");

}}

else{
    echo " sorry something went wrong";
}
?>
