<?php
//start display information from database
//Get function

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
//end display information from database


?> 

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>YELLOW GIVERS</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-1.jpg">
        <div class="sidebar-wrapper ps-container ps-theme-default ps-active-y" >
            <div class="logo">
                <a href="#" class="simple-text">
                    Yellow Givers
                </a>
            </div>
            <ul class="nav">
                <li class="active"><a href="/scmfinal/admin/index.php"><i class="pe-7s-graph"></i><p>Dashboard</p></a></li>
                <li><a data-toggle="collapse" href="#donation"><i class="pe-7s-users"></i><p>Donation<b class="caret"></b></p></a>
                    <div class="collapse" id="donation">
                        <ul class="nav">
                            <li>
                                <a href="/scmfinal/admin/donation/donationregister.php"><i class="pe-7s-add-user"></i><p>Donation Registration</p></a>
                            </li>
                            <li>
                                <a href="/scmfinal/admin/donation/donationinformation.php"><i class="pe-7s-note2"></i><p>Donation Information</p></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a data-toggle="collapse" href="#supplier"><i class="pe-7s-users"></i><p>Donatary<b class="caret"></b></p></a>
                    <div class="collapse" id="supplier">
                        <ul class="nav">
                            <li>
                                <a href="/scmfinal/admin/receiver/receiverregister.php"><i class="pe-7s-add-user"></i><p>Donatary Registration</p></a>
                            </li>
                            <li>
                                <a href="/scmfinal/admin/receiver/receiverinformation.php"><i class="pe-7s-note2"></i><p>Donatary Information</p></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a data-toggle="collapse" href="#donator"><i class="pe-7s-users"></i><p>Donor<b class="caret"></b></p></a>
                    <div class="collapse" id="donator">
                        <ul class="nav">
                            <li>
                                <a href="/scmfinal/admin/donator/donatorinformation.php"><i class="pe-7s-note2"></i><p>Donor Information</p></a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a data-toggle="collapse" href="#fund"><i class="pe-7s-users"></i><p>YL Fund<b class="caret"></b></p></a>
                    <div class="collapse" id="fund">
                        <ul class="nav">
                            <li>
                                <a href="/scmfinal/admin/fund/fundinformation.php"><i class="pe-7s-note2"></i><p>YL Fund</p></a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Yellow Givers Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        
                        <li>
                            <a href="/scmfinal/index.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <script>
            (function() {
        
            // Create input element for testing
            var inputs = document.createElement('input');
            
            // Create the supports object
            var supports = {};
            
            supports.autofocus   = 'autofocus' in inputs;
            supports.required    = 'required' in inputs;
            supports.placeholder = 'placeholder' in inputs;
        
            // Fallback for autofocus attribute
            if(!supports.autofocus) {
                
            }
            
            // Fallback for required attribute
            if(!supports.required) {
                
            }
        
            // Fallback for placeholder attribute
            if(!supports.placeholder) {
                
            }
            
            // Change text inside send button on submit
            var send = document.getElementById('register-submit');
            if(send) {
                send.onclick = function () {
                    this.innerHTML = '...Sending';
                }
            }
        
        })();
        </script>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Delete Receiver Details</h4>
                            </div>
                            <div class="content">
                                <form id="myFormId" action="donationdelete.php" method="post">
                                    <div class="row">     
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Donation Category</label>
                                                <div class="dropdown">
                                                    <select class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" name="doncat" disabled>
                                                      <option><?php echo $doncat;?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Donation Title</label>
                                                <input name="dondesc" type="text" class="form-control" value="<?php echo $dondesc;?>" placeholder="Donation Title" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Donation Description</label>
                                                <input id="1" name="dondesc1" type="text" class="form-control" value="<?php echo $dondesc1;?>"  placeholder="Donation Description" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Donation Image</label>
                                            <div class="input-group">
                                                <input id="3" type="text"  class="form-control" value="<?php echo $donimage;?>" readonly>
                                                <label class="input-group-btn">
                                                    <span class="btn btn-primary">
                                                        Browse&hellip; <input type="file" name="donimage"   style="display: none;" multiple>
                                                    </span>
                                                </label> 
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Delete Company</button> 
                                        <input type="hidden" name="submitted" value="TRUE" />
                                    </div>
                                    <input type = "hidden" name="id" value="<?php echo $donid; ?>" />
                                    <div class="clearfix"></div>
                                    <?php
                                        //start submitted and check null value
                                        if(isset($_POST['submitted'])) {

                                        $hostname = 'localhost';
                                        $username = 'root';
                                        $password = '';
                                        $db = 'scmdb';
                                        $connect = mysqli_connect($hostname, $username, $password, $db );
                                        $query = "DELETE FROM donation WHERE donid = '$id'";
                                        $result = mysqli_query($connect,$query);

                                        
                                        if (mysqli_affected_rows($connect) == 1) {

                                                echo '<h3 id ="mainhead">The donation informations has been deleted</h3>';

                                            }
                                        }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
