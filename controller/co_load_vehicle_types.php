<?php
$q = intval($_GET['q']);

define('db_host', '77.104.142.97');
define('db_port', '3306');
define('db_user', 'ayolanin_dev');
define('db_password', 'WelComeDB1129');
define('db_database', 'ayolanin_datahost');

$d_bc = mysqli_connect(db_host, db_user, db_password, db_database)

or die('Could not connect to MySql: '. mysqli_connect_error());

$sql="SELECT * FROM vehicle_type WHERE brand_id = '".$q."'";
$result = mysqli_query($d_bc,$sql);
 echo "<option value='0'>~~Select Vehicle Type~~</option>";
while($row = mysqli_fetch_array($result)) {
    $v_type_id=$row['vehicle_type_id'];
    echo "<option value=$v_type_id>" . $row['vehicle_type'] . "</option>";
}
mysqli_close($d_bc);
?>