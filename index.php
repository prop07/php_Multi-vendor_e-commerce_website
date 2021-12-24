<?php  include "connection.php";
session_start();
if(isset($_GET['id'])){
$id=$_GET['id'];
}else{
  $id=0;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>e-commerce</title>
    <link rel="stylesheet" href="index.css" />
  </head>
  <body>
    <header>
      <nav class="navbar">
        <i class="material-icons menu-icon"> prop07 </i>
        <div class="logo">
          <div class="text" style="margin-left: 1rem"><h1>prop07</h1></div>
        </div>
        <form action="" class="item search right" tabindex="0" method="post">
          <div>
            <div class="search-group">
              <select name="type">
                <option value="all">All</option>
                <option value="menswear">Mens</option>
                <option value="WomensWear">Womens</option>
                <option value="ab">low to high</option>
                <option value="ba">high to low </option>
              </select>
              <input type="search" placeholder="Enter Product name " name="search" />
            </div>
          </div>
        </form>


        <a href="account.php" class="item">
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
        <?php $_SESSION['number']=$id;?>
        <a href="cart.php" class="item">
          <div class="group">
            <i
              ><svg
                xmlns="http://www.w3.org/2000/svg"
                width="30"
                height="30"
                fill="currentColor"
                class="bi bi-cart"
                viewBox="0 0 16 16"
              >
                <path
                  d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"
                />
              </svg>
            </i>
            <div class="detail">
              Cart
              <div class="sub">Total items:</div>
            </div>
          </div>
        </a>
      </nav>
    </header>

    <section style="min-height: 89vh">
      <!--Changing the number in the column_# class changes the number of columns-->
      <div id="wrap">
        <div id="columns" class="columns_4">
        <?php 
        if(isset($_POST['search'])){
          $name=$_POST['search'];
          $type=$_POST['type'];
          if($type=="all"){
            $sql="SELECT * FROM `product_info` WHERE `pname`='$name' ORDER BY product_id DESC";
        $res= mysqli_query($conn, $sql);
        if (mysqli_num_rows($res)>0){ while ($product=mysqli_fetch_assoc($res)){ ?>
                  <figure>
                  <?php $str=$product['pname'];
                $str=strtoupper($str);
                $product_id=$product['product_id'];
                ?>
            <img src="product_image/<?=$product['img_url'];?>" />
            <figcaption><?php echo $str; ?></figcaption>
            <span class="price">RS.<?=$product['pprice'];?></span>
            <a
              class="button"
              href="<?php echo"
              product.php?id=" .$product_id."
              &uid=" .$id;?>"
              >Buy Now</a
            >
          </figure>
          <?php
            }}
      

          }elseif($type=="menswear"){
            $sql="SELECT * FROM `product_info` WHERE `pname`='$name' AND `ptype`='$type'  ORDER BY product_id DESC";
        $res= mysqli_query($conn, $sql);
        if (mysqli_num_rows($res)>0){ while ($product=mysqli_fetch_assoc($res)){ ?>
                  <figure>
                  <?php $str=$product['pname'];
                $str=strtoupper($str);
                $product_id=$product['product_id'];
                ?>
            <img src="product_image/<?=$product['img_url'];?>" />
            <figcaption><?php echo $str; ?></figcaption>
            <span class="price">RS.<?=$product['pprice'];?></span>
            <a
              class="button"
              href="<?php echo"
              product.php?id=" .$product_id."
              &uid=" .$id;?>"
              >Buy Now</a
            >
          </figure>
          <?php
            }}
      

          }elseif($type=="womenswear"){
            $sql="SELECT * FROM `product_info` WHERE `pname`='$name' AND `ptype`='$type' ORDER BY product_id DESC";
            $res= mysqli_query($conn, $sql);
            if (mysqli_num_rows($res)>0){ while ($product=mysqli_fetch_assoc($res)){ ?>
                      <figure>
                      <?php $str=$product['pname'];
                    $str=strtoupper($str);
                    $product_id=$product['product_id'];
                    ?>
                <img src="product_image/<?=$product['img_url'];?>" />
                <figcaption><?php echo $str; ?></figcaption>
                <span class="price">RS.<?=$product['pprice'];?></span>
                <a
                  class="button"
                  href="<?php echo"
                  product.php?id=" .$product_id."
                  &uid=" .$id;?>"
                  >Buy Now</a
                >
              </figure>
              <?php
                }}
          

          }elseif($type=="ab"){
            $sql="SELECT * FROM `product_info`  ORDER BY pprice ASC";
            $res= mysqli_query($conn, $sql);
            if (mysqli_num_rows($res)>0){ while ($product=mysqli_fetch_assoc($res)){ ?>
                      <figure>
                      <?php $str=$product['pname'];
                    $str=strtoupper($str);
                    $product_id=$product['product_id'];
                    ?>
                <img src="product_image/<?=$product['img_url'];?>" />
                <figcaption><?php echo $str; ?></figcaption>
                <span class="price">RS.<?=$product['pprice'];?></span>
                <a
                  class="button"
                  href="<?php echo"
                  product.php?id=" .$product_id."
                  &uid=" .$id;?>"
                  >Buy Now</a
                >
              </figure>
              <?php
                }}
          
          }else{
            $sql="SELECT * FROM `product_info` ORDER BY pprice DESC";
        $res= mysqli_query($conn, $sql);
        if (mysqli_num_rows($res)>0){ while ($product=mysqli_fetch_assoc($res)){ ?>
                  <figure>
                  <?php $str=$product['pname'];
                $str=strtoupper($str);
                $product_id=$product['product_id'];
                ?>
            <img src="product_image/<?=$product['img_url'];?>" />
            <figcaption><?php echo $str; ?></figcaption>
            <span class="price">RS.<?=$product['pprice'];?></span>
            <a
              class="button"
              href="<?php echo"
              product.php?id=" .$product_id."
              &uid=" .$id;?>"
              >Buy Now</a
            >
          </figure>
          <?php
            }}
      
          }
        
        }else {
        $sql="SELECT * FROM `product_info`ORDER BY product_id DESC";
        $res= mysqli_query($conn, $sql);
        if (mysqli_num_rows($res)>0){ while ($product=mysqli_fetch_assoc($res)){ ?>
                  <figure>
                  <?php $str=$product['pname'];
                $str=strtoupper($str);
                $product_id=$product['product_id'];
                ?>
            <img src="product_image/<?=$product['img_url'];?>" />
            <figcaption><?php echo $str; ?></figcaption>
            <span class="price">RS.<?=$product['pprice'];?>/-</span>
            <a
              class="button"
              href="<?php echo"
              product.php?id=" .$product_id."
              &uid=" .$id;?>"
              >Buy Now</a
            >
          </figure>
          <?php
   }}else{
     echo "Sorry nO data found";}

        }?>
        </div>
      </div>
    </section>
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
  </body>
</html>
