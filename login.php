<?php
session_start();
include "connection.php";
$username=$_POST['lusername'];
$pass=$_POST['lpassword'];
$customertype=$_POST['ltype'];

$s= "SELECT * FROM `user_add` WHERE `username`='$username' AND `password`='$pass' AND `account_type`='$customertype'";
$result= mysqli_query($conn, $s);
$num= mysqli_num_rows($result);

if($num==1)
{$a="SELECT * FROM `user_add` WHERE `username`='$username' AND `password`='$pass' AND `account_type`='vendor'";
    $result1= mysqli_query($conn, $a);
    $num1= mysqli_num_rows($result1);
    if($num1==1){

    $query1 = mysqli_query($conn,$s);
while ($row1 = mysqli_fetch_array($query1)) {

 $id=$row1['user_id'];
 
}
$check="SELECT `full_name` FROM `vendor_p` WHERE `user_id`=$id";
$re= mysqli_query($conn, $check);
$count=mysqli_num_rows($re);

if($count==0){
    $_SESSION['id']= $id;
    header("location:profile_info.php");
}else{
    $_SESSION['id']= $id;
    header("location:home.php");
}
    }else{
    $query1="SELECT * FROM `user_add` WHERE `username`='$username' AND `password`='$pass' AND `account_type`='customer'";
    $result1= mysqli_query($conn, $query1);
while ($row1 = mysqli_fetch_array($result1)) {

 $id=$row1['user_id'];
 
}      
    header("location:index.php?id=$id");
    }
}
else{
    $em="Your Username or Password cannot matched";
   header("location:account.php?error=$em");
}
?>