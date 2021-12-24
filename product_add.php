<?php
include "connection.php";

 
session_start();
 $id=$_GET['id'];
 $sql1="SELECT * FROM `vendor_p` WHERE `pid`=$id";
 $result=mysqli_query($conn,$sql1);
 if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){
             $user_id=$row['user_id'];
    }  }  

if(isset($_POST['psubmit']))
 {
    $pname=$_POST['pname'];
    $pprice=$_POST['pprice'];
    $pquantity=$_POST['pquantity'];
    $ptype=$_POST['ptype'];
    $disc=$_POST['disc'];
    $img_name= $_FILES['my_image']['name'];
        $img_size= $_FILES['my_image']['size'];
        $tmp_name=$_FILES['my_image']['tmp_name'];
        $error= $_FILES['my_image']['error'];
        $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
        $img_ex_lc=strtolower($img_ex);
        $allowed_ex= array("jpeg","jpg","png");
        if(in_array($img_ex_lc,$allowed_ex)){
            $new_img_name=uniqid("img-",true).'.'.$img_ex_lc;
            $img_upload_path='product_image/'.$new_img_name;
            move_uploaded_file($tmp_name,$img_upload_path);
            
            $sql="INSERT INTO `product_info`(`pname`, `pprice`,`pquantity`, `ptype`,`img_url`, `pdate`, `disc`, `vendor_id`) 
            VALUES ('$pname','$pprice','$pquantity','$ptype','$new_img_name',current_timestamp(),'$disc','$id')";
             mysqli_query($conn,$sql);
             header("location:home.php?id=$user_id");
    
}else{
 echo "Image format cannot eligable";
    }}
            
?>