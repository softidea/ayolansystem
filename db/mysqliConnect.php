<?php

if (!isset($_SESSION['user_email'])) {
  header("Location:../index.php");  
}


define('db_host', '77.104.142.97');
define('db_port', '3306');
define('db_user', 'ayolanin_dev');
define('db_password', 'WelComeDB1129');
define('db_database', 'ayolanin_datahost');

$d_bc = mysqli_connect(db_host, db_user, db_password, db_database)

or die('Could not connect to MySql: ' . mysqli_connect_error());

mysqli_set_charset($d_bc, "UTF8");


