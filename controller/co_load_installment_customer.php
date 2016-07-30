<?php

//session_start();

$conn = mysqli_connect("77.104.142.97", "ayolanin_dev", "WelComeDB1129", "ayolanin_datahost");
if (mysqli_connect_errno()) {
    echo "Falied to Connect the Database" . mysqli_connect_error();
}
date_default_timezone_set('Asia/Colombo');
$current_date = date("Y-m-d");

$customer_nic = filter_input(INPUT_GET, 'cus_nic');
$c_nic = filter_input(INPUT_GET, 'c_nic');
$s_no = filter_input(INPUT_GET, 's_no');
$service_no = filter_input(INPUT_GET, 'service_no');
//$payment = filter_input(INPUT_GET, 'payment');
$sno_begin_ins = filter_input(INPUT_GET, 'sno_begin_ins');
$ser_number = filter_input(INPUT_GET, 'ser_number');


$installment = filter_input(INPUT_GET, 'installment');
$paid_payment = filter_input(INPUT_GET, 'payment');
$payabaledate = filter_input(INPUT_GET, 'payabledate');
$paiddate = filter_input(INPUT_GET, 'paiddate');
$serno = filter_input(INPUT_GET, 'serno');
$saveinstallment = filter_input(INPUT_GET, 'saveinstallment');
$requiredpayment = filter_input(INPUT_GET, 'requiredpayment');
$maximumpayment = filter_input(INPUT_GET, 'maximumpayment');

$settlement_payment = filter_input(INPUT_GET, 'settlement_payment');
$hidden_ser_number = filter_input(INPUT_GET, 'hidden_ser_number');

if ($ser_number != "" && $ser_number != null) {
    global $conn;
    $query = "SELECT * FROM service WHERE ser_number='$ser_number'";
    $run_query = mysqli_query($conn, $query);
    if (mysqli_num_rows($run_query) > 0) {
        if ($row = mysqli_fetch_assoc($run_query)) {
            $cuss_nic = $row['cus_nic'];
             $ser_regdate = $row['ser_date'];
            $cus_query = "SELECT * FROM customer WHERE cus_nic='$cuss_nic'";
            $run_cuss = mysqli_query($conn, $cus_query);
            if (mysqli_num_rows($run_cuss) > 0) {
                if ($row_cus = mysqli_fetch_assoc($run_cuss)) {

                    $ser_no = $row['vehicle_no'];
                    $pre_code = $row['v_code'];
                    $vehicle_no = $ser_no;

                    $fixed_rent = $row['fix_rate'];
                    $install = $row['installment'];

                    $cus_name = $row_cus['cus_fullname'];
                    $cus_tp = $row_cus['cus_tp'];
                    $cus_address = $row_cus['cus_address'];
                   

                    echo $cuss_nic . "#" . $cus_name . "#" . $cus_tp . "#" . $cus_address . "#" . $ser_regdate . "#" . $vehicle_no . "#" . $fixed_rent . "#" . $install;
                }
            }
        }
    } else {
        echo 'No Service found Under This Number!';
    }
}

if ($saveinstallment != "" && $saveinstallment != null) {

    global $conn;
    $customer_due = $installment - $paid_payment;
    $compnay_due = $paid_payment - $installment;
    if ($serno != "NONE") {
        if (is_numeric($paid_payment) && $paid_payment > 0) {


            $query = "INSERT INTO ser_installment
            (
             `ser_number`,
             `date`,
             `paid_date`,
             `payment`,
             `customer_due`,
             `company_due`)
VALUES (
        '$serno',
        '$payabaledate',
        '$paiddate',
        '$paid_payment',
        '$customer_due',
        '$compnay_due')";
            $run_query = mysqli_query($conn, $query);
            if ($run_query) {
                echo "Installment Successfully Added";
            }
        } else {
            echo "Please Enter Valid Amoount!";
        }
    } else {
        echo "Invalid Service Number!";
    }
}



