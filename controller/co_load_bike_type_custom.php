<?php

if (isset($_GET['q'])) {
    $q = intval($_GET['q']);

    define('db_host', '77.104.142.97');
    define('db_port', '3306');
    define('db_user', 'ayolanin_dev');
    define('db_password', 'WelComeDB1129');
    define('db_database', 'ayolanin_datahost');

    $d_bc = mysqli_connect(db_host, db_user, db_password, db_database) or die('Could not connect to MySql: ' . mysqli_connect_error());

    $sql = "SELECT * FROM vehicle_type WHERE brand_id = '" . $q . "'";
    $result = mysqli_query($d_bc, $sql);
    echo "<option value='0'>~~Select Vehicle Type~~</option>";
    while ($row = mysqli_fetch_array($result)) {
        $v_type_id = $row['vehicle_type_id'];
        echo "<option value=$v_type_id>" . $row['vehicle_type'] . "</option>";
    }
    echo "<option value='newtype'>~~Add New Type~~</option>";
}

if (isset($_GET['mode'])) {
    $vt_id = intval($_GET['mode']);

    define('db_host', '107.180.14.32');
    define('db_port', '3306');
    define('db_user', 'ayolandeveloper');
    define('db_password', 'WelComeDB1129');
    define('db_database', 'ayolan_datahost');

    $d_bc = mysqli_connect(db_host, db_user, db_password, db_database) or die('Could not connect to MySql: ' . mysqli_connect_error());

    $sql_query = "SELECT DISTINCT type FROM ser_vehicles_pre WHERE vehicle_type_id=$vt_id";
    $run_query = mysqli_query($d_bc, $sql_query);
    echo "<option value='0'>~~Select Pre Code~~</option>";
    while ($row_query = mysqli_fetch_array($run_query)) {
        $mod = $row_query['type'];
        echo "<option value='$mod'>$mod</option>";
    }
    echo "<option value='newmodel'>~~Add New Model~~</option>";
}


mysqli_close($d_bc);
?>