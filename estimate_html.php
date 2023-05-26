<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./icons/favicon.ico">
    <link href="./CSS/estimate-view.css" rel="stylesheet">
    <title>L&M Hardware Invoice</title>
</head>
<body>
    <div id="invoice">
        <img src="./images/blankEstimate.jpg" alt="Invoice">
    </div>
        <?php
        require_once "config.php";
        $id = htmlspecialchars($_GET["id"]);
        $pin = htmlspecialchars($_GET["pin"]);

        // SQL query
        $strSQL = "SELECT * FROM estimates WHERE invoices_id = '".$id."' AND bill_zip = '".$pin."'";

        // Execute the query
        $rs = mysqli_query($conn, $strSQL);

        $noOfItems =  15;

        foreach ($rs as $dbValues) {
            echo '<div id="invoiceDate">';
                echo date('m/d/Y', strtotime($dbValues['invoiceDate']));
            echo "</div>";

            echo '<div id="invoiceNo">';
                echo $dbValues['invoices_id'];
            echo "</div>";

            echo '<div id="billingAddress">';
                echo $dbValues['bill_business_name'];
                echo "<br>";
                echo $dbValues['bill_address'];
                echo "<br>";
                echo $dbValues['bill_city'];
                echo ", ";
                echo $dbValues['bill_state'];
                echo " ";
                echo $dbValues['bill_zip'];
            echo "</div>";

            // echo "<pre>";
            //     echo '<div id="shippingAddress">';
            //         if ($dbValues['shipTo']) {
            //             echo $dbValues['shipTo'];
            //         } else {
            //             echo "SAME AS BILL TO";
            //         }
            //     echo "</div>";
            // echo "</pre>";

            // echo '<div id="poNo">';
            //     echo $dbValues['po_no'];
            // echo "</div>";

            // echo '<div id="terms">';
            //     echo $dbValues['terms'];
            // echo "</div>";

            // echo '<div id="rep">';
            //     echo $dbValues['rep'];
            // echo "</div>";

            // echo '<div id="shipDate">';
            //     echo date('m/d/Y', strtotime($dbValues['shipDate']));
            // echo "</div>";

            // echo '<div id="via">';
            //     echo $dbValues['via'];
            // echo "</div>";

            // echo '<div id="fob">';
            //     echo $dbValues['fob'];
            // echo "</div>";

            echo '<div id="project">';
                echo $dbValues['project'];
            echo "</div>";

            // echo '<div id="ItemCode">';
            //     for ($i = 1; $i <= $noOfItems; $i++) {
            //         if ($dbValues['part'.$i.'Item']) {echo $dbValues['part'.$i.'Item'] . "<br>";} else {echo "<br>";}
            //     }
            // echo "</div>";

            echo '<div id="ItemDescription">';
                for ($i = 1; $i <= $noOfItems; $i++) {
                    if ($dbValues['part'.$i.'ItemDesc']) {echo $dbValues['part'.$i.'ItemDesc'] . "<br>";} else {echo "<br>";}
                }
            echo "</div>";

            echo '<div id="ItemQuantity">';
                for ($i = 1; $i <= $noOfItems; $i++) {
                    if ($dbValues['part'.$i.'Quantity']) {echo $dbValues['part'.$i.'Quantity'] . "<br>";} else {echo "<br>";}
                }
            echo "</div>";

            echo '<div id="ItemSalesPrice">';
                for ($i = 1; $i <= $noOfItems; $i++) {
                    if ($dbValues['part'.$i.'SalesPrice'] != 0) {echo "$" . $dbValues['part'.$i.'SalesPrice'] . "<br>";} else {echo "<br>";}
                }
            echo "</div>";

            echo '<div id="finalAmount">';
                // number_format(($value/100),2)
                for ($i = 1; $i <= $noOfItems; $i++) {
                    if ($dbValues['part'.$i.'SalesPrice'] != 0) {echo "$" . number_format((($dbValues['part'.$i.'SalesPrice'] * $dbValues['part'.$i.'Quantity'])),2) . "<br>";} else {echo "<br>";}
                }
            echo "</div>";

            echo '<div id="finalPrice">';
                echo "$" . number_format($dbValues['finalPrice'], 2, '.', ',');
            echo "</div>";

            echo "<pre>";
                echo '<div id="InvoicePhone">';
                    if ($dbValues['invoice_phone']) echo $dbValues['invoice_phone'] . "<br>";
                echo "</div>";
            echo "</pre>";

            echo "<pre>";
                echo '<div id="InvoiceEmail">';
                    if ($dbValues['invoice_email']) echo $dbValues['invoice_email'] . "<br>";
                echo "</div>";
            echo "</pre>";
        }
        
        // Close connection
        mysqli_close($conn);
        ?>

<!-- <script> window.print();</script> -->

</body>
</html>