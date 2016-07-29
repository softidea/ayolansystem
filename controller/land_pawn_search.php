<?php
require '../db/newDB.php';

$deed_no = filter_input(INPUT_GET, 'deed_no');
$deed_no_for_check_ins=  filter_input(INPUT_GET, 'deed_no_for_check_ins');

if (isset($deed_no)) {
    $deed_query = "SELECT * FROM land_pawns WHERE deed_no='$deed_no'";
    $run_deed = mysqli_query($conn, $deed_query);
    if (mysqli_num_rows($run_deed) > 0) {
        if ($deed_row = mysqli_fetch_assoc($run_deed)) {
            $pawn_period = $deed_row['period'];
            $pawn_amount = $deed_row['amount'];
            $pawn_rental = $deed_row['pawn_rental'];
            $cus_nic = $deed_row['cus_nic'];
            $cus_query = "SELECT * FROM customer WHERE cus_nic='$cus_nic'";
            $cus_run = mysqli_query($conn, $cus_query);
            if (mysqli_num_rows($cus_run) > 0) {
                if ($cus_row = mysqli_fetch_assoc($cus_run)) {
                    $cus_name = $cus_row['cus_fullname'];
                    $cus_tp = $cus_row['cus_tp'];
                    $cus_address = $cus_row['cus_address'];
                    $cus_regdate = $cus_row['cus_reg_date'];
                    $year_query = "SELECT year FROM land_pawn_year WHERE year_id='$pawn_period'";
                    $run_year = mysqli_query($conn, $year_query);
                    if (mysqli_num_rows($run_year) > 0) {
                        if($row_year=  mysqli_fetch_assoc($run_year)){
                            $year=$row_year['year'];
                            $amount_query="SELECT pawn_amount FROM pawn_amount WHERE amount_id='$pawn_amount'";
                            $run_amount=  mysqli_query($conn, $amount_query);
                            if(mysqli_num_rows($run_amount)>0){
                                if($row_amount=  mysqli_fetch_assoc($run_amount)){
                                    $amount=$row_amount['pawn_amount'];
                                    echo $year . "#" . $amount . "#" . $pawn_rental . "#" . $cus_nic . "#" . $cus_name . "#" . $cus_tp . "#" . $cus_address . "#" . $cus_regdate;
                                }
                            }else{
                                echo 'No Pawn Amount Found';
                            }
                        }
                    } else {
                        echo "No Period Found";
                    }
                    
                }
            } else {
                echo 'No Customer Found';
            }
        }
    } else {
        echo 'No Land Found';
    }
}
if(isset($deed_no_for_check_ins)){
    
}
?>