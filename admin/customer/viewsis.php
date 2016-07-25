<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>View Re-processes</title>
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
        <style type="text/css">
            body
            {
                font-family: 'Source Sans Pro', sans-serif;
            }
            .modal-backdrop {
                z-index: -1;
            }
            ul {
                list-style-type: square;
                list-style-position: outside;
                list-style-image: none;
            }
            #cviewbuttons
            {
                background-color: #004D40;
                color: white;

            }
            #cviewbuttons:hover
            {
                background-color: #009688;
            }
            #panelheading
            {
                background: #009688;
                color: white;          
            }
            #cservicebtn
            {
                background-color: #009688;
                color: white;
                margin-top: 12px;
            }
            #cservicebtn:hover
            {
                background-color: #004D40;
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
            //.thcaption{text-align: center;}
            #backregister
            {
                background-color: #004D40;
                color: white;
                float: right;
                margin-right: 12px;
            }
            #backregister:hover
            {
                background-color: #009688;
            }
        </style>
    </head>
    <body>
       <?php include '../../assets/include/navigation_bar_forAdmin.php'; ?>

        <!--Service View Main Panel-->
        <div class="container" style="margin-top: 80px;display: block;" id="one">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" id="panelheading">
                            <h3 class="panel-title">Re-Process Information</h3>
                        </div>
                        <div class="panel-body" style="background-color: #FAFAFA;">
                            <div class="col-sm-4">
                                <fieldset id="account">
                                    <legend>Search Option-01</legend>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-email">Select Service:</label>
                                        <select name="cbopayment" id="cboservice" class="form-control" required>
                                            <option value=""> --- All Services --- </option>
                                            <option value="bike">Search by Name</option>
                                            <option value="twheel">Search by NIC</option>
                                            <option value="land">Search by Phone Number</option>
                                        </select>
                                    </div>
                                    <div class="form-group required">
                                        <div class="form-group required">
                                            <label class="control-label" for="input-email">Service No:</label>
                                            <input type="text"  name="customersearch" id="fname" value="" placeholder="Enter Service No Here" id="input-email" class="form-control" required/>
                                            <button type="submit"  class="btn btn" id="cservicebtn">Search</button>
                                            <button type="submit"  class="btn btn" id="cservicebtn">New Service</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-sm-4">
                                <div id="searchOptionPanel">
                                    <fieldset id="account">
                                        <legend>Search Option-02</legend>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-email">Select Customer:</label>
                                            <select name="cbopayment" id="cboservice" class="form-control" required onchange="check();">
                                                <option value=""> --- Please Select --- </option>
                                                <option value="bike">Customer Name</option>
                                                <option value="twheel">NIC</option>
                                                <option value="land">Phone Number</option>
                                            </select>
                                        </div>
                                        <div class="form-group required">
                                            <div class="form-group required">
                                                <label class="control-label" for="input-email">Search Customer:</label>
                                                <input type="text" name="fname" id="fname" value="" placeholder="Enter Customer Search" id="input-email" class="form-control" required/>
                                                <button type="submit"  class="btn btn" id="cservicebtn">Search</button>
                                                <button type="submit"  class="btn btn" id="cservicebtn">New Customer</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div id="searchOptionPanel">
                                    <fieldset id="account">
                                        <legend>Search Option-03</legend>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-email">From Date:</label>
                                            <select name="cbopayment" id="cboservice" class="form-control" required onchange="check();">
                                                <option value=""> --- Please Select --- </option>
                                                <option value="bike">Motor Bike Leasing</option>
                                                <option value="twheel">Three-Wheel Leasing</option>
                                                <option value="land">Land Pawning</option>
                                            </select>
                                        </div>
                                        <div class="form-group required">
                                            <label class="control-label" for="input-email">To Date:</label>
                                            <select name="cbopayment" id="cboservice" class="form-control" required onchange="check();">
                                                <option value=""> --- Please Select --- </option>
                                                <option value="bike">Motor Bike Leasing</option>
                                                <option value="twheel">Three-Wheel Leasing</option>
                                                <option value="land">Land Pawning</option>
                                            </select>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <!--Service View Main Panel-->

                            <!--Customer Service Loader-->
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <fieldset>
                                            <legend>Re-Process Results</legend>
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Sis No</th>
                                                        <th>Sis Date</th>
                                                        <th>Customer Name</th>
                                                        <th>Service No</th>
                                                        <th>Description</th>
                                                        <th>Due Amount</th>
                                                        <th>Sis Cost</th>
                                                        <th>Total Payable</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row"><input type="radio"></th>
                                                        <td>1258</td>
                                                        <td>2016-10-12</td>
                                                        <td>Malinda Senanayake</td>
                                                        <td>HOR1258</td>
                                                        <td>Description</td>
                                                        <td>30000.00</td>
                                                        <td>10000.00</td>
                                                        <td>40000.00</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><input type="radio"></th>
                                                        <td>1258</td>
                                                        <td>2016-10-12</td>
                                                        <td>Malinda Senanayake</td>
                                                        <td>HOR1258</td>
                                                        <td>Description</td>
                                                        <td>30000.00</td>
                                                        <td>10000.00</td>
                                                        <td>40000.00</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><input type="radio"></th>
                                                        <td>1258</td>
                                                        <td>2016-10-12</td>
                                                        <td>Malinda Senanayake</td>
                                                        <td>HOR1258</td>
                                                        <td>Description</td>
                                                        <td>30000.00</td>
                                                        <td>10000.00</td>
                                                        <td>40000.00</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row"><input type="radio"></th>
                                                        <td>1258</td>
                                                        <td>2016-10-12</td>
                                                        <td>Malinda Senanayake</td>
                                                        <td>HOR1258</td>
                                                        <td>Description</td>
                                                        <td>30000.00</td>
                                                        <td>10000.00</td>
                                                        <td>40000.00</td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                            <div style="text-align: center;">
                                                <nav>
                                                    <ul class="pagination">
                                                        <li class="page-item">
                                                            <a class="page-link" href="#" aria-label="Previous">
                                                                <span aria-hidden="true">&laquo;</span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                        </li>
                                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                                        <li class="page-item">
                                                            <a class="page-link" href="#" aria-label="Next">
                                                                <span aria-hidden="true">&raquo;</span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!--single sis view components panel-->


                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <fieldset>
                                            <legend>Re-Process Release</legend>
                                            <div class="col-sm-4">
                                                <div class="form-group required">
                                                    <div class="form-group required">
                                                        <label class="control-label" for="input-email">Due Installments:</label>
                                                        <input type="text" disabled placeholder="Due Installments" class="form-control" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <div class="form-group required">
                                                        <label class="control-label" for="input-email">Due Installments Cost:</label>
                                                        <input type="text" disabled placeholder="Due Installments Cost" class="form-control" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group required">
                                                    <div class="form-group required">
                                                        <label class="control-label" for="input-email">Payable Installment:</label>
                                                        <select name="cbopayment" id="cboservice" class="form-control" required onchange="check();">
                                                            <option value=""> --- Please Select --- </option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <div class="form-group required">
                                                        <label class="control-label" for="input-email">Payable Installment:</label>
                                                        <input type="text" disabled value="" placeholder="Payable Installment" class="form-control" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group required">
                                                    <div class="form-group required">
                                                        <label class="control-label" for="input-email">Sis Cost:</label>
                                                        <input type="text" disabled value="" placeholder="Sis Cost" class="form-control" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <div class="form-group required">
                                                        <label class="control-label" for="input-email">Total Payable Cost:</label>
                                                        <input type="text" value="" placeholder="Total Payable Cost" class="form-control" required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!--single sis view components panel-->  

                            <div class="col-md-12">
                                <button type="submit"  class="btn btn" id="cservicebtn">Release Service</button>
                                <button type="submit"  class="btn btn" id="cservicebtn">New Service</button>
                                <button type="submit"  class="btn btn" id="cservicebtn">New Customer</button>
                                <button type="submit"  class="btn btn" id="cservicebtn">View Installment</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Customer Service Loader-->

        <?php include '../../assets/include/footer.php'; ?>
    </body>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="http://bootsnipp.com/dist/scripts.min.js"></script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</html>
