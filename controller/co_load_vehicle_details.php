<?php

define('db_host', '77.104.142.97');
define('db_port', '3306');
define('db_user', 'ayolanin_dev');
define('db_password', 'WelComeDB1129');
define('db_database', 'ayolanin_datahost');

$d_bc = mysqli_connect(db_host, db_user, db_password, db_database) or die('Could not connect to MySql: ' . mysqli_connect_error());

//getting varibles from ajax method
$v_type = $_GET['v_type'];
$v_code = $_GET['v_code'];
//getting varibles from ajax method

$sql_query="SELECT * FROM ser_vehicles_pre WHERE vehicle_type_id='$v_type' AND type='$v_code'";
$run_query=  mysqli_query($d_bc, $sql_query);
if($row_query=  mysqli_fetch_assoc($run_query)){
    $model_year=$row_query['model_year'];
    $max_value=$row_query['max_value'];
    echo $model_year."#".$max_value;
}
?>