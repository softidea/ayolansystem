<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Services View</title>
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


        <?php if (isset($_GET['bootstrap']) && $_GET['bootstrap'] == 1): ?>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <?php else: ?>
            <link rel="stylesheet" type="text/css" href="../assets/css/zebra_pagination.css">
        <?php endif ?>

        <link rel="stylesheet" type="text/css" href="../assets/css/customer_service.css">
        <link rel="icon" href="favicon.ico">
    </head>
    <body>
        <?php
        include '../assets/include/navigation_bar.php';

        $conn = mysqli_connect("77.104.142.97", "ayolanin_dev", "WelComeDB1129", "ayolanin_datahost");
        if (mysqli_connect_errno()) {
            echo "Falied to Connect the Database" . mysqli_connect_error();
        }
        ?>

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
                                    <legend>Search Option-01</legend>
                                    <div class="form-group required">
                                        <label class="control-label">Select Option:</label>
                                        <select class="form-control">
                                            <option value=""> --- Please Select --- </option>
                                            <option value="sno">Search by Deed No</option>
                                            <option value="nic">Search by NIC</option>
                                        </select>
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label">Search Here:</label>
                                        <div class="form-inline required">
                                            <input type="text" name="customer_search_bar" id="customer_searchbar" value="" placeholder="Search Here" class="form-control" style="width: 86%;" required/>
                                            <button type="button" name="search" id="cservicebtn" class="btn btn">Search</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <!--Customer Service Loader-->
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Service No</th>
                                                        <th>Reg Date</th>
                                                        <th>Service</th>
                                                        <th>Service Rental</th>
                                                        <th>Service Period</th>
                                                        <th>Installment</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="bike_tbody">
                                                    <tr>
                                                        <td><input type="radio" name="check"/></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group required">
                                                <div class="form-group required">
                                                    <label class="control-label" for="input-email">Total Paid Installments:</label>
                                                    <input type="text" disabled name="fname" id="fname" value="" placeholder="Total Due Installments" id="input-email" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <div class="form-group required">
                                                    <label class="control-label" for="input-email">Total Due Installments:</label>
                                                    <input type="text" disabled name="fname" id="fname" value="" placeholder="Total Due Installments" id="input-email" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <div class="form-group required">
                                                    <label class="control-label" for="input-email">Total Customer Due:</label>
                                                    <input type="text" disabled name="fname" id="fname" value="" placeholder="Total Customer Due" id="input-email" class="form-control" required/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">

                                            <div class="form-group required">
                                                <div class="form-group required">
                                                    <label class="control-label" for="input-email">Total Company Due:</label>
                                                    <input type="text" disabled name="fname" id="fname" value="" placeholder="Total Company Due" id="input-email" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <div class="form-group required">
                                                    <label class="control-label" for="input-email">Total Payable:</label>
                                                    <input type="text" disabled name="fname" id="fname" value="" placeholder="Total Payable" id="input-email" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <div class="form-group required">
                                                    <label class="control-label" for="input-email">Next Installment:</label>
                                                    <input type="text" disabled name="fname" id="fname" value="" placeholder="Next Installment" id="input-email" class="form-control" required/>
                                                </div>
                                            </div>
                                            <div class="form-inline col-sm-12">
                                                <div class="form" style="float: right;">

                                                    <button type="submit" class="btn btn" id="cservicebtn">Print</button>
                                                    <button type="submit" class="btn btn" id="cservicebtn"><a href="customer_installment.php" style="text-decoration: none;color: white;">Add Installment</a></button>
                                                    <button type="submit" class="btn btn" id="cservicebtn"><a href="customer_installment.php" style="text-decoration: none;color: white;">View Installments</a></button>
                                                    <button type="submit" class="btn btn" id="cservicebtn"><a href="customer_addlease.php" style="text-decoration: none;color: white;">Add New Lease</a></button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Service View Main Panel-->
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
</html>
