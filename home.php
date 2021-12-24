<?php
 include "connection.php";
session_start();
$user_id=$_SESSION['id'];
 $sql1="SELECT * FROM `vendor_p` WHERE `user_id`=$user_id";
 $result=mysqli_query($conn,$sql1);
 if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_array($result)){
           $usname= $row['shop_name'];
           $id=$row['pid'];
           $ufname= $row['full_name'];
           $add= $row['address'];
           $phone= $row['phone'];
  }}
$_SESSION['vendor_id']=$id;
  $sql2="SELECT `reg_time` FROM `user_add` WHERE `user_id`=$user_id";
 $result2=mysqli_query($conn,$sql2);
 if(mysqli_num_rows($result2)>0){
  while($row2=mysqli_fetch_array($result2)){
  $regdate=$row2['reg_time'];
  }}
  // $sql3="SELECT * FROM `product_info` WHERE `vendor_id`=$user_id";
  // $result3=mysqli_query($conn,$sql3);
  // $item=mysqli_num_rows($result3);

  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>vendor</title>
    <link rel="stylesheet" href="index.css"/>
    <link rel="stylesheet" href="vendor.css" />

    <script src="vendor.js"></script>
  </head>
  
    <nav class="navbar">
      <div class="vendor-nav">   
      <div class="logo">
        <div  style="margin-left: 1rem"><h1>prop07</h1></div>
      </div>
      
      <div   >
        <form action=""method="post" class="item search right" tabindex="0">
        <input  type="search" placeholder="Search here" name="search" />
        </form>
      </div>
      <div class="vendor-btn">    <button  class="btn add" id="open-model" onclick="showModel()">Add New Product</button>
      <button  class="btn add" id="open-model" onclick="showModelOrder()">Order</button>
      <button  class="btn add" id="open-model" onclick="showModelReport()">Report</button>
      <button  class="btn add" id="open-model" onclick="showModelprofile()">View Profile</button></div></div>
     
   
      
  



    
    </nav>
