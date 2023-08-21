<!DOCTYPE html>
<html>
<body>
	<?php
        $uid=$_GET['uid'];
        $err="";
        $fname="";
        $sname="";
        $email="";
        $dob="";
        $gender="";
        $g1="";
        $g2="";
        $g3="";
        $yourfav="";
        $arr="";
        
            $fname=$_POST['firstname'];
            $sname=$_POST['surname'];
            $email=$_POST['email'];
            $dob=$_POST['dob'];
            $gender=$_POST['gender'];
            $yourfav=$_POST['security'];
            $conn=mysqli_connect("localhost","root","","hotel");
            if(!$conn)
            {
                die("Can't connect: ".mysqli_connect_error());
            }

            $sql="UPDATE signup SET firstname='$fname' ,lastname='$sname',email='$email',dob='$dob',gender='$gender',security_a1='$yourfav' WHERE id='$uid' " ;
                   
            if(mysqli_query($conn,$sql))
            {
                header("location:edit_user.php");
            }
         ?>
</body>
</html>