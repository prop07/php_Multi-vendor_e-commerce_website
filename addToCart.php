<?php  include "connection.php";
 $product_id= $_GET['id'];
 $user_id=$_GET['uid'];

if($user_id>1){
$query="SELECT * FROM `cart_info` WHERE `Product_id`=$product_id AND`user_id`=$user_id";
$data=mysqli_query($conn,$query);
$count=mysqli_num_rows($data);
if($count>=1){
    $em="Selected Product Already Added to Your Cart";
    header("location:product.php?id=" .$product_id."&uid=" .$user_id."&error=".$em);
    }
    else{
        $query="SELECT `pprice` FROM `product_info` WHERE `product_id`=$product_id";
        $result=mysqli_query($conn, $query);///$con is your MySQL connection code
        while($row = mysqli_fetch_array( $result,MYSQLI_ASSOC)){
        $pprice1=$row['pprice'];
            $quantity=1;
        $pprice1=$quantity*$pprice1;
        $sql="INSERT INTO `cart_info`(`Product_id`, `user_id`, `quantity`, `total`) VALUES ('$product_id','$user_id','$quantity','$pprice1')";
        mysqli_query($conn,$sql);
       header("location:product.php?id=" .$product_id."&uid=" .$user_id);
        }
        
    }
}else{
    header("location:postAccount.php?id=$product_id");
}





?>