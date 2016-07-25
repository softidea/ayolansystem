<?php

define('db_host', '77.104.142.97');
define('db_port', '3306');
define('db_user', 'ayolanin_dev');
define('db_password', 'WelComeDB1129');
define('db_database', 'ayolanin_datahost');

$d_bc = mysqli_connect(db_host, db_user, db_password, db_database)or die('Could not connect to MySql: '. mysqli_connect_error());


$aid = $_GET['aid'];
$yid=$_GET['yid'];

//echo $aid."%$".$yid;

$sql_query="SELECT * FROM ser_land_pre WHERE year_id='$aid' AND amount_id='$yid'";
$run_query=  mysqli_query($d_bc, $sql_query);
if(mysqli_num_rows($run_query)>0){
    if($row=mysqli_fetch_assoc($run_query)){
        $interest=$row['interest'];
        echo $interest;
    }
}
else{
    echo "No Interest Found,Try Again";
}



?>