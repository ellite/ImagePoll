<?php

error_reporting(E_ALL ^ E_NOTICE);

$db_host = 'localhost';
$db_user = 'user';
$db_pass = 'password';
$db_name = 'database';

$link = mysql_connect($db_host, $db_user, $db_pass)
    or die("Error connecting : " . mysql_error());
	mysql_select_db($db_name, $link);


?>