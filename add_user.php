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
        $fname="";
        $sname="";
        $email="";
        $password="";
        $dob="";
        $gender="";
        $g1="";
        $g2="";
        $g3="";
        $yourfav="";
        $arr="";

        if($_SERVER['REQUEST_METHOD']=="POST")
        {

            $fname=$_POST['firstname'];
            $sname=$_POST['surname'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $dob=$_POST['dob'];
            $gender=$_POST['gender'];
            $yourfav=$_POST['security'];
            $dac = date("yy/m/d");
            $laa= $dac;
            if($gender=="male")
            {
                $g1="checked";
            }
            else if ($gender=="female") 
            {
                $g2="checked";
            }
            else
            {
                $g3="checked";
            }
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

                            $sql="INSERT INTO signup(firstname,lastname,email,password,type,gender,security_q1,security_a1,user_dac,user_laa) VALUES ('$fname','$sname','$email','$password','1','$gender','Your favourite food?','$yourfav','$dac','$laa')";
                                         if(mysqli_query($conn,$sql))
                                            echo "<script>alert('data inserted')</script>";
                                        else
                                            echo "<script>alert('data is not inserted')</script>";
                            $img_name=mysqli_insert_id($conn);
                            mysqli_close($conn);
                            if(file_exists("./upload/".$img_name))
                                echo "<script>alert('File already exists!)</script>";
                            else
                            {
                                copy($_FILES['file']['tmp_name'],"./upload/".$img_name.'.jpg');
                                $arr=$img_name;
                                if ($_SERVER['HTTP_REFERER']=="http://localhost/Roberto-Hotel/signup.php") {
                                    header("location:index.php");
                                    $_SESSION['profile']=$arr;
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
    <?php
        include "header_admin.php";
    ?>
    <h2 style="text-align:center; color: #1cc3b2;">Add New User</h2>
    <div class="hotel-search-form-area">
            <div class="container-fluid" style="margin-top:7px; width: 500px; margin-bottom:7px;">
                <div class="hotel-search-form">
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
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
                        
                        <label for="password" style="margin-bottom: 0px;">Password</label><input type="password" placeholder="Password" name="password" value="<?php echo $password;?>" required="required"  style="width:100%; height: 44px; padding: 10px; margin-bottom:5px;">

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

                            <label for="uphoto" style="margin-bottom: 0px;">Upload profile photo(*only jpg file)</label>
                            <input type="file" name="file"  style="width:100%; margin-bottom: 0px;"><div style="color: red;"><?php echo $err."<br>";?></div>

                        <button type="submit" class="btn roberto-btn mb-50" style="width:50%; margin-bottom: 10px; margin-left: 25%;">Add</button>
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
  
