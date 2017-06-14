<?php
    $noname = $_GET['noname'];
    $noemail = $_GET['noemail'];
    $nosubject = $_GET['nosubject'];
    $nomessage = $_GET['nomessage'];
      //connect to database
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'scmdb';
    $connect = mysqli_connect($hostname, $username, $password, $db );

    //query insert into database
    $query = "INSERT INTO notification (noname, noemail, nosubject, nomessage, nostatus) VALUES ('$noname', '$noemail', '$nosubject', '$nomessage', 'UNREAD')";
    $result = mysqli_query($connect,$query);                                     
    if ($result){
        header ("Location: /scmfinal/index-contact.php");    
        }
        mysqli_free_result ($result);   

     mysqli_close ($connect);
?>