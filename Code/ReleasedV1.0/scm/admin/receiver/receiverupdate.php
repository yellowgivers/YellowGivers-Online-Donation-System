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

    $query = "SELECT * FROM receiver WHERE reID='$id'";
    $result = mysqli_query($connect,$query);

    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result, MYSQL_NUM);
        $reID = $row[0];
        $reNames = $row[1];
        $reAddress = $row[2];
        $reEmail = $row[3];
        $rePhone = $row[4];
        $rePhone = $row[5];
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

    $query = "SELECT * FROM receiver WHERE reID='$id'";
    $result = mysqli_query($connect,$query);    


    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result, MYSQL_NUM);
        $reID = $row[0];
        $reNames = $row[1];
        $reAddress = $row[2];
        $reEmail = $row[3];
        $rePhone = $row[4];
        $rePhone = $row[5];
    }else{
        echo '<h1 id="mainhead">Page Error</h1><p class="error">This page has been accessed in error. err 2</p><p><br  /><br  /></p>';
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

	<title>Update Receiver Informations</title>

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
                    Yellow Givers
                </a>
            </div>
           <ul class="nav">
                <li class="active"><a href="/scm/admin/index.php"><i class="pe-7s-graph"></i><p>Dashboard</p></a></li>
                <li><a data-toggle="collapse" href="#supplier"><i class="pe-7s-users"></i><p>Receiver<b class="caret"></b></p></a>
                    <div class="collapse" id="supplier">
                        <ul class="nav">
                            <li>
                                <a href="/scm/admin/receiver/receiverregister.php"><i class="pe-7s-add-user"></i><p>Receiver Registration</p></a>
                            </li>
                            <li>
                                <a href="/scm/admin/receiver/receiverinformation.php"><i class="pe-7s-note2"></i><p>Receiver Information</p></a>
                            </li>
                        </ul>
                    </div>
                    <li><a data-toggle="collapse" href="#donator"><i class="pe-7s-users"></i><p>Donator<b class="caret"></b></p></a>
                    <div class="collapse" id="donator">
                        <ul class="nav">
                            <li>
                                <a href="/scm/admin/donator/donatorinformation.php"><i class="pe-7s-note2"></i><p>Donator Information</p></a>
                            </li>
                        </ul>
                    </div>
                </li>
                 <li><a data-toggle="collapse" href="#donation"><i class="pe-7s-users"></i><p>Donation<b class="caret"></b></p></a>
                    <div class="collapse" id="donation">
                        <ul class="nav">
                            <li>
                                <a href="/scm/admin/donation/donationinformation.php"><i class="pe-7s-note2"></i><p>Donation Information</p></a>
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
                            <a href="/scm/customer/index.php">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

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

        <script>
           $(function() {

              // We can attach the `fileselect` event to all file inputs on the page
              $(document).on('change', ':file', function() {
                var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
              });

              // We can watch for our custom `fileselect` event like this
              $(document).ready( function() {
                  $(':file').on('fileselect', function(event, numFiles, label) {

                      var input = $(this).parents('.input-group').find(':text'),
                          log = numFiles > 1 ? numFiles + ' files selected' : label;

                      if( input.length ) {
                          input.val(log);
                      } else {
                          if( log ) alert(log);
                      }

                  });
              });
              
            }); 
        </script>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Receiver Update</h4>
                            </div>
                            <div class="content">
                                <form id="myFormId" action="receiverupdate.php" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input id="1" name="reNames" type="text" class="form-control" value="<?php echo $reNames; ?>" placeholder="Company Name" tabindex="1" >
                                                <?php
                                                if (isset($_POST['submitted'])) {
                                                    $errors = array();

                                                    //null value supplierName
                                                    if (empty($_POST['reNames'])) {
                                                        $errors[]='You forget to enter your company name';
                                                    }else{
                                                        $reNames=trim($_POST['reNames']);
                                                    }
                                                    if(!empty($errors)){
                                                        foreach($errors as $msg){
                                                                echo "$msg<br/>\n";
                                                            }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Company Address</label>
                                                <input id="1" name="reAddress" type="text" class="form-control" value="<?php echo $reAddress; ?>" placeholder="Company Address" tabindex="1" >
                                                <?php
                                                if (isset($_POST['submitted'])) {
                                                    $errors = array();

                                                    //null value supplierName
                                                    if (empty($_POST['reAddress'])) {
                                                        $errors[]='You forget to enter your company address';
                                                    }else{
                                                        $reAddress=trim($_POST['reAddress']);
                                                    }
                                                    if(!empty($errors)){
                                                        foreach($errors as $msg){
                                                                echo "$msg<br/>\n";
                                                            }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>   
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Phone</label>
                                                <input id="1" name="rePhone" type="text" class="form-control" value="<?php echo $rePhone; ?>" placeholder="Company Phone" tabindex="1" >
                                                <?php
                                                if (isset($_POST['submitted'])) {
                                                    $errors = array();

                                                    //null value supplierName
                                                    if (empty($_POST['rePhone'])) {
                                                        $errors[]='You forget to enter your company phone';
                                                    }else{
                                                        $rePhone=trim($_POST['rePhone']);
                                                    }
                                                    if(!empty($errors)){
                                                        foreach($errors as $msg){
                                                                echo "$msg<br/>\n";
                                                            }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Company Email</label>
                                                <input id="1" name="reEmail" type="text" class="form-control" value="<?php echo $reEmail; ?>" placeholder="Company Email" tabindex="1" >
                                                <?php
                                                if (isset($_POST['submitted'])) {
                                                    $errors = array();

                                                    //null value supplierName
                                                    if (empty($_POST['reEmail'])) {
                                                        $errors[]='You forget to enter your company email';
                                                    }else{
                                                        $reEmail=trim($_POST['reEmail']);
                                                    }
                                                    if(!empty($errors)){
                                                        foreach($errors as $msg){
                                                                echo "$msg<br/>\n";
                                                            }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Company Category</label>
                                                <div class="dropdown">
                                                    <select class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" name="reCategory">
                                                      <option value="Animal">Animal</option>
                                                      <option value="Education">Education</option>
                                                      <option value="Food & Water">Food & Water</option>
                                                      <option value="Health">Health</option>
                                                    </select>

                                                </div>
                                                <?php
                                                if (isset($_POST['submitted'])) {
                                                    $errors = array();

                                                    //null value supplierName
                                                    if (empty($_POST['reCategory'])) {
                                                        $errors[]='You forget to enter your company category';
                                                        
                                                    }else{
                                                        $reCategory=trim($_POST['reCategory']);
                                                    }
                                                    if(!empty($errors)){
                                                        foreach($errors as $msg){
                                                                echo "$msg<br/>\n";
                                                            }
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div>
                                    <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Update Company</button>
                                    <input type="hidden" name="submitted" value="TRUE" /></div>
                                     <input type = "hidden" name="id" value="<?php echo $reID; ?>" />
                                    <div class="clearfix"></div>
                                    <?php
                                        //start submitted and check null value
                                    if(isset($_POST['submitted'])) {

                                        if (empty($errors)) {
                                            $hostname = 'localhost';
                                            $username = 'root';
                                            $password = '';
                                            $db = 'scmdb';
                                            $connect = mysqli_connect($hostname, $username, $password, $db );

                                            $query = "UPDATE receiver SET reNames = '$reNames', reAddress='$reAddress', rePhone='$rePhone', reEmail='$reEmail', reCategory='$reCategory' WHERE reID ='$id'";
                                            $result = mysqli_query($connect,$query);
                                            if (mysqli_affected_rows($connect)  == 1) {

                                                echo 'The receiver information has been updated.<br/><br/>';

                                            }else{
                                                echo '<h1 id ="mainhead">System Error </h1>
                                                <p class="error" > The receiver information could not be edited due to a system error.
                                                    We apologize for any inconvinience.</p> ';
                                                    echo '<p>' .mysqli_error($connect) . '<br  /><br  />Query: ' .$query. '</p>';
                                                    exit();
                                                }
                                            }else{
                                                echo"errors";
                                                echo '<h1 id ="mainhead">Error!</h1>
                                                <p class ="error">The following error(s) occurred:<br  />';
                                                    foreach($errors as $msg) {
                                                        echo " - $msg<br  />\n";
                                                    }
                                                    echo '</p><p>Please try again.</p><p><br  /></p>';
                                                }
                                        //end update into database  
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
