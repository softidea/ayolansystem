<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Re-processes</title>
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
                            <h3 class="panel-title">Add New Re-Process</h3>
                        </div>
                        <div class="panel-body" style="background-color: #FAFAFA;">
                            <div class="col-sm-6">
                                <fieldset id="account">
                                    <legend>Customer Information</legend>
                                    <div class="form-group required">
                                        <div class="form-group required">
                                            <label class="control-label" for="input-email">Customer Name:</label>
                                            <input type="text" disabled name="customersearch" id="fname" value="" placeholder="Customer Name" id="input-email" class="form-control" required/>

                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="form-group required">
                                            <label class="control-label" for="input-email">NIC:</label>
                                            <input type="text" disabled name="customersearch" id="fname" value="" placeholder="NIC" id="input-email" class="form-control" required/>

                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="form-group required">
                                            <label class="control-label" for="input-email">Phone Number:</label>
                                            <input type="text" disabled name="customersearch" id="fname" value="" placeholder="Phone Number" id="input-email" class="form-control" required/>

                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="form-group required">
                                            <label class="control-label" for="input-email">Address :</label>
                                            <input type="text" disabled name="customersearch" id="fname" value="" placeholder="Address" id="input-email" class="form-control" required/>

                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-sm-6">
                                <div id="searchOptionPanel">
                                    <fieldset id="account">
                                        <legend>Service Information</legend>
                                        <div class="form-group required">
                                            <div class="form-group required">
                                                <label class="control-label" for="input-email">Service No:</label>
                                                <input type="text" disabled name="customersearch" id="fname" value="" placeholder="Service No" id="input-email" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <div class="form-group required">
                                                <label class="control-label" for="input-email">Service Type:</label>
                                                <input type="text" disabled name="customersearch" id="fname" value="" placeholder="Service Type" id="input-email" class="form-control" required/>

                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <div class="form-group required">
                                                <label class="control-label" for="input-email">Service Date:</label>
                                                <input type="text" disabled name="customersearch" id="fname" value="" placeholder="Service Date" id="input-email" class="form-control" required/>

                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <div class="form-group required">
                                                <label class="control-label" for="input-email">Sis Date :</label>
                                                <input type="text" name="customersearch" id="fname" value="" placeholder="Sis Date" id="input-email" class="form-control" required/>

                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group required">
                                    <div class="form-group required">
                                        <label class="control-label" for="input-email">No of Installments :</label>
                                        <input type="text" disabled name="customersearch" id="fname" value="" placeholder="No of Installments" id="input-email" class="form-control" required/>

                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="form-group required">
                                        <label class="control-label" for="input-email">Due Installments :</label>
                                        <input type="text" disabled name="customersearch" id="fname" value="" placeholder="Due Installments" id="input-email" class="form-control" required/>

                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="form-group required">
                                        <label class="control-label" for="input-email">Due Payment :</label>
                                        <input type="text" disabled name="customersearch" id="fname" value="" placeholder="Due Payment" id="input-email" class="form-control" required/>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group required">
                                    <div class="form-group required">
                                        <label class="control-label" for="input-email">Installment :</label>
                                        <input type="text" disabled name="customersearch" id="fname" value="" placeholder="Installment" id="input-email" class="form-control" required/>

                                    </div>
                                </div>
                               <div class="form-group required">
                                    <div class="form-group required">
                                        <label class="control-label" for="input-email">Paid Installment :</label>
                                        <input type="text" disabled name="customersearch" id="fname" value="" placeholder="Paid Installment" id="input-email" class="form-control" required/>

                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="form-group required">
                                        <label class="control-label" for="input-email">Paid Payment :</label>
                                        <input type="text" disabled name="customersearch" id="fname" value="" placeholder="Paid Payment" id="input-email" class="form-control" required/>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                 <div class="form-group required">
                                    <div class="form-group required">
                                        <label class="control-label" for="input-email">Rental Cost :</label>
                                        <input type="text" disabled name="customersearch" id="fname" value="" placeholder="Rental Cost" id="input-email" class="form-control" required/>

                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="form-group required">
                                        <label class="control-label" for="input-email">Total Customer Due :</label>
                                        <input type="text" disabled name="customersearch" id="fname" value="" placeholder="Total Customer Due" id="input-email" class="form-control" required/>

                                    </div>
                                </div>
                                <div class="form-group required">
                                    <div class="form-group required">
                                        <label class="control-label" for="input-email">Sis Cost :</label>
                                        <input type="text" name="customersearch" id="fname" value="" placeholder="Sis Cost" id="input-email" class="form-control" required/>

                                    </div>
                                </div>
                            </div>
                          
                            <div class="col-md-12">
                                <fieldset>
                                    <legend>Re-Process Description:</legend>
                                    <textarea  style="height: 100px;width: 100%;" placeholder="Enter Re-Process Description"></textarea>
                                    <button type="submit"  class="btn btn" id="cservicebtn">Back</button>
                                    <button type="submit"  class="btn btn" id="cservicebtn">Re-Process</button>
                                    <button type="submit"  class="btn btn" id="cservicebtn">View All</button>
                                </fieldset>
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

<?php include '../../assets/include/footer.php'; ?>
</body>
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="http://bootsnipp.com/dist/scripts.min.js"></script>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</html>
