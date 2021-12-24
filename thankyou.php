<?php  include "connection.php";
          if(isset($_POST['submit'])){
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $houseadd=$_POST['houseadd'];
            $city=$_POST['city'];
            $postcode=$_POST['postcode'];
            $phone=$_POST['phone'];
            $eadd=$_POST['eadd'];
            $add_info=$_POST['add_info'];
          
        session_start();
        $user_id=$_SESSION['send_id'];
        $pid=$_SESSION['send_pid'];

    $sql="SELECT product_info.pname,product_info.product_id,product_info.img_url,product_info.pprice,product_info.vendor_id,
    cart_info.Product_id, cart_info.user_id,cart_info.quantity FROM product_info JOIN 
    cart_info ON product_info.product_id=cart_info.Product_id WHERE cart_info.user_id=$user_id";
    $result=mysqli_query($conn,$sql);
    $num= mysqli_num_rows($result);
    if($num>0){ while ($row1 = mysqli_fetch_array($result)) {
$pname=$row1['pname']; $pprice=$row1['pprice']; $vendor_id=$row1['vendor_id'];
$img=$row1['img_url']; $pid=$row1['product_id']; $quantity=$row1['quantity'];
$data="SELECT `user_id` FROM `vendor_p` WHERE `pid`=$vendor_id";
$res=mysqli_query($conn,$data); $n= mysqli_num_rows($res); if($n>0){ while
($row11 = mysqli_fetch_array($res)) { $vendor_id=$row11['user_id']; } }
$query="INSERT INTO `check_out`(`Customer_id`, `product_id`, `user_id`,
`quantity`, `total`, `date`) VALUES
('$user_id','$pid','$vendor_id','$quantity','$pprice*$quantity',current_timestamp())";
if ($conn->query($query) === TRUE) { } else { echo "Error: " . $query . "<br />"
. $conn->error; } $nepal="Select `check_out_id` FROM check_out
WHERE`customer_id`=$user_id AND`product_id`=$pid";
$result13=mysqli_query($conn,$nepal); $number= mysqli_num_rows($result13);
if($number>0){ while ($row15 = mysqli_fetch_array($result13)) {
$check_out_id=$row15['check_out_id']; $input="INSERT INTO `shiping_data`(
`check_out_id`, `fname`, `lname`, `streetadd`, `town`, `postal`, `phone`,
`email`, `add_info`) VALUES
('$check_out_id','$fname','$lname','$houseadd','$city',
'$postcode','$phone','$eadd','$add_info')"; mysqli_query($conn, $input); }} } }
$query1="DELETE FROM `cart_info` WHERE `user_id`=$user_id";
mysqli_query($conn,$query1); } ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="order.css" />
    <title>Order</title>
  </head>
  <header>
    <nav class="navbar">
      <div class="logo">
        <div style="margin-left: 1rem"><h1>prop07</h1></div>
      </div>
    </nav>
  </header>

  <!-- order conformation -->
  <body>
    <div class="order-confirm-model">
      <div>
        <h3 class="atitle">Your Contact Details</h3>
        <table width="100%" style="border-collapse: collapse">
          <tr>
            <td class="column-title">Order Code</td>
            <td></td>
            <td>00182<?php echo $check_out_id;?></td>
            <td></td>
          </tr>
          <tr>
            <td width="180px" class="column-title">E-Mail</td>
            <td></td>
            <td><?php echo $eadd;?></td>
            <td></td>
          </tr>

          <tr>
            <td class="column-title">First & Last name</td>
            <td></td>
            <td><?php echo $fname. " " .$lname;?></td>
            <td></td>
          </tr>

          <tr>
            <td class="column-title">Address</td>
            <td></td>
            <td><?php echo $houseadd. " " .$city;?></td>
            <td></td>
          </tr>

          <tr>
            <td class="column-title">Phone</td>
            <td></td>
            <td><?php echo $phone;?></td>
            <td></td>
          </tr>
          <tr>
            <td class="column-title">Total Product</td>
            <td></td>
            <td><?php echo $_SESSION['count'];?></td>
            <td></td>
          </tr>
          <tr>
            <td class="column-title">Total Amount</td>
            <td></td>
            <td><?php echo $_SESSION['subtotal'];?></td>
            <td></td>
          </tr>
        </table>
        <div class="alert">
          <h5>We will contact you for futher process.</h5>
          <h6>* Make Sure you take screenshot of this page. As a proof.</h6>
        </div>
        <div>
          <a
            class="back"
            href="<?php echo"
            index.php?id=".$_SESSION['send_id'];?>"
            ><h4>&lt;&lt; Home</h4></a
          >
        </div>
      </div>
    </div>
  </body>
  <!-- container -->

  <!-- footer -->
  <footer class="footer-distributed">
    <div class="footer-right">
      <a href="#"
        ><i class="fa fa-facebook"
          ><svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-facebook"
            viewBox="0 0 16 16"
          >
            <path
              d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"
            /></svg></i
      ></a>
      <a href="#"
        ><i class="fa fa-twitter"
          ><svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-twitter"
            viewBox="0 0 16 16"
          >
            <path
              d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"
            /></svg></i
      ></a>
      <a href="#"
        ><i class="fa fa-linkedin"
          ><svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-linkedin"
            viewBox="0 0 16 16"
          >
            <path
              d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"
            /></svg></i
      ></a>
      <a href="https://github.com/prop07"
        ><i class="fa fa-github"
          ><svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-github"
            viewBox="0 0 16 16"
          >
            <path
              d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"
            /></svg></i
      ></a>
    </div>

    <div class="footer-left">
      <p class="footer-links">
        <a class="link-1" href="#">Home</a>

        <a href="#">Blog</a>

        <a href="#">Pricing</a>

        <a href="#">About</a>

        <a href="#">Faq</a>

        <a href="#">Contact</a>
      </p>

      <p>
        &copy; E-commerce Assignment ( ID: 00018238, 00018231, 00018240,
        00018309, 00018224 )
      </p>
    </div>
  </footer>
</html>
