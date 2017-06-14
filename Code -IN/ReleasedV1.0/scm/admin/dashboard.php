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
    <div class="sidebar" data-color="black">
    	<div class="sidebar-wrapper ps-container ps-theme-default ps-active-y" >
            <div class="logo">
                <a href="#" class="simple-text">
                    YELLOW GIVERS
                </a>
            </div>
            <ul class="nav">
                <li class="active"><a href="/scm/admin/dashboard.php"><i class="pe-7s-graph"></i><p>Dashboard</p></a></li>                
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
               
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Admin Login</h4>
                                <form  action="" method="post">
                                <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Admin ID</label>
                                                <input name="adminID" type="text" class="form-control" value="" placeholder="Admin ID" tabindex="1" >
                                                <?php
                                                if (isset($_POST['submitted'])) {
                                                    $errors = array();

                                                    //null value supplierName
                                                    if (empty($_POST['adminID'])) {
                                                        $errors[]='You forget to enter your admin identification';
                                                    }else{
                                                        $adminID = trim($_POST['adminID']);
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
                                                <label>Admin Password</label>
                                                <input name="password1" type="password" class="form-control" value="" placeholder="Admin Password" tabindex="2" >
                                                <?php
                                                if (isset($_POST['submitted'])) {
                                                    $errors = array();

                                                    //null value supplierName
                                                    if (empty($_POST['password1'])) {
                                                        $errors[]='You forget to enter your admin password';
                                                    }else{
                                                        $password1 = trim($_POST['password1']);
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
                                                <input type="hidden" name="submitted" value="TRUE" />
                                                <?php
                                                    if (isset($_POST['submitted'])) {
                                                        if(empty($errors)){

                                                       //connect to database
                                                        $hostname = 'localhost';
                                                        $username = 'root';
                                                        $password = '';
                                                        $db = 'scmdb';
                                                        $connect = mysqli_connect($hostname, $username, $password, $db );
                                                        

                                                        $query = "SELECT * FROM admin WHERE adminID = '$adminID' AND password = '$password1'";
                                                        $result = mysqli_query($connect,$query) ;
                                                        $row = mysqli_fetch_array($result, MYSQL_ASSOC);                                                                    
                                                        if($row['adminID'] == $adminID && $row['password'] == $password1){
                                                            header("location: index.php");
                                                        }else{
                                                            $errors[]='The username and password entered do not match.';
                                                            foreach($errors as $msg){
                                                                echo "$msg<br/>\n";
                                                            }
                                                                
                                                        } 
                                                        mysqli_close($connect);   
                                                        } 
                                                    }
                                                ?>        
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="content">
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

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();


    	});
	</script>

</html>
