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
    <script type="text/javascript"> 
        window.history.forward(); 
        function noBack() { 
            window.history.forward(); 
        } 
    </script>
</head>
<body>
     <div id="preloader">
        <div class="loader"></div>
    </div>
    <?php
        session_start();
        include "header.php";
    ?>
    <div class="hotel-search-form-area">
            <div class="container-fluid" style="margin-top: 10px; width: 500px; margin-bottom: 10px;">
                <div class="hotel-search-form">
                    <div id="err" style="text-align: center; "></div>
                    <div id="jj"></div>
                    <form action="login_post.php" method="post">
                        <label for="email" style="margin-bottom: 0px;">Email</label><br><input type="email" placeholder="Email" required="required" name="email" autofocus="autofocus" autocomplete="email" onkeyup="f1(this.value)" style="width:100%; height: 44px; margin-top: 0px; padding: 10px; margin-bottom: 5px;"><br>

                         <script>
                            function f1(str){
                                if(str.length==0){
                                    document.getElementById("err").innerHTML = "";
                                    document.getElementById('password').disabled=true;
                                    document.getElementById('login').disabled=true;
                                    return;
                                }
                                else{
                                    var xhttp=new XMLHttpRequest();
                                    xhttp.onreadystatechange=function(){
                                        if (this.readyState==4 && this.status==200) {
                                            if (this.responseText=="error") {
                                                document.getElementById('err').innerHTML="Email Not Registered!";
                                                // document.getElementById('err').style.display="block";
                                                labook();
                                                document.getElementById('password').disabled=true;
                                                document.getElementById('login').disabled=true;
                                            }
                                            else
                                            {
                                                document.getElementById('err').innerHTML="";
                                                document.getElementById('password').disabled=true;
                                                document.getElementById('login').disabled=true;
                                            }
                                            if (this.responseText=="gotchaconfirm") {
                                                document.getElementById('password').disabled=false;
                                                document.getElementById('login').disabled=false;
                                            }
                                        }
                                    }
                                    xhttp.open("GET","login_ajax.php?d="+str,true);
                                    xhttp.send();
                                    }
                            }
                            function labook(){
                                document.getElementById('err').innerHTML="Email not Registered";
                                document.getElementById('err').style.color="red";
                                setInterval(fun,1000);
                                function fun(){
                                    var d=new Date();
                                    var sec=d.getSeconds();
                                    if(sec%2==0)
                                    {
                                        document.getElementById('err').style.color="red";
                                    }
                                    else{
                                        document.getElementById('err').style.color="green";
                                    }
                                }
                            }
                         </script>

                        <label for="password" style="margin-bottom: 0px;">Password</label><input type="password" placeholder="Password" required="required" id="password" name="password" style="width:100%; height: 44px; padding: 10px; margin-bottom: 5px;" disabled><br>

                        <?php
                        if(isset($_SESSION['pass_set']))
                        {
                            if ($_SESSION['pass_set']==1) {
                                echo "<p style='color: red; margin-bottom:5px; margin-top:0px; padding:0px;'>* Email or Password is Wrong!</p>";
                                $_SESSION['pass_set']=0;
                            }
                        }
                        ?>



                        <button type="submit" class="btn roberto-btn mb-50" id="login" disabled style="width:100%; margin-bottom: 10px;">Log in</button>
                        
                        <div style="text-align: center; width: 100%; margin-top: 0px; margin-bottom: 10px;"><a href="fpass.php" style="color: blue;">Forgotten password?</a></div>


                        <div style="border-top: 1px solid black; width: 100%;"></div>
                        <div type="submit" class="btn roberto-btn mb-50" style="width:200px;
                        margin-top: 20px; margin-bottom: 20px;
                        padding: 0px; margin-left: 100px; background-color: grey; color: white;"><a href="signup.php" style="color: white;">
                      Create New Account</a></div>
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
  
