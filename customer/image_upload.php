<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Report Template</title>
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
        <link href="../assets/css/Noverse.css">
    </head>
    <style>
        body{
            font-family: 'Source Sans Pro', sans-serif;
        }
        div.container {
            width: 100%;
            //border: 1px solid gray;
        }
        header{
            /*            padding: 1em;*/
            color: black;
            background-color: #FAFAFA;


        }
        #head_panel{

        }
        footer{
            padding: 1em;
            color: black;
            background-color: #FAFAFA;
            clear: left;
            text-align: center;
        }

        nav {
            float: left;
            max-width: 160px;
            margin: 0;
            padding: 1em;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul a {
            text-decoration: none;
        }

        article {
            margin-left: 170px;
            border-left: 1px solid gray;
            padding: 1em;
            overflow: hidden;
        }
        #company_logo{
            width: 100px;
            height: 100px;
        }
    </style>
    <body>
        <div class="container">
            <header>
                <table>
                    <tr>
                        <td>
                            <div id="head_panel">
                                <img src="../assets/images/admin/ayolan_logo.png" id="company_logo">
                            </div>
                        </td>
                        <td>
                            <div style="padding-left: 960px;float: right;">
                                <p>Ayolan Investments pvt ltd</p>
                                <p><b>Address :</b>No-141,Rathnapura Road,Horana</p>
                                <p><b>Telephone : </b>034 22 65107</p>
                            </div>
                        </td>
                    </tr>
                </table>


            </header>

            <div class="container">
                <div class="row">
                    <div class="heading_wrapper">
                        <?php if (isset($msg) && $msg != '') { ?>
                            <div class="msg" id="notification">
                                <?php print_r($msg); ?>
                            </div>
                        <?php } ?>
                        <div class="col-md-12">
                            <div class="heading">
                                <h2>Upload Multiple Images and generate thumbnails in PHP </h2>
                            </div>
                        </div>
                    </div>
                    <div class="content_wrapper">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="content">
                                <form name="upload_img" method="post" enctype="multipart/form-data">
                                    <div class="upload_field">
                                        <div class="upload_img">
                                            <input class="image" name="img_files[]" type="file" multiple="multiple">
                                            <span class="add_more custom_span btn btn-primary">Add more</span>
                                        </div>
                                    </div>
                                    <input class="submit btn btn-success col-md-offset-3" name="submit" type="submit" value="Upload">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function () {
                    $(".add_more").click(function () {
                        $('.upload_field').append('<div class="upload_img"><input class="image" name="img_files[]" type="file" multiple="multiple" ><span class="remove custom_span btn btn-danger" >Remove</span></div>');
                    });
                    $('.content').on('click', '.remove', function () {
                        $(this).parent("div.upload_img").remove();
                    });

                    var msg = "<?php if (isset($msg)) {
                            echo $msg;
                        } ?>";
                    if (msg != '') {
                        $("#notification").html(msg);
                        if ($("#notification p").length) {
                            $("#notification p").slideDown("slow");
                            setTimeout(function () {
                                $("#notification p").slideUp("slow");
                            }, 8000);
                        }
                        if ($("#notification ul").length) {
                            $("#notification ul").slideDown("slow");
                            setTimeout(function () {
                                $("#notification ul").slideUp("slow");
                            }, 8000);
                        }
                    }

                });
            </script>

            <footer>Copyright © Ayolan Inverstments</footer>
        </div>

    </body>
</html>
