<?php include "connection.php";
if(isset($_GET['id'])){
    $check_out_id=$_GET['id'];
    $user_id=$_GET['pid'];

}

// $sql2="SELECT`product_id`, `quantity` FROM `check_out` WHERE `check_out_id`=$check_out_id";
// $result=mysqli_query($conn,$sql2);
// $num=mysqli_num_rows($result);
// if($num>0){
//     while($row=mysqli_fetch_array($result)){
//         $product_id=$row['product_id'];
//         $quantity=$row['quantity'];
//     }
// }

// $sql3="SELECT  `pquantity` FROM `product_info` WHERE `product_id`=$product_id";
// $result1=mysqli_query($conn,$sql3);
// $num1=mysqli_num_rows($result1);
// if($num1>0){
//     while($row1=mysqli_fetch_array($result1)){
        
//         $pquantity=$row1['pquantity'];
//     }
// }

// $pquantity=$pquantity-$quantity;
// $update="UPDATE `product_info` SET `pquantity`='[value-4]'WHERE `product_id`=$pquantity";
// mysqli_query($conn, $update);

$sql="DELETE FROM `shiping_data` WHERE `check_out_id`=$check_out_id";
mysqli_query($conn, $sql);

$sql1="DELETE FROM `check_out` WHERE `check_out_id`=$check_out_id";
mysqli_query($conn, $sql1);

$_SESSION['id']=$user_id;
 header("location:home.php");


?>
