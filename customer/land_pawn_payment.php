<!DOCTYPE html>
<?php
date_default_timezone_set('Asia/Colombo');
$current_date = date("Y-m-d");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Land | Installments</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <!-- Latest compiled and minified CSS -->

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <!-- Optional theme -->

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,700,600italic,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <link rel="icon" href="favicon.ico">
        <link rel="stylesheet" type="text/css" href="../assets/css/installments.css"/>

        <script type="text/javascript">
            function searchPawnByDeed() {
                var deed_no = document.getElementById('deed_no').value;
                alert(deed_no);
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                      var result_arr= xmlhttp.responseText.split("#");
                      if(result_arr[0]==1){
                          document.getElementById('pawn_period').value=result_arr[0]+" Year";
                      }else{
                         document.getElementById('pawn_period').value=result_arr[0]+" Years"; 
                      }
                      
                      document.getElementById('pawn_amount').value=result_arr[1];
                      document.getElementById('ser_installment').value=result_arr[2];
                      document.getElementById('cus_nic').value=result_arr[3];
                      document.getElementById('cus_name').value=result_arr[4];
                      document.getElementById('cus_tp').value=result_arr[5];
                      document.getElementById('cus_address').value=result_arr[6];
                      document.getElementById('cus_reg_date').value=result_arr[7];
                      checkInstallmentHave(deed_no);
                    }
                }
                xmlhttp.open("GET", "../controller/land_pawn_search.php?deed_no=" + deed_no, true);
                xmlhttp.send();
            }
        </script>
        <script type="text/javascript">
            function checkInstallmentHave(deed_no){
                alert(deed_no);
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                      alert(xmlhttp.responseText);  
                    }
                }
                xmlhttp.open("GET", "../controller/land_pawn_search.php?deed_no_for_check_ins=" + deed_no, true);
                xmlhttp.send();
            }
        </script>
    </head>
    <body>
        <?php include '../assets/include/navigation_bar.php'; ?>

        <!--Service View Main Panel-->
        <div class="container" style="margin-top: 80px;display: block;" id="one">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="panelheading">
                            <h3 class="panel-title">Land Pawn Information</h3>
                        </div>
                        <div class="panel-body" style="background-color: #FAFAFA;">
                            <div class="col-sm-6">
                                <fieldset id="account">
                                    <legend>Customer Details</legend>
                                    <div class="form-group required">
                                        <label class="control-label">Customer NIC:</label>
                                        <div class="form-inline required">
                                            <input type="text"  name="cus_nic" id="cus_nic" placeholder="NIC" class="form-control" style="width:85%;text-transform: uppercase;" maxlength="10" required/>
                                            <input type="button" class="btn btn" id="custcontinue" value="Search" onclick="">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="form-inline required">
                                            <label class="control-label">Customer Name:</label>
                                            <input type="text"  name="cus_name" id="cus_name" placeholder="Customer Name" class="form-control" required style="width:85%;"/>
                                            <input type="button" class="btn btn" id="custcontinue" value="Search" onclick="">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="form-group required">
                                            <label class="control-label">Customer TP:</label>
                                            <input type="text"  name="cus_tp" id="cus_tp" placeholder="Customer Telephone" class="form-control" required readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="form-group required">
                                            <label class="control-label">Customer Address:</label>
                                            <input type="text" name="cus_address" id="cus_address" placeholder="Customer Telephone" class="form-control" required readonly/>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="form-group required">
                                            <label class="control-label">Registered Date:</label>
                                            <input type="text"  name="cus_reg_date" id="cus_reg_date" placeholder="Registered Date" class="form-control" required readonly/>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-sm-6">
                                <div id="searchOptionPanel">
                                    <fieldset id="account">
                                        <legend>Service Details</legend>
                                        <div class="form-group required">
                                            <label class="control-label">Select Deed:</label>
                                            <select name="deed_combo" id="deed_combo" class="form-control" onchange="">
                                                <option value='0'>~~Select Service~~</option>
                                            </select>
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label">Deed No:</label>
                                            <div class="form-inline required">
                                                <input type="text"  name="deed_no" id="deed_no" placeholder="Deed No" class="form-control" style="width:85%;" required/>
                                                <input type="button" class="btn btn" id="custcontinue" value="Search" onclick="searchPawnByDeed();">
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label">Pawn Period:</label>
                                            <div class="form-group required">
                                                <input type="text" name="pawn_period" id="pawn_period" placeholder="Pawn Period" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <div class="form-group required">
                                                <label class="control-label">Pawn Amount:</label>
                                                <input type="text" name="pawn_amount" id="pawn_amount" placeholder="Loan Payment" class="form-control" required readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <div class="form-group required">
                                                <label class="control-label">Installment:</label>
                                                <input type="text" name="ser_installment" id="ser_installment" placeholder="Installment" class="form-control" required readonly/>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <!--Service View Main Panel-->

                            <!--Customer Service Loader-->
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="col-md-12" id="installment_result_panel">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Installment</th>
                                                        <th>Date</th>
                                                        <th>Paid Date</th>
                                                        <th>Payment</th>
                                                        <th>Customer Due</th>
                                                        <th>Company Due</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbl_installment_body">
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>2016/01/10</td>
                                                        <td>2016-10-12</td>
                                                        <td>6000.00</td>
                                                        <td>00.00</td>
                                                        <td>264.00</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>2016/02/10</td>
                                                        <td>2016-10-12</td>
                                                        <td>5000.00</td>
                                                        <td>736.00</td>
                                                        <td>00.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="container">
                                                <ul class="nav nav-tabs" style="width: 1000px;">
                                                    <li class="active"><a data-toggle="tab" href="#home">Add New</a></li>
                                                    <li><a data-toggle="tab" href="#menu2">View</a></li>
                                                    <li><a data-toggle="tab" href="#menu3">Settlement</a></li>
                                                </ul>

                                                <div class="tab-content">
                                                    <div id="home" class="tab-pane fade in active">
                                                        <h3>Add New Installment Here</h3>
                                                        <p>New Installment available for the current service , Please add new installment</p>
                                                        <div class="col-sm-3">
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <label class="control-label">Payable Installment:</label>
                                                                    <input type="text" readonly name="payble_installment" id="payble_installment" placeholder="Payable Installment" class="form-control" required/>
                                                                </div>
                                                            </div>
                                                            <button type="button"  class="btn btn" id="cservicebtn" onclick="">Add Installment</button>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <label class="control-label">Payment:</label>
                                                                    <input type="text" name="payment_submit" id="payment_submit" placeholder="Payment" class="form-control" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <label class="control-label">Payable Date:</label>
                                                                    <input type="text" readonly name="payable_date" id="payable_date" placeholder="Payable Date" class="form-control" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <label class="control-label">Paid Date:</label>
                                                                    <input type="date" name="paid_date" id="paid_date" value="<?php echo $current_date; ?>" placeholder="Paid Date" class="form-control" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="menu1" class="tab-pane fade">
                                                        <h3>Edit Installments Here</h3>
                                                        <p>You can edit the last installment of the above service</p>
                                                        <div class="col-sm-3">
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <label class="control-label">Payable Installment:</label>
                                                                    <input type="text" disabled name="fname" id="fname" value="5736.00" placeholder="Payable Installment" id="input-email" class="form-control" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <label class="control-label" for="input-email">Paid Installment:</label>
                                                                    <input type="text" disabled name="fname" id="fname" value="5780.00" placeholder="Payment" id="input-email" class="form-control" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <label class="control-label" for="input-email">Payment:</label>
                                                                    <input type="text" name="fname" id="fname" value="00.00" placeholder="Payment" id="input-email" class="form-control" required/>
                                                                </div>
                                                                <button type="submit"  class="btn btn" id="cservicebtn">Update Installment</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="menu2" class="tab-pane fade">
                                                        <h3>View Installment Information Here</h3>
                                                        <p>Total Service Installments ad due payments available here</p>
                                                        <div class="col-sm-3">
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <label class="control-label" for="input-email">Installment:</label>
                                                                    <input type="text" name="fname" value="00.00" placeholder="Payment" id="input-email" class="form-control" required/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <label class="control-label" for="input-email">Next Installment Date:</label>
                                                                    <input type="text" name="fname" value="2016-10-10" placeholder="Payment" id="input-email" class="form-control" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <label class="control-label" for="input-email">Total Customer Due:</label>
                                                                    <input type="text" name="fname" value="00.00" placeholder="Payment" id="input-email" class="form-control" required/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <label class="control-label" for="input-email">Next Installment:</label>
                                                                    <input type="text" name="fname" value="00.00" placeholder="Payment" id="input-email" class="form-control" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <label class="control-label" for="input-email">Total Company Due:</label>
                                                                    <input type="text" name="fname" value="00.00" placeholder="Payment" id="input-email" class="form-control" required/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <label class="control-label" for="input-email">Total Payable:</label>
                                                                    <input type="text" name="fname" value="35000.00" placeholder="Payment" id="input-email" class="form-control" required/>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div id="menu3" class="tab-pane fade">
                                                        <h3>Settlement of the Loan Payment</h3>
                                                        <p>Service Settlement can be 6% Discount if more than 5 installments (months) available</p>
                                                        <div class="col-md-3">
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <label class="control-label" for="input-email">Total Payable Installments:</label>
                                                                    <input type="text" disabled name="fname" value="10" placeholder="Payment" id="input-email" class="form-control" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <label class="control-label" for="input-email">Total Payable:</label>
                                                                    <input type="text" disabled name="fname" value="35000.00" placeholder="Payment" id="input-email" class="form-control" required/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <label class="control-label" for="input-email">Payment:</label>
                                                                    <input type="text" name="fname" value="35000.00" placeholder="Payment" id="input-email" class="form-control" required/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group required">
                                                                <div class="form-group required">
                                                                    <button type="submit"  class="btn btn" id="cservicebtn">Settle Loan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="button" class="btn btn" id="custcontinue_print" value="Print" onclick="PrintPreview();">
                                                <input type="button" class="btn btn" id="custcontinue_pdf" style="margin-right: 8px;" onclick="PrintDoc();" value="Save as PDF">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Customer Service Loader-->

        <?php include '../assets/include/footer.php'; ?>
    </body>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="http://bootsnipp.com/dist/scripts.min.js"></script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script type="text/javascript">
                                                    /*--This JavaScript method for Print command--*/
                                                    function PrintDoc() {
                                                        var toPrint = document.getElementById('printarea');
                                                        var popupWin = window.open('', '_blank', 'width=1024,height=600,location=no,left=200px');
                                                        popupWin.document.open();
                                                        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="" /></head><body onload="window.print()">')
                                                        popupWin.document.write(toPrint.innerHTML);
                                                        popupWin.document.write('</html>');
                                                        popupWin.document.close();
                                                    }
                                                    /*--This JavaScript method for Print Preview command--*/
                                                    function PrintPreview() {
                                                        var toPrint = document.getElementById('printarea');
                                                        var popupWin = window.open('', '_blank', 'width=1024,height=600,location=no,left=200px');
                                                        popupWin.document.open();
                                                        popupWin.document.write('<html><title>::Print Preview::</title><link rel="stylesheet" type="text/css" href="" media="screen"/></head><body">')
                                                        popupWin.document.write(toPrint.innerHTML);
                                                        popupWin.document.write('</html>');
                                                        popupWin.document.close();
                                                    }
    </script>
</html>
