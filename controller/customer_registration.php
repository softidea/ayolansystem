<?php

require_once '../db/mysqliConnect.php';

$q="CALL setuser('dineth','Welcome')";

$query=  mysqli_query($d_bc, $q);

mysqli_close($d_bc);





?>
