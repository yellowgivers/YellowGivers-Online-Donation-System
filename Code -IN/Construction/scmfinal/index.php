<?php
session_name ('customer');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Yellow Givers">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Yellow Givers
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <link rel="stylesheet" href="topstyles.css" />

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">

    <style>
        body {
            background-image: url("b.png");
        }
    </style>


</head>

<body>

    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                <a href="#" class="btn btn-success btn-sm" data-animate-hover="shake" data-toggle="modal" data-target="#admin-modal">Admin</a>
            </div>
        </div>

        <!--admin login-->
        <div class="modal fade" id="admin-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Admin login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <input name="ausername" type="text" class="form-control" placeholder="Username">
                                <?php
                                    //null value username
                                    if (isset($_POST['admin'])) {
                                        $errors = array();

                                        if (empty($_POST['ausername'])) {
                                            $errors[]='You forget to enter your username';
                                        }else{
                                            $ausername=trim($_POST['ausername']);
                                        }

                                        if(!empty($errors)){
                                            foreach($errors as $msg){
                                                echo "$msg<br/>\n";
                                            }
                                       }
                                    }
                                ?>
                            </div>
                            <div class="form-group">
                                <input name="apassword" type="password" class="form-control" id="password-modal" placeholder="Password">
                                 <?php
                                    //null value username
                                    if (isset($_POST['admin'])) {
                                        $errors = array();

                                        //null value password
                                        if (empty($_POST['apassword'])) {
                                            $errors[]='You forget to enter password';
                                        }else{
                                            $apassword=trim($_POST['apassword']);
                                        }

                                        if(!empty($errors)){
                                            foreach($errors as $msg){
                                                echo "$msg<br/>\n";
                                            }
                                       }
                                    }
                                ?>
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                                 <input type="hidden" name="admin" value="TRUE" />
                            </p>
                            <?php
                                        if (isset($_POST['admin'])) {

                                           //connect to database
                                            $hostname = 'localhost';
                                            $username = 'root';
                                            $password = '';
                                            $db = 'scmdb';
                                            $connect = mysqli_connect($hostname, $username, $password, $db );
                                                
                                            //error empty
                                            if(empty($errors)){

                                                $queryselect = "SELECT * FROM admin WHERE adminID = '$ausername' AND password = '$apassword'";
                                                $result = mysqli_query($connect,$queryselect) ;
                                                $row = mysqli_fetch_array($result, MYSQL_ASSOC);
                                                        
                                                if($row){
                                                    echo "<script> window.location.assign(' /scmfinal/admin/index.php'); </script>";
                                                }else{
                                                     echo '<script language="javascript">';
                                                    echo 'alert("Invalid Email Address or Password used !")';
                                                    echo '</script>';
                                                }       
                                            }
                                            
                                            mysqli_close($connect);    
                                        }
                                    ?>          
                                    <!-- end add data to database -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
                    <img src="img/logos.jpg" alt="TeeON logo" class="hidden-xs">
                    <img src="img/logos-small.jpg" alt="TeeON logo" class="visible-xs"><span class="sr-only">TeeON - go to homepage</span>
                </a>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="index.php">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="index-donation.php"  data-hover="dropdown" data-delay="200">Donation</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="index-donatary.php" data-hover="dropdown" data-delay="200">Donatary</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="index-contact.php" data-hover="dropdown" data-delay="200">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->



    <div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="img/ms551.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/ms1.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/ms33.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/ms4.jpg" alt="">
                        </div>
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-shopping-cart"></i>
                                </div>

                                <h3><a href="#">WE SHOP THE GOODS</a></h3>
                                <p>Have no worries on the needs for the needy because we got it covered. We associated with IKEA, Tesco, Aeon Big and Lazada for all the goods</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-laptop"></i>
                                </div>

                                <h3><a href="#">USER FRIENDLY WEBSITE</a></h3>
                                <p>We design a responsive user friendly web-based system for the donor and the receiver. Communication will always be smooth and steady.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-lock"></i>
                                </div>

                                <h3><a href="#">GENUINE AND SECURED</a></h3>
                                <p>We team up with UNICEF and REDHAT to make it more wide and faster than ever. Any transaction made is secured and precisely to the exact agency.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

        </div>
        <!-- /#content -->
        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2017 Yellow Givers.</p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->
    </div>
    <!-- /#all -->

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>


</body>

</html>