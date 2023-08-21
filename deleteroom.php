
	<?php
        $conn=mysqli_connect("localhost","root","","hotel");
        if (!$conn) {
            die("Can't connect".mysqli_connect_error());
        }
        $indexid=$_GET['indexid'];
        $sql="DELETE FROM `cart` WHERE indexroom='$indexid'";
        mysqli_query($conn,$sql);
        $ud=$_GET['uid'];
        header("location:booknow.php?uidfromdelete=".$ud);
    ?>
