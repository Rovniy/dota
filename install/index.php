<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dota2.gg Install</title>
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<script src="../js/jquery-1.11.0.min.js"></script>
<script src="../js/bootstrap.js"></script>
<script src="../js/controls.js"></script>
</head>
<body>
<?php
require "../sys/api.php";

function install() {
	$TableAccount = "
	CREATE TABLE account (
	 id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
	 steamid text,
	 personaname text,
	 profileurl varchar(100),
	 avatar VARCHAR(100),
	 avatarfull VARCHAR(100),
	 money VARCHAR(50),
	 bonus int,
	 linkid text,
	 bonusnick text
	) DEFAULT CHARSET=utf8; 
	";
		
	$TableTop = "
	CREATE TABLE top (
	 id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
	 steamid text,
	 pearsonaname text,
	 avatar VARCHAR(100),
	 profileurl text
	) DEFAULT CHARSET=utf8;
	";
	
	$TabUniPay ="
	CREATE TABLE `unitpay_payments` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`unitpayId` varchar(255) NOT NULL,
	`account` varchar(255) NOT NULL,
	`sum` float NOT NULL,
	`itemsCount` int(11) NOT NULL DEFAULT '1',
	`dateCreate` datetime NOT NULL,
	`dateComplete` datetime DEFAULT NULL,
	`status` tinyint(4) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;"
	
	
	
	mysql_query($TableAccount);
	mysql_query($TableTop);
	mysql_query($TabUniPay);
	
	/* Проверка состояния БД */
	if (mysql_error()) { echo "<h1 class='ins_center ins_red'>".mysql_error()."</h1>"; }
	else { echo "<h1 class='ins_center ins_green'>Установка успешно закончена!</h1>"; };
}
?>
<div class="container">
	<div class="row ins_ptop50 ins_center">
		<h2>Создание базы данных</h2>
		<a class="btn btn-large btn-danger" href="?run=1">Запустить установку MySQL bd</a>
	</div>
</div>
<?php
	/* Функция запуска установки */
	if ($_GET['run']==1) {
		install();
}
?>
</body>
</html>