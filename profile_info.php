<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VendorINFO</title>
    <link rel="stylesheet" href="account.css" />
  </head>
  <body>
    <div class="form-modal">
      <div id="vendorINFO">
        <h2>VendorInfo.</h2>
      </div>
      <?php session_start();
       $id=$_SESSION['id'];
      ?>
      <form class="vendorform"action="profile_info_db.php" method="post" enctype= "multipart/form-data">
        <input  class="input"  type="text" placeholder="Your Full Name" name ="ufname"/>
          <input class="input"  type="text" placeholder="Enter Your Shop Name" name ="usname"/>
          <input class="input"  type="text" placeholder="Address" name ="add"/>
          <input class="input"  type="text" placeholder="Phone" name ="phone"/>
		<label for="pImage"><b>Insert your profile image:</b></label>
        
        <input type="file" name="my_image" placeholder="insert image" />
        <button type="submit" class="btn login" name ="usubmit" value="Upload">
          Confirm Info.
        </button>
      </form>
    </div>
  </body>
</html>
