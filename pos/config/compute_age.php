<?php
date_default_timezone_set('Asia/Manila');

$date = $_POST['date'];

$today = date('Y-m-d');
$bDate = date('Y-m-d', strtotime($date));

$currentDate = strtotime($today);
$birthDate = strtotime($bDate);

$res = $currentDate - $birthDate;

$days = floor($res / (24 * 60 * 60 * 365));

echo $days;
?>