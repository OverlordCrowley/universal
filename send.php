<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$email = $_POST['email'];
// Формирование самого письма
$title = "New appeal Best Tour Plan";
$body = "
<h2>New appeal</h2>
<b>Name:</b> $name<br>
<b>Phone:</b> $phone<br>
<b>Message:</b>&ensp;$message
";
$newsletterTitle = "You have subscribed to the BEST TOUR PLAN newsletter";
$newsletterBody = "<b>Your email:</b>&ensp;$email";
$newnewsletterTtitle = "The person subscribed";
$newnewsletterMe = "You have a new person who signed the newsletter<br> His email:&ensp;$email";
$modalTitle = "New booking request";
$modalMes = "<h2>New booking request</h2>
<b>Name:</b> $name<br>
<b>Phone:</b> $phone<br>
<b>Email:</b> $email<br>
<b>Message:</b>&ensp;$message";
// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    // $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.gmail.com'; // SMTP сервера вашей почты
    $mail->Username   = ''; // Логин на почте
    $mail->Password   = ''; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('', 'Representative of BEST TOUR PLAN'); // Адрес самой почты и имя отправителя

    if (!empty($email)) {
        if (!empty($name) || !empty($phone)) {
            $mail->addAddress("");
            $mail->isHTML(true);
            $mail->Subject = $modalTitle;
            $mail->Body = $modalMes; 
            $mail->send();
            header("Location: thank-you.html");   
        }
        else {
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = $newsletterTitle;
            $mail->Body = $newsletterBody;  
            header("Location: newsletter-thank.html"); 
            $mail->send();
            $mail->ClearAllRecipients();
            $mail->addAddress("");
            $mail->Subject = $newnewsletterTtitle;
            $mail->Body = $newnewsletterMe; 
            $mail->isHTML(true);
            $mail->send(); 
        }
    }
    else {
        $mail->addAddress("");
        $mail->isHTML(true);
        $mail->Subject = $title;
        $mail->Body = $body; 
        $mail->send();
        header("Location: thank-you.html");  
    }
} catch (Exception $e){
    $result = "error";
    $status = " Сообщение не было отправлено";
}
