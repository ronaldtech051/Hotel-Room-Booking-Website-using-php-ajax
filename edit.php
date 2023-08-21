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
            $uid=$_GET['uid'];
            $conn=mysqli_connect("localhost","root","","hotel");
            $fname="";
            $sname="";
            $email="";
            $dob="";
            $gender="";
            $g1="";
            $g2="";
            $g3="";
            $yourfav="";

            if(!$conn)
            {
                die("Can't connect: ".mysqli_connect_error());
            }
            $sql="SELECT * FROM signup WHERE id=$uid";
            $result=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_assoc($result)) 
            {
                $fname=$row['firstname'];
                $sname=$row['lastname'];
                $email=$row['email'];
                $dob=$row['dob'];
                $gender=$row['gender'];
                if ($gender=="male")
                    $g1="checked";
                else if($gender=="female")
                    $g2="checked";
                else
                    $g3="checked";
                $yourfav=$row['security_a1'];
                
            }
            mysqli_close($conn);
    ?>
    <?php
        session_start();
        include "header_admin.php";
    ?>
    <h2 style="text-align:center; color: #1cc3b2;">Edit User</h2>
    <div class="hotel-search-form-area">
            <div class="container-fluid" style="margin-top:7px; width: 500px; margin-bottom:7px;">
                <div class="hotel-search-form">
                    <form action="edit_1.php?uid=<?php echo $_GET['uid']?>" method="post">
                        <div style="height: auto; width: 100%;">
                            <div style="display: inline-block;">
                                <label for="firstname" style="margin-bottom: 0px;">Firstname</label><br>
                                <input type="text" placeholder="Firstname"  name="firstname" autofocus="autofocus" autocomplete="firstname" value="<?php echo $fname;?>" required="required"  style="width:191.50px; height: 44px; margin-top: 0px; padding: 10px; margin-bottom: 5px;margin-right: 0px;">
                            </div>
                            <div style="display: inline-block;">
                                <label for="surname" style="margin-bottom: 0px;">Surname</label><br><input type="text" placeholder="Surname" name="surname" autofocus="autofocus" autocomplete="surname" value="<?php echo $sname;?>" required="required" style="width:192px; height: 44px; margin-top: 0px; padding: 10px; margin-bottom: 5px; margin-right: 0px;">
                            </div>
                        </div>
                        <label for="email" style="margin-bottom: 0px;">Email Address</label><input type="email" placeholder="Enter Email"  name="email" value="<?php echo $email;?>" required="required" style="width:100%; height: 44px; padding: 10px; margin-bottom: 5px;">

                        <label for="dob" style="margin-bottom: 0px;">Date Of Birth</label><br><input type="Date" name="dob"  value="<?php echo $dob;?>" required="required" style="width:100%; height: 44px; padding: 10px; margin-bottom:5px;">

                        <label for="gender" style="margin-bottom: 0px;">Gender</label><br>
                        <div style="display: inline-block; margin-bottom: 5px;">
                            <div style="border: 1px solid black; border-color: rgb(118, 118, 118); width: 127px;display: inline-block; height: 44px; border-radius: 3px; text-align: center; padding: 10px 0px;">
                            <input type="radio" id="male" name="gender" value="male" <?php echo "$g1";?>>
                            <label for="male">Male</label>
                            </div>
                            <div style="border: 1px solid black; border-color: rgb(118, 118, 118); width: 127px;display: inline-block; height: 44px; border-radius: 3px; text-align: center; padding: 10px 0px;">
                             <input type="radio" id="female" name="gender" value="female" <?php echo "$g2";?>>
                            <label for="female">Female</label>
                            </div>
                            <div style="border: 1px solid black; border-color: rgb(118, 118, 118); width: 127px;display: inline-block; height: 44px; border-radius: 3px; text-align: center; padding: 10px 0px;">
                             <input type="radio" id="other" name="gender" value="other" <?php echo "$g3";?>>
                            <label for="other">Other</label>
                            </div>
                        </div>

                        <label for="security" style="margin-bottom: 0px;">Security Question</label><input type="security" placeholder="Your favourite food" name="security" value="<?php echo $yourfav;?>" required="required" style="width:100%; height: 44px; padding: 10px; margin-bottom: 10px;">

                        <button type="submit" class="btn roberto-btn mb-50" style="width:50%; margin-bottom: 10px; margin-left: 25%;">Edit</button>
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
  