<body>

            <?php if(isset( $_GET['error'])): ?>
            <p align='center'> <b class="error1"><?php 
                echo $_GET['error'];
                 ?></b>
            </p>
            <?php endif ?>



            <!-- view product  -->
            <div class="product-wrap">

          <div class="grid" id="product-listing" ><div class="font-bold">Product Image</div>
            <div class="font-bold">Name</div>
          <div>
            <span class="product-Qty font-bold">Product Code</span>
          </div>
           <div>
            <span class="product-price font-bold">Price</span>
          </div>
        
          <div>
            <span class="product-Qty font-bold">Quantity</span>
          </div>
          <div class="font-bold">Action</div> 
          </div>
            <hr>
            <?php
        if (isset($_POST['search'])){
          $data= $_POST['search'];
          $nepal="SELECT `pid`FROM `vendor_p` WHERE `user_id`=$user_id";
          $answer= mysqli_query($conn,$nepal);
              while($nepal1=mysqli_fetch_array($answer)){
                $pid=$nepal1['pid'];
              }
              $sql12="SELECT * FROM `product_info` WHERE `vendor_id`=$pid AND `pname`='$data'";
              $result12=mysqli_query($conn,$sql12);
            if(mysqli_num_rows($result12)>0){
              while($row12=mysqli_fetch_array($result12)){
                      $product_id=$row12['product_id'];
                      $ppname=$row12['pname'];
                      $pprice=$row12['pprice'];
                      $pquantity=$row12['pquantity'];
                      $disc=$row12['disc'];
                      $img=$row12['img_url'];
                      $product_type=$row12['ptype'];
              ?>
                <!-- edit box -->
                

                <div class="grid" id="product-listing" ><div ><img class="product-img" src="product_image/<?=$row12['img_url'];?>" alt="product"/></div>
                <div ><?php echo $ppname;?></div>
                <div>
                  
                  <span class="product-Qty"><?php echo $product_id;?></span>
                </div>
                <div>
                  
                  <span class="product-price"><?php echo $pprice;?></span>
                </div>
                <div>
                  
                  <span class="product-Qty"><?php echo $pquantity;?></span>
                </div>
                
                <div><button type="button" class="delete-btn">
                  <a href="<?php echo"delete.php?id=" .$user_id."&pid=" .$product_id;?>">Delete </a>
                </button>
                <button type="button" class="edit-btn"><a href="<?php echo"updateProduct.php?id=" .$user_id."&pid=" .$product_id;?>">Edit </a>
              </button>
                  </div> 

              
                </div>
              
          <hr>
                <?php }
                }else {
                  echo "NO DATA FOUNT";
                } 
        }else{
              $nepal="SELECT `pid`FROM `vendor_p` WHERE `user_id`=$user_id";
              $answer= mysqli_query($conn,$nepal);
              $we=mysqli_num_rows($answer);
              while($nepal1=mysqli_fetch_array($answer)){
                $pid=$nepal1['pid'];
              }
              

              $sql12="SELECT * FROM `product_info` WHERE `vendor_id`=$pid";
              $result12=mysqli_query($conn,$sql12);
              $we=mysqli_num_rows($result12);
            if(mysqli_num_rows($result12)>0){
              while($row12=mysqli_fetch_array($result12)){
                      $product_id=$row12['product_id'];
                      $ppname=$row12['pname'];
                      $pprice=$row12['pprice'];
                      $pquantity=$row12['pquantity'];
                      $disc=$row12['disc'];
                      $img=$row12['img_url'];
                      $product_type=$row12['ptype'];
              ?>
                <!-- edit box -->
                

                <div class="grid" id="product-listing" ><div ><img class="product-img" src="product_image/<?=$row12['img_url'];?>" alt="product"/></div>
                <div ><?php echo $ppname;?></div>
                <div>
                  
                  <span class="product-Qty"><?php echo $product_id;?></span>
                </div>
                <div>
                  
                  <span class="product-price"><?php echo $pprice;?></span>
                </div>
                <div>
                  
                  <span class="product-Qty"><?php echo $pquantity;?></span>
                </div>
                
                <div><button type="button" class="delete-btn">
                  <a href="<?php echo"delete.php?id=" .$user_id."&pid=" .$product_id;?>">Delete </a>
                </button>
                <button type="button" class="edit-btn"><a href="<?php echo"updateProduct.php?id=" .$user_id."&pid=" .$product_id;?>">Edit </a>
              </button>
                  </div> 

              
                </div>
              
          <hr>
                <?php }
                }else {
                  echo "NO DATA FOUNT";
                } }?>
              
                <!-- extra table end -->
    </div>
            
  <!-- add product -->
  <div class="model-container">
    <div  id="model">
      <button class="close-button-container" id="close-model" onclick="hideModel()">
        
        <div class="close-model"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
          <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg></div>
      </button>
      <form action="product_add.php?id=<?php echo $id;?>"  method="post" enctype= "multipart/form-data">
                
                <input class="input" type="text" placeholder="Enter product Name" required name="pname" />
                <input  class="input" type="number" placeholder="Enter Product Price" required name="pprice"/>
                <input  class="input" type="number" placeholder="Enter Product Quantity" required name="pquantity" min="1"/>
                <select name="ptype" id="format">
                    <option selected disabled required>Product Type</option>
                    <option value="MensWear">MensWear</option>
                    <option value="WomensWear">WomensWear</option>
                </select> 
                <textarea
                name="disc"
                id="description_area"
                cols="2"
                rows="3"
                placeholder="Enter Description" required></textarea>
                <input type="file" name="my_image">
                
                <div>
                    <button type="submit" class="btn add" name ="psubmit">Add Item</button>
                </div> 
            </form>
            
              
            </div>
          </div>
          
          <!-- end -->
<!-- vendor profile  model-->
          <div class="model-container-profile">
            <div  id="model-profile">
              <!-- header -->

              <?php
