<?php
//データベースに接続
	$dsn='mysql:dbname=oneline_bbs;host=localhost';
	$user='root';
	$password='';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->query('SET NAMES utf8');

//ロリポップのDBに接続
	// $dsn = 'mysql:dbname=LAA0731599-onelinebbs;host=mysql110.phy.lolipop.lan';
	// $user = 'LAA0731599';
	// $password = 'youasian5';
	// $dbh = new PDO($dsn,$user,$password);
	// $dbh->query('SET NAMES utf8');


?>
