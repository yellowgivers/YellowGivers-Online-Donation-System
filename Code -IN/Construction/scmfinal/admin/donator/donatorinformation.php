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


        <div class="content">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Donor Informations Details</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Donor Name</th>
                                        <th>Donor Address</th>
                                        <th>Donor Email</th>
                                        <th>Donor Phone</th>
                                        <th>Donation Amount</th>
                                        <th>Donor Category</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                             //connect to database
                                                $hostname = 'localhost';
                                                $username = 'root';
                                                $password = '';
                                                $db = 'scmdb';
                                                $connect = mysqli_connect($hostname, $username, $password, $db );

                                                $query = "SELECT * FROM donator";
                                                $result = mysqli_query($connect,$query);
                                                $num = mysqli_num_rows ($result);

                                                if ($num > 0) {

                                                    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
                                                        echo '<tr>
                                                                <td align = "left">'  .  $row['doname']  .  '</td>
                                                                <td align = "left">'  .  $row['doadd']  .  '</td>
                                                                <td align = "left">'  .  $row['doemail']  .  '</td>
                                                                <td align = "left">'  .  $row['dophone']  .  '</td>
                                                                <td align = "left">'  .  $row['doamount']  .  '</td>
                                                                <td align = "left">'  .  $row['docat']  .  '</td>
                                                            </tr>
                                                            ';
                                                        }

                                            mysqli_free_result ($result);

                                            }else{
                                                  echo '<tr>
                                                                <td align = "left">There are currently no donor</td>
                                                                <td align = "left"></td>
                                                                <td align = "left"></td>
                                                                <td align = "left"></td>
                                                                <td align = "left"></td>
                                                                <td align = "left"></td>
                                                            </tr>
                                                            ';
                                            }

                                            mysqli_close ($connect);

                                        ?>
                                    </tbody>
                                </table>

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
