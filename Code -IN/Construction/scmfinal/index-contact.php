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
                         <li><a href="index-contact.php">Contact Us</a>
                        </li>
                    </ul>

                </div>

                <div class="col-md-12">
                    <div class="box">
                        <h1>Contact Us </h1>

                        <p class="lead">Are you curious about something? Do you have some kind of problem with the donation? Do you want to become one of our donatary?</p>
                        <p class="lead">Please feel free to contact us, our customer service center is working for you 24/7.</p>
                        
                        <hr>
                        <div class="row">
                            <div class="col-sm-4">
                                <h3><i class="fa fa-map-marker"></i> Address</h3>
                                <p> 06-C1
                                    <br>M-FLOOR
                                    <br>VISTANA CONDOMINIUM
                                    <br>JALAN TAIPING OFF JALAN PAHANG
                                    <br>
                                    <strong>KUALA LUMPUR</strong>
                                   
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-phone"></i> Call center</h3>
                                <p class="text-muted">This number is toll free if calling from Malaysia otherwise we advise you to use the electronic form of communication.</p>
                                <p><strong>+60132010049</strong>
                                </p>
                            </div>
                            <!-- /.col-sm-4 -->
                            <div class="col-sm-4">
                                <h3><i class="fa fa-envelope"></i> Electronic support</h3>
                                <p class="text-muted">Please feel free to write an email to us.</p>
                                <ul>
                                    <li><strong><a href="mailto:">yellowgiversbusiness@gmail.com</a></strong></li>
                                </ul>
                            </div>
                            <!-- /.col-sm-4 -->
                        </div>
                        <hr>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="firstname">Name</label>
                                        <input type="text" class="form-control" id="noname" required>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="noemail" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="subject">Subject</label>
                                        <input type="text" class="form-control" id="nosubject" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea id="nomessage" class="form-control" required></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-12 text-center">
                                    <button type="button" name="Notification" class="btn btn-info btn-fill pull-center" onClick="notification()"><i class="fa fa-envelope-o"></i> Send message</button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <!--function delete -->
                                <script language="javascript">
                                    function notification()
                                    {

                                        var noname = document.getElementById('noname').value;
                                        var noemail = document.getElementById('noemail').value;
                                        var nosubject = document.getElementById('nosubject').value;
                                        var nomessage = document.getElementById('nomessage').value;


                                        if (noname !=""){
                                             if (noemail !=""){
                                                if (nosubject !=""){
                                                    if (nomessage !=""){
                                                            if(confirm("Send Message?")){
                                                                window.location.href='/scmfinal/index-contact-success.php?noname='+noname+' &noemail='+noemail+' &nosubject='+nosubject+' &nomessage=' +nomessage+'';
                                                                return true;
                                                            }
                                                    }else
                                                        alert('Please enter your message !'); 
                                                }else
                                                    alert('Please enter your subject !');
                                            }else
                                                alert('Please enter your email !');
                                        }else
                                            alert('Please enter your name !');
                                        
                                    } 
                                </script>
                        </form>
                    </div>
                </div>
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
