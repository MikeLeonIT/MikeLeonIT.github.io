<?php 
//date_default_timezone_set('Etc/UTC');
require_once 'PHPMailer/PHPMailerAutoload.php';
if(isset($_POST['submit']) && isset($_POST['email'])&& isset($_POST['message']))
{ 

    if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
    {
        //SHOW ERROR MESSAGE
    }
    else
    {
        $mail = new PHPMailer(true);                          // Passing `true` enables exceptions

        //Server settings
        $mail->SMTPDebug = 1;                                 // Enable verbose debug output
        $mail->isSMTP(true);                                  // Set mailer to use SMTP
        $mail->Host = 'smtp.Gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'luckynath4@gmail.com';             // SMTP username
        $mail->Password = 'zedlucky@lucky';                   // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to,25,587-tls,465-ssl.
        //$mail->AddCC($_POST['email'],$_POST['name']);
        $mail->WordWrap = 50;

        //Recipients
        $mail->setFrom($_POST['email'],$_POST['name']);
        $mail->addAddress("mikeleonit@yandex.ru","PROREX");    // Add a recipient


        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "PROREX CONTACT";
        $mail->Body = "<h3>".$_POST['message']."</h3>";

         if( $mail->send())
         {
             //echo "email was send";
             echo '<script language="javascript">';
             echo 'alert("message successfully sent")';
             echo '</script>';
             header("Refresh:3; url=index.php");

             exit();
         }
         else
         {
             echo 'Mailer error: ' . $mail->ErrorInfo;
         }   


    }   
}
?>   