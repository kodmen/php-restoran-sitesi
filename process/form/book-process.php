<?php
require_once ("../Db-conn/Veri_islem.php");
require_once ("Mail.php");

$people = $_POST["people"];
$date = $_POST["date"];
$time = $_POST["time"];
$name = $_POST["username"];
$email = $_POST["email"];
$phone = $_POST["phone"];


$temp = new Veri_islem();
$num = $temp->bookEkle($people,$date,$time,$name,$email, $phone);

$var = mail_gonder($email,$name,$date,$time);

