<?php
$conn = mysqli_connect("77.104.142.97", "ayolanin_dev", "WelComeDB1129", "ayolanin_datahost");
if (mysqli_connect_errno()) {
    echo "Falied to Connect the Database" . mysqli_connect_error();
}

$ser_number=  filter_input(INPUT_GET, 'ser_number');

$ser_no_sis=  filter_input(INPUT_GET, 'ser_no_sis');
$sis_cost=  filter_input(INPUT_GET, 'sis_cost');
$sis_date=  filter_input(INPUT_GET, 'sis_date');
$sis_des=  filter_input(INPUT_GET, 'sis_des');

if(isset($ser_no_sis) && isset($sis_cost) && isset($sis_date) && isset($sis_des)){
    
    $check_unpaid="SELECT * FROM sis_registration WHERE ser_number='$ser_no_sis' AND sis_status='1'";
    $run_check_unpaid=  mysqli_query($conn, $check_unpaid);
    if(mysqli_num_rows($run_check_unpaid)>0){
        
        echo 'There is unsettle re processing payment under this service number';
        
    }else{
        
        $save_sis="INSERT INTO sis_registration (ser_number,sis_date,sis_cost,sis_des,sis_status) VALUES ('$ser_no_sis','$sis_date','$sis_cost','$sis_des','1')";
        $run_save_sis=  mysqli_query($conn, $save_sis);
        if($run_save_sis){
            echo 'Sis is successfully registered';
        }
        
        
        
    }
    
    
}


if(isset($ser_number)){
    
   global $conn;
   $ser_query="SELECT * FROM service WHERE ser_number='$ser_number'";
   $run_ser=  mysqli_query($conn, $ser_query);
   if(mysqli_num_rows($run_ser)>0){
       if($ser_row=mysqli_fetch_assoc($run_ser)){
           
           $vehicle_no=$ser_row['vehicle_no'];
           $service_date=$ser_row['ser_date'];
           $period=$ser_row['period'];
           $installment=$ser_row['installment'];
           $loan_amount=$ser_row['fix_rate'];
           $cus_nic=$ser_row['cus_nic'];
           
           $cus_query="SELECT * FROM customer WHERE cus_nic='$cus_nic'";
           $run_cus=  mysqli_query($conn, $cus_query);
           if(mysqli_num_rows($run_cus)>0){
               if($cus_row=  mysqli_fetch_assoc($run_cus)){
                   
                   $cus_name=$cus_row['cus_fullname'];
                   $cus_address=$cus_row['cus_address'];
                   $cus_regdate=$cus_row['cus_reg_date'];
                   
                   echo $cus_nic."#".$cus_name."#".$cus_address."#".$cus_regdate."#".$vehicle_no."#".$service_date."#".$period."#".$installment."#".$loan_amount;
               }
           }
           
       }
   }
    
    
    
    
}






?>