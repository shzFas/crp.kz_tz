<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);
    $mail->setFrom('www@www.com', '123321');
    $mail->addAddress('site@crp.kz');
    $mail->Subject = 'Добрый день';
    $body = '<h1>Заявка</h1>';
    if(trim(!empty($_POST['name']))){
    $body.='<p><strong>ФИО:</strong> '.$_POST['name'].'</p>';
    }
    if(trim(!empty($_POST['phone']))){
    $body.='<p><strong>Телефон:</strong> '.$_POST['phone'].'</p>';
    }

    $mail->Body = $body;

    if (!$mail->send()) {
    $message = 'Ошибка';
    } else {
    $message = 'Данные отправлены!';
    }
    $response = ['message' => $message];
    header('Content-type: application/json');
    echo json_encode($response);

?>