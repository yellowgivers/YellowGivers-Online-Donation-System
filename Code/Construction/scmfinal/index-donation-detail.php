<?php
    $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
    $paypal_email = 'yellowgiversbusiness@gmail.com';

     if ((isset($_GET['id'])) && (is_numeric($_GET['id'])) ){
        $id = $_GET['id'];
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $db = 'scmdb';
        $connect = mysqli_connect($hostname, $username, $password, $db );

        $query = "SELECT * FROM donation WHERE donid='$id'";
        $result = mysqli_query($connect,$query);
        if (mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result, MYSQL_NUM);
            $donid = $row[0];
            $doncat = $row[1];
            $dondesc = $row[2];
            $dondesc1 = $row[3];
            $donimage = $row[4];
        }else{
            echo '<h1 id="mainhead">Page Error</h1>
            <p class="error">This page has been accessed in error. err 1</p><p><br  /><br  /></p>';
        }

                    //Post Function
    }elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
        $id = $_POST['id'];
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $db = 'scmdb';
        $connect = mysqli_connect($hostname, $username, $password, $db );

         $query = "SELECT * FROM donation WHERE donid='$id'";
        $result = mysqli_query($connect,$query);
        if (mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_array($result, MYSQL_NUM);
            $donid = $row[0];
            $doncat = $row[1];
            $dondesc = $row[2];
            $dondesc1 = $row[3];
            $donimage = $row[4];
        }else{
            echo '<h1 id="mainhead">Page Error</h1>
            <p class="error">This page has been accessed in error. err 1</p><p><br  /><br  /></p>';
        }

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
                        <li><a href="index-donation-detail.php">Donation Details</a>
                        </li>
                        
                    </ul>

                </div>

                <div class="col-md-5">
                    <div class="panel panel-default sidebar-menu">
                        <div class="panel-body">
                            <form action="#" method="post">
                                <div class="form-group">
                                    <label><strong>Donor Name</strong></label>
                                    <input id="doname" type="text" class="form-control" name="doname" placeholder="Donor Name" required>
                                </div>
                                <div class="form-group">
                                    <label><strong>Donor Address</strong></label>
                                    <input id="doadd" type="text" class="form-control" name="doadd" placeholder="Donor Address" required>
                                </div>
                                <div class="form-group">
                                    <label><strong>Donor Email</strong></label>
                                    <input id="doemail" type="text" class="form-control" name="doemail" placeholder="Donor Email Address" required>
                                </div>
                                <div class="form-group">
                                    <label><strong>Donor Phone</strong></label>
                                    <input id="dophone" type="text" class="form-control" name="dophone" placeholder="Donor Phone Number" required>
                                </div>
                                 <div class="form-group">
                                    <label><strong>Donotion Amount</strong></label>
                                    <input id="doamount" type="Number" class="form-control" name="doamount" placeholder="Donation Amount" step="1" min="0" max="100" required>
                                </div>
                                <p class="text-center buttons">
                                <button type="button" name="Donate" class="btn btn-info btn-fill pull-center" onClick="donate()"><i class="fa fa-heart" aria-hidden="true"></i>Donate Now</button>
                                <div class="clearfix"></div>
                                
                                <!--function delete -->
                                <script language="javascript">
                                    function donate()
                                    {
                                        <?php
                                                     //connect to database
                                            $hostname = 'localhost';
                                            $username = 'root';
                                            $password = '';
                                            $db = 'scmdb';
                                            $connect = mysqli_connect($hostname, $username, $password, $db );

                                            $query = "SELECT * FROM donation WHERE donid='$id'";
                                            $result = mysqli_query($connect,$query);
                                            $num = mysqli_num_rows ($result);

                                            if ($num > 0) {

                                                while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                                                $doncat =  $row['doncat'];

                                                }
                                                mysqli_free_result ($result);
                                            }else{
                                              
                                            }
                                            mysqli_close ($connect);
                                        ?>

                                        var doname = document.getElementById('doname').value;
                                        var doadd = document.getElementById('doadd').value;
                                        var doemail = document.getElementById('doemail').value;
                                        var dophone = document.getElementById('dophone').value;
                                        var doamount = document.getElementById('doamount').value;
                                        var docat = "<?php echo $doncat ?>";


                                        if (doname !=""){
                                             if (doadd !=""){
                                                if (doemail !=""){
                                                    if (dophone !=""){
                                                        if (doamount !=""){
                                                            if(confirm("Confirm Donate?")){
                                                                window.location.href='/scmfinal/email/index-donation-success.php?doname='+doname+' &doadd='+doadd+' &doemail='+doemail+' &dophone=' +dophone+' &doamount=' +doamount+' &docat='+docat+'';
                                                                return true;
                                                            }
                                                        }else
                                                            alert('Please enter donation amount !'); 
                                                    }else
                                                        alert('Please enter donor phone number !'); 
                                                }else
                                                    alert('Please enter donor email address !');
                                            }else
                                                alert('Please enter donor address !');
                                        }else
                                            alert('Please enter donor donor name !');
                                        
                                    } 
                                </script>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row" id="productMain">
                        <div class="col-sm-86">
                            <div class="box">
                                <h2 class="text-center">
                                    <strong>
                                        <?php
                                             //connect to database
                                                $hostname = 'localhost';
                                                $username = 'root';
                                                $password = '';
                                                $db = 'scmdb';
                                                $connect = mysqli_connect($hostname, $username, $password, $db );

                                                $query = "SELECT * FROM donation WHERE donid='$id'";
                                                $result = mysqli_query($connect,$query);
                                                $num = mysqli_num_rows ($result);

                                                if ($num > 0) {

                                                    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                                                          echo  $row['dondesc'];
                                                      }

                                                mysqli_free_result ($result);

                                                }else{
                                                      
                                                }

                                            mysqli_close ($connect);

                                        ?></strong>
                                </h2>
                                <?php
                                    $hostname = 'localhost';
                                    $username = 'root';
                                    $password = '';
                                    $db = 'scmdb';
                                    $connect = mysqli_connect($hostname, $username, $password, $db );

                                    $query = "SELECT * FROM donation WHERE donid='$id'";
                                    $result = mysqli_query($connect,$query);
                                    $num = mysqli_num_rows ($result);

                                    if ($num > 0) {
                                        while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                                            echo  '<img src="/scmfinal/admin/donation/images/' . $row['donimage'] . '" alt="" style="width:530px; height:auto;">';
                                        }
                                        mysqli_free_result ($result);
                                    }else{
                                        echo '<p class = "error">There are currently no registered product type.</p>';
                                    }
                                    mysqli_close ($connect);
                                ?>
                                 <h4 class="text-center">
                                    <?php
                                                 //connect to database
                                        $hostname = 'localhost';
                                        $username = 'root';
                                        $password = '';
                                        $db = 'scmdb';
                                        $connect = mysqli_connect($hostname, $username, $password, $db );

                                        $query = "SELECT * FROM donation WHERE donid='$id'";
                                        $result = mysqli_query($connect,$query);
                                        $num = mysqli_num_rows ($result);

                                        if ($num > 0) {

                                            while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                                              echo  $row['dondesc1'];
                                              echo "<br>";
                                              echo "<br>";
                                              echo  $row['doncat'];
                                            }
                                            mysqli_free_result ($result);
                                        }else{
                                          
                                        }
                                        mysqli_close ($connect);
                                    ?>
                                </h4>
                            </div>
                        </div>
                    </div>
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