$sql="SELECT * FROM `vendor_p` where user_id =$user_id";
    $res= mysqli_query($conn, $sql);
    if (mysqli_num_rows($res)>0){ 
        while ($image=mysqli_fetch_assoc($res)){?>

            <div class="profile-header">  <div><img class="profile-img" src="vendor_profile_picture/<?=$image['img_location'];?>" alt=""></div>
            <div><div><strong><h4><?php echo $image['full_name'];?></h4></strong></div><div><h6>ID:<?php echo $user_id;?></h6></div></div>
             <div><button class="close-button-container-profile" id="close-model-profile" onclick="hideModelprofile()">
               
                <div ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg></div>
              </button></div> 
                </div>
             <!-- profile-body -->
             <div class="vendor-detials"><p><h5>Store Name:</h5><?php echo $usname;?></p></div>
             <div class="vendor-detials"><p><h5>Contact No:</h5><?php echo $phone;?></p></div>
             <div class="vendor-detials"><p><h5>Address:</h5><?php echo $add;?></p></div>
             <div class="vendor-detials"><p><h5>Total items :<h/5> <?php echo $we;?></p></div>
             <div class="vendor-detials"><p><h5>Registered date:</h5><?php echo $regdate;?></p></div>
      <button  class="btn add" id="open-model"><a href="account.php">Log Out</a></button>

<?php } } ?>    
          </div>
        </div>
        <!-- order model -->
        <div class="model-container-order">
          <div  id="model-order">
            <!-- header -->
            <div class="profile-header">  <div><img class="profile-img" src="./image/logomask.png" alt=""></div>
            <div><div><h2>ORDERS</h2></div><div></div></div>
             <div><button class="close-button-container-profile" id="close-model-profile" onclick="hideModelOrder()">
               
                <div ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg></div>
              </button></div> 
                </div>
                <!-- body -->
                <div class="order-wrap font-bold">
                  <div>Name:</div>
                  <div>Product Code:</div>
                  <div>Qty:</div>
                  <div>Address:</div>
                  <div>Contact No:</div>
                  <div>Action:</div>
                </div>
                <hr>
                  <!-- product listing -->
                  <!-- add product here -->

                  <div class="order-product">
                    <?php 
                      $data="SELECT * FROM `check_out` WHERE `user_id`=$user_id";
                      $result=mysqli_query($conn,$data);
                        $num= mysqli_num_rows($result);
                        if($num>0){
                        while ($row1 = mysqli_fetch_array($result))
                        {
                          $product_id1=$row1['product_id'];
                          $quantity1=$row1['quantity'];
                          $check_out_id=$row1['check_out_id'];

                          $sq="SELECT `fname`, `lname`, `streetadd`, `town`, `phone` FROM `shiping_data` WHERE`check_out_id`=$check_out_id";
                          $result22=mysqli_query($conn,$sq);
                          $num22= mysqli_num_rows($result22);
                          if($num22>0){
                          while($row22 = mysqli_fetch_array($result22)){
                            $fname=$row22['fname'];
                            $streetadd=$row22['streetadd'];
                            $lname=$row22['lname'];
                            $phone=$row22['phone'];
                            $town=$row22['town'];
                          }

                          ?>
                          <div><?php echo $fname." ".$lname; ?></div>
                          <div><?php echo $product_id1; ?></div>
                          <div><?php echo $quantity1; ?></div>
                          <div><?php echo $streetadd." ".$town; ?></div>
                          <div>+977 <?php echo $phone;?></div>
                          <div>
                            <button type="button" class="delete-btn"><a href="<?php echo"confirm.php?id=" .$check_out_id."&pid=" .$user_id;?>">Confirm</a></button>
                            <button type="button" class="delete-btn"><a href="<?php echo"cancel_order.php?id=" .$check_out_id."&pid=" .$user_id;?>">Cancel </a></button>
                          </div>
                          <?php
                        }
                      }
                      }
                    ?>

                   
                  </div>
          </div>
          
          
        </div>
      </div>
      <!-- report model -->
      <div class="model-container-report">

        <div  id="model-report" style="overflow-y:scroll" >
     <!-- header -->
     
     <div class="profile-header">  <div><img class="profile-img" src="./image/logomask.png" alt=""></div>
     <div><div><h2>Sales Report:</h2></div><div></div></div>
      <div><button class="close-button-container-profile" id="close-model-profile" onclick="hideModelReport()">
        
         <div ><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
           <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
         </svg></div>
       </button></div> 
         </div>
           <!-- body -->
           <br/>
           <!-- daily sales -->
           
           <div class="font-bold">Total Sales:Daily</div>

           <table>
          <tr>
              <td><b>S.N</b></td>
                <td><b>Product Name</b></td>
                <td><b>Product_ID</b></td>
                <td><b>Quantity</b></td>
                <td><b>Price</b></td>
                <td><b>Total</b></td>
          </tr>
            <?php
            $sn=0;
              $res="SELECT * FROM order_confirm WHERE date>(date-(60*60*24)) AND `user_id`=$user_id  ORDER BY `confirm_id` DESC";
              $ab= mysqli_query($conn, $res);
              $ac= mysqli_num_rows($ab);
              if($ac>0){
                while($abc= mysqli_fetch_array($ab)){
                  $sn=$sn+1;
                  $p1=$abc['product_id'];
                  $p2=$abc['pname'];
                  $p3=$abc['pprice'];
                  $p4=$abc['quantity'];
                  $p5=$abc['total'];
                  ?>
            <tr>
                <th><b><?php echo $sn;?></b></th>
                <th><b><?php echo $p2;?></b></th>
                <th><b><?php echo $p1;?></b></th>
                <th><b><?php echo $p4;?></b></th>
                
                <th><b><?php echo $p3;?></b></th>
                <th><b><?php echo $p5;?></b></th>
            </tr><?php
                }

              }else {
        echo "no data";
              }
            ?>

        
          <tr>
          <?php
          $abcd="SELECT SUM(total) FROM order_confirm WHERE date>(date-(60*60*24)) AND `user_id`=$user_id ORDER BY `confirm_id` DESC";
          $dd= mysqli_query($conn, $abcd);
              if(mysqli_num_rows($dd)>0){
                while($a= mysqli_fetch_array($dd)){ 
                $sum1= $a['SUM(total)'];
                
              }
             
              }
              ?>
              <th><b></b></th>
                <th><b>Total</b></th>
                <th><b>-</b></th>
                <th><b>-</b></th>
                <th><b>-</b></th>
                <th><b><?php echo $sum1;?></b></th>
          </tr>

         </table>
         <br/>
