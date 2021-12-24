<?php include "connection.php";?>
<?php
session_start();
if(isset($_POST['usubmit'])) {
    $user_id=$_SESSION['id'];
    echo $user_id;
    $ufname=$_POST['ufname'];
    $usname=$_POST['usname'];
    $add=$_POST['add'];
    $phone=$_POST['phone'];
    $img_name= $_FILES['my_image']['name'];
        $img_size= $_FILES['my_image']['size'];
        $tmp_name=$_FILES['my_image']['tmp_name'];
        $error= $_FILES['my_image']['error'];

        $img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
        $img_ex_lc=strtolower($img_ex);
        $allowed_ex= array("jpeg","jpg","png");
        if(in_array($img_ex_lc,$allowed_ex)){
            $new_img_name=uniqid("img-",true).'.'.$img_ex_lc;
            $img_upload_path='vendor_profile_picture/'.$new_img_name;
            move_uploaded_file($tmp_name,$img_upload_path);

            $sql="INSERT INTO `vendor_p`(`shop_name`, `full_name`, `img_location`, `address`, `phone`, `user_id`)
             VALUES ('$usname','$ufname','$new_img_name','$add','$phone','$user_id')";
             mysqli_query($conn,$sql);
             header("location:home.php");
                    
} else{
    echo "file type cannot permit";
}}
    else{
        echo "your data cannot upload";
    } ?>