<?php

function load() {
    require_once '../db/mysqliConnect.php';
    $sql_query = "SELECT * FROM vehicle_brand";
    $run_query = mysqli_query($d_bc, $sql_query);

    while ($row_brand = mysqli_fetch_array($run_query)) {
        $b= $row_brand['brand'];
        echo "<script>alert($b);</script>";
    }
}

?>