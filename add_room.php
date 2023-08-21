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

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php
    session_start();
    $err="";
    $rno="";
    $rname="";
    $rsize="";
    $rcapacity="";
    $rservices="";
    $rprice="";
   

        if($_SERVER['REQUEST_METHOD']=="POST")
        {

            $rno=$_POST['roomno'];
            $rname=$_POST['roomname'];
            $rsize=$_POST['roomsize'];
            $rcapacity=$_POST['roomcapacity'];
            $rservices=$_POST['roomservices'];
            $rprice=$_POST['roomprice'];
           
            
                    if(is_uploaded_file($_FILES['file']['tmp_name']))
                    {
                        if(!strstr($_FILES['file']['name'],".jpg"))
                            echo "<script>alert('File must be in .jpg')</script>";
                        else
                        {
                            $conn=mysqli_connect("localhost","root","","hotel");
                            if(!$conn)
                            {
                                die("Can't connect: ".mysqli_connect_error());
                            }

                            $sql="INSERT INTO room(room_id,room_name,room_size,room_capacity,room_services,room_price) 
                                    VALUES ('$rno','$rname','$rsize','$rcapacity','$rservices','$rprice')";
                                         if(mysqli_query($conn,$sql))
                                            echo "<script>alert('Room inserted')</script>";
                                        else
                                            echo "<script>alert('Room is not inserted')</script>";
                            $rno=mysqli_insert_id($conn);
                            mysqli_close($conn);
                            if(file_exists("./rooms/".$rno))
                                echo "<script>alert('File already exists!)</script>";
                            else
                            {
                                copy($_FILES['file']['tmp_name'],"./rooms/".$rno.'.jpg');
                                $arr=$rno;
                                if ($_SERVER['HTTP_REFERER']=="http://localhost/Roberto-Hotel/index_admin.php") {
                                    header("location:index.php");
                                    $_SESSION['room']=$arr;
                                }
                                else
                                {
                                    header("location:index_admin.php");
                                }
                            }
                        }
                    }
                    else
                    {
                        echo "<script>alert('File is not selected/uploaded')</script>";
                    }

        }
    ?>


     <div id="preloader">
        <div class="loader"></div>
    </div>
    <?php
        include "header_admin.php";
    ?>
    <div class="hotel-search-form-area">
            <div class="container-fluid" style="margin-top:7px; width: 500px; margin-bottom:7px;">
                <div class="hotel-search-form">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                        <div style="height: auto; width: 100%;">
                            <div style="display: inline-block;">
                                <label for="roomno" style="margin-bottom: 0px;">Room No.</label><br>
                                <input type="int" placeholder="Enter Room no."  name="roomno" autofocus="autofocus"  required="required"  style="width:191.50px; height: 44px; margin-top: 0px; padding: 10px; margin-bottom: 5px;margin-right: 0px;">
                            </div>
                            <div style="display: inline-block;">
                                <label for="roomname" style="margin-bottom: 0px;">Room Name</label><br><input type="text" placeholder="Room Name" name="roomname" autofocus="autofocus" required="required" style="width:192px; height: 44px; margin-top: 0px; padding: 10px; margin-bottom: 5px; margin-right: 0px;">
                            </div>
                        </div>
                        <label for="roomsize" style="margin-bottom: 0px;">Room Size</label><input type="int" placeholder="Enter Room Size"  name="roomsize" required="required" style="width:100%; height: 44px; padding: 10px; margin-bottom: 5px;">
                        
                        <label for="roomcapacity" style="margin-bottom: 0px;">Room Capacity</label><input type="text" placeholder="Enter Room Capacity" name="roomcapacity" required="required"  style="width:100%; height: 44px; padding: 10px; margin-bottom:5px;">

                        <label for="roomservices" style="margin-bottom: 0px;">Room Services</label><br><input type="text" name="roomservices" required="required" style="width:100%; height: 44px; padding: 10px; margin-bottom:5px;">

                        <label for="roomprice" style="margin-bottom: 0px;">Room Price</label><input type="int" placeholder="Enter Room Price" name="roomprice" required="required" style="width:100%; height: 44px; padding: 10px; margin-bottom: 10px;">

                            <label for="roomphoto" style="margin-bottom: 0px;">Upload Room photo(*only jpg file)</label>
                            <input type="file" name="file"  style="width:100%; margin-bottom: 0px;"><div style="color: red;"><?php echo $err."<br>";?></div>

                        <button type="submit" class="btn roberto-btn mb-50" style="width:50%; margin-bottom: 10px; margin-left: 25%;">Add Room</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
        include "footer.php";
    ?>
    
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
  
