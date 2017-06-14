<?php
    $donacat = $_GET['donacat'];
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
    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/topstyle.css"> <!-- Gem style -->
    <script src="js/modernizr1.js"></script> <!-- Modernizr -->

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

                                                $queryselect = "SELECT adminid FROM admin WHERE adminid = '$ausername' AND password = '$apassword'";
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
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li><a href="index-donatary.php">Donatary</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li>
                                    <a href="index-donatary.php">Donatary Category <span class="badge pull-right">
                                        <?php
                                             $hostname = 'localhost';
                                                $username = 'root';
                                                $password = '';
                                                $db = 'scmdb';
                                                $connect = mysqli_connect($hostname, $username, $password, $db );

                                                $query = "SELECT DISTINCT donacat FROM donatary";
                                                $result = mysqli_query($connect,$query);
                                                $num = mysqli_num_rows ($result);
                                                echo"$num";
                                        ?>   
                                    </span></a>
                                    <ul>
                                       <?php
                                             //connect to database
                                                $hostname = 'localhost';
                                                $username = 'root';
                                                $password = '';
                                                $db = 'scmdb';
                                                $connect = mysqli_connect($hostname, $username, $password, $db );

                                                $query = "SELECT * FROM donatary WHERE donacat = '$donacat'";
                                                $result = mysqli_query($connect,$query);
                                                $num = mysqli_num_rows ($result);

                                                if ($num > 0) {

                                                    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                                                          echo ' <li><a href="index-donatary-search.php?donacat='  . urlencode($row['donacat']) .  '">'  .  $row['donacat']  .  '</a></li>';
                                                      }

                                            mysqli_free_result ($result);

                                            }else{
                                                  echo '<p class = "error">There are currently no registered supplier.</p>';
                                            }

                                            mysqli_close ($connect);

                                        ?>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </div>
                    
                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="banner">
                        <a href="#">
                            <img src="img/banners.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                <strong>Showing</strong><strong> <strong>
                                <?php
                                    $hostname = 'localhost';
                                    $username = 'root';
                                    $password = '';
                                    $db = 'scmdb';
                                    $connect = mysqli_connect($hostname, $username, $password, $db );

                                    $query = "SELECT * FROM donatary";
                                    $result = mysqli_query($connect,$query);
                                    $num = mysqli_num_rows ($result);
                                    echo"$num";
                                ?>      
                                </strong><strong>donatary available</strong>
                            </div>
                        </div>
                    </div>
                    <?php
                     //connect to database
                        $hostname = 'localhost';
                        $username = 'root';
                        $password = '';
                        $db = 'scmdb';
                        $connect = mysqli_connect($hostname, $username, $password, $db );

                        $query = "SELECT * FROM donatary WHERE donacat = '$donacat'";
                        $result = mysqli_query($connect,$query);
                        $num = mysqli_num_rows ($result);
                        echo'<div class="row products">';
                        if ($num > 0) {
                            while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                                
                                    echo'<div class="col-md-4 col-sm-6">';
                                        echo'<div class="product">';
                                            echo'<div class="flip-container">';
                                                echo'<div class="flipper">';
                                                    echo '<tr>
                                                            <td align = "left"><img src="/scmfinal/admin/receiver/images/' . $row['donalogo'] . '" alt="" style="width:250px; height:250px;"></td>
                                                            </tr>';
                                                echo'</div>';
                                            echo'</div>';
                                            echo'<a href="#" class="invisible">';
                                            echo'</a>';
                                            echo'<div class="text">';
                                            echo'<h3><a href="#">'  .  $row['donaname']  .  '</a></h3>';
                                                echo'<p class="price">'  .  $row['donaadd']  .  '</p>';
                                                echo'<p class="price">'  .  $row['donaphone']  .  '</p>';
                                            echo'</div>';
                                        echo'</div>';
                                    echo'</div>';
                                
                            }
                            mysqli_free_result ($result);
                        }else{
                            echo '<p class = "error">There are currently no registered supplier.</p>';
                        }
                         mysqli_close ($connect);
                         echo'</div>';
                                       
                                    
                    
                    ?>
                    <!-- /.products -->
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
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
    <a href="#0" class="cd-top">Top</a>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/main1.js"></script> <!-- Gem jQuery -->
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