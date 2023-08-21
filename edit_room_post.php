<!DOCTYPE html>
<html>
<body>
	<?php
        $rid=$_GET['roomid'];
        $rname="";
        $rsize="";
        $rcapacity="";
        $rservice="";
        $rprice="";
  
        
            $rname=$_POST['roomname'];
            $rsize=$_POST['roomsize'];
            $rcapacity=$_POST['roomcapacity'];
            $rservice=$_POST['roomservice'];
            $rprice=$_POST['roomprice'];

            $conn=mysqli_connect("localhost","root","","hotel");
            if(!$conn)
            {
                die("Can't connect: ".mysqli_connect_error());
            }

            $sql="UPDATE room SET room_name='$rname' ,room_size='$rsize',room_capacity='$rcapacity',room_services='$rservice',room_price='$rprice'WHERE room_id='$rid' " ;
                   
            if(mysqli_query($conn,$sql))
            {
                header("location:admin_room.php");
            }
         ?>
</body>
</html>