<!-- Weekly -->
<div class="font-bold">Total Sales:Weekly</div>

           <table>
          <tr>
              <td><b>S.N</b></td>
                <td><b>Product Name</b></td>
                <td><b>Product_ID</b></td>
                <td><b>Quantity</b></td>
                <td><b>Price</b></td>
                <td><b>Total</b></td>
          </tr>
            <?php
            $sn=0;
              $res="SELECT * FROM order_confirm WHERE date>(date-(60*60*24*7)) AND `user_id`=$user_id  ORDER BY `confirm_id` DESC;";
              
              $ab= mysqli_query($conn, $res);
              $ac= mysqli_num_rows($ab);
              if($ac>0){
                while($abc= mysqli_fetch_array($ab)){
                  $sn=$sn+1;
                  $p1=$abc['product_id'];
                  $p2=$abc['pname'];
                  $p3=$abc['pprice'];
                  $p4=$abc['quantity'];
                  $p5=$abc['total'];
                  
                  
                  ?>
            <tr>
                    <th><b><?php echo $sn;?></b></th>
                    <th><b><?php echo $p2;?></b></th>
                <th><b><?php echo $p1;?></b></th>
                <th><b><?php echo $p4;?></b></th>
                
                <th><b><?php echo $p3;?></b></th>
                <th><b><?php echo $p5;?></b></th>
          </tr><?php
                }

              }
            ?>

        
          <tr>
          <?php
          $abcd="SELECT SUM(total) FROM order_confirm WHERE date>(date-(60*60*24*7)) AND `user_id`=$user_id ORDER BY `confirm_id` DESC";
          $dd= mysqli_query($conn, $abcd);
              if(mysqli_num_rows($dd)>0){
                while($a= mysqli_fetch_array($dd)){ 
                $sum1= $a['SUM(total)'];
                
              }
             
              }
              ?>
              <th><b></b></th>
                <th><b>Total</b></th>
                <th><b>-</b></th>
                <th><b>-</b></th>
                <th><b>-</b></th>
                <th><b><?php echo $sum1;?></b></th>
          </tr>

         </table>
         <br/>
         <!-- Monthly -->
         <div class="font-bold">Total Sales:Monthly</div>

           <table>
          <tr>
              <td><b>S.N</b></td>
                <td><b>Product Name</b></td>
                <td><b>Product_ID</b></td>
                <td><b>Quantity</b></td>
                <td><b>Price</b></td>
                <td><b>Total</b></td>
          </tr>
            <?php
            $sn=0;
              $res="SELECT * FROM order_confirm WHERE date>(date-(60*60*24*30)) AND `user_id`=$user_id  ORDER BY `confirm_id` DESC;";
              $ab= mysqli_query($conn, $res);
              $ac= mysqli_num_rows($ab);
              if($ac>0){
                while($abc= mysqli_fetch_array($ab)){
                  $sn=$sn+1;
                  $p1=$abc['product_id'];
                  $p2=$abc['pname'];
                  $p3=$abc['pprice'];
                  $p4=$abc['quantity'];
                  $p5=$abc['total'];
                  
                  
                  ?>
            <tr>
                    <th><b><?php echo $sn;?></b></th>
                    <th><b><?php echo $p2;?></b></th>
                <th><b><?php echo $p1;?></b></th>
                <th><b><?php echo $p4;?></b></th>
                
                <th><b><?php echo $p3;?></b></th>
                <th><b><?php echo $p5;?></b></th>
          </tr><?php
                }

              }
            ?>

        
          <tr>
          <?php
          $abcd="SELECT SUM(total) FROM order_confirm WHERE date>(date-(60*60*24*30)) AND `user_id`=$user_id ORDER BY `confirm_id` DESC";
          $dd= mysqli_query($conn, $abcd);
              if(mysqli_num_rows($dd)>0){
                while($a= mysqli_fetch_array($dd)){ 
                $sum1= $a['SUM(total)'];
                
              }
             
              }
              ?>
              <th><b></b></th>
                <th><b>Total</b></th>
                <th><b>-</b></th>
                <th><b>-</b></th>
                <th><b>-</b></th>
                <th><b><?php echo $sum1;?></b></th>
          </tr>

         </table>



        </div>
        
        
      </div>
    </div>
    
    </body>
          <!-- end -->
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
