<?php
    $doname = $_GET['doname'];
    $doadd = $_GET['doadd'];
    $doemail = $_GET['doemail'];
    $dophone = $_GET['dophone'];
    $doamount = $_GET['doamount'];
    $docat = $_GET['docat'];
      //connect to database
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'scmdb';
    $connect = mysqli_connect($hostname, $username, $password, $db );

    //query insert into database
    $query = "INSERT INTO donator (doname, doadd, doemail, dophone, doamount, docat) VALUES ('$doname', '$doadd', '$doemail', '$dophone', '$doamount', '$docat' )";
    $result = mysqli_query($connect,$query);                                     
    if ($result){
        $queryselect = "SELECT * FROM fund WHERE funcat='$docat'";
        $resultselect = mysqli_query($connect,$queryselect);
        $numselect = mysqli_num_rows ($resultselect);
        if ($numselect > 0) {
            while ($row = mysqli_fetch_array($resultselect, MYSQL_ASSOC)) {
                $funamount = $row['funamount'];
                $funttlamount = $funamount + $doamount;
                $queryupdate = "UPDATE fund SET funamount = '$funttlamount'  WHERE funcat='$docat' ";
                $resultupdate = mysqli_query($connect,$queryupdate);
            }
            mysqli_free_result ($resultselect);
        }
            mysqli_close ($connect);
    }

                require 'phpmailer/PHPMailerAutoload.php';
                $email = "karimmahmud6962@gmail.com";                    
                $password = "orglol1992";
                $to_id =  $doemail; 
                $message = "<h2>Thank You.</h2><br><h4>On behalf of all of us at Yellow Givers,<br><br>We want to thank you for your generous donation. May your donation help us to build a better world to live in. <br><br>Thank you once again.<h4>";
                $subject = "Donation Success";
                

                $mail = new PHPMailer;

                $mail->isSMTP();

                $mail->Host = 'smtp.gmail.com';

                $mail->Port = 587;

                $mail->SMTPSecure = 'tls';

                $mail->SMTPAuth = true;

                $mail->Username = $email;

                $mail->Password = $password;

                $mail->setFrom('from@example.com', 'yellowgiversbusiness@gmail.com');

                $mail->addReplyTo('replyto@example.com', 'First Last');

                $mail->addAddress($to_id);

                $mail->Subject = $subject;

                $mail->msgHTML($message);

                if (!$mail->send()) {
                    $error = "Mailer Error: " . $mail->ErrorInfo;
                    ?><script>alert('<?php echo $error ?>');</script><?php
                }else {
                    echo '<script>alert("Message sent!");</script>';
                }
            //end email function

?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TeeON: Online Tshirt Printing Services">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">
    <meta http-equiv="refresh" content="3;url=http://localhost/scmfinal/index.php">

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
                    <img src="logos.jpg" alt="TeeON logo" class="hidden-xs">
                    <img src="logos-small.jpg" alt="TeeON logo" class="visible-xs"><span class="sr-only">TeeON - go to homepage</span>
                </a>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="/scmfinal/index.php">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="/scmfinal/index-donation.php"  data-hover="dropdown" data-delay="200">Donation</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="/scmfinal/index-donatary.php" data-hover="dropdown" data-delay="200">Donatary</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="/scmfinal/index-contact.php" data-hover="dropdown" data-delay="200">Contact</a>
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
                        <li><a href="/scmfinal/index.php">Home</a>
                        </li>
                        <li><a href="#">Donate Success</a></li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form method="post" action="#">
                            <h1>Thank You</h1>
                            <h4><p>On behalf of all of us at Yellow Givers, we want to thank you for your generous donation. May your donation help us to build a better world to live in. Thank You.</p></h4>
                           
                        </form>

                    </div>
                    <!-- /.box -->
                </div>
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