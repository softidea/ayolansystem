<!DOCTYPE html>
<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location:../index.php");
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Customer Update</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,700,600italic,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../assets/css/customer_registration.css" >
        <?php
        require '../controller/co_load_vehicle_brands.php';

        $conn = mysqli_connect("77.104.142.97", "ayolanin_dev", "WelComeDB1129", "ayolanin_datahost");
        if (mysqli_connect_errno()) {
            echo "Falied to Connect the Database" . mysqli_connect_error();
        }
        ?>
        <link rel="icon" href="favicon.ico">
        <script type="text/javascript">
            function searchUpdateCustomer() {
                var customer_nic = document.getElementById('search_cus_nic').value;

                if (customer_nic != "" && customer_nic != null) {

                    if (window.XMLHttpRequest) {
                        // code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else { // code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                            alert(xmlhttp.responseText);
                            var result = xmlhttp.responseText;
                            var result_arr = result.split("#");

//                          Cusomer Informations

                            document.getElementById('cus_fullname').value = result_arr[0];
                            document.getElementById('cus_address').value = result_arr[1];
                            document.getElementById('cus_tp').value = result_arr[2];
                            document.getElementById('cus_nic').value = result_arr[3];
                            document.getElementById('cus_dob').value = result_arr[4];
                            document.getElementById('cus_ms').value = result_arr[5];
                            document.getElementById('cus_dependdency').value = result_arr[6];
                            document.getElementById('cus_position').value = result_arr[7];
                            document.getElementById('cus_monthly_salary').value = result_arr[8];
                            document.getElementById('cus_emp_name').value = result_arr[9];
                            document.getElementById('cus_emp_address').value = result_arr[10];
                            document.getElementById('cus_hhalf_name').value = result_arr[11];
                            document.getElementById('cus_bhalf_dob').value = result_arr[12];
                            document.getElementById('cus_bhalf_position').value = result_arr[13];
                            document.getElementById('cus_bhalf_monthly_salary').value = result_arr[14];
                            document.getElementById('cus_bhalf_emp_name').value = result_arr[15];
                            document.getElementById('reg_date').value = result_arr[16];

//                            Gerunter Informations

                            document.getElementById('gua_fullname').value = result_arr[17];
                            document.getElementById('gua_address').value = result_arr[18];
                            document.getElementById('gua_tp').value = result_arr[19];
                            document.getElementById('gua_dob').value = result_arr[20];
                            document.getElementById('gua_ms').value = result_arr[21];
                            document.getElementById('gua_nic').value = result_arr[22];
                            document.getElementById('gua_position').value = result_arr[23];
                            document.getElementById('gua_monthly_salary').value = result_arr[24];
                            document.getElementById('gua_emp_name').value = result_arr[25];
                            document.getElementById('gua_emp_address').value = result_arr[26];

//                            Real Property House Details

                            document.getElementById('real_prp_house_position').value = result_arr[26];
                            document.getElementById('real_prp_house_size').value = result_arr[27];
                            document.getElementById('real_prp_house_value').value = result_arr[28];
                            document.getElementById('real_prp_house_pawned').value = result_arr[29];
                            document.getElementById('real_prp_house_pawn_getter').value = result_arr[30];

//                            Other Property House Details

                            document.getElementById('real_prp_other_position').value = result_arr[31];
                            document.getElementById('real_prp_other_size').value = result_arr[32];
                            document.getElementById('real_prp_other_value').value = result_arr[33];
                            document.getElementById('real_prp_other_pawned').value = result_arr[34];
                            document.getElementById('real_prp_other_pawn_getter').value = result_arr[35];

//                            Saving Bank Details

                            document.getElementById('cus_savings_bank_branch').value = result_arr[35];
                            document.getElementById('cus_savings_facilities').value = result_arr[36];
                            document.getElementById('cus_savings_account_no').value = result_arr[37];

//                            Mobile Bank Details

                            document.getElementById('cus_mobile_bank_branch').value = result_arr[38];
                            document.getElementById('cus_mobile_facilities').value = result_arr[39];
                            document.getElementById('cus_mobile_account_no').value = result_arr[40];

//                            Saving Bank Details

                            document.getElementById('cus_daily_loan_bank_branch').value = result_arr[41];
                            document.getElementById('cus_daily_loan_facilities').value = result_arr[42];
                            document.getElementById('cus_daily_loan_account_no').value = result_arr[43];

                        }
                    }
                    xmlhttp.open("GET", "../controller/co_customer_update.php?customer_nic=" + customer_nic, true);
                    xmlhttp.send();
                }
            }
        </script>

    </head>
    <body>

        <?php include '../assets/include/navigation_bar.php'; ?>

        <!--Customer Panel Section-->
        <div class="container" style="margin-top: 80px;display: block;" id="one">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="panelheading">
                            <h3 class="panel-title">Update Customer Information</h3>
                        </div>

                        <form method="POST">
                            <div class="panel-body" style="background-color: #FAFAFA;">
                                <div class="col-sm-6">
                                    <fieldset id="account">
                                        <legend>01.Customer Personal Details</legend>
                                        <div class="form-group required">
                                            <label class="control-label">Enter Customer NIC:</label>
                                            <div class="form-inline required">
                                                <input type="text"  name="search_cus_nic" id="search_cus_nic" placeholder="NIC" class="form-control" style="width:85%;text-transform: uppercase;" maxlength="10" required/>
                                                <input type="button" class="btn btn" id="custcontinue" onclick="searchUpdateCustomer();" value="Search">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="input-email">Full Name:</label>
                                            <input type="text" name="cus_fullname" id="cus_fullname" class="form-control" maxlength="100" />
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="input-email">Permanent Address :</label>
                                            <input type="text" name="cus_address" id="cus_address" class="form-control" maxlength="400" />
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Telephone:</label>
                                            <input type="text" name="cus_tp" id="cus_tp" class="form-control" />
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">NIC Number:</label>
                                            <input type="text" name="cus_nic" id="cus_nic" class="form-control" disabled/>
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Date of Birth:</label>
                                            <input type="date" name="cus_dob"  id="cus_dob" class="form-control" />
                                        </div>

                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Married Status:</label>
                                            <select name="cus_ms"  id="cus_ms" class="form-control" >
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                            </select>
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Have any Dependencies:</label>
                                            <input type="text" name="cus_dependdency"  id="cus_dependdency" class="form-control" />
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Employment/Position:</label>
                                            <input type="text" name="cus_position"  id="cus_position" class="form-control" />
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Monthly Salary/Net Income:</label>
                                            <input type="text" name="cus_monthly_salary"  id="cus_monthly_salary" class="form-control" />
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Employer Name:</label>
                                            <input type="text" name="cus_emp_name"  id="cus_emp_name" class="form-control" />
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Employer Address:</label>
                                            <input type="text" name="cus_emp_address" id="cus_emp_address" class="form-control" />
                                        </div>
                                    </fieldset>
                                    <fieldset id="account">
                                        <legend>03.Customer Better Half Details</legend>

                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Full Name:</label>
                                            <input type="text" name="cus_hhalf_name"  id="cus_hhalf_name" class="form-control" />
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Date of Birth:</label>
                                            <input type="date" name="cus_bhalf_dob" id="cus_bhalf_dob" class="form-control" />
                                        </div>

                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Employment/Position:</label>
                                            <input type="text" name="cus_bhalf_position" id="cus_bhalf_position" class="form-control" />
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Monthly Salary/Net Income:</label>
                                            <input type="text" name="cus_bhalf_monthly_salary" id="cus_bhalf_monthly_salary" class="form-control" />
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Employer Name:</label>
                                            <input type="text" name="cus_bhalf_emp_name" id="cus_bhalf_emp_name" class="form-control" />
                                        </div>

                                    </fieldset>
                                </div>

                                <!--Guranter Details-->
                                <div class="col-sm-6">
                                    <fieldset id="account">
                                        <legend>02.Guarantor Personal Details</legend>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Full Name:</label>
                                            <input type="text" name="gua_fullname" id="gua_fullname" class="form-control" />
                                        </div>

                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Permanent Address :</label>
                                            <input type="text" name="gua_address" id="gua_address" class="form-control" />
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Telephone:</label>
                                            <input type="tel" name="gua_tp" id="gua_tp" class="form-control" />
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Date of Birth:</label>
                                            <input type="date" name="gua_dob" id="gua_dob" class="form-control" />
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Married Status:</label>
                                            <input type="text" name="gua_ms" id="gua_ms" class="form-control" />
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">NIC Number:</label>
                                            <input type="text" name="gua_nic" id="gua_nic" class="form-control" />
                                        </div>

                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Employment/Position:</label>
                                            <input type="text" name="gua_position" id="gua_position" class="form-control" />
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Monthly Salary/Net Income:</label>
                                            <input type="text" name="gua_monthly_salary"  id="gua_monthly_salary" class="form-control" />
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Employer Name:</label>
                                            <input type="text" name="gua_emp_name" id="gua_emp_name" class="form-control" />
                                        </div>
                                        <div class="form-group  ">
                                            <label class="control-label" for="input-email">Employer Address:</label>
                                            <input type="text" name="gua_emp_address" id="gua_emp_address" class="form-control" />
                                        </div>
                                    </fieldset>

                                </div>
                                <!--Guranter Details-->
                                <div class="col-md-12">


                                    <fieldset id="account">
                                        <legend>05.Real Property</legend>
                                        <div class="form-group ">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="thcaption">Category</th>
                                                        <th class="thcaption">Position</th>
                                                        <th class="thcaption">Size</th>
                                                        <th class="thcaption">Value</th>
                                                        <th class="thcaption">Is Pawned</th>
                                                        <th class="thcaption">Pawn Getter</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>House<input type="hidden" value="House" name="home"></td>
                                                        <td><input type="text" name="real_prp_house_position" id="real_prp_house_position" class="form-control" /></td>
                                                        <td><input type="text" name="real_prp_house_size" id="real_prp_house_size" class="form-control" /></td>
                                                        <td><input type="text" name="real_prp_house_value" id="real_prp_house_value" class="form-control" /></td>
                                                        <td><input type="text" name="real_prp_house_pawned" id="real_prp_house_pawned" class="form-control" /></td>
                                                        <td><input type="text" name="real_prp_house_pawn_getter" id="real_prp_house_pawn_getter" class="form-control" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other Property<input type="hidden" value="Other Property" name="op"></td>
                                                        <td><input type="text" name="real_prp_other_position" id="real_prp_other_position" class="form-control" /></td>
                                                        <td><input type="text" name="real_prp_other_size" id="real_prp_other_size" class="form-control" /></td>
                                                        <td><input type="text" name="real_prp_other_value" id="real_prp_other_value" class="form-control" /></td>
                                                        <td><input type="text" name="real_prp_other_pawned"  id="real_prp_other_pawned" class="form-control" /></td>
                                                        <td><input type="text" name="real_prp_other_pawn_getter" id="real_prp_other_pawn_getter" class="form-control" /></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </fieldset>
                                    <fieldset id="account">
                                        <legend>05.Bank Accounts</legend>
                                        <div class="form-group ">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th class="thcaption">Category</th>
                                                        <th class="thcaption">Bank Name & Branch</th>
                                                        <th class="thcaption">Facilities</th>
                                                        <th class="thcaption">Account Number</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Savings Account</td>
                                                        <td><input type="text" name="cus_savings_bank_branch" id="cus_savings_bank_branch" class="form-control" /></td>
                                                        <td><input type="text" name="cus_savings_facilities" id="cus_savings_facilities" class="form-control" /></td>
                                                        <td><input type="text" name="cus_savings_account_no"  id="cus_savings_account_no" class="form-control" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile Account</td>
                                                        <td><input type="text" name="cus_mobile_bank_branch" id="cus_mobile_bank_branch" class="form-control" /></td>
                                                        <td><input type="text" name="cus_mobile_facilities" id="cus_mobile_facilities" class="form-control" /></td>
                                                        <td><input type="text" name="cus_mobile_account_no" id="cus_mobile_account_no" class="form-control" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Daily Loan Service</td>
                                                        <td><input type="text" name="cus_daily_loan_bank_branch" id="cus_daily_loan_bank_branch" class="form-control" /></td>
                                                        <td><input type="text" name="cus_daily_loan_facilities" id="cus_daily_loan_facilities" class="form-control" /></td>
                                                        <td><input type="text" name="cus_daily_loan_account_no" id="cus_daily_loan_account_no" class="form-control" /></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </fieldset>

                                </div>

                                <div class="col-md-6">
                                    <label class="control-label" for="input-email">Registration Date</label>   
                                    <input type="date" name="reg_date" id="reg_date" class="form-control" disabled />

                                </div>

                                <div class="col-md-12">
                                    <input type="submit" class="btn btn" name="customer_update" id="custcontinue" value="Update">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Customer Panel Section-->
        <!--Update customers start--> 
        <?php
        if (isset($_POST['customer_update'])) {


            //update customer
            $quary_update_customer = "UPDATE 
`customer` 
SET
  `cus_fullname` = '" . $_POST['cus_fullname'] . "',
  `cus_address` ='" . $_POST['cus_address'] . "',
  `cus_tp` = '" . $_POST['cus_tp'] . "',
  `cus_dob` = '" . $_POST['cus_dob'] . "',
  `cus_ms` = '" . $_POST['cus_ms'] . "',
  `cus_dependdency` = '" . $_POST['cus_dependdency'] . "',
  `cus_position` = '" . $_POST['cus_position'] . "',
  `cus_monthly_salary` = '" . $_POST['cus_monthly_salary'] . "',
  `cus_emp_name` = '" . $_POST['cus_emp_name'] . "',
  `cus_emp_address` = '" . $_POST['cus_emp_address'] . "',
  `wife_name` = '" . $_POST['cus_hhalf_name'] . "',
  `wife_dob` = '" . $_POST['cus_bhalf_dob'] . "',
  `wife_position` = '" . $_POST['cus_bhalf_position'] . "',
  `wife_salary` = '" . $_POST['cus_bhalf_monthly_salary'] . "',
  `wife_emp_name` = '" . $_POST['cus_bhalf_emp_name'] . "',
  `proposer_name` = '" . $_POST['gua_fullname'] . "',
  `proposer_address` = '" . $_POST['gua_address'] . "',
  `proposer_tp` = '" . $_POST['gua_tp'] . "',
  `proposer_dob` = '" . $_POST['gua_dob'] . "',
  `proposer_nic` = '" . $_POST['gua_nic'] . "',
  `proposer_ms` = '" . $_POST['gua_ms'] . "',
  `proposer_position` = '" . $_POST['gua_position'] . "',
  `proposer_salary` = '" . $_POST['gua_monthly_salary'] . "',
  `proposer_employer` = '" . $_POST['gua_emp_name'] . "',
  `proposer_emp_address` = '" . $_POST['gua_emp_address'] . "' 
WHERE `cus_nic` = '" . $_POST['cus_nic'] . "'    
";

//            update Gerenter

            $quary_update_gernter = "UPDATE 
  `guarantor` g LEFT JOIN `service` s ON g.`ser_number`=s.`ser_number`
SET
  g.`ger_fullname` = '" . $_POST['gua_fullname'] . "',
  g.`ger_address` = '" . $_POST['gua_address'] . "',
  g.`ger_tp` = '" . $_POST['gua_tp'] . "',
  g.`ger_nic` = '" . $_POST['gua_nic'] . "',
  g.`ger_dob` = '" . $_POST['gua_dob'] . "',
  g.`ger_ms` = '" . $_POST['gua_ms'] . "',
  g.`ger_position` = '" . $_POST['gua_position'] . "',
  g.`ger_salerry` = '" . $_POST['gua_monthly_salary'] . "',
  g.`ger_emp_name` = '" . $_POST['gua_emp_name'] . "',
  g.`ger_emp_address` = '" . $_POST['gua_emp_address'] . "'

WHERE 
s.`cus_nic`='" . $_POST['cus_nic'] . "'
";

//            Update property House

            $quary_update_house = "UPDATE 
  `ayolanin_datahost`.`cus_real_property` 
SET

  `place` = '" . $_POST['real_prp_house_position'] . "',
  `size` = '" . $_POST['real_prp_house_size'] . "',
  `val` = '" . $_POST['real_prp_house_value'] . "',
  `is_pawned` = '" . $_POST['real_prp_house_pawned'] . "',
  `pawn_getter` = '" . $_POST['real_prp_house_pawn_getter'] . "'
WHERE `category`='1' AND `cus_nic`='" . $_POST['cus_nic'] . "'

";

//            Update property Other

            $quary_update_other = "UPDATE 
  `ayolanin_datahost`.`cus_real_property` 
SET

  `place` = '" . $_POST['real_prp_other_position'] . "',
  `size` = '" . $_POST['real_prp_other_size'] . "',
  `val` = '" . $_POST['real_prp_other_value'] . "',
  `is_pawned` = '" . $_POST['real_prp_other_pawned'] . "',
  `pawn_getter` = '" . $_POST['real_prp_other_pawn_getter'] . "'
WHERE `category`='2' AND `cus_nic`='" . $_POST['cus_nic'] . "'

";

//            Update Savings Bank

            $quary_update_savings_bank = "UPDATE 
  `ayolanin_datahost`.`cus_bnk_acc` 
SET

  `cus_bnk_name_and_branch` = '" . $_POST['cus_savings_bank_branch'] . "',
  `cus_facilities` = '" . $_POST['cus_savings_facilities'] . "',
  `cus_bnk_account_no` = '" . $_POST['cus_savings_account_no'] . "'
 
WHERE `idbank_acc_cat` = '1' AND `cus_nic` = '" . $_POST['cus_nic'] . "'
";

//            Update Mobile Bank

            $quary_update_mobile_bank = "UPDATE 
  `ayolanin_datahost`.`cus_bnk_acc` 
SET

  `cus_bnk_name_and_branch` = '" . $_POST['cus_mobile_bank_branch'] . "',
  `cus_facilities` = '" . $_POST['cus_mobile_facilities'] . "',
  `cus_bnk_account_no` = '" . $_POST['cus_mobile_account_no'] . "'
 
WHERE `idbank_acc_cat` = '2' AND `cus_nic` = '" . $_POST['cus_nic'] . "'
";

//            Update Daily Loan Bank

            $quary_update_daily_loan_bank = "UPDATE 
  `ayolanin_datahost`.`cus_bnk_acc` 
SET

  `cus_bnk_name_and_branch` = '" . $_POST['cus_daily_loan_bank_branch'] . "',
  `cus_facilities` = '" . $_POST['cus_daily_loan_facilities'] . "',
  `cus_bnk_account_no` = '" . $_POST['cus_daily_loan_account_no'] . "'
 
WHERE `idbank_acc_cat` = '3' AND `cus_nic` = '" . $_POST['cus_nic'] . "'
";

//            Update Quary Execution
             $result_update_customer = mysqli_query($conn, $quary_update_customer);
             $result_update_gernter = mysqli_query($conn, $quary_update_gernter);
            $result_update_house = mysqli_query($conn, $quary_update_house);
            $result_update_other = mysqli_query($conn, $quary_update_other);
            $result_update_savings_bank = mysqli_query($conn, $quary_update_savings_bank);
            $result_update_mobile_bank = mysqli_query($conn, $quary_update_mobile_bank);
            $result_update_daily_loan_bank = mysqli_query($conn, $quary_update_daily_loan_bank);

            
            if ($result_update_customer and $result_update_gernter and $result_update_house and $result_update_other and $result_update_savings_bank and $result_update_mobile_bank and $result_update_daily_loan_bank) {

                echo '<script>alert("Successfully Updated")</script>';
            } else {
                echo '<script>alert("Updated Failed")</script>';
                die(mysql_error());
            }
            $na=$_POST['cus_fullname'];
            echo '<script>alert("'.$na.'")</script>';
        }
        ?>
        <!--update customers end-->
        <!--Footer Section-->
        <?php include '../assets/include/footer.php'; ?>
        <!--Footer Section-->

        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
        <script src="http://bootsnipp.com/dist/scripts.min.js"></script>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <style>
            #panelheading
            {
                background: #009688;
                color: white;          
            }
            #custcontinue
            {
                background-color: #009688;
                color: white;
                float: right;
            }
            #custcontinue:hover
            {
                background-color: #004D40;
            }
            #backregister
            {
                background-color: #009688;
                color: white;
                float: right;
                margin-right: 12px;
            }
            #backregister:hover
            {
                background-color: #004D40;
            }
        </style>
        <script type="text/javascript">
                                                    function gotosecond()
                                                    {
                                                        document.getElementById('one').style.display = "none";
                                                        document.getElementById('second').style.display = "block";
                                                    }
                                                    function gotoone()
                                                    {
                                                        document.getElementById('one').style.display = "block";
                                                        document.getElementById('second').style.display = "none";
                                                    }

        </script>
        <script>
            function check()
            {
                var property = document.getElementById('input-region').value;
                if (property == 'bike')
                {
                    alert("Bike");
                    document.getElementById('landpanel').style.display = 'none';
                    document.getElementById('leasepanel').style.display = 'block';
                } else if (property == 'twheel')
                {
                    alert("Three-Wheel");
                    document.getElementById('landpanel').style.display = 'none';
                    document.getElementById('leasepanel').style.display = 'block';
                } else if (property == 'land')
                {
                    alert("Land");
                    document.getElementById('leasepanel').style.display = 'none';
                    document.getElementById('landpanel').style.display = 'block';
                }
            }
            function change() {

            }
        </script>

    </body>
</html>
