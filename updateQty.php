<?php include "connection.php";
if(isset($_GET['id'])){
    $user_id=$_GET['id'];
    $pid=$_GET['pid'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>cart</title>
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="updateQty.css"/>


  </head>
  <body> 
    <nav class="navbar">
      <i class="material-icons menu-icon"> menu </i>
      <div class="logo">
        <div class="text" style="margin-left: 1rem"><h1>prop07</h1></div>
      </div>
      <div class="item search right" tabindex="0">
        <div class="search-group">
          <select>
            <option value="all">All</option>
            <option value="all">Mens</option>
            <option value="all">Womens</option>
            <option value="all">Winter</option>
            <option value="all">Summer</option>
          </select>
          <input type="text" placeholder="Search here" />
        </div>
      </div>

      <a href="" class="item">
        <div class="group">
          <i>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="30"
              height="30"
              fill="currentColor"
              class="bi bi-person-circle"
              viewBox="0 0 16 16"
              style="margin: 3px"
            >
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
              <path
                fill-rule="evenodd"
                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"
              />
            </svg>
          </i>
          <div class="detail">
            Account
            <div class="sub">Sign In</div>
          </div>
        </div>
      </a>

      <a href="" class="item">
        <div class="group">
          <i><svg
              xmlns="http://www.w3.org/2000/svg"
              width="30"
              height="30"
              fill="currentColor"
              class="bi bi-cart"
              viewBox="0 0 16 16" >
              <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg>
          </i>
          <div class="detail">
            Cart
            <div class="sub">Rs 0.0</div>
          </div>
        </div>
      </a>
    </nav>
</html>
    <!-- nav -->
    <!-- body -->

    <body>
    <div class="product-wrap">

          
        <div class="grid" id="product-listing" ><div class="font-bold">Product Image</div>
        <div class="font-bold">Name</div>
        <div>
          
          <span class="product-Qty font-bold">Product Code</span>
        </div> <div>
          
          <span class="product-price font-bold">Price</span>
      </div>
      
      <div>
        
        <span class="product-Qty font-bold">Quantity</span>
      </div>
      
      <div class="font-bold">Action</div> 
      
    </div>
    <hr>
    <form action=""method="post">
    <!-- table end -->
  <?php  


$qty="SELECT`pquantity`FROM `product_info`where`product_id`= $pid";
$result1=mysqli_query($conn,$qty);
$num1= mysqli_num_rows($result1);
if($num1>0){
  while($rwo12= mysqli_fetch_array($result1)){
    $quantity1=$rwo12['pquantity'];
  }
}





$sql="SELECT product_info.pname,product_info.product_id,product_info.img_url,product_info.pprice,
cart_info.Product_id, cart_info.user_id, cart_info.quantity FROM product_info JOIN 
cart_info ON product_info.product_id=cart_info.Product_id WHERE cart_info.user_id=$user_id AND cart_info.product_id=$pid";
$result=mysqli_query($conn,$sql);
$num= mysqli_num_rows($result);
if($num>0){
 
while ($row1 = mysqli_fetch_array($result)) {

 $pname=$row1['pname'];
 $pprice=$row1['pprice'];
 $img=$row1['img_url'];
 $pid=$row1['product_id'];
 $quantity=$row1['quantity'];
 
 ?>


 <div class="grid" id="product-listing">
     <div ><img class="product-img" src="product_image/<?=$img;?>" alt="product"/></div>
 <div ><?php echo $pname; ?></div>
 <div>
   
   <span class="product-Qty"><?php echo $pid; ?></span>
 </div>
 <div>
   
   <span class="product-price"><?php echo $pprice; ?></span>
 </div>

 <div>
   <label for="qty-input">Qty</label>
   <input class="qty-input"type="number" name="quantity" value="<?php echo $quantity;?>" min="1" >
 </div>
 
 

 <div>

   <input type="submit"class="delete-btn"name="update"  >
   <?php
   
        if(isset($_POST['update'])){

        $quantity=$_POST['quantity'];
        $total=$pprice*$quantity;
        if($quantity<$quantity1){
          $query="UPDATE `cart_info` SET`Quantity`='$quantity',`total`='$total' WHERE `Product_id`=$pid";
        mysqli_query($conn, $query);
        header("location:cart.php");
        }else{
          $em=" Sorry Quantity is more the Stock ";
          header("location:cart.php?error=$em");

        }


        
         }

?>
 </div>
 </form>

 

</div>
<hr>
<hr>
<?php
 
  }
}
else{
  echo "no data found ";
}

?>





<!-- table end -->
 </div>
 
  </body>
      
      
    <!-- body end-->


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