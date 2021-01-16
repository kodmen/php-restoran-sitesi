<?php
use PHPMailer\PHPMailer\PHPMailer;
require '../../vendor/autoload.php';

$mail = new PHPMailer();


$mail->isSMTP();
$mail->SMTPKeepAlive = true;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';

$mail->Port = 587;
$mail->Host = "mail.hanrideb.com";

$mail->Username = "sitemail@hanrideb.com";
$mail->Password = "sitemail123";
$mail->setFrom("sitemail@hanrideb.com","bedirhan");

function mail_gonder($mailadres, $isim, $tarih, $saat){

    $gonder = false;
    global $mail;
    $body = "<h1>Merhaba rezervarsonunuz kabul edilmistir </h1>
            <p>".$tarih." tarihinde ".$saat." saatte rezerv edilmistir.</p>";
    $mail->addAddress($mailadres,$isim);
    $mail->isHTML(true);
    $mail->Subject = "Sushi restoran rezervarsyon";
    $mail->Body = $body;

    if ($mail->send())
       $gonder = true;

    return $gonder;

    }