<?php

require_once '../db/mysqliConnect.php';

if (!$d_bc) {
    die('Could not connect & : ' . mysql_error());
}
