<!DOCTYPE html>
<html>
<body>
	<?php
        if(!isset($_SESSION['uid']))
            {
                $picname="pro.jpg";
            } 
        else{
                $picname=$_SESSION['uid'].".jpg";
            }
    ?>
    <!-- Header Area Start -->
    <header class="header-area">
        <!-- Search Form -->
        <div class="search-form d-flex align-items-center">
            <div class="container">
                <form action="index.php" method="get">
                    <input type="search" name="search-form-input" id="searchFormInput" placeholder="Type your keyword ...">
                    <button type="submit"><i class="icon_search"></i></button>
                </form>
            </div>
        </div>

        <!-- Top Header Area Start -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">

                    <div class="col-6">
                        <div class="top-header-content">
                            <a href="#"><i class="icon_phone"></i> <span>(123) 456-789-1230</span></a>
                            <a href="#"><i class="icon_mail"></i> <span>info.colorlib@gmail.com</span></a>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="top-header-content">
                            <!-- Top Social Area -->
                            <div class="top-social-area ml-auto">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Top Header Area End -->

        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container" style=" max-width: 1000px; padding: 0;">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="robertoNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index_admin.php"><img src="./img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu" style="width: 900px;">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav" style="padding: 0; float: right;">
                                <ul id="nav">
                                    <li class="active"><a href="./index_admin.php">Home</a></li>
                                    
                                    <li><a href="#">Rooms</a>
                                        <ul class="dropdown">
                                            <li><a href="./add_room.php">- Add</a></li>
                                            <li><a href="./admin_room.php">- Show</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">User</a>
                                        <ul class="dropdown">
                                            <li><a href="./show_user.php">- Show</a></li>
                                            <li><a href="./add_user.php">- Add</a></li>
                                            <li><a href="./delete_user.php">- Delete</a></li>
                                            <li><a href="./edit_user.php">- Edit</a></li>
                                        </ul>
                                    </li>
                                    
                                </ul>

                                <!-- Search -->
                                <div class="search-btn ml-4">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>

                                <!-- Book Now -->
                          
                                 <div style=" margin-left: 150px; padding: 0px;"><img src="./upload/<?php echo $picname?>" style="width: 80px; height: 80px;">
                                 <a href="logout.php"><img src="logout1.jpg" style="height:80px; width: 80px; padding: 10px;"></a></div>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

</body>
</html>