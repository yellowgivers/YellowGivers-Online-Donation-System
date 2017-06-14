<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Send email via Gmail SMTP server in PHP</title>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="main">
            <h1>Send Email via Gmail SMTP Server in PHP</h1>
            <div id="login">
                <h2>Send Email</h2>
                <hr/>
                <form action="index.php" method="post">
                    <input type="text" placeholder="To : Email Id " name="toid"/>  
                    <input type="text" placeholder="Subject : " name="subject"/>
                    <textarea rows="4" cols="50" placeholder="Enter Your Message..." name="message"></textarea>
                    <input type="submit" value="Send" name="send"/>
                </form>    
            </div>
        </div>
          <?php
        
              require 'phpmailer/PHPMailerAutoload.php';
              if(isset($_POST['send']))
                  {
                    $email = "karimmahmud6962@gmail.com";                    
                    $password = "orglol1992";
                    $to_id = $_POST['toid'];
                    $message = $_POST['message'];
                    $subject = $_POST['subject'];

                    $mail = new PHPMailer;

                    $mail->isSMTP();

                    $mail->Host = 'smtp.gmail.com';

                    $mail->Port = 587;

                    $mail->SMTPSecure = 'tls';

                    $mail->SMTPAuth = true;

                    $mail->Username = $email;

                    $mail->Password = $password;

                    $mail->setFrom('from@example.com', 'teeonBusinees@gmail.com');

                    $mail->addReplyTo('replyto@example.com', 'First Last');

                    $mail->addAddress($to_id);

                    $mail->Subject = $subject;

                    $mail->msgHTML($message);

                    if (!$mail->send()) {
                       $error = "Mailer Error: " . $mail->ErrorInfo;
                        ?><script>alert('<?php echo $error ?>');</script><?php
                    } 
                    else {
                       echo '<script>alert("Message sent!");</script>';
                    }
               }
        ?>
    </body>
</html>
