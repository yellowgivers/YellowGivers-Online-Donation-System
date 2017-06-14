<?php
if ((isset($_GET['id'])) && (is_numeric($_GET['id'])) ){
    $id = $_GET['id'];
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'TeeONDBS';
    $connect = mysqli_connect($hostname, $username, $password, $db );


                    //Post Function
}elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
    $id = $_POST['id'];
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'TeeONDBS';
    $connect = mysqli_connect($hostname, $username, $password, $db );

}else{
    echo '<h1 id="mainhead">Page Error</h1><p class = "error">This page has been accessed in error. err3</p><p><br  /><br/  ></p>';
    exit();
}
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
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="index-register.php">Register</a>
                    </li>
                    <li><a href="#">Contact</a>
                    </li>
                </ul>
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
                                            $db = 'TeeONDBS';
                                            $connect = mysqli_connect($hostname, $username, $password, $db );
                                                
                                            //error empty
                                            if(empty($errors)){

                                                $queryselect = "SELECT aid FROM admin WHERE ausername = '$ausername' AND apassword = '$apassword'";
                                                $result = mysqli_query($connect,$queryselect) ;
                                                $row = mysqli_fetch_array($result, MYSQL_ASSOC);
                                                        
                                                if($row){
                                                    echo "<script> window.location.assign(' /fyp/customer/admin/dashboard.php'); </script>";
                                                }else{
                                                    $errors[] = 'The username and password entered do not match.'; // Public message
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

        <!--customer login-->
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <input name="cusemail" type="text" class="form-control" placeholder="email">
                                <?php
                                    //null value username
                                    if (isset($_POST['customer'])) {
                                        $errors = array();

                                        if (empty($_POST['cusemail'])) {
                                            $errors[]='You forget to enter your email address';
                                        }else{
                                            $cusemail=trim($_POST['cusemail']);
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
                                <input name="cuspassword" type="password" class="form-control" id="password-modal" placeholder="password">
                                <?php
                                    //null value username
                                    if (isset($_POST['customer'])) {
                                        $errors = array();

                                        //null value password
                                        if (empty($_POST['cuspassword'])) {
                                            $errors[]='You forget to enter password';
                                        }else{
                                            $cuspassword=trim($_POST['cuspassword']);
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
                                <input type="hidden" name="customer" value="TRUE" id="2" />
                            </p>
                            <?php
                                        if (isset($_POST['customer'])) {

                                           //connect to database
                                            $hostname = 'localhost';
                                            $username = 'root';
                                            $password = '';
                                            $db = 'TeeONDBS';
                                            $connect = mysqli_connect($hostname, $username, $password, $db );
                                                
                                            //error empty
                                            if(empty($errors)){

                                                $queryselect = "SELECT cusid FROM customer WHERE cusemail = '$cusemail' AND cuspassword = '$cuspassword'";
                                                $result = mysqli_query($connect,$queryselect) ;
                                                $row = mysqli_fetch_array($result, MYSQL_ASSOC);
                                                        
                                                if($row){
                                                    session_name ('customer');
                                                    session_start();
                                                    $_SESSION['cusid'] = $row['cusid'];
                                                }else{
                                                    $errors[] = 'The username and password entered do not match.'; // Public message
                                                }       
                                            }
                                            
                                            mysqli_close($connect);    
                                        }
                                    ?>          
                                    <!-- end add data to database -->

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="index-register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

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
                        <a href="index-product-category.php"  data-hover="dropdown" data-delay="200">Product</a>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="index-template-category.php" data-hover="dropdown" data-delay="200">Template</a>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="/fyp/customer/teeon/canvas/index-product-design.php" data-hover="dropdown" data-delay="200">Design</a>
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
                        <li><a href="index-product-category.php">Template</a>
                        </li>
                        <li><a href="#">
                            <?php
                                             //connect to database
                            $hostname = 'localhost';
                            $username = 'root';
                            $password = '';
                            $db = 'TeeONDBS';
                            $connect = mysqli_connect($hostname, $username, $password, $db );

                            $query = "SELECT DISTINCT tempname FROM template WHERE tempid='$id'";
                            $result = mysqli_query($connect,$query);
                            $num = mysqli_num_rows ($result);
                            if ($num > 0) {

                                while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                                  echo $row['tempname'] ;
                              }

                              mysqli_free_result ($result);

                          }else{
                              echo '<p class = "error">There are currently no registered template.</p>';
                          }

                          mysqli_close ($connect);

                          ?>
                        </a></li>
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
                                    <a href="#">Template Category <span class="badge pull-right">
                                        <?php
                                             $hostname = 'localhost';
                                                $username = 'root';
                                                $password = '';
                                                $db = 'TeeONDBS';
                                                $connect = mysqli_connect($hostname, $username, $password, $db );

                                                $query = "SELECT DISTINCT tempcategory FROM template";
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
                                                $db = 'TeeONDBS';
                                                $connect = mysqli_connect($hostname, $username, $password, $db );

                                                $query = "SELECT DISTINCT tempcategory FROM template";
                                                $result = mysqli_query($connect,$query);
                                                $num = mysqli_num_rows ($result);

                                                if ($num > 0) {

                                                    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                                                          echo ' <li><a href="#">'  .  $row['tempcategory']  .  '</a></li>';
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
                </div>

                <div class="col-md-9">
                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                            <?php
                                //connect to database
                                $hostname = 'localhost';
                                $username = 'root';
                                $password = '';
                                $db = 'TeeONDBS';
                                $connect = mysqli_connect($hostname, $username, $password, $db );

                                $query = "SELECT tempimage FROM template WHERE tempid='$id'";
                                $result = mysqli_query($connect,$query);
                                $num = mysqli_num_rows ($result);
                               
                                while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                                   echo'<img src="/fyp/customer/admin/template/images/'.$row['tempimage'].'" alt="" class="img-responsive">';
                              }
                            ?>  
                            </div>
                            
                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <form action="#" method="post">

                                    <h2 class="text-center">
                                        <?php
                                             //connect to database
                                                $hostname = 'localhost';
                                                $username = 'root';
                                                $password = '';
                                                $db = 'TeeONDBS';
                                                $connect = mysqli_connect($hostname, $username, $password, $db );

                                                $query = "SELECT tempname FROM template WHERE tempid='$id'";
                                                $result = mysqli_query($connect,$query);
                                                $num = mysqli_num_rows ($result);

                                                if ($num > 0) {

                                                    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                                                          echo  $row['tempname'];
                                                          $cproname = $row['tempname'];
                                                      }

                                            mysqli_free_result ($result);

                                            }else{
                                                  echo '<p class = "error">There are currently no registered template.</p>';
                                            }

                                            mysqli_close ($connect);

                                        ?>
                                    </h2>
                                    <h3 class="text-center">
                                    <?php
                                                 //connect to database
                                        $hostname = 'localhost';
                                        $username = 'root';
                                        $password = '';
                                        $db = 'TeeONDBS';
                                        $connect = mysqli_connect($hostname, $username, $password, $db );

                                        $query = "SELECT DISTINCT tempcategory FROM template WHERE tempid='$id'";
                                        $result = mysqli_query($connect,$query);
                                        $num = mysqli_num_rows ($result);

                                        if ($num > 0) {

                                            while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                                              echo  $row['tempcategory'];
                                              $cprotype = $row['tempcategory'];
                                            }
                                            mysqli_free_result ($result);
                                        }else{
                                          echo '<p class = "error">There are currently no registered template.</p>';
                                        }
                                        mysqli_close ($connect);
                                    ?>
                                    </h3>
                                </form>
                            </div>
                            <p> <?php
                                //connect to database
                                $hostname = 'localhost';
                                $username = 'root';
                                $password = '';
                                $db = 'TeeONDBS';
                                $connect = mysqli_connect($hostname, $username, $password, $db );

                                $query = "SELECT tempimage FROM template WHERE tempid='$id'";
                                $result = mysqli_query($connect,$query);
                                $num = mysqli_num_rows ($result);
                                echo'<div class="row" id="thumbs">';
                                if ($num > 0) {
                                    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                                        echo'<div class="col-xs-2">';
                                            echo'<a href="/fyp/customer/admin/template/images/'.$row['tempimage'].'" class="thumb">';
                                                echo'<img src="/fyp/customer/admin/template/images/'.$row['tempimage'].'" alt="" class="img-responsive">';
                                            echo'</a>';
                                        echo'</div>';
                                    }
                                       mysqli_free_result ($result);
                                }else{
                                        echo '<p class = "error">There are currently no registered template.</p>';
                                }
                                echo'</div>';
                                mysqli_close ($connect);
                                    
                                ?></p>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                <div class="col-md-3 col-sm-6">
                         <h4>User section</h4>
                        <ul>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                            </li>
                            <li><a href="index-register.php">Register</a>
                            </li>
                        </ul>
                        <hr class="hidden-md hidden-lg hidden-sm">
                    </div>
                    <div class="col-md-3 col-sm-6 ">
                        <h4>Pages</h4>
                        <ul>
                            <li><a href="#">About us</a>
                            </li>
                            <li><a href="#">Terms and conditions</a>
                            </li>
                            <li><a href="#">FAQ</a>
                            </li>
                            <li><a href="#">Contact us</a>
                            </li>
                        </ul>
                        <hr class="hidden-md hidden-lg hidden-sm">
                    </div>
                    <div class="col-md-3 col-sm-6 ">

                        <h4>Where to find us</h4>

                        <p><strong>TeeON</strong>
                            <br>Jalan Tun Razak
                            <br>Taman Indah
                            <br>35900 Tanjong Malim
                            <br>Perak Darul Ridzuan
                            <br>
                            <strong>Malaysia</strong>
                        </p>
                        <hr class="hidden-md hidden-lg">
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h4>Get the news</h4>
                        <p class="text-muted">Subscribes to our newsletter to get more awesome deals and discount.</p>
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
                                 <button class="btn btn-default" type="button">Subscribe!</button>
                             </span>
                         </div>
                         <!-- /input-group -->
                     </form>
                        <hr class="hidden-md hidden-lg">
                    </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->
        <!-- *** FOOTER END *** -->
        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2017 Muhammad Shahzwan Bin Mohd Zaki.</p>
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