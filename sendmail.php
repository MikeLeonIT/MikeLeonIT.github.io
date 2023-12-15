<?php

require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

if (!error_get_last()) {

    $name = $_POST['name'] ;
    $email = $_POST['email'];
    $text = $_POST['message'];
    $file = $_FILES['myfile'];
    $title = "Заголовок письма";
    $body = "
    <h2>Новое письмо</h2>
    <b>Имя:</b> $name<br>
    <b>Почта:</b> $email<br><br>
    <b>Сообщение:</b><br>$text
    ";
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['data']['debug'][] = $str;};
    $mail->Host       = 'smtp.gmail.com';
    $mail->Username   = 'leonovmikhail010291@gmail.com';
    $mail->Password   = 'Russia505';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 587;
    $mail->setFrom('username@yandex.ru', 'Name');
    $mail->addAddress('mikeleonit@yandex.ru');  
    $mail->addAddress('leonovmikhail010291@gmail.com');

    if (!empty($file['name'][0])) {
        for ($i = 0; $i < count($file['tmp_name']); $i++) {
            if ($file['error'][$i] === 0) 
                $mail->addAttachment($file['tmp_name'][$i], $file['name'][$i]);
        }
    }

    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;    
    if ($mail->send()) {
        $data['result'] = "success";
        $data['info'] = "Сообщение успешно отправлено!";
    } else {
        $data['result'] = "error";
        $data['info'] = "Сообщение не было отправлено. Ошибка при отправке письма";
        $data['desc'] = "Причина ошибки: {$mail->ErrorInfo}";
    }
    
} else {
    $data['result'] = "error";
    $data['info'] = "В коде присутствует ошибка";
    $data['desc'] = error_get_last();
}

header('Content-Type: application/json');
echo json_encode($data);

?>