
<?php
include "connection.php";
session_start();
if(isset($_POST['edit']))
 {  $vendor_id=$_SESSION['vendor_id'];
    $pid=$_GET['pid'];
    $pname=$_POST['pname'];
    $pprice=$_POST['pprice'];
    $pquantity=$_POST['pquantity'];
    $ptype=$_POST['ptype'];
    $disc=$_POST['disc'];
        $img_name=$_FILES['img']['name'];
        $img_size=$_FILES['img']['size'];
        $tmp_name=$_FILES['img']['tmp_name'];
        $error= $_FILES['img']['error'];
        $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
        $img_ex_lc=strtolower($img_ex);
        $allowed_ex= array("jpeg","jpg","png");
        if(in_array($img_ex_lc,$allowed_ex)){
            $new_img_name=uniqid("img-",true).'.'.$img_ex_lc;
            $img_upload_path='product_image/'.$new_img_name;
            move_uploaded_file($tmp_name,$img_upload_path);
            
            $sql="UPDATE `product_info` SET `pname`='$pname',`pprice`='$pprice',`pquantity`='$pquantity',`ptype`='$ptype',`img_url`='$new_img_name',`pdate`=current_timestamp(),`disc`='$disc',`vendor_id`='$vendor_id' WHERE `product_id`=$pid";
             mysqli_query($conn,$sql);
             header("location:home.php");
}else{
 echo "Image format cannot eligable";
    }}
            ?>