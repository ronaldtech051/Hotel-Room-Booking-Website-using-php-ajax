<?php
  session_start();
  if ($_SESSION['uid']==-1) {
    header("location:login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Roberto - Hotel &amp; Resort HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.png">
    <script type="text/javascript"> 
        function noBack() { 
            header("location:room.php"); 
        } 
    </script>

    <!-- Stylesheet -->

        <style>
        .row {
          display: -ms-flexbox; /* IE10 */
          display: flex;
          -ms-flex-wrap: wrap; /* IE10 */
          flex-wrap: wrap;
          margin: 0 -16px;
        }

        .col-25 {
          -ms-flex: 30%;   
          flex: 30%;
        }

        .col-50 {
          -ms-flex: 50%; /* IE10 */
          flex: 50%;
        }

        .col-75 {
          -ms-flex: 70%; /* IE10 */
          flex: 70%;
        }

        .col-25,
        .col-50,
        .col-75 {
          padding: 0 16px;
        }


        input[type=text] {
          width: 100%;
          margin-bottom: 20px;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 3px;
        }

        label {
          margin-bottom: 10px;
          display: block;
        }

        .icon-container {
          margin-bottom: 20px;
          padding: 7px 0;
          font-size: 24px;
        }

        /*.btn {
          background-color: #4CAF50;
          color: white;
          padding: 12px;
          margin: 10px 0;
          border: none;
          width: 100%;
          border-radius: 3px;
          cursor: pointer;
          font-size: 17px;
        }*/

        .btn:hover {
          background-color: #45a049;
        }

        span.price {
          float: right;
          color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
          .row {
            flex-direction: column-reverse;
          }
          .col-25 {
            margin-bottom: 20px;
          }
        }
    
        </style>
<link rel="stylesheet" href="style.css">
</head>
    <!-- Preloader -->
	<body>
    <?php
    $err="";
    $bname="";
    $bemail="";
    $baddress="";
    $bcity="";
    $bstate="";
    $bncard="";
    $bcreditno="";
    $bexpmnth="";
  	$bexpyr="";
  	$bcvv="";
   

        if($_SERVER['REQUEST_METHOD']=="POST")
        {

            $bname=$_POST['firstname'];
            $bemail=$_POST['email'];
            $baddress=$_POST['address'];
            $bcity=$_POST['city'];
            $bstate=$_POST['state'];
            $bncard=$_POST['cardname'];
			      $bcreditno=$_POST['cardnumber'];
			      $bexpmnth=$_POST['expmonth'];
			      $bexpyr=$_POST['expyear'];
			       $bcvv=$_POST['cvv'];
           
            
                 $conn=mysqli_connect("localhost","root","","hotel");
                            if(!$conn)
                            {
                                die("Can't connect: ".mysqli_connect_error());
                            }

                            $sql="INSERT INTO `bill`(`b_name`, `b_email`, `b_address`, `b_city`, `b_state`, `b_n_card`, `b_creditno`, `b_exp_mnth`, `b_exp_yr`, `b_cvv`) VALUES ('$bname','$bemail','$baddress','$bcity','$bstate','$bncard','$bcreditno','$bexpmnth','$bexpyr','$bcvv')";
                                         if(mysqli_query($conn,$sql))
                                            echo "<script>alert('bill inserted')</script>";
                                        else
                                            echo "<script>alert('bill is not inserted')</script>";
                                        header("location:index.php");
                                  mysqli_close($conn);
                                  
          }
    ?>

    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <?php
        
        if(isset($_SESSION['type']))
        {
            if($_SESSION['type']==0) 
            {
                include "header_admin.php";
            }
            else{
                include "header.php";
            }
        }
        else
        {
            include "header.php";
        }
        
        
    ?>
	
	<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/16.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Book Your Room</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Room</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Rooms Area Start -->
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div  style="width: 80%;">
                    <!-- Single Room Area -->
                        <!-- Room Thumbnail -->
                        <?php

                        $conn=mysqli_connect("localhost","root","","hotel");
                        if (!$conn) {
                            die("Can't connect".mysqli_connect_error());
                        }
                            //echo $_SERVER['HTTP_REFERER'];
                            if ($_SERVER['HTTP_REFERER']=="http://localhost/Roberto-Hotel/room.php")
                            {
                                $is_page_refreshed = (isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] == 'max-age=0');
                                if($is_page_refreshed!=1)
                                {
                                  $idroom=$_GET['roomid'];
                                  $uid=$_GET['userid'];
                                  $sql="SELECT room_id,room_name,room_price FROM room WHERE room_id='$idroom'";
                                  $result=mysqli_query($conn,$sql);
                                  while ($row=mysqli_fetch_assoc($result)) {
                                    $rid=$row['room_id'];
                                    $rname=$row['room_name'];
                                    $rprice=$row['room_price'];
                                  }
                                  $sql1="INSERT INTO cart(cart_id,user_id,room_name,room_price) VALUES('$rid','$uid','$rname','$rprice')";
                                  mysqli_query($conn,$sql1);
                                }
                            }
                            if ($_SERVER['HTTP_REFERER']=="http://localhost/Roberto-Hotel/room.php") {
                              $uid=$_GET['userid'];
                            }
                            else
                            {
                              $uid=$_GET['uidfromdelete'];
                            }
                        ?>
<div class="row" style="width: 100%;">
  <div class="col-75">
    <div class="container">
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="firstname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe">

            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">

            <label for="address"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">

            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York">

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cardname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="cardnumber">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">

            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <?php
        $sql2="SELECT * FROM cart WHERE user_id='$uid'";
        $result1=mysqli_query($conn,$sql2);
        $total=0;
        while ($row=mysqli_fetch_assoc($result1)) {
          $rprice=$row['room_price'];
          $total=$total+$rprice;
        }
        ?>
        <button type="submit" class="btn roberto-btn mb-50" class="col-75" style="width:100%; margin-bottom: 10px;">Pay <?php echo $total.'$';?></button>
    
      </form>
    </div>
  </div>

  <div class="col-25">
    <div class="container">
      <a href="room.php"><button type="submit" class="btn roberto-btn mb-50" style="width:100%; margin-bottom: 10px; padding: 0px;">+Add Room</button></a>
      <?php
        // echo $_SERVER['HTTP_REFERER'];
        
        $sql2="SELECT * FROM cart WHERE user_id='$uid'";
        $result1=mysqli_query($conn,$sql2);
        $i=0;
        while ($row=mysqli_fetch_assoc($result1)) {
          $i++;
        }
      
      ?>
      <h4>Cart
        <span class="price" style="color:black">
          <i class="fa fa-shopping-cart"></i>
          <b><?php echo $i; ?></b>
        </span>
      </h4>
      <?php
        $sql2="SELECT * FROM cart WHERE user_id='$uid'";
        $result1=mysqli_query($conn,$sql2);
        // $total=0;
        while ($row=mysqli_fetch_assoc($result1)) {
          $rname=$row['room_name'];
          $rprice=$row['room_price'];
          $did=$row['indexroom'];
          // $total=$total+$rprice;
          echo '<p>'.$rname.'<span class="price">'.$rprice.'$<a href="deleteroom.php?indexid='.$did.'&uid='.$uid.'"><img style="display:inline; margin-left:8px; height:17px; width:17px;" src="remove.jpg"></a></span></p>';
        }
      ?>

      <hr>
      <p>Total <span class="price" style="color:black"><b><?php echo $total.'$';?></b></span></p>
      
    </div>

  </div>

</div>
</div>
</div>
</div>
<!-- Call To Action Area Start -->
    <section class="roberto-cta-area">
        <div class="container">
            <div class="cta-content bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/1.jpg);">
                <div class="row align-items-center">
                    <div class="col-12 col-md-7">
                        <div class="cta-text mb-50">
                            <h2>Contact us now!</h2>
                            <h6>Contact (+12) 345-678-9999 to book directly or for advice</h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 text-right">
                        <a href="#" class="btn roberto-btn mb-50">Contact Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Area End -->
<!-- Partner Area Start -->
    <div class="partner-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="partner-logo-content d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="300ms">
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="img/core-img/p1.png" alt=""></a>
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="img/core-img/p2.png" alt=""></a>
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="img/core-img/p3.png" alt=""></a>
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="img/core-img/p4.png" alt=""></a>
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="img/core-img/p5.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Area End -->

    <!-- Footer Area Start -->
    <?php
        include "footer.php";
    ?>
    <!-- Footer Area End -->

    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="js/roberto.bundle.js"></script>
    <!-- Active -->
    <script src="js/default-assets/active.js"></script>
</body>
</html>