<html>

    <head>



    </head>
    <body>
        <table boader="1">
            <?php
            require_once '../db/mysqliConnect.php';

            $ido = 1;

            $queryall = "CALL all_users('" . $ido . "')";
            $result = mysqli_query($d_bc, $queryall);
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
            <tr>
                <td>
                    <?php echo $row['user_email'];?>
                </td>
            </tr>
                <?php
            }
            ?>
        </table>

    </body>
</html>