//loading customer details
if ($customer_nic != "" && $customer_nic != null) {
    global $conn;
    $sql_query = "SELECT * FROM customer WHERE cus_nic='$customer_nic'";
    $run_query = mysqli_query($conn, $sql_query);

    if (mysqli_num_rows($run_query) > 0) {
        if ($row = mysqli_fetch_assoc($run_query)) {
            $cus_name = $row['cus_fullname'];
            $cus_tp = $row['cus_tp'];
            $cus_address = $row['cus_address'];
            $cus_regdate = $row['cus_reg_date'];
            echo $cus_name . "#" . $cus_tp . "#" . $cus_address;
        }
    }
}
//loading customer details
//loading service numbers of the customer
if ($c_nic != "" && $c_nic != null) {
    global $conn;
    $sql_query = "SELECT ser_number FROM service WHERE cus_nic='$c_nic'";
    $run_query = mysqli_query($conn, $sql_query);
    if (mysqli_num_rows($run_query) > 0) {
        echo "<option value='0'>~~Select Service~~</option>";
        while ($row = mysqli_fetch_array($run_query)) {
            $sno = $row['ser_number'];
            echo "<option value='$sno'>$sno</option>";
        }
    }
}
//loading service numbers of the customer
//loading service details
$ser_duration = 0;
if ($s_no != "" && $s_no != null) {
    global $conn;
    $sql_query = "SELECT * FROM service WHERE ser_number='$s_no'";
    $run_query = mysqli_query($conn, $sql_query);
    if (mysqli_num_rows($run_query) > 0) {
        if ($row = mysqli_fetch_assoc($run_query)) {

            $ser_number = $row['ser_number'];
            $ser_no = $row['vehicle_no'];
            $pre_code = $row['v_code'];
            $vehicle_no = $ser_no;

            $fixed_rent = $row['fix_rate'];
            $install = $row['installment'];
            $reg_date=$row['ser_date'];

            echo $ser_number . "#" . $vehicle_no . "#" . $fixed_rent . "#" . $install."#".$reg_date;
        }
    }
}
//loading service details
//loading service installments
if ($service_no != "" && $service_no != null) {
    global $conn;
    $sql_query = "SELECT * FROM ser_installment WHERE ser_number='$service_no'";
    $run_query = mysqli_query($conn, $sql_query);
    $current_row = 1;
    if (mysqli_num_rows($run_query) > 0) {
        while ($row = mysqli_fetch_array($run_query)) {

            $installment = $row['int_id'];
//        $ser_number=$row['ser_number'];
            $date = $row['date'];
            $paid_date = $row['paid_date'];
            $payment = $row['payment'];
//            $customer_due = $row['customer_due'];
//            $company_due = $row['company_due'];

            echo"<tr>";
            echo "<td>$current_row</td>";
            echo "<td>$date</td>";
            echo "<td>$paid_date</td>";
            echo "<td>$payment</td>";
            echo"</tr>";
            $current_row++;
        }
    } else {

        echo "No Installment at this moment";
    }
}
if ($sno_begin_ins != "" && $sno_begin_ins != null) {
    global $conn;
    $sql_query = "SELECT * FROM service WHERE ser_number='$sno_begin_ins'";
    $run_query = mysqli_query($conn, $sql_query);
    if (mysqli_num_rows($run_query) > 0) {
        if ($row = mysqli_fetch_assoc($run_query)) {
            $installment_amount = $row['installment'];
            $service_date = $row['ser_date'];
            $fixed_rate = $row['period'] * $installment_amount;
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

            $now = time();                          //Get Now time
            $check_need_to_pistl = false;

            $customer_total_overpaid = 0;
            $customer_total_paid = 0;
            $checknext = TRUE;
            $temp_prv_round_date = "NONE";
            $balance_lease = $fixed_rate;
            $ft=true;
            for ($i = 0; $i < $no_of_months + 1; $i++) {    //Looping through no of months
                 
                if ($balance_lease > 0) {
                    if ($customer_due <= 0) {                   //Proceed this if only customer due is 0
                        $check_need_to_pistl = false;
                        $temp_due = $customer_due;
                        $mon_pay = 0.0;
                        global $conn;
                        
                        if($ft){
                            $prv_round_date=date('Y-m-d', strtotime('-1 day', strtotime($prv_round_date)));
                        }
                        
                        $sql_payment = "SELECT SUM(payment) FROM ser_installment where paid_date<='$rounded_off_date' and paid_date>'$prv_round_date' and ser_number='$sno_begin_ins'";
                        
                        if($ft){
                            $prv_round_date=date('Y-m-d', strtotime('+1 day', strtotime($prv_round_date)));
                            $ft=FALSE;
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
                            $sql_payment = "SELECT SUM(payment) FROM ser_installment where paid_date<='$temp_rounded_off_date' and paid_date>'$rounded_off_date' and ser_number='$sno_begin_ins'";
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

                            if ($temp_due > $installment_amount) {
                                $check_need_to_pistl = TRUE;
                            }
                            $customer_total_overpaid+=(($temp_due) * (5 / 100));

                            //echo $customer_total_overpaid."5%|";


                            $temp_due = $temp_due * (105 / 100);

                            $temp_rounded_off_date = date('Y-m-d', strtotime('+2 week', strtotime($rounded_off_date)));
                            $temp_roun_off_from = date('Y-m-d', strtotime('+1 week', strtotime($rounded_off_date)));

                            $dis_round_date = $temp_rounded_off_date;
                            $sql_payment = "SELECT SUM(payment) FROM ser_installment where paid_date<='$temp_rounded_off_date' and paid_date>'$temp_roun_off_from'  and ser_number='$sno_begin_ins'";
                            //echo $sql_payment;
                            $run_payment = mysqli_query($conn, $sql_payment);
                            if ($row = mysqli_fetch_array($run_payment)) {
                                $mon_pay = $row[0];

                                $customer_total_paid+=$mon_pay;
                            }

                            $temp_due = $temp_due - $mon_pay;
                            //echo $temp_due."|";
                            // $temp_rounded_off_date = date('Y-m-d', strtotime('+2 week', strtotime($rounded_off_date)));
                            $your_date = strtotime($temp_rounded_off_date);
                            $datediff = $now - $your_date;

                            $datediff = floor($datediff / (60 * 60 * 24));
                            //echo ".....$datediff....";
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
                            //echo $temp_due."{2}";
                        } else {
                            $check_need_to_pistl = false;
                        }
                        if (($temp_due > 0) && ($checknext)) {

                            $temp_due = ($temp_due) * (100 / 105);
                            $customer_total_overpaid-=($temp_due * (5 / 100));
                            //echo $customer_total_overpaid."-5%|";
                            if ($temp_due > $installment_amount) {
                                $check_need_to_pistl = TRUE;
                            }
                            $customer_total_overpaid+=(($temp_due) * (10 / 100));
                            //echo $customer_total_overpaid."10%|";
                            $temp_due = ($temp_due) * (110 / 100);
                            $temp_rounded_off_date = date('Y-m-d', strtotime('+3 week', strtotime($rounded_off_date)));
                            $temp_roun_off_from = date('Y-m-d', strtotime('+2 week', strtotime($rounded_off_date)));
                            //$dis_round_date = $temp_rounded_off_date;
                            $dis_round_date = date('Y-m-d', strtotime('+1 month', strtotime($rounded_off_date)));
                            $sql_payment = "SELECT SUM(payment) FROM ser_installment where paid_date<='$temp_rounded_off_date' and paid_date>'$temp_roun_off_from' and ser_number='$sno_begin_ins'";

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
                        $sql_payment = "SELECT SUM(payment) FROM ser_installment where paid_date<='$rounded_off_date' and paid_date>'$prv_round_date'  and ser_number='$sno_begin_ins'";
                        //echo $sql_payment;
                        $run_payment = mysqli_query($conn, $sql_payment);
                        if ($row = mysqli_fetch_array($run_payment)) {
                            $mon_pay = $row[0];
                            $customer_total_paid+=$mon_pay;
                        }

                        $temp_due = ($installment_amount + $temp_due) - $mon_pay;

                        if ($temp_due > 0) {
                            $customer_total_overpaid+=(($temp_due) * (10 / 100));
                            $temp_due = $temp_due * (110 / 100);
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
                    $sql_payment = "SELECT SUM(payment) FROM ser_installment where paid_date>'$prv_round_date'  and ser_number='$sno_begin_ins'";
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


            $settlement_amount = $balance_lease . ".00";
            $temp_settlement = $settlement_amount;
            if ($no_of_installments > 5) {
                $temp_settlement = $settlement_amount * (94 / 100);
                $temp_settlement = ceil($temp_settlement);
                $settlement_amount = $settlement_amount . " (With 6% Discount ($temp_settlement.00))";
            }

            if ($balance_lease <= 0) {
                $update_service_status = "UPDATE service SET ser_status='0' WHERE ser_number='$sno_begin_ins'";
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
        }
        
    }
}
if (isset($settlement_payment) && isset($requiredpayment) && isset($hidden_ser_number)) {
    if ($hidden_ser_number != 'NONE' && ($requiredpayment != "NONE")) {
        $check_status = "SELECT ser_status FROM service WHERE ser_number='$hidden_ser_number' AND ser_status='1'";
        $run_check = mysqli_query($conn, $check_status);
        if ($run_check_res=  mysqli_fetch_array($run_check)) {

            if ($settlement_payment >= $requiredpayment) {
                if($settlement_payment>$maximumpayment){
                    die("The Settlement Amount Should be Equal or Lesser than Maximum Payment Amount");
                }

                $save_settlement = "INSERT INTO ser_installment
            (
             `ser_number`,
             `date`,
             `paid_date`,
             `payment`,
             `customer_due`,
             `company_due`)
VALUES (
        '$hidden_ser_number',
        '$current_date',
        '$current_date',
        '$settlement_payment',
        '0',
        '0')";

                $save_settle = mysqli_query($conn, $save_settlement);
                if ($save_settle) {

                    $update_service_status = "UPDATE service SET ser_status='0' WHERE ser_number='$hidden_ser_number'";
                    $run_update = mysqli_query($conn, $update_service_status);
                    if ($run_update) {
                        echo "Lease is Settled";
                    }
                }
            } else {
                echo 'The Settlement Amount Should be Equal or Greater than Required Payment';
            }
        }else{
            echo 'Cannot complete the Transaction,Lease already settled';
        }
    } else {
        echo 'Invalid Service Number';
    }
}


//loading service installments
