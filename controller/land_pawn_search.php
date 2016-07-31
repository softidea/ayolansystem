<?php

require '../db/newDB.php';

$deed_no = filter_input(INPUT_GET, 'deed_no');
$deed_no_for_check_ins = filter_input(INPUT_GET, 'deed_no_for_check_ins');
$deed_number = filter_input(INPUT_GET, 'deed_number');
$save_installment_deed_no = filter_input(INPUT_GET, 'save_installment_deed_no');
$paid_date = filter_input(INPUT_GET, 'paid_date');
$payment = filter_input(INPUT_GET, 'payment');
$save_settlment_deed_no = filter_input(INPUT_GET, 'save_settlment_deed_no');
$requiredpayment = filter_input(INPUT_GET, 'requiredpayment');

date_default_timezone_set('Asia/Colombo');
$current_date = date("Y-m-d");

if (isset($deed_no)) {
    $deed_query = "SELECT * FROM land_pawns WHERE deed_no='$deed_no'";
    $run_deed = mysqli_query($conn, $deed_query);
    if (mysqli_num_rows($run_deed) > 0) {
        if ($deed_row = mysqli_fetch_assoc($run_deed)) {
            $pawn_period = $deed_row['period'];
            $pawn_amount = $deed_row['amount'];
            $pawn_rental = $deed_row['pawn_rental'];
            $cus_nic = $deed_row['cus_nic'];
            $deed_reg_date = $deed_row['deed_reg_date'];
            $cus_query = "SELECT * FROM customer WHERE cus_nic='$cus_nic'";
            $cus_run = mysqli_query($conn, $cus_query);
            if (mysqli_num_rows($cus_run) > 0) {
                if ($cus_row = mysqli_fetch_assoc($cus_run)) {
                    $cus_name = $cus_row['cus_fullname'];
                    $cus_tp = $cus_row['cus_tp'];
                    $cus_address = $cus_row['cus_address'];
                    
                    $year_query = "SELECT year FROM land_pawn_year WHERE year_id='$pawn_period'";
                    $run_year = mysqli_query($conn, $year_query);
                    if (mysqli_num_rows($run_year) > 0) {
                        if ($row_year = mysqli_fetch_assoc($run_year)) {
                            $year = $row_year['year'];
                            $amount_query = "SELECT pawn_amount FROM pawn_amount WHERE amount_id='$pawn_amount'";
                            $run_amount = mysqli_query($conn, $amount_query);
                            if (mysqli_num_rows($run_amount) > 0) {
                                if ($row_amount = mysqli_fetch_assoc($run_amount)) {
                                    $amount = $row_amount['pawn_amount'];
                                    echo $year . "#" . $amount . "#" . $pawn_rental . "#" . $cus_nic . "#" . $cus_name . "#" . $cus_tp . "#" . $cus_address . "#" . $deed_reg_date;
                                }
                            } else {
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


if (isset($save_installment_deed_no) && isset($paid_date) && isset($payment)) {

    $save_pawn_installment = "INSERT INTO pawn_installment (date,paid_date,payment,customer_due,company_due,deed_no) VALUES ('NA','$paid_date','$payment','NA','NA','$save_installment_deed_no')";
    $run_save_pawn_installment = mysqli_query($conn, $save_pawn_installment);
    if ($run_save_pawn_installment) {
        echo "Pawn Installment successfully addedf";
    } else {
        echo "Error while adding pawn installment";
    }
}
if (isset($save_settlment_deed_no) && isset($current_date) && isset($payment) && isset($requiredpayment)) {
    
    $check_status = "SELECT pawn_status FROM land_pawns WHERE deed_no='$save_settlment_deed_no' AND pawn_status='1'";
        $run_check = mysqli_query($conn, $check_status);
        if ($run_check_res=  mysqli_fetch_array($run_check)) {

    if ($payment == $requiredpayment) {
        $save_pawn_settlment = "INSERT INTO pawn_installment (date,paid_date,payment,customer_due,company_due,deed_no) VALUES ('NA','$current_date','$payment','NA','NA','$save_settlment_deed_no')";
        $run_save_pawn_settlment = mysqli_query($conn, $save_pawn_settlment);
        if ($run_save_pawn_settlment) {
            
            $update_pawn="UPDATE land_pawns SET pawn_status='0' WHERE deed_no='$save_installment_deed_no'";
            $run_update_pawn=  mysqli_query($conn, $update_pawn);
            if($run_update_pawn){
                 echo "Pawn Settled successfully";
            }
            
        } else {
            echo "Error while pawn Settling";
        }
    } else {
        echo 'Setllment payment must be qual to required amount';
    }
    
        }else{
            echo 'Cannot complete the Transaction,Lease already settled';
        }
}



if (isset($deed_no_for_check_ins)) {
    $installment_query = "SELECT * FROM pawn_installment WHERE deed_no='$deed_no_for_check_ins'";
    $installment_run = mysqli_query($conn, $installment_query);
    $current_row = 1;
    if (mysqli_num_rows($installment_run) > 0) {
        while ($installment_row = mysqli_fetch_array($installment_run)) {
            $date = $installment_row['date'];
            $paid_date = $installment_row['paid_date'];
            $payment = $installment_row['payment'];
            $customer_due = $installment_row['customer_due'];
            $company_due = $installment_row['company_due'];
            echo"<tr>";
            echo "<td>$current_row</td>";
            echo "<td>$date</td>";
            echo "<td>$paid_date</td>";
            echo "<td>$payment.00</td>";
            echo"</tr>";
            $current_row++;
        }
    } else {
        echo 'No Pawn Installment Found';
    }
}
if (isset($deed_number)) {
    global $conn;
    $sql_query = "SELECT lp.*,pa.pawn_amount,py.year FROM land_pawns lp,pawn_amount pa,land_pawn_year py WHERE deed_no='$deed_number' AND lp.amount=pa.amount_id AND py.year_id=lp.period";
//    echo $sql_query;
    $run_query = mysqli_query($conn, $sql_query);
    if (mysqli_num_rows($run_query) > 0) {

        if ($row = mysqli_fetch_assoc($run_query)) {


            if (($row['pawn_status']) == 1) {

                $installment_amount = $row['pawn_rental'];
                $service_date = $row['deed_reg_date'];
                $fixed_rate = $row['year'] * 12 * $installment_amount;
//            $service_date = "2016-04-26";

                $curr_ser_date = explode("-", $service_date)[2];

                $serv_mon_year = explode("-", $service_date)[0] . "-" . explode("-", $service_date)[1];

                $default_service_date = 1;

                if ($curr_ser_date >= 25) {
                    $default_service_date = 25;
                } elseif ($curr_ser_date >= 20) {
                    $default_service_date = 20;
                } elseif ($curr_ser_date >= 15) {
                    $default_service_date = 15;
                } elseif ($curr_ser_date >= 10) {
                    $default_service_date = 10;
                } elseif ($curr_ser_date >= 5) {
                    $default_service_date = 5;
                }

//echo $default_service_date;
                $rounded_off_date = $serv_mon_year . "-" . $default_service_date;           // Get the Payment Date
// $_frst_serv_date = date('Y-m-d', strtotime('+1 month', strtotime($rounded_off_date)));
                $dis_round_date = date('Y-m-d', strtotime('+1 month', strtotime($rounded_off_date)));  //get the first payment date
                $rounded_off_date = $dis_round_date; //Assignin the First Payment Date
                $now_date = date("Y-m-d");          // Get Today's Date


                $d1 = new DateTime($rounded_off_date);  // Get First PAyment date as date
                $d2 = new DateTime($now_date);          // Get Today Date As date

                $no_of_months = ($d1->diff($d2)->m);  // Get the number of months between 1st month to pay and this month

                $customer_due = 0.0;                    // Getting the initial customer due as 0
                $prv_round_date = $service_date;        // Getting the last Service date as first date
//$installment_amount=4043;
                // echo $prv_round_date."-".$rounded_off_date;


                $now = time();                          //Get Now time







                $check_need_to_pistl = false;

                $customer_total_overpaid = 0;
                $customer_total_paid = 0;
                $checknext = TRUE;
                $temp_prv_round_date = "NONE";
                $balance_lease = $fixed_rate;
                $ft = true;


                for ($i = 0; $i < $no_of_months + 1; $i++) {    //Looping through no of months
                    if ($balance_lease > 0) {
                        if ($customer_due <= 0) {                   //Proceed this if only customer due is 0
                            $check_need_to_pistl = false;
                            $temp_due = $customer_due;
                            $mon_pay = 0.0;
                            global $conn;

                            if ($ft) {
                                $prv_round_date = date('Y-m-d', strtotime('-1 day', strtotime($prv_round_date)));
                            }

                            $sql_payment = "SELECT SUM(payment) FROM pawn_installment where paid_date<='$rounded_off_date' and paid_date>'$prv_round_date' and deed_no='$deed_number'";

                            if ($ft) {
                                $prv_round_date = date('Y-m-d', strtotime('+1 day', strtotime($prv_round_date)));
                                $ft = FALSE;
                            }


                            $run_payment = mysqli_query($conn, $sql_payment);
                            if ($row = mysqli_fetch_array($run_payment)) {
                                $mon_pay = $row[0];
                                $customer_total_paid+=$mon_pay;
                            }
                            //echo $sql_payment;
                            $temp_due = (($installment_amount + $temp_due) - $mon_pay);



                            $balance_lease = $customer_total_overpaid + $fixed_rate - $customer_total_paid;
                            if ($balance_lease <= 0) {
                                $checknext = FALSE;
                            }

                            $your_date = strtotime($rounded_off_date);
                            $datediff = $now - $your_date;
                            $datediff = floor($datediff / (60 * 60 * 24));

                            // $chkbool=(($rounded_off_date)==)));


                            if (($datediff <= 0)) {
                                $checknext = FALSE;
                            }

//                       /echo $temp_due."{0}";

                            if (($temp_due > 0) && ($checknext)) {
                                if ($temp_due > $installment_amount) {
                                    $check_need_to_pistl = TRUE;
                                }
                                $temp_rounded_off_date = date('Y-m-d', strtotime('+1 week', strtotime($rounded_off_date)));

                                $dis_round_date = $temp_rounded_off_date;
                                $sql_payment = "SELECT SUM(payment) FROM pawn_installment where paid_date<='$temp_rounded_off_date' and paid_date>'$rounded_off_date' and deed_no='$deed_number'";
                                //echo $sql_payment;

                                $run_payment = mysqli_query($conn, $sql_payment);
                                if ($row = mysqli_fetch_array($run_payment)) {
                                    $mon_pay = $row[0];

                                    $customer_total_paid+=$mon_pay;
                                }

                                $temp_due = ($temp_due - $mon_pay);

                                $your_date = strtotime($temp_rounded_off_date);
                                $datediff = $now - $your_date;
                                $datediff = floor($datediff / (60 * 60 * 24));

                                if ($datediff <= 0) {
                                    $checknext = FALSE;
                                }
                                //if ($temp_due <= 0) {
                                $temp_prv_round_date = $temp_rounded_off_date;
                                //}
                                $balance_lease = $customer_total_overpaid + $fixed_rate - $customer_total_paid;
                                if ($balance_lease <= 0) {
                                    $checknext = FALSE;
                                }

                                // echo $temp_due."{1}.$temp_rounded_off_date";
                            } else {
                                $check_need_to_pistl = false;
                            }
                            if (($temp_due > 0) && ($checknext)) {

                                //echo $customer_total_overpaid."-5%|";
                                if ($temp_due > $installment_amount) {
                                    $check_need_to_pistl = TRUE;
                                }
                                $customer_total_overpaid+=(($temp_due) * (05 / 100));
                                //echo $customer_total_overpaid."10%|";
                                $temp_due = ($temp_due) * (105 / 100);
                                $temp_rounded_off_date = date('Y-m-d', strtotime('+3 week', strtotime($rounded_off_date)));
                                $temp_roun_off_from = date('Y-m-d', strtotime('+1 week', strtotime($rounded_off_date)));
                                //$dis_round_date = $temp_rounded_off_date;
                                $dis_round_date = date('Y-m-d', strtotime('+1 month', strtotime($rounded_off_date)));
                                $sql_payment = "SELECT SUM(payment) FROM pawn_installment where paid_date<='$temp_rounded_off_date' and paid_date>'$temp_roun_off_from' and deed_no='$deed_number'";

                                //echo $sql_payment;
                                $run_payment = mysqli_query($conn, $sql_payment);
                                if ($row = mysqli_fetch_array($run_payment)) {
                                    $mon_pay = $row[0];

                                    $customer_total_paid+=$mon_pay;
                                }

                                $temp_due = ($temp_due - $mon_pay);


                                $your_date = strtotime($temp_rounded_off_date);
                                $datediff = $now - $your_date;
                                $datediff = floor($datediff / (60 * 60 * 24));
                                if ($datediff <= 0) {
                                    $checknext = FALSE;
                                }
                                //if ($temp_due <= 0) {
                                $temp_prv_round_date = $temp_rounded_off_date;
                                //}
                                $balance_lease = $customer_total_overpaid + $fixed_rate - $customer_total_paid;
                                if ($balance_lease <= 0) {
                                    $checknext = FALSE;
                                }
                            } else {
                                $check_need_to_pistl = false;
                            }

                            if ($temp_due > $installment_amount) {
                                $check_need_to_pistl = TRUE;
                            }
                            $customer_due = $temp_due;
                            //echo $customer_due."{4}";
                        } else {
                            $check_need_to_pistl = FALSE;

                            $temp_due = $customer_due;
                            // $temp_due = $temp_due * (110 / 100);
                            $mon_pay = 0.0;
                            global $conn;
                            $sql_payment = "SELECT SUM(payment) FROM pawn_installment where paid_date<='$rounded_off_date' and paid_date>'$prv_round_date'  and deed_no='$deed_number'";
                            //echo $sql_payment;
                            $run_payment = mysqli_query($conn, $sql_payment);
                            if ($row = mysqli_fetch_array($run_payment)) {
                                $mon_pay = $row[0];
                                $customer_total_paid+=$mon_pay;
                            }

                            $temp_due = ($installment_amount + $temp_due) - $mon_pay;

                            if ($temp_due > 0) {
                                $customer_total_overpaid+=(($temp_due) * (05 / 100));
                                $temp_due = $temp_due * (105 / 100);
                            }

                            $dis_round_date = date('Y-m-d', strtotime('+1 month', strtotime($rounded_off_date)));

                            if ($temp_due > 0) {
                                $check_need_to_pistl = true;
                                $customer_due = $temp_due;
                            }
                            $your_date = strtotime($rounded_off_date);
                            $datediff = $now - $your_date;
                            $datediff = floor($datediff / (60 * 60 * 24));
                            if ($datediff <= 0) {
                                $checknext = FALSE;
                            }
                            $balance_lease = $customer_total_overpaid + $fixed_rate - $customer_total_paid;
                            if ($balance_lease <= 0) {
                                $checknext = FALSE;
                            }
                            //echo $temp_due;
                        }
                        //echo $temp_prv_round_date."---------";
                        if ($temp_prv_round_date == "NONE") {
                            $prv_round_date = $rounded_off_date;
                        } else {
                            $prv_round_date = $temp_prv_round_date;

                            $temp_prv_round_date = "NONE";
                        }
                        $rounded_off_date = date('Y-m-d', strtotime('+1 month', strtotime($rounded_off_date)));

                        $customer_due = $temp_due;
                    }
                }

                if ($checknext) {
                    if ($balance_lease > 0) {
                        $check_need_to_pistl = FALSE;
                        $temp_due = $customer_due;
                        // $temp_due = $temp_due * (110 / 100);
                        $mon_pay = 0.0;
                        global $conn;
                        $sql_payment = "SELECT SUM(payment) FROM pawn_installment where paid_date>'$prv_round_date'  and deed_no='$deed_number'";
                        //echo $sql_payment;
                        $run_payment = mysqli_query($conn, $sql_payment);
                        if ($row = mysqli_fetch_array($run_payment)) {
                            $mon_pay = $row[0];
                            $customer_total_paid+=$mon_pay;
                        }



                        $temp_due = ($temp_due - $mon_pay);
                        //$customer_total_overpaid+=(($temp_due) * (10 / 100));
                        //echo $customer_total_overpaid."10%|";
                        //$temp_due = $temp_due * (110 / 100);
                        //dis_round_date = date('Y-m-d', strtotime('+1 month', strtotime($rounded_off_date)));
                        $customer_due = $temp_due;
                        if ($temp_due > 0) {
                            $check_need_to_pistl = true;
                        }
                    }
                }





                if ($customer_due <= 0) {
//                //$customer_due = $installment_amount + $customer_due;
                    // $dis_round_date = date('Y-m-d', strtotime('-1 month', strtotime($rounded_off_date)));
                    //$dis_round_date=$rounded_off_date;
                }

                $nextpayment = "NA";
                $nextpaydate = "NA";
                $totpaybleamnt = $customer_due;

                if ($check_need_to_pistl || $customer_due <= 0) {
                    $totpaybleamnt = $installment_amount + $customer_due;
                    $nextpayment = $installment_amount;
                    $nextpaydate = $rounded_off_date;
                    if (($customer_due * -1) >= $installment_amount) {
                        $nextpaydate = date('Y-m-d', strtotime('+1 month', strtotime($rounded_off_date)));
                    }
                }

                $balance_lease = $customer_total_overpaid + $fixed_rate - $customer_total_paid;
                $no_of_installments = ceil(($balance_lease - $customer_total_overpaid) / $installment_amount);


                $customer_due = ceil($customer_due);
                $nextpayment = ceil($nextpayment);
                $totpaybleamnt = ceil($totpaybleamnt);
                $balance_lease = ceil($balance_lease);


                $settlement_amount = $balance_lease;
                $temp_settlement = $settlement_amount;
               

                if ($balance_lease <= 0) {
                    $update_service_status = "UPDATE land_pawns SET pawn_status='0' WHERE deed_no='$deed_number'";
                    $run_update = mysqli_query($conn, $update_service_status);
                }
                if ($customer_due == '-0') {
                    $customer_due = '0';
                }
                if ($totpaybleamnt == '-0') {
                    $totpaybleamnt = '0';
                }
                echo $dis_round_date . "#" . $customer_due . "#" . $nextpayment . "#" . $nextpaydate . "#" . $totpaybleamnt . ".00" . "#" . $balance_lease . "#" . $no_of_installments . "#" . $settlement_amount . "#" . $temp_settlement;


                //$temp_date =
            } else {
                echo 'NA' . "#" . '0' . "#" . '0' . "#" . 'NA' . "#" . '0' . ".00" . "#" . '0' . "#" . '0' . "#" . 'Lease is Already Settled!' . "#" . 'NA';
            }
        }
    }
}
?>