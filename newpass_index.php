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
     
    <div class="hotel-search-form-area">
            <div class="container-fluid" style="margin-top: 150px; width: 500px;">
                <div class="hotel-search-form">
                    <form action="newpass.php" method="post">

                        <label for="npass" style="margin-bottom: 0px;">New Password</label><br><input type="password" placeholder="New Password" required="required" name="npass" autofocus="autofocus" autocomplete="New Password" style="width:100%; height: 44px; margin-top: 0px; padding: 10px; margin-bottom: 5px;"><br>

                        <label for="cpass" style="margin-bottom: 0px;">Confirm Password</label><input type="password" placeholder="Confirm Password" required="required" name="cpass" style="width:100%; height: 44px; padding: 10px; margin-bottom: 10px;">
                        <?php
                            session_start();
                            if (isset($_SESSION['passchanged'])) 
                            {
                                if ($_SESSION['passchanged']==0)
                                {
                                    echo "<p style='color: red; margin-bottom:5px; margin-top:0px; padding:0px;'>* Fields Not Matching!</p>";
                                }
                            }
                        ?>
                        <button type="submit" class="btn roberto-btn mb-50" style="width:50%; margin-bottom: 10px; margin-left: 25%;">Change</button>
                    </form>
                </div>
            </div>
        </div>
    
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
  
