<?php


 if ((isset($_GET['id'])) && (is_numeric($_GET['id'])) ){
    $id = $_GET['id'];
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'scmdb';
    $connect = mysqli_connect($hostname, $username, $password, $db );

    $query = "SELECT * FROM notification WHERE noid='$id'";
    $result = mysqli_query($connect,$query);

    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result, MYSQL_NUM);
        $noid = $row[0];
        $noname = $row[1];
        $noemail = $row[2];
        $nosubject = $row[3];
        $nomessage = $row[4];
        $nostatus = $row[5];

        $queryup = "UPDATE notification SET nostatus = 'READ' WHERE noid ='$id'";
        $resultup = mysqli_query($connect,$queryup);
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

    $query = "SELECT * FROM notification WHERE noid='$id'";
    $result = mysqli_query($connect,$query);    


    if (mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result, MYSQL_NUM);
        $noid = $row[0];
        $noname = $row[1];
        $noemail = $row[2];
        $nosubject = $row[3];
        $nomessage = $row[4];
        $nostatus = $row[5];

         $queryup = "UPDATE notification SET nostatus = 'READ' WHERE noid ='$id'";
        $resultup = mysqli_query($connect,$queryup);

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
                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="firstname">Name</label>
                                            <input type="text" class="form-control" id="noname" value="<?php echo $noname;?>" readonly>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="noemail" value="<?php echo $noemail;?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <input type="text" class="form-control" id="nosubject" value="<?php echo $nosubject;?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea id="nomessage" class="form-control"  readonly><?php echo $nomessage;?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                           <button type="button" name="delete" class="btn btn-info btn-fill pull-center" onClick="deleteme(<?php echo $id;?>)"><i class="fa fa-trash" aria-hidden="true"></i> Delete Message</button>
                                            <div class="clearfix"></div>
                                    </div>
                                </div>
                                <script language="javascript">
                                    function deleteme(id)
                                    {
                                        if(confirm("Do you want Delete!")){
                                            window.location.href='notification-delete.php?id=' +id+'';
                                            return true;
                                        }
                                    } 
                                </script>
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
