<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'scmdb';
    $connect = mysqli_connect($hostname, $username, $password, $db );

    $query = "DELETE FROM notification WHERE noid ='".$_GET['id']."'";
    $result = mysqli_query($connect,$query);

    header ("Location: /scmfinal/admin/index.php");
?>