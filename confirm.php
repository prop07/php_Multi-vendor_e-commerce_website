<?php include "connection.php";
if(isset($_GET['id'])){
    $check_out_id=$_GET['id'];
    $user_id=$_GET['pid'];

}

$sql2="SELECT`product_id`, `quantity`, `total` FROM `check_out` WHERE `check_out_id`=$check_out_id";
$result=mysqli_query($conn,$sql2);
$num=mysqli_num_rows($result);
if($num>0){
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $quantity=$row['quantity'];
        $total=$row['total'];
    }
}

$sql3="SELECT  `pquantity` FROM `product_info` WHERE `product_id`= $product_id";
$result1=mysqli_query($conn,$sql3);
$num1=mysqli_num_rows($result1);
if($num1>0){
    while($row1=mysqli_fetch_array($result1)){
        $pquantity=$row1['pquantity'];
    }
}

$final=$pquantity-$quantity;

$update="UPDATE `product_info` SET `pquantity`='$final'WHERE `product_id`= $product_id";
mysqli_query($conn, $update);

$sql4="SELECT `pname`, `pprice` FROM `product_info` WHERE`product_id`=$product_id";
$result4=mysqli_query($conn,$sql4);
$num4=mysqli_num_rows($result4);
if($num4>0){
    while($row4=mysqli_fetch_array($result4)){
        $ne1=$row4['pname'];
        $ne2=$row4['pprice'];
    }
}
$total=$quantity*$ne2;
$confirm ="INSERT INTO `order_confirm`( `product_id`, `checkout_id`, `pname`, `pprice`, `quantity`, `total`, `user_id`) 
VALUES ('$product_id','$check_out_id','$ne1','$ne2','$quantity','$total','$user_id')";
 mysqli_query($conn, $confirm);
 

$sql="DELETE FROM `shiping_data` WHERE `check_out_id`=$check_out_id";
mysqli_query($conn, $sql);

$sql1="DELETE FROM `check_out` WHERE `check_out_id`=$check_out_id";
mysqli_query($conn, $sql1);

$_SESSION['id']=$user_id;
 header("location:home.php");


?>
